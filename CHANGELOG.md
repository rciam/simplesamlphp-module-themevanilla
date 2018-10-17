# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).


## [Unreleased]

### Added
- Add banner and an extra view for cookies options
- Add corner ribbon that displays customisable text
- Module discopower: Add style rules and logos for the IdPs:
  - eduTeams
  - EGI
  - Aria

### Changed
  - Change vanilla logo and favicon
  - Move wording and links from the templates of several modules to the related
    definition file

## [v2.0.0](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v1.0.0...v2.0.0) - 2018-04-17

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


## [v1.0.0](https://github.com/rciam/simplesamlphp-module-themevanilla/compare/v0.1.0...v1.0.0) - 2018-01-19

### Added
- Use SASS for the added style rules.
- Use Bootstrap v3.3.7.
- Add support for error pages that are produced from several modules.
- Add detailed instructions for the installation procedures.
- Document configuration options.
- Module discopower: Add enhanced style for the following  IdPs' buttons:
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
- Module discopower: Replace the section that includes the edugain IdPs with a section that lists all IdPs.
- Improve responsiveness of the layout.
- Enhance the customization of the theme.



## [v0.1.0](https://github.com/rciam/simplesamlphp-module-themevanilla/commits/v0.1.0) - 2018-01-12

### Added
Create a new theme for SimpleSAMLphp. The goal is to improve the experience for
people that login to services through multiple identity providers.
