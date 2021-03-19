<div class="row">
    <h1><?php if(isset($head)) echo $head ?></h1>
</div>
<table class="table personal-task text-white">
    <thead>
    <tr>
        <?php if (isset($users)) $attributes = $users[0]; ?>
        <?php foreach ($attributes as $key => $value) { ?>
            <th <?php if ($key == 'id') echo 'hidden' ?>>
                <?php echo ucfirst($key); ?>
            </th>

        <?php } ?>
        <?php if(isset($_COOKIE['loggedUser'])) {?>
        <th>
            Operations
        </th>
        <?php } ?>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($users as $item) { ?>
        <tr>
            <?php foreach ($item as $key => $value) { ?>
                <td style="padding-left: 15px" <?php if ($key == 'id') echo 'hidden' ?>>
                    <?php echo $value; ?>
                </td>
            <?php } ?>
            <?php if(isset($_COOKIE['loggedUser'])) {?>
            <td style="padding-left: 15px">
                <a href="<?php echo substr(strtolower($head), 0, -1) ?>/details/<?php echo $item['id'] ?>" class="btn btn-primary" role="button" >Details</a>
            </td>
        </tr>
        <?php } ?>
    <?php } ?>

    </tbody>
</table>