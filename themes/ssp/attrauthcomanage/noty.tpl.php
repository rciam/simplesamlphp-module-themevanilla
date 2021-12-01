<?php

/**
 * Override noty.tpl.php template from attrauthcomanage ssp module
 *
 * @author: ioigoume@admin.grnet.gr
 */

use SimpleSAML\Configuration;

assert('is_array($this->data["dstMetadata"])');
// Where should i go on YES click
assert('is_string($this->data["yesTarget"])');
// YES Form input entries
assert('is_array($this->data["yesData"])');
// Abort needed variables
assert('is_string($this->data["logoutLink"])');
assert('is_array($this->data["logoutData"])');
// Service Privacy Policy
assert('$this->data["sppp"] === false || is_string($this->data["sppp"])');

if (array_key_exists('name', $this->data['dstMetadata'])) {
    $dstName = $this->data['dstMetadata']['name'];
} elseif (array_key_exists('OrganizationDisplayName', $this->data['dstMetadata'])) {
    $dstName = $this->data['dstMetadata']['OrganizationDisplayName'];
} else {
    $dstName = $this->data['dstMetadata']['entityid'];
}

if (is_array($dstName)) {
    $dstName = $this->t($dstName);
}

// XXX Parse Parameters
$notyLevel = !empty($this->data['noty']['level']) ? $this->data['noty']['level'] : null;
$notyDescription = !empty($this->data['noty']['description']) ? $this->data['noty']['description'] : [];
$notyStatus = (!empty($this->data['noty']['status']) && is_string($this->data['noty']['status']))
    ? $this->t('{themevanilla:attrauthcomanage_noty:' . $this->data['noty']['status'] . '}')
    : null;
$yesButtonLabel = (!empty($this->data['noty']['ok_btn_label']) && is_string($this->data['noty']['ok_btn_label']))
    ? $this->data['noty']['ok_btn_label']
    : $this->t('{themevanilla:attrauthcomanage_noty:yes}');
$yesButtonShow = true;
if (
    isset($this->data['noty']['yes_btn_show'])
    && !is_null($this->data['noty']['yes_btn_show'])
    && is_bool($this->data['noty']['yes_btn_show'])
) {
    $yesButtonShow = $this->data['noty']['yes_btn_show'];
}

// XXX Get Configuration and set the loader
$globalConfig = Configuration::getInstance();
$themeUse = $globalConfig->getString('theme.use', 'default');
if ($themeUse !== 'default') {
    $themeConfigFile = 'module_' . explode(':', $themeUse)[0] . '.php';
    $themeConfig = Configuration::getConfig($themeConfigFile);
    $loader = $themeConfig->getValue('loader');
    if (!empty($loader)) {
        $this->includeAtTemplateBase('includes/' . $loader . '.php');
    }
}

// XXX Set JS/CSS Dependencies
$this->data['jquery'] = ['core' => true, 'ui' => false, 'css' => false];
$this->data['head'] = '<link rel="stylesheet" '
    . 'href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">' . PHP_EOL
    . '<link rel="stylesheet" type="text/css" href="/' . $this->data['baseurlpath']
    . 'module.php/attrauthcomanage/resources/css/style.css" />' . PHP_EOL;

// XXX Include Header
$this->includeAtTemplateBase('includes/header.php');

?>
<p>
<h3 id="attributeheader">
    <?php if (!empty($this->data['noty']['icon'])) : ?>
    <img class="gif-box" src="resources/icons/<?= $this->data['noty']['icon'] ?>">
    <?php endif; ?>
    <?php if(!empty($this->data['noty']['title'])) : ?>
    <p><?= $this->t('{themevanilla:attrauthcomanage_noty:' . $this->data['noty']['title'] . '}') ?></p>
    <?php endif; ?>
</h3>
<?php if (!is_null($notyStatus)) : ?>
<div id="noty-info-bar" class="<?= $notyLevel ?>"><?= $notyStatus ?></div>
<?php endif; ?>
<div class="noty-description">
    <?php
    foreach ($this->data['noty']['description'] as $dictKey => $placeholders) {
        if (!empty($placeholders)) {
            echo $this->t('{themevanilla:attrauthcomanage_noty:' . $dictKey . '}', $placeholders);
        } else {
            echo $this->t('{themevanilla:attrauthcomanage_noty:' . $dictKey . '}');
        }
    }
    ?>
</div>
</p>
<!--  Yes/Confirm Action -->
<?php if (
    !empty($this->data['yesTarget'])
    && $yesButtonShow
) : ?>
<form
    style="display: inline; margin: 0px; margin-right: 0.5em; padding: 0px"
    onclick="javascript:form_ajax(this)"
    onsubmit="event.preventDefault();return false;"
    method="post"
    action="<?= htmlspecialchars($this->data['yesTarget']) ?>"
