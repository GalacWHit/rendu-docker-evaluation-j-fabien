<?php
$servername = "database";
$username = "db_client";
$password = "password";
$dbname = "docker_doc_dev";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->query("SELECT * FROM article");
    $articles = $stmt->fetchAll();

    echo "<h1>Articles</h1>";
    foreach ($articles as $article) {
        echo "<h2>" . htmlspecialchars($article['title']) . "</h2>";
        echo "<p>" . htmlspecialchars($article['body']) . "</p>";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
