<?php
$this->data['header'] = $this->t($this->data['dictTitle']);
$this->data['jquery'] = ['core' => true];

$this->data['head'] = <<<EOF
<meta name="robots" content="noindex, nofollow" />
<meta name="googlebot" content="noarchive, nofollow" />
EOF;

$this->includeAtTemplateBase('includes/header.php');
?>
<h2><?= $this->t($this->data['dictTitle']) ?></h2>
<?php
echo htmlspecialchars($this->t($this->data['dictDescr'], $this->data['parameters']));

// include optional information for error
if (isset($this->data['includeTemplate'])) {
    $this->includeAtTemplateBase($this->data['includeTemplate']);
}
?>
<div class="trackidtext">
    <p><?= $this->t('report_trackid') ?></p>
    <div class="input-group">
        <input class="form-control" type="text" readonly id="trackid" value="<?= $this->data['error']['trackId'] ?>">
        <span class="input-group-btn" aria-hidden="true">
            <button data-clipboard-target="#trackid" id="btntrackid" class="btn btn-default ssp-btn--copy">
                <img
                    src="/<?= $this->data['baseurlpath'] . 'resources/icons/clipboard.svg' ?>"
                    alt="Copy to clipboard"
                />
            </button>
        </span>

    </div>
</div>
<?php
// print out exception only if the exception is available
if ($this->data['showerrors']) : ?>
    <h2><?= $this->t('debuginfo_header') ?></h2>
    <p><?= $this->t('debuginfo_text') ?></p>

    <div style="border: 1px solid #eee; padding: 1em; font-size: x-small">
        <p style="margin: 1px"><?= htmlspecialchars($this->data['error']['exceptionMsg']) ?></p>
        <pre style="padding: 1em; font-family: monospace;">
        <?= htmlspecialchars($this->data['error']['exceptionTrace']) ?>
        </pre>
    </div>
<?php endif;

/* Add error report submit section if we have a valid technical contact. 'errorreportaddress' will only be set if
 * the technical contact email address has been set.
 */
if (isset($this->data['errorReportAddress'])) : ?>
    <h2><?= $this->t('report_header') ?></h2>
    <form action="<?= htmlspecialchars($this->data['errorReportAddress']) ?>" method="post">
        <p><?= $this->t('report_text') ?></p>
        <p><?= $this->t('report_email') ?>
            <input type="text" size="25" name="email" value="<?= htmlspecialchars($this->data['email']) ?>" />
        </p>
        <p>
            <textarea class="metadatabox" name="text" rows="6" cols="50" style="width: 100%; padding: 0.5em;">
                <?= $this->t('report_explain') ?>
            </textarea>
        </p>
        <p>
            <input type="hidden" name="reportId" value="<?= $this->data['error']['reportId'] ?>"/>
            <button type="submit" name="send" class="btn"><?= $this->t('report_submit') ?></button>
        </p>
    </form>
<?php endif ?>
<h2 style="clear: both"><?= $this->t('howto_header') ?></h2>
<p><?= $this->t('howto_text') ?></p>
<script type="text/javascript">
    var clipboard = new Clipboard('#btntrackid');
</script>

<?php
$this->includeAtTemplateBase('includes/footer.php');
