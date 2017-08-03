
<?php
if(!empty($this->data['htmlinject']['htmlContentPost'])) {
  foreach($this->data['htmlinject']['htmlContentPost'] AS $c) {
    echo $c;
  }
}
?>
  </div><!-- /container -->
  <footer class="ssp-footer text-center">
    <div class="container-fluid">

<?php

$includeLanguageBar = TRUE;
if (!empty($_POST))
  $includeLanguageBar = FALSE;
if (isset($this->data['hideLanguageBar']) && $this->data['hideLanguageBar'] === TRUE)
  $includeLanguageBar = FALSE;

if ($includeLanguageBar) {

  $languages = $this->getLanguageList();
  if ( count($languages) > 1 ) {
    echo '<div class="ssp-lang-container">
      <div class="dropup">';
    $langnames = array(
      'no' => 'Bokmål', // Norwegian Bokmål
      'nn' => 'Nynorsk', // Norwegian Nynorsk
      'se' => 'Sámegiella', // Northern Sami
      'sam' => 'Åarjelh-saemien giele', // Southern Sami
      'da' => 'Dansk', // Danish
      'en' => 'English',
      'de' => 'Deutsch', // German
      'sv' => 'Svenska', // Swedish
      'fi' => 'Suomeksi', // Finnish
      'es' => 'Español', // Spanish
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
      'fa' => 'پارسی', // Persian
      'ur' => 'اردو', // Urdu
      'he' => 'עִבְרִית', // Hebrew
      'id' => 'Bahasa Indonesia', // Indonesian
      'sr' => 'Srpski', // Serbian
      'lv' => 'Latviešu', // Latvian
      'ro' => 'Românește', // Romanian
      'eu' => 'Euskara', // Basque
    );

    $textarray = array();
    foreach ($languages AS $lang => $current) {
      $lang = strtolower($lang);
      if ($current) {
        $lang_current = $langnames[$lang];
      } else {
        $textarray[] = '<li class="ssp-dropdown__two_cols--item"><a href="' . htmlspecialchars(\SimpleSAML\Utils\HTTP::addURLParameters(\SimpleSAML\Utils\HTTP::getSelfURL(), array($this->languageParameterName => $lang))) . '">' .
          $langnames[$lang] . '</a></li>';
      }
    }
    echo '<button class="ssp-btn btn ssp-btn__footer dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
      . $lang_current
      . '<span class="caret"></span>
      </button>
      <ul class="dropdown-menu dropdown-menu-left ssp-dropdown__two_cols" aria-labelledby="dropdownMenu1">';
    echo join(' ', $textarray);
    echo '</ul></div></div>'; // /dropup /ssp-lang-container
  }
}

?>
        <div class="copy">Copyright &copy; 2016-2017 <a href="https://openminted.eu/">OpenMinTeD</a></div>
        <div class="powered">Powered by <a href="https://github.com/rciam">RCIAM</a></div>
      </div> <!-- /container-fluid -->
  </footer>
  <script type="text/javascript"
          src="<?php echo htmlspecialchars(SimpleSAML_Module::getModuleURL('simplesamlphp-module-theme-openminted/resources/js/dropdown.js')); ?>">
  </script>
</body>
</html>
