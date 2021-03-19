<div class="row">
    <h1><?php if (isset($head)) echo $head ?></h1>
</div>
<table class="table personal-task text-white">
    <thead>
    <tr>
        <?php if (isset($products)) $attributes = $products[0]; ?>
        <?php foreach ($attributes as $key => $value) { ?>
            <th <?php if ($key == 'id') echo 'hidden' ?>>
                <?php echo ucfirst($key); ?>
            </th>

        <?php } ?>
        <?php if (isset($_SESSION['loggedUser'])) { ?>
            <th>
                Operations
            </th>
        <?php } ?>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($products as $item) { ?>
        <form method="POST">
            <tr>
                <?php foreach ($item as $key => $value) { ?>

                    <td style="padding-left: 15px" <?php if ($key == 'id') echo 'hidden' ?>>
                        <?php if ($key == 'id') { ?>
                            <input name="id" hidden value="<?php echo $value; ?>">
                        <?php } ?>
                        <?php echo $value; ?>
                    </td>

                <?php } ?>
                <?php if (isset($_SESSION['loggedUser'])) { ?>
                    <td style="padding-left: 15px">
                        <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user') { ?>
                            <a href="product/details/<?php echo $item['id'] ?>"
                               class="btn btn-primary" role="button">Details</a>
                            <button formaction="/cart/add" class="btn btn-primary" role="button" type="submit">Add
                            </button>

                        <?php } ?>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
                            <a href="product/update/<?php echo $item['id'] ?>"
                               class="btn btn-warning" role="button">Edit</a>
                            <a href="product/delete/<?php echo $item['id'] ?>"
                               class="btn btn-danger" role="button">Delete</a>
                        <?php } ?>
                    </td>
                <?php } ?>
            </tr>
        </form>
    <?php } ?>
    </tbody>
</table>