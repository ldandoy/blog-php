<?php $msg = isset($_GET['msg']) ? $_GET['msg'] : false; ?>

<?php if($msg) { ?>
    <div class="alert">
        <?php echo $msg; ?>
    </div>
<?php } ?>