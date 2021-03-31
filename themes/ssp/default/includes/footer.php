<?php
$themeConfig = SimpleSAML\Configuration::getConfig('module_themevanilla.php');
$enableCookiesBanner = $themeConfig->getValue('enable_cookies_banner');

if (!empty($this->data['htmlinject']['htmlContentPost'])) {
    foreach ($this->data['htmlinject']['htmlContentPost'] as $c) {
        echo $c;
    }
}
?>
</div><!-- /container -->
</div><!-- /ssp-container -->

<?php if ($enableCookiesBanner) : ?>
    <!-- cookies popup -->
    <div id="cookies">
        <div id="cookies-wrapper">
            <p>
                <?= $this->t('{themevanilla:discopower:cookies_text}') ?>
                <?php
                if (
                    strpos($this->t('{themevanilla:discopower:cookies_link_text}'), 'not translated')
                    === false
                ) : ?>
                    <a
                        href="<?= $this->t('{themevanilla:discopower:cookies_link_url}') ?>"
                        target="_blank"><?= $this->t('{themevanilla:discopower:cookies_link_text}') ?>
                    </a>
                <?php endif ?>
            </p>
            <a id="js-accept-cookies" class="cookies-ok" href="#">
                <?= $this->t('{themevanilla:discopower:cookies_accept_btn_text}') ?>
            </a>
        </div>
    </div>
    <!-- /cookies popup -->
<?php endif ?>
<footer class="ssp-footer text-center">
    <div class="container ssp-footer--container">
        <div class="row ssp-content-group--footer">

            <?php

            $includeLanguageBar = true;
            if (!empty($_POST)) {
                $includeLanguageBar = false;
            }
            if (isset($this->data['hideLanguageBar']) && $this->data['hideLanguageBar'] === true) {
                $includeLanguageBar = false;
            }
            if ($includeLanguageBar) {
                $languages = $this->getLanguageList();
                if (count($languages) > 1) {
                    echo '<div class="col-sm-3 ssp-footer__item">
      <div class="dropup ssp-footer__item__lang">';
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

                    $textArray = [];
                    foreach ($languages as $lang => $current) {
                        $lang = strtolower($lang);
                        if ($current) {
                            $langCurrent = $langNames[$lang];
                        } else {
                            $textArray[] = '<li class="ssp-dropdown__two_cols--item"><a href="'
                            . htmlspecialchars(
                                \SimpleSAML\Utils\HTTP::addURLParameters(
                                    \SimpleSAML\Utils\HTTP::getSelfURL(),
                                    [$this->getTranslator()->getLanguage()->getLanguageParameterName() => $lang]
                                )
                            )
                            . '">' . $langNames[$lang] . '</a></li>';
                        }
                    }
                    echo '<button class="ssp-btn btn ssp-btn__footer dropdown-toggle" type="button" '
                        . 'data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
                        . $langCurrent
                        . '<span class="caret"></span>
      </button>
      <ul class="dropdown-menu dropdown-menu-left ssp-dropdown__two_cols" aria-labelledby="dropdownMenu1">';
                    echo join(' ', $textArray);
                    echo '</ul></div></div>'; // /dropup /col-sm-4
                }
            }

            ?>
            <div class="copy col-sm-6 ssp-footer__item">
                <a href="https://grnet.gr/">
                    <img
                        class="ssp-footer__item__logo"
                        src="<?= SimpleSAML\Module::getModuleURL('themevanilla/resources/images/grnet_logo_en.svg') ?>"
                        alt="GRNET"
                    />
                </a>
                <div class="ssp-footer__item__copyright">
                    Copyright &copy;
                    <?=
                        strpos($this->t('{themevanilla:discopower:copyright_year_start}'), 'not translated') === false
                        ? $this->t('{themevanilla:discopower:copyright_year_start}') . '-'
                        : ''
                        . date("Y")
                    ?>
                </div>
            </div>
            <div class="col-sm-3 ssp-footer__item">
                <div class="ssp-footer__item__powered">
                    Powered by <a href="https://github.com/rciam">RCIAM</a>
                </div>
            </div>
        </div> <!-- /container-fluid -->
</footer>
<script
    type="text/javascript"
    src="<?= htmlspecialchars(SimpleSAML\Module::getModuleURL('themevanilla/resources/js/cookie.js')) ?>"
>
</script>
<script
    type="text/javascript"
    src="<?= htmlspecialchars(SimpleSAML\Module::getModuleURL('themevanilla/resources/js/dropdown.js')) ?>"
>
</script>
<script
    type="text/javascript"
    src="<?= htmlspecialchars(SimpleSAML\Module::getModuleURL('themevanilla/resources/js/modal.js')) ?>"
>
</script>
<script
    type="text/javascript"
    src="<?= htmlspecialchars(SimpleSAML\Module::getModuleURL('themevanilla/resources/js/tooltip.js')) ?>"
>
</script>
<script
    type="text/javascript"
    src="<?= htmlspecialchars(SimpleSAML\Module::getModuleURL('themevanilla/resources/js/theme.js')) ?>"
>
</script>

</body>

</html>
