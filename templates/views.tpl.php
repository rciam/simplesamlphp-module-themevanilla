<?php

// Get Configuration
$themeConfig = SimpleSAML\Configuration::getConfig('module_themevanilla.php');
$views = $themeConfig->getValue('views');

// Content
$body = $this->t('{themevanilla:default:no_content}');

// Get request parameter and load Content
if (!empty($_REQUEST['id']) && !empty($views)) {
    $ld_view = $views[$_REQUEST['id']];
    $contextOptions = array(
        'ssl' => array(
            'verify_peer'   => false,
        ),
        'http' => array(
            'timeout' => 2,  // 2 Seconds
        ),
    );
    $sslContext = stream_context_create($contextOptions);
    $loaded_content = file_get_contents($ld_view, false, $sslContext);
    if (!empty($loaded_content)) {
        $body = $loaded_content;
    }
}

// Load Head and Dependencies
$this->data['jquery'] = array('core' => true, 'ui' => true, 'css' => true);
// Load Header
$this->includeAtTemplateBase('includes/header.php');
// Load Body
echo $body;
// Load Footer
$this->includeAtTemplateBase('includes/footer.php');
