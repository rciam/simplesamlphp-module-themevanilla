<?php


$config = SimpleSAML_Configuration::getInstance();

$info = array();
$errors = array();
$hookinfo = array(
	'info' => &$info, 
	'errors' => &$errors,
);
//SimpleSAML_Module::callHooks('core', $allLinks); //TODO policy


if (isset($_REQUEST['output']) && $_REQUEST['output'] == 'text') {
	
	if (count($errors) === 0) {
		echo 'OK';
	} else {
		echo 'FAIL';
	}
	exit;
}

$t = new SimpleSAML_XHTML_Template($config, 'themevanilla:policy.tpl.php');
$t->data['pageid'] = 'policy';
$t->data['errors'] = $errors;
$t->data['info'] = $info;
$t->show();

