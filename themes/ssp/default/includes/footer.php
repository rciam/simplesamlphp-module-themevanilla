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
                    strpos($this->t('{themevanilla:discopower:cookies_link_text}'), 'not translated') === false
                ) : ?>
                    <a
                        href="<?= $this->t('{themevanilla:discopower:cookies_link_url}') ?>"
                        target="_blank"
                    >
                        <?= $this->t('{themevanilla:discopower:cookies_link_text}') ?>
                    </a>
                <?php endif; ?>
            </p>
            <a id="js-accept-cookies" class="cookies-ok" href="#">
                <?= $this->t('{themevanilla:discopower:cookies_accept_btn_text}') ?>
            </a>
        </div>
    </div>
    <!-- /cookies popup -->
<?php endif; ?>

<footer class="ssp-footer text-center">
    <div class="container ssp-footer--container">
        <div class="row ssp-content-group--footer">
            <!--   Add language bar   -->
            <?php
            $includeLanguageBar = (!empty($_POST)) ? false : true;
            $includeLanguageBar = (
                (isset($this->data['hideLanguageBar']) && $this->data['hideLanguageBar'] === true)
                ? false
                : true
            );

            if ($includeLanguageBar) {
                $this->includeAtTemplateBase('includes/language_bar.php');
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
                    Copyright &copy;<?=
                    (
                        (strpos($this->t('{themevanilla:discopower:copyright_year_start}'), 'not translated') === false)
                        ? $this->t('{themevanilla:discopower:copyright_year_start}') . '-'
                        : ''
                    )
                    . date("Y") ?>
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
