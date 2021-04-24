<div class="row mb-5">
    <h1>Delete product</h1>
</div>
<form method="POST">
    <?php if (isset($product)) { ?>
    <table class="table personal-task text-white">
        <thead>
        <tr>
            <?php if (isset($product)) { ?>
                <?php foreach ($product as $attribute => $value) { ?>
                    <th <?php if ($attribute == 'id') echo 'hidden' ?>>
                        <?php echo $attribute; ?>
                    </th>
                <?php } ?>
            <?php } ?>
        </tr>
        </thead>

        <tbody>
        <tr>
            <?php foreach ($product as $attribute => $value) { ?>
                <td style="padding-left: 15px" <?php if ($attribute == 'id') echo 'hidden' ?>>
                    <input type="text" name="<?php echo $attribute; ?>" value="<?php echo $value; ?>" disabled>
                </td>
            <?php } ?>
        </tr>
        </tbody>
    </table>

    <button class="btn btn-primary mt-4 signup bg-danger" type="submit">Delete</button>
</form>
<!--    <button class="btn btn-primary mt-4 signup bg-danger" type = "submit" >Delete</button >-->

<?php } ?>
