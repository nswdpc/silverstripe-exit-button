<?php

namespace NSWDPC\ExitButton\Extensions;

use Silverstripe\Forms\CheckboxField;
use Silverstripe\ORM\DataExtension;

/**
 * Add field for enabling exit button
 */
class PageSettingsExtension extends DataExtension {

    /**
     * @inheritdoc
     */
    private static $db = [
        'EnableExitButton' => 'Boolean'
    ];

    /**
     * @inheritdoc
     */
    private static $defaults = [
        'EnableExitButton' => 0
    ];

    /**
     * @inheritdoc
     */
    public function updateSettingsFields($fields) {
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
                    . ' in a location defined by the website\'s template'
                )
            )
        );
    }

}
