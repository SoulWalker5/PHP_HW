<div class="row mb-5">
    <h1>Export</h1>
</div>
<?php if (isset($export)) { ?>
    <div class="row mb-2">
        <h2>Export was successful</h2>
        <a href="../../<?php echo $export ?>" download>Here your file</a>
    </div>
<?php } ?>

<?php
//header('Content-Type: text/csv');
//header("Content-Disposition: attachment; filename=$export");
?>
