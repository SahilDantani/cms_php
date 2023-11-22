<?php

require 'includes/database.php';
require 'includes/article.php';
require 'includes/url.php';

$conn = getDB();

if (isset($_GET['id'])) {
    $articles = getArticle($conn, $_GET['id'], 'id');

    if ($articles) {
        $id = $articles['id'];
    } else {
        die("article not found");
    }
} else {
    die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $sql = "DELETE FROM article
        WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {

        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            redirect("/php_web/cms_php/index.php");
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}
?>

<?php require'includes/header.php';?>
    <h2>Delete Article</h2>
    <form method="post">
        <p>Are you sure?</p>
        <button>Delete</button>
        <a href="article.php?id=<?=$articles['id']; ?>">Cancel</a>
    </form>
<?php require'includes/footer.php'; ?>
