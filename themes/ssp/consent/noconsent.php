<?php

$this->data['header'] = $this->t('{consent:consent:noconsent_title}');
$this->data['jquery'] = ['core' => true];

$this->includeAtTemplateBase('includes/header.php');
?>

<h3><?= $this->data['header'] ?></h3>
<p><?= $this->data['noconsent_text'] ?></p>

<div class="ssp-btns-container">
    <?php if ($this->data['resumeFrom']) : ?>
    <a
        href="<?= htmlspecialchars($this->data['resumeFrom']) ?>"
        class="ssp-btn btn ssp-btn__action ssp-btns-container--btn__left text-uppercase"
    >
        <?= $this->t('{consent:consent:noconsent_return}') ?>
    </a>
    <?php endif;

    if ($this->data['aboutService']) : ?>
    <a
        href="<?= htmlspecialchars($this->data['aboutService']) ?>"
        class="ssp-btn btn text-uppercase"
    >
        <?= $this->t('{consent:consent:noconsent_goto_about}') ?>
    </a>
    <?php endif; ?>

    <a
        href="<?= htmlspecialchars($this->data['logoutLink']) ?>"
        class="ssp-btn btn ssp-btn__warning text-uppercase ssp-btns-container--btn__right"
    >
        <?= $this->data['noconsent_abort'] ?>
    </a>
</div> <!-- ssp-btns-container -->

<?php
$this->includeAtTemplateBase('includes/footer.php');
