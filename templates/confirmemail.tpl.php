<?php
$this->includeAtTemplateBase('includes/header.php');
?>
<link rel="stylesheet" type="text/css" href="resources/css/confirmemail.css">

<div class="body-container" id="content">
  <div class="message-container">
    <span class="head-title">
      <img class="email-gif" src="resources/icons/email.gif">
      <h2><span class="title-msg"><?= $this->t('{themevanilla:default:message_title}') ?></span></h2>
    </span>
    <div class="message"><?= $this->t('{themevanilla:default:message_bd}') ?></div>
    <div class="subtitle"><?= $this->t('{themevanilla:default:message_sub}') ?></div>
  </div>
</div>

<?php
$this->includeAtTemplateBase('includes/footer.php');
