
<?php
if(!empty($this->data['htmlinject']['htmlContentPost'])) {
  foreach($this->data['htmlinject']['htmlContentPost'] AS $c) {
    echo $c;
  }
}
?>
  </div><!-- /container -->
  <footer class="b-footer text-center">
    <div class="container b-footer__container">
      <div class="row">Copyright &copy; 2016-2017 <a href="https://openminted.eu/">OpenMinTeD</a></div>
      <div class="row">Powered by <a href="https://github.com/rciam">RCIAM</a></div>
    </div>
  </footer>
  <script type="text/javascript"
          src="<?php echo htmlspecialchars(SimpleSAML_Module::getModuleURL('simplesamlphp-module-theme-openminted/resources/js/dropdown.js')); ?>">
  </script>
</body>
</html>
