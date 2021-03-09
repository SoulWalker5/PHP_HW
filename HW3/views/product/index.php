<div class="row">
    <h1>Products</h1>
</div>
<table class="table personal-task text-white">
    <thead>
    <tr>
        <?php $attributes = array_flip($products[0]); ?>
        <?php foreach ($attributes as $value) { ?>
            <th>
                <?php echo $value; ?>
            </th>
        <?php } ?>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($products as $item) { ?>
        <tr>
            <?php foreach ($item as $value) { ?>
                <td style="padding-left: 15px">
                    <?php echo $value; ?>
                </td>
            <?php } ?>
        </tr>

    <?php } ?>
    </tbody>
</table>