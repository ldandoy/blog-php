<?php

$db_host = "localhost";
$db_name = "blog-php";
$db_user = "root";
$db_password = "";

try {
    $link_mysql = new PDO(
        "mysql:host=$db_host;dbname=$db_name",
        $db_user,
        $db_password
    );

    $link_mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connexion réussie !";
} catch (PDOException $error) {
    echo "<p>Erreur de connxion: " . $error->getMessage() . "</p>";
    exit(0);
}
