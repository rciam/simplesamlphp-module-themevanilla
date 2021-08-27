<?php

// Get Configuration
$themeConfig = SimpleSAML\Configuration::getConfig('module_themevanilla.php');
$views = $themeConfig->getValue('views');

// Content
$body = $this->t('{themevanilla:default:no_content}');

// Get request parameter and load Content
if (!empty($_REQUEST['id']) && !empty($views)) {
    $ldView = $views[$_REQUEST['id']];
    $contextOptions = [
        'ssl' => [
            'verify_peer'   => false,
        ],
        'http' => [
            'timeout' => 2,  // 2 Seconds
        ],
    ];
    $sslContext = stream_context_create($contextOptions);
    $loadedContent = file_get_contents($ldView, false, $sslContext);
    if (!empty($loadedContent)) {
        $body = $loadedContent;
    }
}

// Load Head and Dependencies
$this->data['jquery'] = ['core' => true, 'ui' => true, 'css' => true];
// Load Header
$this->includeAtTemplateBase('includes/header.php');
// Load Body
echo $body;
// Load Footer
$this->includeAtTemplateBase('includes/footer.php');
