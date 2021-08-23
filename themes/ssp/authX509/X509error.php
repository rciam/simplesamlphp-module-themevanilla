<?php
$this->data['header'] = $this->t('{authX509:X509error:certificate_header}');

$this->includeAtTemplateBase('includes/header.php');

?>

<?php if ($this->data['errorcode'] !== null) : ?>
    <div style="border-left: 1px solid #e8e8e8; border-bottom: 1px solid #e8e8e8; background: #f5f5f5">
        <img
            src="/<?= $this->data['baseurlpath'] ?>resources/icons/experience/gtk-dialog-error.48x48.png"
            class="float-l"
            style="margin: 15px"
            alt=""
        />
        <h2><?= $this->t('{login:error_header}') ?></h2>
        <p><b><?= $this->t('{errors:title_' . $this->data['errorcode'] . '}') ?></b></p>
        <p><?= $this->t('{errors:descr_' . $this->data['errorcode'] . '}') ?></p>
    </div>
<?php endif; ?>
<h2 style="break: both"><?= $this->t('{authX509:X509error:certificate_header}') ?></h2>

<p><?= $this->t('{authX509:X509error:certificate_text}') ?></p>

<a href="<?= htmlspecialchars(\SimpleSAML\Utils\HTTP::getSelfURL()) ?>">
    <?= $this->t('{login:login_button}') ?>
</a>

<?php

if (!empty($this->data['links'])) {
    echo '<ul class="links list-unstyled" style="margin-top: 2em">';
    foreach ($this->data['links'] as $l) {
        echo '<li><a href="' . htmlspecialchars($l['href']) . '">'
        . htmlspecialchars($this->t($l['text']))
        . '</a></li>';
    }
    echo '</ul>';
}

$this->includeAtTemplateBase('includes/footer.php');
