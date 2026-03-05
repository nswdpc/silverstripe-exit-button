<?php

namespace NSWDPC\ExitButton\Tests;

use NSWDPC\ExitButton\Models\ExitButton;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\View\SSViewer;

/**
 * Tests exit button model
 */
class ExitButtonTest extends SapphireTest
{

    protected $usesDatabase = false;

    protected array $themes = [];

    protected function setUp(): void
    {
        parent::setUp();
        $this->themes = SSViewer::get_themes();
        SSViewer::set_themes(['$default']);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        SSViewer::set_themes($this->themes);
    }

    public function testIdVal(): void
    {
        $button = ExitButton::create();
        $button->setId('invalid9\'char;ac&quot;"ter;s');
        $id = $button->getId();
        $this->assertEquals('invalid9_char_ac_quot_ter_s', $id);
    }

    public function testDefaultLabel(): void
    {
        ExitButton::config()->set('default_label', 'test default label');
        $button = ExitButton::create();
        $button->setLabel('');
        $this->assertEquals('test default label', $button->getDefaultLabel());
    }

    public function testDefaultExitUrl(): void
    {
        ExitButton::config()->set('default_url', 'https://default.example.com/test');
        $button = ExitButton::create();
        $button->setExitUrl('');
        $this->assertEquals('https://default.example.com/test', $button->getExitUrl());
    }

    public function testTemplate(): void
    {
        $id = 'test-exit-button';
        $url = 'https://test.example.com/exit';
        $label = 'Test Exit Label';

        $button = ExitButton::create();
        $button->setId($id);
        $button->setExitUrl($url);
        $button->setLabel($label);

        $template = $button->forTemplate();
        $value = $template->getValue();
        $expected = '<div class="exit-button-wrapper"><a id="' . $id . '" class="page-exit" data-url="' . $url . '" href="' . $url . '" rel="nofollow noopener"><span>' . $label . '</span></a></div>';
        $this->assertEquals($expected, trim($value));
    }
}
