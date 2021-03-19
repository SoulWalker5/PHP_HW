<div class="row mb-5">
    <h1>Delete product</h1>
</div>
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
                    <?php echo $value; ?>
                </td>
            <?php } ?>
        </tr>
        </tbody>
    </table>
    <form method="POST">
        <input class="btn btn-primary mt-4 signup bg-danger" type="submit" value="Delete" role="button"/>
    </form>
    <!--    <button class="btn btn-primary mt-4 signup bg-danger" type = "submit" >Delete</button >-->

<?php } ?>
