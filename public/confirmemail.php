<?php

// Get global config
$config = SimpleSAML\Configuration::getInstance();
// Get the template
$template = new SimpleSAML\XHTML\Template($config, 'themevanilla:confirmemail.tpl.php');
$template->show();
