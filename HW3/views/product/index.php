<div class="row">
    <h1><?php if (isset($head)) echo $head ?></h1>
</div>
<?php if ($_SESSION['role'] == 'admin') { ?>
    <div class="row">
        <a href="product/create" class="btn btn-success" role="button">Add new product</a>
    </div>
<?php } ?>
<table class="table personal-task text-white">
    <thead>
    <tr>
        <?php if (isset($products)) $attributes = $products[0]; ?>
        <?php foreach ($attributes as $key => $value) { ?>
            <th <?php if ($key == 'id') echo 'hidden' ?>>
                <?php echo ucfirst($key); ?>
            </th>

        <?php } ?>
            <th>
                Operations
            </th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($products as $item) { ?>
        <form id="<?php echo $item['id'] . $item['title'] ?>" method="POST">
            <tr>
                <?php foreach ($item as $key => $value) { ?>

                    <td style="padding-left: 15px" <?php if ($key == 'id') echo 'hidden' ?>>
                        <?php if ($key == 'id') { ?>
                            <input name="id" hidden value="<?php echo $value; ?>">
                        <?php } ?>
                        <input <?php if($key == 'price' || $key == 'amount'){ ?>
                            type="number" min="1" max="1000"
                        <?php } else { ?>
                            type="text"
                                <?php  } ?>
                            value="<?php echo $value; ?>"
                            <?php if(!$_SESSION['role'] == 'admin') {?> disabled <?php }?> >
                    </td>

                <?php } ?>
                    <td style="padding-left: 15px">
                            <a href="product/details/<?php echo $item['id'] ?>"
                               class="btn btn-primary" role="button">Details</a>

                        <?php if (isset($_SESSION['loggedUser'])) { ?>
                        <button formaction="/cart/add" class="btn btn-primary" role="button" type="submit">Add
                        </button>

                        <?php if ($_SESSION['role'] == 'admin') { ?>
                            <button id="editProduct" class="btn btn-warning">Edit</button>
                            <button id="deleteProduct" class="btn btn-danger">Delete</button>
                        <?php } ?>
                    </td>
                <?php } ?>
            </tr>
        </form>
    <?php } ?>
    </tbody>
</table>