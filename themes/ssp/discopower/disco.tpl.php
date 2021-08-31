<?php

use Webmozart\Assert\Assert;

// Get Configuration and set the loader
$themeConfig = SimpleSAML\Configuration::getConfig('module_themevanilla.php');
$loader = $themeConfig->getValue('loader');
if (!empty($loader)) {
    $this->includeAtTemplateBase('includes/' . $loader . '.php');
}

$favEntry = null;
foreach ($this->data['idplist'] as $tab => $sList) {
    if (!empty($this->data['preferredidp']) && array_key_exists($this->data['preferredidp'], $sList)) {
        $favEntry = $sList[$this->data['preferredidp']];
    }
}

$this->data['header'] = $this->t('selectidp');
$this->data['jquery'] = ['core' => true, 'ui' => false, 'css' => false];

$this->data['head'] = '<link rel="stylesheet" media="screen" type="text/css" href="' .
    SimpleSAML\Module::getModuleURL('discopower/assets/css/uitheme1.12.1/jquery-ui.min.css') . '" />';

if (!empty($favEntry)) {
    $this->data['autofocus'] = 'favouritesubmit';
}

$this->includeAtTemplateBase('includes/header.php');

$this->data['htmlinject']['htmlContentPost'][] = '<script type="text/javascript" src="' .
    SimpleSAML\Module::getModuleURL('discopower/assets/js/jquery-1.12.4.min.js') . '"></script>' . "\n";
$this->data['htmlinject']['htmlContentPost'][] = '<script type="text/javascript" src="' .
    SimpleSAML\Module::getModuleURL('discopower/assets/js/jquery-ui-1.12.1.min.js') . '"></script>' . "\n";
$this->data['htmlinject']['htmlContentPost'][] = '<script type="text/javascript" src="' .
    SimpleSAML\Module::getModuleURL('discopower/assets/js/jquery.livesearch.js') . '"></script>' . "\n";
$this->data['htmlinject']['htmlContentPost'][] = '<script type="text/javascript" src="' .
    SimpleSAML\Module::getModuleURL('discopower/assets/js/tablist.js') . '"></script>' . "\n";
$this->data['htmlinject']['htmlContentPost'][] = '<script type="text/javascript" src="' .
    SimpleSAML\Module::getModuleURL('discopower/assets/js/' . $this->data['score'] . '.js') . '"></script>' . "\n";

function showEntry($t, $metadata, $favourite = false, $withIcon = false)
{

    $baseQueryString = '?' .
        'entityID=' . urlencode($t->data['entityID']) . '&amp;' .
        'return=' . urlencode($t->data['return']) . '&amp;' .
        'returnIDParam=' . urlencode($t->data['returnIDParam']) . '&amp;idpentityid=';



    if ($withIcon) {
        if (isset($metadata['login_button']['label']) && !empty($metadata['login_button']['label'])) {
            $label =  $metadata['login_button']['label'];
        }
        $fileName = $metadata['login_button']['icon_filename'];
        $cssClassName = $metadata['login_button']['css_classname'];
        $cssButtonType = '';

        // is $label empty string
        if (!isset($label) || trim($label) == '') {
            $cssButtonType = 'ssp-btn__icon-no-label';
        } else {
            $cssButtonType = 'ssp-btn__icon-with-label';
        }

        $html = '<a class="metaentry ssp-btn ' . $cssButtonType  .  ' ' . $cssClassName . '" href="'
        . $baseQueryString . urlencode($metadata['entityid']) . '">';
        $html .= '<img alt="Identity Provider" class="entryicon" src="'
        . SimpleSAML\Module::getModuleURL('themevanilla/resources/images/' . $fileName) . '" />';
        if (isset($label)) {
            $html .= '<span>' . $label . '</span>';
        }
        $html .= '</a>';
    } else {
        $html = '<a class="metaentry " href="' . $baseQueryString . urlencode($metadata['entityid']) . '">';
        $html .= htmlspecialchars(getTranslatedName($t, $metadata)) . '';

        if (array_key_exists('icon', $metadata) && $metadata['icon'] !== null) {
            $iconUrl = \SimpleSAML\Utils\HTTP::resolveURL($metadata['icon']);
            $html .= '<img alt="Identity Provider" class="entryicon" src="' . htmlspecialchars($iconUrl) . '" />';
        }

        $html .= '</a>';
    }



    return $html;
}

?>

<h2 class="text-center">
    <?=
    strpos($this->t('{themevanilla:discopower:title}'), 'not translated') === false
    ? $this->t('{themevanilla:discopower:title}')
    : ''
    ?>
</h2>


<?php

function getTranslatedName($t, $metadata)
{
    if (isset($metadata['UIInfo']['DisplayName'])) {
        $displayName = $metadata['UIInfo']['DisplayName'];
        Assert::isArray($displayName); // Should always be an array of language code -> translation
        if (!empty($displayName)) {
            return $t->getTranslator()->getPreferredTranslation($displayName);
        }
    }

    if (array_key_exists('name', $metadata)) {
        if (is_array($metadata['name'])) {
            return $t->getTranslator()->getPreferredTranslation($metadata['name']);
        } else {
            return $metadata['name'];
        }
    }
    return $metadata['entityid'];
}

