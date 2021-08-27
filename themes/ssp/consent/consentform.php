<?php

// Get Configuration and set the loader
$themeConfig = SimpleSAML\Configuration::getConfig('module_themevanilla.php');
$loader = $themeConfig->getValue('loader');
if (!empty($loader)) {
    $this->includeAtTemplateBase('includes/' . $loader . '.php');
}

/**
 * Template form for giving consent.
 *
 * Parameters:
 * - 'yesTarget': Target URL for the yes-button. This URL will receive a POST request.
 * - 'noTarget': Target URL for the no-button. This URL will receive a GET request.
 * - 'sppp': URL to the privacy policy of the destination, or false.
 *
 * @package SimpleSAMLphp
 */

assert(is_string($this->data['yesTarget']));
assert(is_string($this->data['noTarget']));
assert($this->data['sppp'] === false || is_string($this->data['sppp']));

// Needed for present_attributes_ssp()
$globalConfig = \SimpleSAML\Configuration::getInstance();
$t = new \SimpleSAML\XHTML\Template($globalConfig, 'consent:consentform.php');

// Parse parameters
$dstName = $this->data['dstName'];
$srcName = $this->data['srcName'];

$id = $_REQUEST['StateId'];
$state = \SimpleSAML\Auth\State::loadState($id, 'consent:request');

if (array_key_exists('consent:hiddenAttributes', $state)) {
    $t->data['hiddenAttributes'] = $state['consent:hiddenAttributes'];
} else {
    $t->data['hiddenAttributes'] = [];
}

$attributes = $this->data['attributes'];

$this->data['header'] = $this->t('{consent:consent:consent_header}');
$this->data['jquery'] = ['core' => true];

