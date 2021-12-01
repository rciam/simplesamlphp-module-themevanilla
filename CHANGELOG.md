# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

<!-- markdownlint-disable line-length -->

## [v3.1.1](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v3.1.0...v3.1.1) - 2021-12-01

<!-- markdownlint-enable line-length -->

This version is compatible with [SimpleSAMLphp v1.18](https://simplesamlphp.org/docs/1.18/simplesamlphp-changelog)

### Changed

- Improve error handling using showNoty

<!-- markdownlint-disable line-length -->

## [v3.1.0](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v3.0.0...v3.1.0) - 2021-08-27

<!-- markdownlint-enable line-length -->

This version is compatible with [SimpleSAMLphp v1.18](https://simplesamlphp.org/docs/1.18/simplesamlphp-changelog)

### Added

- Add `login_with` key in discopower definitions.
- Add style rules and logos for IdP umbrellaid.
- Add exception template for attrauthcomanage module
- Add template for Email Confirmation
- Add configurable theme wrapper for simple html views
- Add comanage loader
- Add support to configure loader
- Add view.php modal
- Add attrauthcomanage noty template

### Fixed

- Load JavaScript scripts with the new way
- Fix undefined index error for `idps_in_searchable_list_index`
- Load jQuery CSS script
- Fix searchable list and idp buttons display order
- Fix "Not translated" error in HTML title

### Changed

- Move `ribbon_text` definition to config file
- Comply to [PSR-1: Basic Coding Standard](https://www.php-fig.org/psr/psr-1/) guidelines
- Comply to [PSR-12: Extended Coding Style](https://www.php-fig.org/psr/psr-12/)
  guidelines
- Apply modern array syntax to comply with [SimpleSAMLphp v1.17](https://simplesamlphp.org/docs/stable/simplesamlphp-upgrade-notes-1.17)
- Comply to [markdownlint rules](https://github.com/DavidAnson/markdownlint/blob/main/doc/Rules.md)
- Move default loader spinner into a shared element
- Move language list into a shared element

<!-- markdownlint-disable line-length -->

## [v3.0.0](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v2.3.1...v3.0.0) - 2019-09-20

<!-- markdownlint-enable line-length -->

### Added

- Add languages (Xhosa, Zulu, Afrikaans).

### Changed

- Rename disco-tpl.php->disco.tpl.php as needed by simplesamlphp>1.14.
- Update translation functionality as needed by simplesamlphp>1.14.

<!-- markdownlint-disable line-length -->

## [v2.3.1](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v2.3.0...v2.3.1) - 2019-09-12

<!-- markdownlint-enable line-length -->

### Fixed

- Fix bug in IdPs buttons style caused by unclosed html element.

<!-- markdownlint-disable line-length -->

## [v2.3.0](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v2.2.1...v2.3.0) - 2019-08-01

<!-- markdownlint-enable line-length -->

### Added

- Module discopower: Add style rules and logos for the buttons of the IdPs:
  - Bitbucket
  - Github

<!-- markdownlint-disable line-length -->

## [v2.2.1](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v2.2.0...v2.2.1) - 2019-07-03

<!-- markdownlint-enable line-length -->

### Fixed

- Fix syntax error in disco-tpl.php

<!-- markdownlint-disable line-length -->

## [v2.2.0](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v2.1.0...v2.2.0) - 2019-06-27

<!-- markdownlint-enable line-length -->

### Added

- Module discopower: Add style rules and logos for the buttons of the IdPs:
  - OpenAIRE
  - OpenMinTeD
  - QQ
  - WeChat
  - Epos
- Add info about compatibility in README.
- Enable/disable cookie banner functionality via setting in config file.

### Changed

- Update instructions on module config file usage.
- Update style of Google login button.

<!-- markdownlint-disable line-length -->

## [v2.1.0](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v2.0.0...v2.1.0) - 2018-10-18

<!-- markdownlint-enable line-length -->

### Added

- Add banner and an extra view for cookies options.
- Add corner ribbon that displays customisable text.
- Add this changelog file.
- Module discopower: Add style rules and logos for the buttons of the IdPs:
  - eduTEAMS
  - EGI
  - Aria

### Changed

- Change vanilla logo and favicon.
- Move wording and links from the templates of several modules to the related
  definition file.
- Render header logo link url customisable.

<!-- markdownlint-disable line-length -->

## [v2.0.0](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v1.0.0...v2.0.0) - 2018-04-17

<!-- markdownlint-enable line-length -->

### Added

- Module discopower:
  - Add style rules and logos for the IdPs:
    - B2ACCESS
    - DARIAH
    - Elixir
    - IGTF
  - Support customisable order of IdPs' groups based on the existing mechanism of
    discopower.

### Changed

- Module discopower: Support only 2 tags for the grouping of IdPs.
- Module userid: Add content in the error template.

### Fixed

- Use the translated name to display an IdP.

<!-- markdownlint-disable line-length -->

## [v1.0.0](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v0.1.0...v1.0.0) - 2018-01-19

<!-- markdownlint-enable line-length -->

### Added

- Use SASS for the added style rules.
- Use Bootstrap v3.3.7.
- Add support for error pages that are produced from several modules.
- Add detailed instructions for the installation procedures.
- Document configuration options.
- Module discopower: Add enhanced style for the following IdPs' buttons:
  - Facebook
  - Google
  - LinkedIn
  - ORCID

### Changed

- Change the look n feel of several SimpleSAMLphp modules:
  - authX509
  - authorize
  - consent
  - core
  - default
  - discopower
  - userid
- Module discopower: Replace the section that includes the edugain IdPs with a
  section that lists all IdPs.
- Improve responsiveness of the layout.
- Enhance the customization of the theme.

<!-- markdownlint-disable line-length -->

## [v0.1.0](https://github.com/rciam/simplesamlphp-module-themevanilla/commits/v0.1.0) - 2018-01-12

<!-- markdownlint-enable line-length -->

### Added

Create a new theme for SimpleSAMLphp. The goal is to improve the experience for
people that login to services through multiple identity providers.
