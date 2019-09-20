<h1 align="center">Vanilla theme for SimpleSAMLphp</h1>

![discopower](/screenshots/disco_buttons_bottom.png)

A customisable theme for SimpleSAMLphp based on Bootstrap.
See more screens in the directory [screenshots](screenshots/).


## Installation

You can install the theme using any of the methods below.

### Composer

If you want to use [composer](https://getcomposer.org/) to install this theme
you need to edit `composer.json`. The file is located in your SimpleSAMLphp
installation. Check the following example, that includes all the necessary
additions for the installation of the **simplesamlphp-module-themevanilla
v1.0.0**.

```
"require": {

  ...

  "rciam/simplesamlphp-module-themevanilla": "1.0.0",
  "rciam/css": "1.0.0",
  "rciam/js": "1.0.0"
},
"repositories": [

  ...

  {
    "type": "vcs",
    "url": "https://github.com/rciam/simplesamlphp-module-themevanilla"
  },
  {
    "type": "package",
    "package": {
      "name": "rciam/css",
      "version": "1.0.0",
      "dist": {
        "type": "zip",
        "url": "https://github.com/rciam/simplesamlphp-module-themevanilla/releases/download/v1.0.0/css.zip"
      }
    }
  },
  {
    "type": "package",
    "package": {
      "name": "rciam/js",
      "version": "1.0.0",
      "dist": {
        "type": "zip",
        "url": "https://github.com/rciam/simplesamlphp-module-themevanilla/releases/download/v1.0.0/js.zip"
      }
    }
  }
],
"scripts": {

  ...

  "post-update-cmd": [
    "cp -r 'vendor/rciam/css' 'modules/themevanilla/www/resources'",
    "cp -r 'vendor/rciam/js' 'modules/themevanilla/www/resources'",
    "cp 'modules/themevanilla/config-example/module_themevanilla.php' 'config/module_themevanilla.php'"
  ]
},
```

With the above configuration composer will do several operations:
* It will put the module `themevanilla` in the `modules` directory.
* It will download and extract the compressed `css` and `js` directories that
  include the minified css and javascript files.
* It will copy the `css` and `js` directories from the `vendor/rciam` directory
  in the `themevanilla/www/resources` directory, where the static files of the
  theme should be placed.
* It will place the configuration file `module_themevanilla.php` inside the
  `config` directory of the installation.

### Direct download

You can download `themevanilla.zip` from the [release page](https://github.com/rciam/simplesamlphp-module-themevanilla/releases).
Download the zip file of the preferred release and extract its contents in the
`modules` directory of your SimpleSAMLphp installation.
Finally, move `example-config/module_themevanilla.php` file to the `config` directory
of your SimpleSAMLphp installation.

### Clone repository

Clone this repository into the `modules` directory of your SimpleSAMLphp
installation as follows:
```
cd /path/to/simplesamlphp/modules
git clone https://github.com/rciam/simplesamlphp-module-themevanilla.git themevanilla
```
Note that the cloned repository will not include the css files or minified
javascript files.
You'll need to download or produce them. You can download the compressed
directories (`js.zip` and `css.zip`) from the [release page](https://github.com/rciam/simplesamlphp-module-themevanilla/releases) and
extract them under `modules/themevanilla/www/resources`.  If you want to produce
them, you may read the customisation instructions below.
As a last step, move `example-config/module_themevanilla.php` file to the `config`
directory of your SimpleSAMLphp installation.


## Configuration

### Basic usage

In order to use this module as theme you need to set in the
`config/config.php`: `'theme.use' => 'themevanilla:ssp'`

### Using IdP login buttons with icons

The theme splits the discopower IdP discovery page into 2 sections, depending on
the tags of the included IdPs:
* The section that its IdPs have the tag `idps_in_searchable_list` contains all
  the IdPs in a list of links with a search box.
* The section that its IdPs have the tag `idps_with_logos` contains login
  buttons with specified style rules for each IdP. Each button may have a logo
  icon, too.

Also, you need to define the order of the 2 sections. You can set this in the
file `config/module_discopower.php` from the variable `taborder`.
For example:
```
'taborder' => array(
  'idps_in_searchable_list',
  'idps_with_logos'
)
```

Especially for the of the `idps_with_logos`, you need to specify the css class
name, icon and label of the IdP login button using the `login_button`
configuration as follows:
```
'tags' => array(
  'idps_with_logos',
),
'login_button' => array(
  'css_classname' => 'orcid',
  'icon_filename' => 'orcid.svg',
  'label' => 'ORCID',
)
```
To set style rules for the each button, the configured css_classname value must
be defined in the `idps_buttons.scss` file. See more information bellow.

At the moment there are style rules for the IdPs:
* ARIA
* B2ACCESS
* Check-in
* DARIAH
* eduTEAMS
* Elixir
* Facebook
* Google
* IGTF
* LinkedIn
* ORCID
* OpenAIRE
* OpenMinTeD

### Cookie Policy

Cookie policy includes a banner at the bottom of each page that prompts the user to
accept the cookies, along with a Cookies Policy page.
The feature is disabled by default.
To enable it, set `enable_cookies_banner` to `true` in the configuration file:
`<path-to-simplesamlphp>/config/module_themevanilla.php`.


## Customization

### Wording

You can find definitions and dictionaries in the `dictionaries` directory.

### Images

Place your logo and favicon in the directory:
`themevanilla/www/resources/images` If you name them `logo.jpg` and
`favicon.ico` they will be loaded without any other modification.  If you name
them differently you need to modify the template `header.php` that is placed in:
`themevanilla/themes/ssp/default/includes/`.

By default, the logo has height 60px. See below how you can modify it.

### Header logo link

You can customise the url of the link of the logo in the header by changing
the `logo_link_url` definition in `dictionaries/default.definition.json` file.

### Footer

If you want to make any changes in the footer you need to modify the template
`footer.php` that is placed in: `themevanilla/themes/ssp/default/includes/`.

### Header ribbon

The text in the header ribbon can be altered by changing the `ribbon_text`
definition in `dictionaries/default.definition.json` file.
If you want to hide the ribbon, set `ribbon_text` to `""`.

### CSS

To produce the css files for this theme follow these steps:
* Install sass ([installation guide](http://sass-lang.com/install))
* Go to the directory `themevanilla/www/resources`
* Run the cli sass: `sass --update sass:css`

After these steps the css files will be in the directory
`themevanilla/www/resources/css`

You can change the settings of this theme from the files:
* `themevanilla/www/resources/sass/_settings.scss`: Here you will see the
  following variables:
  - $btn-action: background color of primary button
  - $btn-warning: background color of warning button
  - $footer-bg: footer background color
  - $footer-text: color of the text in the footer
  - $footer-link: color of the links in the footer
  - $btn-footer-text: text color of button that is in the footer
  - $btn-footer-border: border color of button that is in the footer

* `themevanilla/www/resources/sass/_colors.scss`: Here you can add or change
  color settings.

* `themevanilla/www/resources/sass/_idps_buttons.scss`: Here you can add or
  modify settings that are related with the buttons of the selected subset of
  IdPs.

After you change any of these files you need to produce the css file that the
browser will serve. You can do that by running: `sass --update sass:css`, as
mentioned above.

Please, check the help page of the cli tool sass if you want to use more
compiling options.

### Cookie Policy

To modify the cookie banner and cookie policy page, you must edit the following files:
`<path-to-module>/dictionaries/policy.definition.json`
and to modify the table in cookie policy page:
`<path-to-simplesamlphp>/config/module_themevanilla.php`.

## About SimpleSAMLphp themes

You can read more about themes in a SimpleSAMLphp installation from the
[official documentation](https://simplesamlphp.org/docs/stable/simplesamlphp-theming).

## Compatibility matrix

This table matches the theme version with the supported SimpleSAMLphp version.

| Theme |  SimpleSAMLphp  |
|:------:|:--------------:|
| v2.3.1   | v1.14        |
| v3.0.0   | v1.17        |

## License

Licensed under the Apache 2.0 license, for details see `LICENSE`.
