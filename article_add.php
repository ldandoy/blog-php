<?php
    if ( !isset($_GET['category_id']) ) {
        header('Location:index.php?msg=category_id non présent !');
        exit(0);
    }

    $category_id = $_GET['category_id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once "connexion.php";

        $title = $_POST['title'];
        $content = $_POST['content'];
        $active = isset($_POST['active']) ? true : false;

        $sql = "INSERT INTO posts (`title`, `content`, `category_id`, `active`) VALUES (:title, :content, :caterory_id, :active)";
        $stmt = $link_mysql->prepare($sql);

        $stmt->execute([
            ":title"        => $title,
            ":content"      => $content,
            ":caterory_id"  => $category_id,
            ":active"       => $active
        ]);

        header('Location:category.php?category_id='.$category_id.'&msg=article bien créé !');
    }
?>
<?php require_once "_header.php"; ?>
<div class="container">
    <h1>Ajouter un article</h1>

    <form action="" method="POST">
        <div>
            <label for="title">Titre</label>
            <input class="field" id="title" name="title" />
        </div>
        <div>
            <label for="content">Content</label>
            <textarea class="field" id="content" name="content" rows="10"></textarea>
        </div>
        <div>
            <label for="active">Active</label>
            <input type="checkbox" id="active" name="active" />
        </div>
        <div>
            <input type="submit" name="send" value="Créer" />
        </div>
    </form>
    
    <p><a class="btn" href="category.php?category_id=<?php echo $category_id; ?>">Retour</a></p>
</div>
<?php require_once "_footer.php"; ?>