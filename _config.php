<?php

use NSWDPC\ExitButton\Shortcodes\ExitButtonShortcode;
use SilverStripe\View\Parsers\ShortcodeParser;

ShortcodeParser::get('default')->register('exit_button', [ExitButtonShortcode::class, 'parse']);
