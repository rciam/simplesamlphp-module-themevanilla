<?php

/**
 * This is example configuration of SimpleSAMLphp themevanila.
 * Copy this file to default config directory and edit the properties.
 *
 * copy command (from SimpleSAML base dir)
 * cp modules/themevanilla/module_themevanilla.php config/
 */

$config = [
    'cookiePolicy' => [
        [
            'type' => 'Session State',
            'provider' => 'aai.rciam.eu',
            'name' => 'rciam_proxy_authtoken, rciam_google_proxy_authtoken, rciam_google_proxy_authtoken, '
            . 'rciam_facebook_proxy_authtoken, rciam_linkedin_proxy_authtoken, rciam_orcid_proxy_authtoken',
            'thirdParty' => false,
            'category' => 'Session',
            'purpose' => 'Preserve user authentication token to prevent session fixation attacks',
        ],
        [
            'type' => 'Session State',
            'provider' => 'aai.rciam.eu',
            'name' => 'rciam_proxy_sid,rciam_google_proxy_sid, rciam_google_proxy_sid, rciam_facebook_proxy_sid, '
            . 'rciam_linkedin_proxy_sid, rciam_orcid_proxy_sid',
            'thirdParty' => false,
            'category' => 'Session',
            'purpose' => 'Preserve user session ID to retrieve session information',
        ],
        [
            'type' => 'Preferences',
            'provider' => 'aai.rciam.eu',
            'name' => 'rciam_poweridpdisco_lastidp',
            'thirdParty' => false,
            'category' => 'Persistent',
            'purpose' => 'Preserve preferred IdP selection for SimpleSAMLphp IdP discovery service',
        ],
        [
            'type' => 'Preferences',
            'provider' => 'aai.rciam.eu',
            'name' => 'rciam_poweridpdisco_remember',
            'thirdParty' => false,
            'category' => 'Persistent',
            'purpose' => 'Preserve preference whether to remember IdP selection for SimpleSAMLphp IdP discovery '
            . 'service',
        ],
        [
            'type' => 'Session State',
            'provider' => 'aai.rciam.eu',
            'name' => 'rciam_co_registry_sid',
            'thirdParty' => false,
            'category' => 'Session',
            'purpose' => 'Preserve user session ID to retrieve session information',
        ],
        [
            'type' => 'Preferences',
            'provider' => 'aai.rciam.eu',
            'name' => 'rciam_co_registry_tz',
            'thirdParty' => false,
            'category' => 'Persistent',
            'purpose' => 'Preserve preferred timezone selection for COmanage RCIAM Account Registry',
        ],
        [
            'type' => 'Preferences',
            'provider' => 'aai.rciam.eu',
            'name' => 'i18next',
            'thirdParty' => false,
            'category' => 'Session',
            'purpose' => 'Preserve preferred language for RCIAM AAI OpenID Connect Provider',
        ],
        [
            'type' => 'Session State',
            'provider' => 'aai.rciam.eu',
            'name' => 'JSESSIONID',
            'thirdParty' => false,
            'category' => 'Session',
            'purpose' => 'Preserve user session ID to retrieve session information',
        ],
    ],
    'views' => [
        // 'aup' => 'https://example.com/aup.html', // Terms and Conditions URL. The key MUST BE `aup`
        // 'privacy' => 'https://example.com/privacy.html', // Privacy URL. The key MUST BE `privacy`
    ],
    'loader' => 'loader', // Loading Spinner to use. Two options are available. `loader` or `cmg_loader`
    'enable_cookies_banner' => false,
    'ribbon_text' => '',
];
