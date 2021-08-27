<?php

// Language names dictionary
$langNames = [
    'af' => 'Afrikaans', // Afrikaans
    'ar' => 'العربية', // Arabic
    'ca' => 'Català', // Catalan
    'cs' => 'Čeština', // Czech
    'da' => 'Dansk', // Danish
    'de' => 'Deutsch', // German
    'el' => 'ελληνικά', // Greek
    'en' => 'English',
    'es' => 'Español', // Spanish
    'et' => 'eesti keel', // Estonian
    'eu' => 'Euskara', // Basque
    'fi' => 'Suomeksi', // Finnish
    'fr' => 'Français', // French
    'he' => 'עִבְרִית', // Hebrew
    'hr' => 'Hrvatski', // Croatian
    'hu' => 'Magyar', // Hungarian
    'id' => 'Bahasa Indonesia', // Indonesian
    'it' => 'Italiano', // Italian
    'ja' => '日本語', // Japanese
    'lb' => 'Lëtzebuergesch', // Luxembourgish
    'lt' => 'Lietuvių kalba', // Lithuanian
    'lv' => 'Latviešu', // Latvian
    'nl' => 'Nederlands', // Dutch
    'nn' => 'Nynorsk', // Norwegian Nynorsk
    'no' => 'Bokmål', // Norwegian Bokmål
    'pl' => 'Język polski', // Polish
    'pt' => 'Português', // Portuguese
    'pt-br' => 'Português brasileiro', // Portuguese
    'ro' => 'Românește', // Romanian
    'ru' => 'русский язык', // Russian
    'se' => 'Sámegiella', // Northern Sami
    'sl' => 'Slovenščina', // Slovensk
    'sr' => 'Srpski', // Serbian
    'sv' => 'Svenska', // Swedish
    'tr' => 'Türkçe', // Turkish
    'xh' => 'isiXhosa', // Xhosa
    'zh' => '简体中文', // Chinese (simplified)
    'zh-tw' => '繁體中文', // Chinese (traditional)
    'zu' => 'IsiZulu', // Zulu
];

$languages = $this->getLanguageList();

if (count($languages) > 1) : ?>
    <div class="col-sm-3 ssp-footer__item">
        <div class="dropup ssp-footer__item__lang">
            <?php
            $textArray = [];
            foreach ($languages as $lang => $current) {
                $lang = strtolower($lang);
                if ($current) {
                    $langCurrent = $langNames[$lang];
                } else {
                    $textArray[] =
                        '<li class="ssp-dropdown__two_cols--item">'
                        . '<a href="' . htmlspecialchars(
                            \SimpleSAML\Utils\HTTP::addURLParameters(
                                \SimpleSAML\Utils\HTTP::getSelfURL(),
                                [$this->getTranslator()->getLanguage()->getLanguageParameterName() => $lang]
                            )
                        ) . '">'
                        . $langNames[$lang]
                        . '</a>'
                        . '</li>';
                }
            }
            ?>
            <button
                class="ssp-btn btn ssp-btn__footer dropdown-toggle"
                type="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="true"
            >
                <?= $langCurrent ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-left ssp-dropdown__two_cols" aria-labelledby="dropdownMenu1">
                <?= implode(' ', $textArray) ?>
            </ul>
        </div> <!-- dropup -->
    </div> <!-- col-sm-4 -->
<?php endif;
