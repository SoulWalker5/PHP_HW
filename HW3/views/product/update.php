<div class="row mb-5">
    <h1>Update product</h1>
</div>
<?php if (isset($product)) { ?>
<!--    --><?php //foreach ($product as $value) { ?>

        <form name = "createProduct" method = "POST" >
        <input hidden name = "id" class="form-control" value = "<?php echo $product['id'] ?>" >
        <div class="form-input" >
            <input type = "text" name = "title" class="form-control" required value = "<?php echo $product['title'] ?>" >
        </div >
        <div class="form-input" >
            <input type = "number" name = "price" class="form-control" required value = "<?php echo $product['price'] ?>" >
        </div >
        <div class="form-input" >
            <input type = "number" name = "amount" class="form-control" required value = "<?php echo $product['amount'] ?>" >
        </div >
        <div class="form-input" >
            <input type = "text" name = "description" class="form-control" value = "<?php echo $product['description'] ?>" >
        </div >
        <button class="btn btn-primary mt-4 signup" type = "submit" > Update</button >
    </form >
<!--                    --><?php //} ?>

<?php } ?>
