<?php

assert('array_key_exists("retryURL", $this->data)');
$retryURL = $this->data['retryURL'];

$header = htmlspecialchars($this->t('{core:no_cookie:header}'));
$description = htmlspecialchars($this->t('{core:no_cookie:description}'));
$retry = htmlspecialchars($this->t('{core:no_cookie:retry}'));

$this->data['header'] = $header;
$this->includeAtTemplateBase('includes/header.php');
?>

<h2><?= $header ?></h2>
<p><?= $description ?></p>

<?php if ($retryURL !== null) : ?>
    <ul class="list-unstyled">
    <li><a href="<?= htmlspecialchars($retryURL) ?>" id="retry"><?= $retry ?></a></li>
    </ul>
<?php endif;

$this->includeAtTemplateBase('includes/footer.php');
