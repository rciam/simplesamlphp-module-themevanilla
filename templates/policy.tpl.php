<?php
$themeConfig = SimpleSAML\Configuration::getConfig('module_themevanilla.php');
$cookies = $themeConfig->getValue('cookiePolicy');
$this->data['header'] = (strpos($this->t('{themevanilla:policy:page_title}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:page_title}') : '');
$this->includeAtTemplateBase('includes/header.php');

?>

<h2><?php echo($this->data['header']); ?></h2>

<div>
  <ol>
      <li><?php echo(strpos($this->t('{themevanilla:policy:purpose_head}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:purpose_head}') : ''); ?></li>
  </ol>
  <?php echo(strpos($this->t('{themevanilla:policy:purpose_body}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:purpose_body}') : ''); ?>

  <ol start="2">
      <li><?php echo(strpos($this->t('{themevanilla:policy:cookie_list_head}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:cookie_list_head}') : ''); ?></li>
  </ol>
  <?php echo(strpos($this->t('{themevanilla:policy:cookie_list_body}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:cookie_list_body}') : ''); ?>

  <table class="table">
    <thead>
      <tr>
          <th><?php echo(strpos($this->t('{themevanilla:policy:table_type}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:table_type}') : ''); ?></th>
          <th><?php echo(strpos($this->t('{themevanilla:policy:table_provider}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:table_provider}') : ''); ?></th>
          <th><?php echo(strpos($this->t('{themevanilla:policy:table_name}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:table_name}') : ''); ?></th>
          <th><?php echo(strpos($this->t('{themevanilla:policy:table_third_party}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:table_third_party}') : ''); ?></th>
          <th><?php echo(strpos($this->t('{themevanilla:policy:table_category}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:table_category}') : ''); ?></th>
          <th><?php echo(strpos($this->t('{themevanilla:policy:table_purpose}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:table_purpose}') : ''); ?></th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach($cookies as $row) {
    ?>
      <tr>
          <td><?php echo(isset($row['type']) ? $row['type'] : '');?></td>
          <td><u><?php echo(isset($row['provider']) ? $row['provider'] : '');?></u></td>
          <td><?php echo(isset($row['name']) ? $row['name'] : '');?></td>
          <td><?php echo(isset($row['thirdParty']) && $row['thirdParty'] ? 'Yes' : 'No' );?></td>
          <td><?php echo(isset($row['category']) ? $row['category'] : '');?></td>
          <td><?php echo(isset($row['purpose']) ? $row['purpose'] : '');?></td>
      </tr>
    <?php
    }
    ?>
    </tbody>
  </table>

  <ol start="3">
      <li><?php echo(strpos($this->t('{themevanilla:policy:endurance_head}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:endurance_head}') : ''); ?></li>
  </ol>
  <?php echo(strpos($this->t('{themevanilla:policy:endurance_body}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:endurance_body}') : ''); ?>

  <ol start="4">
      <li><?php echo(strpos($this->t('{themevanilla:policy:disable_cookie_head}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:disable_cookie_head}') : ''); ?></li>
  </ol>
  <?php echo(strpos($this->t('{themevanilla:policy:disable_cookie_body}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:disable_cookie_body}') : ''); ?>
  <?php echo(strpos($this->t('{themevanilla:policy:note}'), 'not translated') === FALSE ? $this->t('{themevanilla:policy:note}') : ''); ?>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
