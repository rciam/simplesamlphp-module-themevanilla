<?php

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
$dstName = htmlspecialchars($dstName);


$this->data['header'] = $this->t('{consent:consent:noconsent_title}');;

$this->includeAtTemplateBase('includes/header.php');

echo '<h3>' . $this->data['header'] . '</h3>';
echo '<p>' . $this->t('{consent:consent:noconsent_text}', array('SPNAME' => $dstName)) . '</p>';

echo '<div class="ssp-btns-container">';
if ($this->data['resumeFrom']) {
    echo('<a href="' . htmlspecialchars($this->data['resumeFrom']) . '" class="ssp-btn btn ssp-btn__action ssp-btns-container--btn__left text-uppercase">');
    echo($this->t('{consent:consent:noconsent_return}'));
    echo('</a>');
}

if ($this->data['aboutService']) {
    echo('<a href="' . htmlspecialchars($this->data['aboutService']) . '" class="ssp-btn btn text-uppercase">');
    echo($this->t('{consent:consent:noconsent_goto_about}'));
    echo('</a>');
}
echo('<a href="' . htmlspecialchars($this->data['logoutLink']) . '" class="ssp-btn btn ssp-btn__warning text-uppercase ssp-btns-container--btn__right">' . $this->t('{consent:consent:abort}', array('SPNAME' => $dstName)) . '</a>');
echo '</div>'; //ssp-btns-container

$this->includeAtTemplateBase('includes/footer.php');
