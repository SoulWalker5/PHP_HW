<div class="row">
    <h1><?php if (isset($head)) echo $head ?></h1>
</div>

<table class="table personal-task text-white">
    <thead>
    <tr>
        <?php if (isset($ordersByUser)) $attributes = $ordersByUser[0]; ?>
        <?php foreach ($attributes as $key => $value) { ?>
            <th <?php if ($key == 'id') echo 'hidden' ?>>
                <?php echo ucfirst($key); ?>
            </th>
        <?php } ?>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($ordersByUser as $item) { ?>
        <tr>
            <?php foreach ($item as $key => $value) { ?>
                <td style="padding-left: 15px" <?php if ($key == 'id') echo 'hidden' ?>>
                    <?php echo $value; ?>
                </td>
            <?php } ?>
        </tr>
        </form>
    <?php } ?>
    </tbody>
</table>