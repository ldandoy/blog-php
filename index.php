<?php 

    require_once "connexion.php"; 

    $msg = isset($_GET['msg']) ? $_GET['msg'] : false;

    $sql = "SELECT * FROM categories";
    $stmt = $link_mysql->query($sql);

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    /*echo "<pre>";
    var_dump($row);
    echo "</pre>";*/
?>
<?php require_once "_header.php"; ?>

<div class="container">
    <h1> Mon super blog !</h1>

    <?php if($msg) { ?>
        <div>
            <?php echo $msg; ?>
        </div>
    <?php } ?>

    <ul>
        <?php foreach ($row as $post) { ?>
            <li>
                <a href="category.php?category_id=<?php echo $post['id']; ?>">
                    <?php echo $post['label']; ?>
                </a>
            </li>
        <?php } ?>
    </ul>

</div>

<?php require_once "_footer.php"; ?>