$this->includeAtTemplateBase('includes/header.php');
?>
<h2 class="text-center"><?= $this->data['consent_accept'] ?></h2>
<div class="row js-spread">
    <div class="col-sm-12 ssp-content-group js-spread">

        <?php
        echo $this->data['attributes_html'] = present_attributes_ssp($t, $attributes, '');

        /**
         * Recursive attribute array listing function
         *
         * @param \SimpleSAML\XHTML\Template $t          Template object
         * @param array                      $attributes Attributes to be presented
         * @param string                     $nameParent Name of parent element
         *
         * @return string HTML representation of the attributes
         */
        function present_attributes_ssp($t, $attributes, $nameParent)
        {
            $translator = $t->getTranslator();

            $alternate = ['ssp-table--tr__odd', 'ssp-table--tr__even'];
            $i = 0;
            $summary = 'summary="' . $translator->t('{consent:consent:table_summary}') . '"';

            if (strlen($nameParent) > 0) {
                $parentStr = strtolower($nameParent) . '_';
                $str = '<div class="ssp-attrs--container"><table class="table" ' . $summary . '>';
            } else {
                $parentStr = '';
                $str = '<div class="ssp-attrs--container js-spread"><table id="table_with_attributes"  class="table" '
                . $summary . '>';
            }

            foreach ($attributes as $name => $value) {
                $nameRaw = $name;
                $name = $translator->getAttributeTranslation($parentStr . $nameRaw);

                if (preg_match('/^child_/', $nameRaw)) {
                    // insert child table
                    $parentName = preg_replace('/^child_/', '', $nameRaw);
                    foreach ($value as $child) {
                        $str .= "\n" . '<tr class="odd ssp--table--tr__odd"><td>' .
                            present_attributes_ssp($t, $child, $parentName) . '</td></tr>';
                    }
                } else {
                    // insert values directly

                    $str .= "\n" . '<tr class="' . $alternate[($i++ % 2)] .
                        '"><td><div class="attrname ssp-table--attrname">' . htmlspecialchars($name) . '</div>';

                    $isHidden = in_array($nameRaw, $t->data['hiddenAttributes'], true);
                    if ($isHidden) {
                        $hiddenId = \SimpleSAML\Utils\Random::generateID();
                        $str .= '<div class="attrvalue ssp-table--attrvalue" style="display: none;" id="hidden_'
                        . $hiddenId . '">';
                    } else {
                        $str .= '<div class="attrvalue ssp-table--attrvalue">';
                    }

                    if (sizeof($value) > 1) {
                        // we have several values
                        $str .= '<ul class="list-unstyled ssp-table--attrvalue--list">';
                        foreach ($value as $listItem) {
                            if ($nameRaw === 'jpegPhoto') {
                                $str .= '<li class="ssp-table--attrvalue--list--item">'
                                . '<img src="data:image/jpeg;base64,'
                                . htmlspecialchars($listItem) . '" alt="User photo" /></li>';
                            } else {
                                $str .= '<li class="ssp-table--attrvalue--list--item">'
                                . htmlspecialchars($listItem) . '</li>';
                            }
                        }
                        $str .= '</ul>';
                    } elseif (isset($value[0])) {
                        // we have only one value
                        if ($nameRaw === 'jpegPhoto') {
                            $str .= '<img src="data:image/jpeg;base64,' .
                                htmlspecialchars($value[0]) . '" alt="User photo" />';
                        } else {
                            $str .= htmlspecialchars($value[0]);
                        }
                    } // end of if multivalue
                    $str .= '</div>';

                    if ($isHidden) {
                        $str .= '<div class="attrvalue consent_showattribute" id="visible_' . $hiddenId . '">';
                        $str .= '<a class="consent_showattributelink ssp-btn__show-more"'
                        . ' href="javascript:SimpleSAML_show(\'hidden_' . $hiddenId;
                        $str .= '\'); SimpleSAML_hide(\'visible_' . $hiddenId . '\');"'
                        . ' data-toggle="tooltip" data-placement="right" title="'
                        . $t->t('{consent:consent:show_attribute}') . '">';
                        $str .= '<span class="glyphicon glyphicon-eye-open ssp-show-more" aria-hidden="true"></span>';
                        $str .= '</a>';
                        $str .= '</div>';
                    }

                    $str .= '</td></tr>';
                } // end else: not child table
            } // end foreach
            $str .= isset($attributes) ? '</table></div>' : '';
            return $str;
        }
        ?>


        <?php
        if (isset($this->data['consent_purpose'])) {
            echo '<p>' . $this->data['consent_purpose'] . '</p>';
        }
        ?>

        <div class="ssp-btns-container">
            <form
                id="consent_yes"
                action="<?= htmlspecialchars($this->data['yesTarget']) ?>"
                style="display:inline-block;"
            >
                <p class="ssp-btns-container--checkbox">
                    <?php
                    if ($this->data['usestorage']) {
                        $checked = ($this->data['checked'] ? 'checked="checked"' : '');
                        echo '<input type="checkbox" name="saveconsent" ' . $checked
                        . ' value="1" /> ' . $this->t('{consent:consent:remember}');
                    } // Embed hidden fields...
                    ?>
                    <input type="hidden" name="StateId" value="<?= htmlspecialchars($this->data['stateId']) ?>" />
                </p>
                <button
                    type="submit"
                    name="yes"
                    class="ssp-btn btn ssp-btn__action ssp-btns-container--btn__left text-uppercase"
                    id="yesbutton"
                >
                    <?= htmlspecialchars($this->t('{consent:consent:yes}')) ?>
                </button>
            </form>

            <form
                id="consent_no"
                action="<?= htmlspecialchars($this->data['noTarget']) ?>"
                style="display:inline-block;"
            >
                <input type="hidden" name="StateId" value="<?= htmlspecialchars($this->data['stateId']) ?>" />
                <button
                    type="submit"
                    class="ssp-btn ssp-btn__secondary btn ssp-btns-container--btn__right text-uppercase"
                    name="no"
                    id="nobutton"
                >
                    <?= htmlspecialchars($this->t('{consent:consent:no}')) ?>
                </button>
            </form>
        </div> <!-- /ssp-btns-container -->
    </div> <!-- /ssp-content-group -->
</div> <!-- /row -->

<?php if ($this->data['sppp'] !== false) : ?>
<p><?= htmlspecialchars($this->t('{consent:consent:consent_privacypolicy}')) ?> 
<a target="_blank" href="<?= htmlspecialchars($this->data['sppp']) ?>"><?= $dstName ?></a>
</p>
<?php endif;

$this->includeAtTemplateBase('includes/footer.php');
