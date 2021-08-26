<?php
$this->data['header'] = $this->t('{userid:error:header}');
$this->data['jquery'] = ['core' => true];

$this->data['head'] = <<<EOF
<meta name="robots" content="noindex, nofollow" />
<meta name="googlebot" content="noarchive, nofollow" />
EOF;

$this->includeAtTemplateBase('includes/header.php');
$retryUrl = $this->data['parameters']['%BASEDIR%'] . 'saml2/idp/initSLO.php?RelayState='
. urlencode($this->data['parameters']['%RESTARTURL%']);
$translationParams = [
    '%IDPNAME%' => $this->data['parameters']['%IDPNAME%'],
];
?>
<div class="row">
    <div class="col-sm-12">
        <h2>
            <?=
            strpos($this->t('{themevanilla:userid_error:friendly_title}'), 'not translated') === false
            ? $this->t('{themevanilla:userid_error:friendly_title}')
            : ''
            ?>
        </h2>
        <p><?= $this->t('{themevanilla:userid_error:friendly_description}', $translationParams) ?></p>
        <p><?= $this->t('{themevanilla:userid_error:resolution_description}', ['%RETRY_URL%' => $retryUrl]) ?></p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="text-center">
            <a href="<?= $retryUrl ?>" class="ssp-btn btn ssp-btn__action text-uppercase">
                <?=
                strpos($this->t('{themevanilla:userid_error:go2disco}'), 'not translated') === false
                ? $this->t('{themevanilla:userid_error:go2disco}')
                : ''
                ?>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h2>
            <?=
            strpos($this->t('{themevanilla:userid_error:details_title}'), 'not translated') === false
            ? $this->t('{themevanilla:userid_error:details_title}')
            : ''
            ?>
        </h2>
        <p>
            <?=
            strpos($this->t('{themevanilla:userid_error:details_description}'), 'not translated') === false
            ? $this->t('{themevanilla:userid_error:details_description}')
            : ''
            ?>
        </p>
        <pre class="ssp-error-code">
        <?php
        foreach ($this->data['parameters']['%ATTRIBUTES%'] as $attr) {
            echo $attr . '<br>';
        }
        ?>
        </pre>
    </div>
</div>

<?php
$this->includeAtTemplateBase('includes/footer.php');
