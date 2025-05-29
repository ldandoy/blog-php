<?php
    if ( !isset($_GET['category_id']) ) {
        header('Location:index.php?msg=category_id non présent !');
        exit(0);
    }

    require_once "connexion.php";

    $sql = "SELECT * FROM categories WHERE id = :caterory_id";
    $stmt = $link_mysql->prepare($sql);

    $stmt->execute([
        ":caterory_id" => $_GET['category_id']
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        header('Location:index.php?msg=category_id non trouvé !');
        exit(0);
    }

    $sql2 = "SELECT * FROM posts WHERE category_id = :category_id AND active = :active";
    $stmt2 = $link_mysql->prepare($sql2);

    $stmt2->execute([
        ":category_id"  => $_GET['category_id'],
        ":active"       => 1
    ]);

    $posts = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
<?php require_once "_header.php"; ?>
<div class="container">
    <div class="flex">
        <h1> Page categorie: <?php echo $row['label']; ?></h1>
        <a class="btn" href="article_add.php?category_id=<?php echo $row['id']; ?>">Ajouter un artticle</a>
    </div>

    <?php require_once "_alert.php"; ?>

    <div class="posts">
        <?php if (count($posts) > 0) { ?>

            <?php foreach ($posts as $post) { ?>
                <div class="post">
                    <h2><?php echo $post['title']; ?></h2>
                    <p class="text-end">
                        <a class="btn" href="article.php?article_id=<?php echo $post['id']; ?>">Voir l'article</a>
                    </p>
                </div>
            <?php } ?>
        <?php } else { ?>
            Il n'y a pas d'article dans cette catégorie
        <?php }?>
    </div>

    <p><a class="btn" href="index.php">Retour</a></p>
</div>
<?php require_once "_footer.php"; ?>