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
?>
<?php require_once "_header.php"; ?>
<div class="container">
    <h1> Page categorie: <?php echo $row['label']; ?></h1>

    <p><a class="btn" href="index.php">Retour</a></p>
</div>
<?php require_once "_footer.php"; ?>