>
    <?php foreach ($this->data['yesData'] as $name => $value) : ?>
    <input
        type="hidden"
        name="<?= htmlspecialchars($name) ?>"
        value="<?= htmlspecialchars($value) ?>"
    />
    <?php endforeach; ?>
    <?php foreach ($this->data['noty']['form_fields'] as $name => $value) : ?>
    <input
        type="hidden"
        name="<?= htmlspecialchars($name) ?>"
        value="<?= htmlspecialchars($value) ?>"
    />
    <?php endforeach; ?>
    <input
        type="hidden"
        name="yes"
        value="yes"
    />
    <button type="submit" name="yes" class="btn btn-primary" id="yesbutton">
        <?= htmlspecialchars($yesButtonLabel) ?>
    </button>
</form>
<?php endif; ?>

<!-- Cancel/ Abort Action -->
<form
    style="display: inline;"
    action="<?= htmlspecialchars($this->data['logoutLink']) ?>"
    method="get"
>
    <?php foreach ($this->data['logoutData'] as $name => $value) : ?>
    <input
        type="hidden"
        name="<?= htmlspecialchars($name) ?>"
        value="<?= htmlspecialchars($value) ?>"
    />
    <?php endforeach; ?>
    <button
        type="submit"
        class="btn-link"
        name="no"
        id="nobutton"
    >
        <?= htmlspecialchars($this->t('{themevanilla:attrauthcomanage_noty:no}')) ?>
    </button>
</form>

<?php
// XXX Include footer
$this->includeAtTemplateBase('includes/footer.php');

?>
<script
    type="text/javascript"
    src="/<?= $this->data['baseurlpath'] ?>module.php/attrauthcomanage/resources/js/noty/jquery.noty.js">
</script>
<script
    type="text/javascript"
    src="/<?= $this->data['baseurlpath'] ?>module.php/attrauthcomanage/resources/js/noty/layouts/topCenter.js">
</script>
<script
    type="text/javascript"
    src="/<?= $this->data['baseurlpath'] ?>module.php/attrauthcomanage/resources/js/noty/themes/comanage.js">
</script>
<script type="application/javascript">
    let button_text = '<?= $this->t('{themevanilla:attrauthcomanage_noty:yes}') ?>';

    // Generate flash notifications for messages
    function generateFlash(text, type) {
        var n = noty({
            text: text,
            type: type,
            dismissQueue: true,
            layout: 'topCenter',
            theme: 'comanage'
        });
    }

    function form_ajax(frm_ob) {
        // hide the loader
        $('.loader-container').hide();
        // Handle the form
        var $form = $(frm_ob);
        let jqxhr = $.ajax({
            cache: false,
            type: $form.attr('method'),
            url: $form.attr('action'),
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                // Update Button text and disable
                $button = $('#yesbutton');
                // debugger;
                $button.html('<i class="fa fa-spinner fa-spin"></i>Sending...');
                $button.prop("disabled", true);
            },
            data: $form.serialize(),
        });

        jqxhr.done((data, textStatus, xhr) => {
            // Redirect to the general email
            // Update the status of the buttons
            $button = $('#yesbutton');
            $button.prop("disabled", false);
            $button.html(button_text);
            // Update the color of the class
            $('#noty-info-bar').removeClass().addClass('info');
            $('.invite-expire')
            .html('<?= htmlspecialchars($this->t('{themevanilla:attrauthcomanage_noty:invitation_restored}')) ?>');

            generateFlash(data['msg'], 'success');
        });

        jqxhr.fail((xhr, textStatus, error) => {
            // Enable the submit button
            $button = $('#yesbutton');
            $button.prop("disabled", false);
            $button.html(button_text);

            let err_header = "";
            let reload_message = 'Please Reload View';

            // Show an error message
            if (
                xhr.statusText != undefined
                && xhr.statusText != ""
            ) {
                error = error + " (Status Code: " + xhr.status + ")";
            }
            if (
                xhr.responseText != undefined
                && xhr.responseText != ""
            ) {
                // JSON text
                try {
                    //try to parse JSON
                    encodedJson = $.parseJSON(xhr.responseText);
                    err_header = encodedJson.msg;
                } catch (e) {
                    /* This is not JSON */
                }
                // HTML text
                try {
                    let htmlparsed = $.parseHTML(xhr.responseText);
                    err_header = htmlparsed[0].textContent;
                } catch (e) {
                    /* This is not HTML either */
                }
                // Found no error header. Should i look elsewhere?
            }

            error = (err_header != "") ? (error + "<br>" + err_header) : error;
            error = (err_header.includes("CSRF")) ? (error + "<br>" + reload_message) : error;

            generateFlash(error, textStatus);
        });
    }
</script>
