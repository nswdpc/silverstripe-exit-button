<?php

namespace NSWDPC\ExitButton\Models;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Control\Controller;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;
use SilverStripe\View\TemplateGlobalProvider;
use SilverStripe\View\ViewableData;

/**
 * Provides an exit button model
 * @author James
 */
class ExitButton extends ViewableData implements TemplateGlobalProvider {

    /**
     * @var string
     * The default URL to open when exit event is hit
     */
    private static $default_url = 'https://www.google.com/';

    /**
     * @var string
     * The per instance URL to open when exit event is hit
     */
    private $exitUrl = 'https://www.google.com/';

    /**
     * @var string
     * id attribute value for this button
     */
    private $id = '';

    /**
     * @var string
     * Button label
     */
    private $label = '';

    /**
     * Set exit URL
     */
    public function setExitUrl(string $exitUrl) : self {
        $this->exitUrl = $exitUrl;
        return $this;
    }

    /**
     * Get exit URL or use default
     */
    public function getExitUrl() : ?string {
        return $this->exitUrl ?? static::config()->get('default_url');
    }

    /**
     * Set id attribute value
     */
    public function setId(string $id) : self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get id attribute value or create one
     */
    public function getId() : string {
        return $this->id !== '' ? $this->id : 'exit-button-' . bin2hex(random_bytes(4));
    }

    /**
     * Set label to display on button
     */
    public function setLabel(string $label) : self {
        $this->label = trim($label);
        return $this;
    }

    /**
     * Get label or use default
     */
    public function getLabel() : string {
        return $this->label !== '' ? $this->label : _t('ExitButton.EXIT_BUTTON_LABEL', 'Exit this page');
    }

    /**
     * Return a rendered template for this model
     */
    public function forTemplate() {
        $id = $this->getId();
        Requirements::javascript('nswdpc/silverstripe-exit-button:client/static/js/exitbutton.js');
        Requirements::customScript(
<<<SCRIPT
window.addEventListener(
    'DOMContentLoaded',
    function(e) {
        let eb = new ExitButton();
        eb.init(document.getElementById('{$id}')).handle();
    }
);
SCRIPT
        );
        $data = ArrayData::create([
            'Url' => $this->getExitUrl(),
            'Id' => $id,
            'Label' => $this->getLabel()
        ]);
        return $this->customise($data)->renderWith(static::class);
    }

    /**
     * @inheritdoc
     */
    public static function get_global_exit_button() {
        $controller = Controller::curr();
        $enabled = false;
        if($controller && $page = $controller->data()) {
            $enabled = $page->hasField('EnableExitButton') && $page->EnableExitButton == 1;
        }
        if($enabled) {
            return static::create()->setId('global-exit-button')->forTemplate();
        } else {
            return null;
        }
    }

    /**
     * @inheritdoc
     */
     public static function get_template_global_variables()
     {
         return [
             'GlobalExitButton' => 'get_global_exit_button'
         ];
     }


}
