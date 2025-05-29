<?php
    if ( !isset($_GET['article_id']) ) {
        header('Location:index.php?msg=article_id non présent !');
        exit(0);
    }

    require_once "connexion.php";

    $sql = "SELECT * FROM posts WHERE id = :article_id";
    $stmt = $link_mysql->prepare($sql);

    $stmt->execute([
        ":article_id" => $_GET['article_id']
    ]);

    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        header('Location:index.php?msg=article_id non trouvé !');
        exit(0);
    }
?>
<?php require_once "_header.php"; ?>
<div class="container">
    <div class="flex">
        <h1><?php echo $post['title']; ?></h1>
    </div>

    <div class="flex mb-40 gap-40">
        <div class="w-25">
            <img src="uploads/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>" />
        </div>
        <div class="w-45">
            <?php echo $post['content']; ?>
        </div>
    </div>

    <p><a class="btn" href="index.php">Retour</a></p>
</div>
<?php require_once "_footer.php"; ?>