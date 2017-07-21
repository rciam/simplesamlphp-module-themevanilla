
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
      <span class="row">Copyright &copy; 2016-2017 <a href="https://openminted.eu/">OpenMinTeD</a></span>
      <span class="rowc">Powered by <a href="https://github.com/rciam">RCIAM</a></span>
    </div>
  </footer>
  <script type="text/javascript"
          src="<?php echo htmlspecialchars(SimpleSAML_Module::getModuleURL('simplesamlphp-module-theme-openminted/resources/js/dropdown.js')); ?>">
  </script>
</body>
</html>
