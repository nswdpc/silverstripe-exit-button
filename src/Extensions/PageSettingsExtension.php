<?php

namespace NSWDPC\ExitButton\Extensions;

use SilverStripe\Forms\CheckboxField;
use SilverStripe\ORM\DataExtension;

/**
 * Add field for enabling exit button
 * @property bool $EnableExitButton
 * @extends \SilverStripe\ORM\DataExtension<static>
 */
class PageSettingsExtension extends DataExtension
{
    /**
     * @inheritdoc
     */
    private static array $db = [
        'EnableExitButton' => 'Boolean'
    ];

    /**
     * @inheritdoc
     */
    private static array $defaults = [
        'EnableExitButton' => 0
    ];

    /**
     * @inheritdoc
     */
    public function updateSettingsFields($fields)
    {
        $fields->addFieldToTab(
            'Root.ExitButton',
            CheckboxField::create(
                'EnableExitButton',
                _t(
                    'ExitButton.ENABLE_ON_PAGE',
                    'Enable exit button on page'
                )
            )->setDescription(
                _t(
                    'ExitButton.ENABLE_ON_PAGE_DESCRIPTION',
                    'When enabled the exit button will display on the page,'
                    . " in a location defined by the website's template"
                )
            )
        );
    }

}
