<?php
$themeConfig = SimpleSAML_Configuration::getConfig('module_themevanilla.php');
$cookies = $themeConfig->getValue('cookiePolicy');
$this->data['header'] = $this->t('{themevanilla:policy:page_title}');
$this->includeAtTemplateBase('includes/header.php');

?>

<h2><?php echo($this->data['header']); ?></h2>

<div>
<ol>
    <li><?php echo($this->t('{themevanilla:policy:purpose_head}')); ?></li>
</ol>
<?php echo($this->t('{themevanilla:policy:purpose_body}')); ?>

<ol start="2">
    <li><?php echo($this->t('{themevanilla:policy:cookie_list_head}')); ?></li>
</ol>
<?php echo($this->t('{themevanilla:policy:cookie_list_body}')); ?>

<table>
<tbody>
<tr>
    <td><?php echo($this->t('{themevanilla:policy:table_type}')); ?></td>
    <td><?php echo($this->t('{themevanilla:policy:table_provider}')); ?></td>
    <td><?php echo($this->t('{themevanilla:policy:table_name}')); ?></td>
    <td><?php echo($this->t('{themevanilla:policy:table_third_party}')); ?></td>
    <td><?php echo($this->t('{themevanilla:policy:table_category}')); ?></td>
    <td><?php echo($this->t('{themevanilla:policy:table_purpose}')); ?></td>
</tr>

<?php
foreach($cookies as $row) {
?>
<tr>
    <td><p><?php echo($row['type']);?></p></td>
    <td><p><u><?php echo($row['provider']);?></u></p></td>
    <td><p><?php echo($row['name']);?></p></td>
    <td><p><?php echo ($row['thirdParty'] ? 'Yes' : 'No' );?></p></td>
    <td><p><?php echo($row['category']);?></p></td>
    <td><p><?php echo($row['purpose']);?></p></td>
</tr>
<?php
}
?>

</tbody>
</table>
<p>&nbsp;</p>

<ol start="3">
    <li><?php echo($this->t('{themevanilla:policy:endurance_head}')); ?></li>
</ol>
<?php echo($this->t('{themevanilla:policy:endurance_body}')); ?>

<ol start="4">
    <li><?php echo($this->t('{themevanilla:policy:disable_cookie_head}')); ?></li>
</ol>
<?php echo($this->t('{themevanilla:policy:disable_cookie_body}')); ?>
<p>&nbsp;</p>
<?php echo($this->t('{themevanilla:policy:note}')); ?>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
