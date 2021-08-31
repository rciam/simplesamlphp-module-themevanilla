<?php
$themeConfig = SimpleSAML\Configuration::getConfig('module_themevanilla.php');
$cookies = $themeConfig->getValue('cookiePolicy');
$this->data['header'] = (
    strpos($this->t('{themevanilla:policy:page_title}'), 'not translated') === false
    ? $this->t('{themevanilla:policy:page_title}')
    : ''
);
$this->includeAtTemplateBase('includes/header.php');

?>

<h2><?= $this->data['header'] ?></h2>

<div>
    <ol>
        <li>
            <?=
            strpos($this->t('{themevanilla:policy:purpose_head}'), 'not translated') === false
            ? $this->t('{themevanilla:policy:purpose_head}')
            : ''
            ?>
        </li>
    </ol>
    <?=
    strpos($this->t('{themevanilla:policy:purpose_body}'), 'not translated') === false
    ? $this->t('{themevanilla:policy:purpose_body}')
    : ''
    ?>

    <ol start="2">
        <li>
            <?=
            strpos($this->t('{themevanilla:policy:cookie_list_head}'), 'not translated') === false
            ? $this->t('{themevanilla:policy:cookie_list_head}')
            : ''
            ?>
        </li>
    </ol>
    <?=
    strpos($this->t('{themevanilla:policy:cookie_list_body}'), 'not translated') === false
    ? $this->t('{themevanilla:policy:cookie_list_body}')
    : ''
    ?>

    <table class="table">
        <thead>
            <tr>
                <th>
                    <?=
                    strpos($this->t('{themevanilla:policy:table_type}'), 'not translated') === false
                    ? $this->t('{themevanilla:policy:table_type}')
                    : ''
                    ?>
                </th>
                <th>
                    <?=
                    strpos($this->t('{themevanilla:policy:table_provider}'), 'not translated') === false
                    ? $this->t('{themevanilla:policy:table_provider}')
                    : ''
                    ?>
                </th>
                <th>
                    <?=
                    strpos($this->t('{themevanilla:policy:table_name}'), 'not translated') === false
                    ? $this->t('{themevanilla:policy:table_name}')
                    : ''
                    ?>
                </th>
                <th>
                    <?=
                    strpos($this->t('{themevanilla:policy:table_third_party}'), 'not translated') === false
                    ? $this->t('{themevanilla:policy:table_third_party}')
                    : ''
                    ?>
                </th>
                <th>
                    <?=
                    strpos($this->t('{themevanilla:policy:table_category}'), 'not translated') === false
                    ? $this->t('{themevanilla:policy:table_category}')
                    : ''
                    ?>
                </th>
                <th>
                    <?=
                    strpos($this->t('{themevanilla:policy:table_purpose}'), 'not translated') === false
                    ? $this->t('{themevanilla:policy:table_purpose}')
                    : ''
                    ?>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cookies as $row) : ?>
                <tr>
                    <td><?= isset($row['type']) ? $row['type'] : '' ?></td>
                    <td><u><?= isset($row['provider']) ? $row['provider'] : '' ?></u></td>
                    <td><?= isset($row['name']) ? $row['name'] : '' ?></td>
                    <td><?= isset($row['thirdParty']) && $row['thirdParty'] ? 'Yes' : 'No' ?></td>
                    <td><?= isset($row['category']) ? $row['category'] : '' ?></td>
                    <td><?= isset($row['purpose']) ? $row['purpose'] : '' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <ol start="3">
        <li>
            <?=
            strpos($this->t('{themevanilla:policy:endurance_head}'), 'not translated') === false
            ? $this->t('{themevanilla:policy:endurance_head}')
            : ''
            ?>
        </li>
    </ol>
    <?=
    strpos($this->t('{themevanilla:policy:endurance_body}'), 'not translated') === false
    ? $this->t('{themevanilla:policy:endurance_body}')
    : ''
    ?>

    <ol start="4">
        <li>
            <?=
            strpos($this->t('{themevanilla:policy:disable_cookie_head}'), 'not translated') === false
            ? $this->t('{themevanilla:policy:disable_cookie_head}')
            : ''
            ?>
        </li>
    </ol>
    <?=
    strpos($this->t('{themevanilla:policy:disable_cookie_body}'), 'not translated') === false
    ? $this->t('{themevanilla:policy:disable_cookie_body}')
    : ''
    ?>
    <?=
    strpos($this->t('{themevanilla:policy:note}'), 'not translated') === false
    ? $this->t('{themevanilla:policy:note}')
    : ''
    ?>
</div>

<?php
$this->includeAtTemplateBase('includes/footer.php');
