<?php
// Load SimpleSAMLphp, configuration
$config = SimpleSAML\Configuration::getInstance();

$t = new SimpleSAML\XHTML\Template($config, 'themevanilla:policy.tpl.php');
$t->data['pageid'] = 'policy';
$t->show();
