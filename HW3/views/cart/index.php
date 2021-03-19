<div class="row">
    <h1><?php if (isset($head)) echo $head ?></h1>
</div>

<table class="table personal-task text-white">
    <thead>
    <tr>
        <?php if (isset($cart)) $attributes = $cart[0]; ?>
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
    <?php foreach ($cart as $item) { ?>
        <form method="POST" action="/cart/setQuantity">
            <tr>
                <?php foreach ($item as $key => $value) { ?>

                    <td style="padding-left: 15px" <?php if ($key == 'id') echo 'hidden' ?>>
                        <?php if ($key == 'id') { ?>
                            <input name="id" hidden value="<?php echo $value; ?>">
                        <?php } ?>
                        <?php if ($key == 'quantity') { ?>
                            <input type="submit" hidden>
                            <input formaction="/cart/less" class="btn btn-warning" role="button" type="submit" value="-">
                            <!--                        --><?php //} ?>
                            <input class="text-center" style="width: 5em" name="quantity" type="number" min="1" max="1000" value="<?php echo $value; ?>">
                            <!--                        --><?php //if ($key == 'quantity') { ?>
                            <input formaction="/cart/more" class="btn btn-warning" role="button" type="submit" value="+">
                        <?php } else { ?>
                            <?php echo $value; ?>
                        <?php } ?>
                    </td>

                <?php } ?>
                <?php if (isset($_SESSION['loggedUser'])) { ?>
                    <td style="padding-left: 15px">
                        <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'user') { ?>
                            <a href="product/details/<?php echo $item['id'] ?>"
                               class="btn btn-primary" role="button">Details</a>
                            <button formaction="/cart/delete" class="btn btn-danger" type="submit">Delete</button>
                        <?php } ?>
                    </td>
                <?php } ?>
            </tr>
        </form>
    <?php } ?>
    </tbody>
</table>

<div class="row">
    <form method="POST">
        <button formaction="/checkout" class="btn btn-success" type="submit">Make order</button>
    </form>
</div>