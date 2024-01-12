<?php

// Get global config
$config = SimpleSAML\Configuration::getInstance();
// Get the template
$template = new SimpleSAML\XHTML\Template($config, 'themevanilla:views.tpl.php');
$template->show();
