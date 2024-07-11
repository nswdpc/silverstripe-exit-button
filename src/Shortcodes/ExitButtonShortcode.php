<?php

namespace NSWDPC\ExitButton\Shortcodes;

use NSWDPC\ExitButton\Models\ExitButton;
use SilverStripe\View\Parsers\ShortcodeParser;

/**
 * Shortcode for Exit Button
 */
class ExitButtonShortcode
{

    /**
     * Parse shortcode and return value
     */
    public static function parse(array $arguments, ?string $content = null, ShortcodeParser $parser = null, ?string $tagName = null) {
        $button = ExitButton::create();
        $url = $arguments['url'] ?? '';
        if($url) {
            $button->setExitUrl($url);
        }
        $label = $arguments['label'] ?? '';
        if($label) {
            $button->setLabel($label);
        }
        return $button->forTemplate();
    }
}
