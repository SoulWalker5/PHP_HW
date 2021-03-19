<div class="row mb-5">
    <h1>Create product</h1>
</div>

<form name="createProduct" method="POST">
    <div class="form-input">
        <input type="text" name="title" class="form-control" required placeholder="Title">
    </div>
    <div class="form-input">
        <input type="number" min="0" step="0.01" name="price" class="form-control" required placeholder="Price">
    </div>
    <div class="form-input">
        <input type="number" min="0" step="1" name="amount" class="form-control" required placeholder="Amount">
    </div>
    <div class="form-input">
        <input type="text" name="description" class="form-control" placeholder="Description">
    </div>
    <button class="btn btn-primary mt-4 signup" type="submit">Create</button>
</form>