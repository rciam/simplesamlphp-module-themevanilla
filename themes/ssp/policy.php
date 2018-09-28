<?php
// Load SimpleSAMLphp, configuration
$config = SimpleSAML_Configuration::getInstance();
$session = SimpleSAML_Session::getSessionFromRequest();

// Check if valid local session exists.
if ($config->getBoolean('admin.protectindexpage', false)) {
    SimpleSAML\Utils\Auth::requireAdmin();
}
$loginurl = SimpleSAML\Utils\Auth::getAdminLoginURL();
$isadmin = SimpleSAML\Utils\Auth::isAdmin();

$t = new SimpleSAML_XHTML_Template($config, 'core:policy.tpl.php');
$t->data['pageid'] = 'policy';
$t->data['isadmin'] = $isadmin;
$t->data['loginurl'] = $loginurl;
$t->show();
