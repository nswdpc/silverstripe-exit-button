# Documentation

## Background

The exit button works by:

1. opening the configured URL in a new window/tab when clicked.
2. replacing the current location in history with the defined exit URL

Hitting 'Esc' (Escape key) on the keyboard will also trigger an exit.

It will not alter browser history. Use a browser's Incognito or Private browsing options, instead.


## Short code

A CMS editor can add a short code to any HTML editor field:

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

## ASgh
