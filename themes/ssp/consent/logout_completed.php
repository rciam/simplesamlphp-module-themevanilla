<?php

$this->data['header'] = $this->t('{logout:title}');
$this->data['jquery'] = ['core' => true];
$this->includeAtTemplateBase('includes/header.php');
?>

<h2><?= $this->data['header'] ?></h2>
<p><?= $this->t('{logout:logged_out_text}') ?></p>

<?php
$this->includeAtTemplateBase('includes/footer.php');
