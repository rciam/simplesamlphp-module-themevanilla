<?php

// Language names dictionary
$langNames = [
    'no' => 'Bokmål', // Norwegian Bokmål
    'nn' => 'Nynorsk', // Norwegian Nynorsk
    'se' => 'Sámegiella', // Northern Sami
    'da' => 'Dansk', // Danish
    'en' => 'English',
    'de' => 'Deutsch', // German
    'sv' => 'Svenska', // Swedish
    'fi' => 'Suomeksi', // Finnish
    'es' => 'Español', // Spanish
    'ca' => 'Català', // Catalan
    'fr' => 'Français', // French
    'it' => 'Italiano', // Italian
    'nl' => 'Nederlands', // Dutch
    'lb' => 'Lëtzebuergesch', // Luxembourgish
    'cs' => 'Čeština', // Czech
    'sl' => 'Slovenščina', // Slovensk
    'lt' => 'Lietuvių kalba', // Lithuanian
    'hr' => 'Hrvatski', // Croatian
    'hu' => 'Magyar', // Hungarian
    'pl' => 'Język polski', // Polish
    'pt' => 'Português', // Portuguese
    'pt-br' => 'Português brasileiro', // Portuguese
    'ru' => 'русский язык', // Russian
    'et' => 'eesti keel', // Estonian
    'tr' => 'Türkçe', // Turkish
    'el' => 'ελληνικά', // Greek
    'ja' => '日本語', // Japanese
    'zh' => '简体中文', // Chinese (simplified)
    'zh-tw' => '繁體中文', // Chinese (traditional)
    'ar' => 'العربية', // Arabic
    'he' => 'עִבְרִית', // Hebrew
    'id' => 'Bahasa Indonesia', // Indonesian
    'sr' => 'Srpski', // Serbian
    'lv' => 'Latviešu', // Latvian
    'ro' => 'Românește', // Romanian
    'eu' => 'Euskara', // Basque
    'af' => 'Afrikaans', // Afrikaans
    'zu' => 'IsiZulu', // Zulu
    'xh' => 'isiXhosa', // Xhosa
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
                        . '<a href="'
                        . htmlspecialchars(
                            \SimpleSAML\Utils\HTTP::addURLParameters(
                                \SimpleSAML\Utils\HTTP::getSelfURL(),
                                [$this->getTranslator()->getLanguage()->getLanguageParameterName() => $lang]
                            )
                        )
                        . '">' . $langNames[$lang] . '</a></li>';
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
                <?= implode(' ', $textarray) ?>
            </ul>
        </div> <!-- dropup -->
    </div> <!-- col-sm-4 -->
<?php endif; ?>
