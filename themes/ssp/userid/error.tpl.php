<?php
$this->data['header'] = $this->t('{userid:error:header}');
$this->data['jquery'] = array('core' => TRUE);

$this->data['head'] = <<<EOF
<meta name="robots" content="noindex, nofollow" />
<meta name="googlebot" content="noarchive, nofollow" />
EOF;

$this->includeAtTemplateBase('includes/header.php');
?>
<div class="row">
  <div class="col-sm-12">
    <h2><?php echo $this->t('{userid:error:title}'); ?></h2>
<?php
  echo $this->t('{userid:error:descr_'.$this->data['errorCode'].'}', $this->data['parameters']);
?>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <h2>Error details</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since...</p>
    <pre class="ssp-error-code">
      eduPersonUniqueId
      eduPersonPrincipalName
      eduPersonTargetedID
      persistentNameId
    </pre>
  </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <h2>How to get help</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
  </div>
</div>
<?php
$this->includeAtTemplateBase('includes/footer.php');
