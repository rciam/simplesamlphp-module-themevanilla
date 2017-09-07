<div id="loader">
  <div class="sk-circle">
    <div class="sk-circle1 sk-child"></div>
    <div class="sk-circle2 sk-child"></div>
    <div class="sk-circle3 sk-child"></div>
    <div class="sk-circle4 sk-child"></div>
    <div class="sk-circle5 sk-child"></div>
    <div class="sk-circle6 sk-child"></div>
    <div class="sk-circle7 sk-child"></div>
    <div class="sk-circle8 sk-child"></div>
    <div class="sk-circle9 sk-child"></div>
    <div class="sk-circle10 sk-child"></div>
    <div class="sk-circle11 sk-child"></div>
    <div class="sk-circle12 sk-child"></div>
  </div>
</div>
<?php

$faventry = NULL;
foreach( $this->data['idplist'] AS $tab => $slist) {
  if (!empty($this->data['preferredidp']) && array_key_exists($this->data['preferredidp'], $slist))
    $faventry = $slist[$this->data['preferredidp']];
}


if(!array_key_exists('header', $this->data)) {
  $this->data['header'] = 'selectidp';
}
$this->data['header'] = $this->t($this->data['header']);
$this->data['jquery'] = array('core' => TRUE, 'ui' => TRUE, 'css' => TRUE);


$this->data['head'] .= '<script type="text/javascript" src="' . SimpleSAML_Module::getModuleUrl('discopower/js/jquery.livesearch.js')  . '"></script>';
$this->data['head'] .= '<script type="text/javascript" src="' . SimpleSAML_Module::getModuleUrl('discopower/js/' . $this->data['score'] . '.js')  . '"></script>';

$this->data['head'] .= '<script type="text/javascript">

  $(document).ready(function() {';
    $i = 0;
    foreach ($this->data['idplist'] AS $tab => $slist) {
  if ($tab !== 'all') {
      $this->data['head'] .= "\n" . '$("#query_' . $tab . '").liveUpdate("#list_' . $tab . '")' .
        (($i++ == 0) && (empty($faventry)) ? '.focus()' : '') . ';';
  }


    }

    $this->data['head'] .= '
});

</script>';





if (!empty($faventry)) $this->data['autofocus'] = 'favouritesubmit';

$this->includeAtTemplateBase('includes/header.php');

function showEntry($t, $metadata, $favourite = FALSE) {

  $basequerystring = '?' .
    'entityID=' . urlencode($t->data['entityID']) . '&amp;' .
    'return=' . urlencode($t->data['return']) . '&amp;' .
    'returnIDParam=' . urlencode($t->data['returnIDParam']) . '&amp;idpentityid=';

  $providersOnlyIcon = array("google", "linkedin", "facebook", "orcid");
  $namelower = strtolower(getTranslatedName($t, $metadata));


  if(in_array($namelower, $providersOnlyIcon)) {
    $html = '<a class="metaentry ssp-btn--round-icon" href="' . $basequerystring . urlencode($metadata['entityid']) . '">';
    $html .= '<img alt="Identity Provider" class="entryicon" src="' . SimpleSAML_Module::getModuleURL('themeopenminted/resources/images/' . $namelower . '.jpg') . '" />';
    $html .= '</a>';
  }
  else {
    $html = '<a class="metaentry " href="' . $basequerystring . urlencode($metadata['entityid']) . '">';
    $html .= htmlspecialchars(getTranslatedName($t, $metadata)) . '';

    if(array_key_exists('icon', $metadata) && $metadata['icon'] !== NULL) {
      $iconUrl = \SimpleSAML\Utils\HTTP::resolveURL($metadata['icon']);
      $html .= '<img alt="Identity Provider" class="entryicon" src="' . htmlspecialchars($iconUrl) . '" />';
    }

    $html .= '</a>';
  }



  return $html;
}

?>

<h2 class="text-center">Choose your academic/social account</h2>


<?php

function getTranslatedName($t, $metadata) {
  if (isset($metadata['UIInfo']['DisplayName'])) {
    $displayName = $metadata['UIInfo']['DisplayName'];
    assert('is_array($displayName)'); // Should always be an array of language code -> translation
    if (!empty($displayName)) {
      return $t->getTranslation($displayName);
    }
  }

  if (array_key_exists('name', $metadata)) {
    if (is_array($metadata['name'])) {
      return $t->getTranslation($metadata['name']);
    } else {
      return $metadata['name'];
    }
  }
  return $metadata['entityid'];
}




