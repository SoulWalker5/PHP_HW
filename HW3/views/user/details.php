<div class="row">
    <h1><?php if(isset($head)) echo $head ?></h1>
</div>
<table class="table personal-task text-white">
    <thead>
        <tr>
            <?php if (isset($user)) { ?>
            <?php foreach ($user as $attribute => $value) { ?>
                <th <?php if ($attribute == 'id') echo 'hidden' ?>>
                    <?php echo $attribute; ?>
                </th>
            <?php } ?>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php foreach ($user as $attribute => $value) { ?>
                <td style="padding-left: 15px" <?php if ($attribute == 'id') echo 'hidden' ?>>
                    <?php echo $value; ?>
                </td>
            <?php } ?>
        </tr>
    </tbody>
</table>