if (!empty($favEntry)) : ?>
    <div class="modal fade" id="favourite-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="js-close-custom close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title">
                        <?=
                        strpos($this->t('{themevanilla:discopower:favourite_dialog_title}'), 'not translated') === false
                        ? $this->t('{themevanilla:discopower:favourite_dialog_title}')
                        : ''
                        ?>
                    </h2>
                </div>
                <div class="modal-body ssp-modal-body">
                    <div class="row text-center">
                        <form
                            id="idpselectform"
                            method="get"
                            action="<?= $this->data['urlpattern'] ?>"
                            class="ssp-form-favourite"
                        >
                            <input
                                type="hidden"
                                name="entityID"
                                value="<?= htmlspecialchars($this->data['entityID']) ?>"
                            />
                            <input
                                type="hidden"
                                name="return"
                                value="<?= htmlspecialchars($this->data['return']) ?>"
                            />
                            <input
                                type="hidden"
                                name="returnIDParam"
                                value="<?= htmlspecialchars($this->data['returnIDParam']) ?>"
                            />
                            <input
                                type="hidden"
                                name="idpentityid"
                                value="<?= htmlspecialchars($favEntry['entityid']) ?>"
                            />
                            <input
                                type="submit"
                                name="formsubmit"
                                id="favouritesubmit"
                                class="ssp-btn ssp-btn__action text-uppercase"
                                value="<?= $this->t('{themevanilla:discopower:login_with}') . ' '
                                . htmlspecialchars(getTranslatedName($this, $favEntry)) ?>"
                            />
                        </form>
                    </div>
                    <div class="row text-center ssp-modal-or">
                        <?=
                        strpos($this->t('{themevanilla:discopower:or}'), 'not translated') === false
                        ? $this->t('{themevanilla:discopower:or}')
                        : ''
                        ?>
                    </div>
                    <div class="row text-center">
                        <button class="ssp-btn text-uppercase ssp-btn ssp-btn__secondary js-close-custom">
                            <?=
                            strpos(
                                $this->t('{themevanilla:discopower:favourite_dialog_button_close}'),
                                'not translated'
                            ) === false
                            ? $this->t('{themevanilla:discopower:favourite_dialog_button_close}')
                            : ''
                            ?>
                        </button>
                    </div>
                </div> <!-- /modal-body -->
            </div> <!-- /modal-content -->
        </div> <!-- /modal-dialog -->
    </div> <!-- /modal -->
<?php endif;

$idpsInSearchableListIndex = -1;
$idpsWithLogosIndex = -1;
foreach ($this->data['idplist'] as $tab => $sList) {
    if (!empty($sList)) {
        if ($tab == 'idps_in_searchable_list') {
            $idpsInSearchableListIndex = array_search($tab, array_keys($this->data['idplist']));
            $top = '<div class="row ssp-content-group js-spread">
                <div class="col-sm-12 js-spread">';
            $searchName = 'query_' . $tab;
            $search = '<div class="input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                  </span>
                  <form id="idpselectform" action="?" method="get">
                    <input
                      class="form-control" aria-describedby="search institutions" placeholder="Search..."
                      type="text" value="" name="' . $searchName . '" id="' . $searchName . '"
                    />'
                . '</form>'
                . '</div>';
            $listOpen = '<div class="metalist ssp-content-group__provider-list '
            . 'ssp-content-group__provider-list--idps_in_searchable_list js-spread" id="list_' . $tab . '">';
            $listItems = '';
            $close = '</div></div></div>'; // /metalist /ssp-content-group /row

            if (!empty($this->data['preferredidp']) && array_key_exists($this->data['preferredidp'], $sList)) {
                $idpEntry = $sList[$this->data['preferredidp']];
                $listItems .= (showEntry($this, $idpEntry, true));
            }

            foreach ($sList as $idpEntry) {
                if ($idpEntry['entityid'] != $this->data['preferredidp']) {
                    $listItems .= (showEntry($this, $idpEntry));
                }
            }
            echo $top . $search . $listOpen . $listItems . $close;
        } elseif ($tab == "idps_with_logos") {
            $idpsWithLogosIndex = array_search($tab, array_keys($this->data['idplist']));
            $top = '<div class="row ssp-content-group"><div class="col-sm-12">';
            $listOpen = '<div class="metalist ssp-content-group__provider-list'
            . ' ssp-content-group__provider-list--other js-idps">';
            $listItems = '';
            $closeList = '</div>'; // /metalist
            $close = '</div></div>'; // /ssp-content-group /col-sm-12
            if (!empty($this->data['preferredidp']) && array_key_exists($this->data['preferredidp'], $sList)) {
                $idpEntry = $sList[$this->data['preferredidp']];
                $listItems .=  (showEntry($this, $idpEntry, true, true));
            }

            foreach ($sList as $idpEntry) {
                if ($idpEntry['entityid'] != $this->data['preferredidp']) {
                    $listItems .= (showEntry($this, $idpEntry, false, true));
                }
            }
            // if (!empty($idpsInSearchableListIndex) && $idpsInSearchableListIndex < $idpsWithLogosIndex) {
            if ($idpsInSearchableListIndex > -1 && $idpsInSearchableListIndex < $idpsWithLogosIndex) {
                $or = '<div class="text-center ssp-line-or-line ssp-line-or-line--top">'
                . '<span class="ssp-line-or-line__or">'
                . (
                    strpos($this->t('{themevanilla:discopower:or}'), 'not translated') === false
                    ? $this->t('{themevanilla:discopower:or}')
                    : ''
                )
                . '</span></div>';
                echo $top . $or . $listOpen . $listItems . $closeList . $close;
            } else {
                $or = '<div class="text-center ssp-line-or-line ssp-line-or-line--bottom">'
                . '<span class="ssp-line-or-line__or">'
                . (
                    strpos($this->t('{themevanilla:discopower:or}'), 'not translated') === false
                    ? $this->t('{themevanilla:discopower:or}')
                    : ''
                )
                . '</span></div>';
                echo $top . $listOpen . $listItems . $closeList . $or . $close;
            }
        }
    }
}

$this->includeAtTemplateBase('includes/footer.php');
