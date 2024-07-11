# Exit site button

This Silverstripe module provides an "Exit Button" that can be included on any web page, either via the CMS using the per-page checkbox in Page > Settings, via a shortcode or programmatically.

## What it does do

+ provides configurable templates
+ provides configurable exit URL value
+ multiple button support
+ provdes a shortcode for adding the button to any HTML editor field
+ replaces the location value
+ opens a configured website in a new tab

## What it doesn't do

+ rewrite browser history
+ invalidate a session on the site

## Implementation

1. Add the `{$ExitButton}` template variable in a template
1. Enable on a page and/or add an Exit Button shortcode to a relevant HTML editor field

## Documentation

* [Read the documentation page](./docs/en/001_index.md) for implementation details

## Installation

The only supported method of installation is via composer:

```
composer require nswdpc/silverstripe-exit-button
```

## License

[BSD-3-Clause](./LICENSE.md)

## Maintainers

PD web team

## Bugtracker

We welcome bug reports, pull requests and feature requests on the Github Issue tracker for this project.

Please review the [code of conduct](./code-of-conduct.md) prior to opening a new issue.

## Security

If you have found a security issue with this module, please email digital[@]dpc.nsw.gov.au in the first instance, detailing your findings.

## Development and contribution

If you would like to make contributions to the module please ensure you raise a pull request and discuss with the module maintainers.

Please review the [code of conduct](./code-of-conduct.md) prior to completing a pull request.
