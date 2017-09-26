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

In order to use this module as theme you need to set in the
config/config.php`: `'theme.use' => 'simplesamlphp-module-themevanilla:ssp'`

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

You can change the settings of this theme from the file:
`themevanilla/www/resources/sass/_settings_custom.scss`

There you will see the following variables:

- $btn-action: background color of primary button
- $btn-warning: $carrot-orange;
- $footer-bg: footer background color
- $footer-text: color of the text in the footer
- $footer-link: color of the links in the footer
- $btn-footer-text: text color of button that is in the footer
- $btn-footer-border: border color of button that is in the footer

After you change this file you need to produce the css file that the browser
will serve. You can do that by running: `sass --update sass:css`, as mentioned
above.

Please, check the help page of the cli tool sass if you want to use more
compiling options.

---

## About SimpleSAMLphp themes

You can read more about themes in a SimpleSAMLphp installation from the
[official documentation](https://simplesamlphp.org/docs/stable/simplesamlphp-theming).