if (!empty($faventry)) {
  echo('
    <div class="modal fade" id="favourite-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="js-close-custom close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title">Login</h2>
          </div>
          <div class="modal-body ssp-modal-body">
            <div class="row text-center">
              <form id="idpselectform" method="get" action="' . $this->data['urlpattern'] . '" class="ssp-form-favourite">
                <input type="hidden" name="entityID" value="' . htmlspecialchars($this->data['entityID']) . '" />
                <input type="hidden" name="return" value="' . htmlspecialchars($this->data['return']) . '" />
                <input type="hidden" name="returnIDParam" value="' . htmlspecialchars($this->data['returnIDParam']) . '" />
                <input type="hidden" name="idpentityid" value="' . htmlspecialchars($faventry['entityid']) . '" />
                <input type="submit" name="formsubmit" id="favouritesubmit" class="ssp-btn ssp-btn__action btn text-uppercase" value="'
                  . $this->t('login_at') . ' ' . htmlspecialchars(getTranslatedName($this, $faventry)) . '" />
              </form>
            </div>
            <div class="row text-center ssp-or">or</div>
            <div class="row text-center"><button class="btn ssp-btn text-uppercase ssp-btn ssp-btn__secondary js-close-custom">Choose an other account</button></div>
          </div> <!-- /modal-body -->
        </div> <!-- /modal-content -->
      </div> <!-- /modal-dialog -->
    </div> <!-- /modal -->
  ');
}

$top = '<div class="row ssp-content-group">
      <div class="col-sm-12">';
$title = '';
$title_html = '';
$list_open = '<div class="metalist ssp-content-group__provider-list ssp-content-group__provider-list--other" id="list_other">';
$providers = '';
$close = '</div></div></div>'; // /metalist /ssp-content-group /row

foreach( $this->data['idplist'] AS $tab => $slist) {
  if ($tab !== 'all') {
    if (!empty($slist)) {
      if($tab == 'edugain') {
        echo '<div class="row ssp-content-group js-spread">
                <div class="col-sm-12 js-spread">
                  <h3>' . $this->t('{discopower:tabs:' . $tab . '}') . '</h3>
                <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                <form id="idpselectform" action="?" method="get"><input class="form-control" aria-describedby="search institutions" placeholder="Search..." type="text" value="" name="query_'
                . $tab
                . '" id="query_' . $tab . '" /></form>'
                . '</div> <!-- /input-group -->
                <div class="metalist ssp-content-group__provider-list ssp-content-group__provider-list--edugain js-spread" id="list_'
                . $tab  . '">';
        if (!empty($this->data['preferredidp']) && array_key_exists($this->data['preferredidp'], $slist)) {
          $idpentry = $slist[$this->data['preferredidp']];
          echo (showEntry($this, $idpentry, TRUE));
        }

        foreach ($slist AS $idpentry) {
          if ($idpentry['entityid'] != $this->data['preferredidp']) {
            echo (showEntry($this, $idpentry));
          }
        }
        echo($close);
      }
      else {
        if($tab == "social") {
          $title = $this->t('{discopower:tabs:' . $tab . '}') . ' / ';
          if (!empty($this->data['preferredidp']) && array_key_exists($this->data['preferredidp'], $slist)) {
            $idpentry = $slist[$this->data['preferredidp']];
            $providers .=  (showEntry($this, $idpentry, TRUE));
          }

          foreach ($slist AS $idpentry) {
            if ($idpentry['entityid'] != $this->data['preferredidp']) {
              $providers .= (showEntry($this, $idpentry));
            }
          }
        }
        else if ($tab == "misc") {
          $title .= $this->t('{discopower:tabs:' . $tab . '}');
          if (!empty($this->data['preferredidp']) && array_key_exists($this->data['preferredidp'], $slist)) {
            $idpentry = $slist[$this->data['preferredidp']];
            $providers .=  (showEntry($this, $idpentry, TRUE));
          }

          foreach ($slist AS $idpentry) {
            if ($idpentry['entityid'] != $this->data['preferredidp']) {
              $providers .= (showEntry($this, $idpentry));
            }
          }
          $title_html = '<h3>' . $title . '</h3>';
          echo $top . $title_html . $top_close . $list_open . $providers . $close;
        }
      }
    }
  }

}

?>





<?php $this->includeAtTemplateBase('includes/footer.php');
