# Documentation

## Background

The exit button works by:

1. opening the configured URL in a new window/tab when clicked.
2. replacing the current location in history with the defined exit URL

Hitting 'Esc' (Escape key) on the keyboard twice within 1s will also trigger an exit (if enabled).

It will not alter browser history. Use a browser's Incognito or Private browsing options, instead.

## Page exit

The `PageSettingsExtension` provides a checkbox to enable this on a per-page basis. A developer needs to add this extension to the website app configuration to allow this functionality.

If you have a page-level exit function in your frontend, e.g via the NSW Design System's 'Quick Exit' component, use the `{$GlobalExitButton}` template variable in page templates. This requires the PageSettingsExtension to be enabled in configuration.

## Short code

A CMS author can add a short code to any HTML editor field:

```
[exit_button,url="https://www.google.co.uk"]
```

Specify a custom label:

```
[exit_button,url="https://www.google.co.uk",label="Exit now"]
```

With the shortcode, the options allowed are:

+ url: the exit URL, which will override the default URL
+ label: configure the button label. The default is 'Exit this page' if this is not set

If no `url` value is specified, the system default will be used.

## Configuring

A developer can configure the default exit URL for use by the module.

```yml
---
Name: app-exit-button
After:
  - '#nswdpc-exit-button'
---
# base level config
NSWDPC\ExitButton\Models\ExitButton:
  default_url: 'https://exit.example.com/'
```
