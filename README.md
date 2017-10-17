# simplesamlphp-module-themevanilla

A customizable theme for SimpleSAMLphp.

## Installation

### Composer

Add the following lines in the file composer.json that is located in your
SimpleSAMLphp installation:
```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/rciam/simplesamlphp-module-themevanilla"
    }
    ]
```

### Direct download

You can download the theme with its compiled files from the [release page]().
There you will see that you can download a zip file for each release. Download
the zip file you prefer and extract it in the `modules` directory of your
SimpleSAMLphp installation.

### Clone repository

Clone and copy this repository in the directory `modules` of your SimpleSAMLphp
installation. Note that now you do not have css files of minified javascript
files. You will need to produce them according to the customization instructions
below.

---

## Configuration

### Use this theme
In order to use this module as theme you need to set in the
`config/config.php`: `'theme.use' => 'themevanilla:ssp'`

### Use for an IDP login button with icon
In the discopower view, where the user selects the IDP that will use to login,
there are 2 sections. The first section has all providers in a simple list of
links and the second one has for each IDP a button with an icon and a label.

If you want to add an IDP in the second section open the file
`config/config-metarefresh.php`. For the selected IDP add the tag
"idps_with_logos" and add an array with the name "login_button" as the
following:
```
'login_button' => array(
  'css_classname' => 'orcid',
  'icon_filename' => 'orcid.svg',
  'label' => 'ORCID',
)
```
The css_classname use it in the `idps_buttons.scss` file with to set style rules
for the button. See more information bellow.
-

---

## Customization

### Wording

You can find definitions and dictionaries in the directory `dictionaries`.

### Images

Place your logo and favicon in the directory:
`themevanilla/www/resources/images` If you name them `logo.png` and
`favicon.ico` they will be loaded without any other modification.  If you name
them differently you need to modify the template `header.php` that is placed in:
`themevanilla/themes/ssp/default/includes/`.

By default, the logo has height 60px. See below how you can modify it.

### Footer
If you want to make any changes in the footer you need to modify the template
`footer.php` that is placed in: `themevanilla/themes/ssp/default/includes/`.


### CSS

To produce the css files for this theme follow these steps:
- Install sass: ([installation guide](http://sass-lang.com/install) )
- Go to the directory `themevanilla/www/resources`
- Run the cli sass: `sass --update sass:css`

After these steps the css files will be in the directory
`themevanilla/www/resources/css`

You can change the settings of this theme from the files:
* `themevanilla/www/resources/sass/_settings.scss`

There you will see the following variables:

  - $btn-action: background color of primary button
  - $btn-warning: $carrot-orange;
  - $footer-bg: footer background color
  - $footer-text: color of the text in the footer
  - $footer-link: color of the links in the footer
  - $btn-footer-text: text color of button that is in the footer
  - $btn-footer-border: border color of button that is in the footer

* `themevanilla/www/resources/sass/_colors.scss`

In this file you can add or change color settings.

* `themevanilla/www/resources/sass/_idps_buttons.scss`
In this file you can add or modify settings that are related with the login
buttons that have a logo.

After you change this file you need to produce the css file that the browser
will serve. You can do that by running: `sass --update sass:css`, as mentioned
above.

Please, check the help page of the cli tool sass if you want to use more
compiling options.

---

## About SimpleSAMLphp themes

You can read more about themes in a SimpleSAMLphp installation from the
[official documentation](https://simplesamlphp.org/docs/stable/simplesamlphp-theming).
