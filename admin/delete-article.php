<?php

require '../includes/init.php';

Auth::requireLogin();

$conn=require '../includes/db.php';

if (isset($_GET['id'])) {
    $articles = Article::getById($conn, $_GET['id']);

    if (!$articles) {
        die("article not found");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if ($articles->delete($conn)) {
            Url::redirect("/php_web/cms_php/admin/index.php");
        }
    }
}
?>

<?php require '../includes/header.php'; ?>
<h2>Delete Article</h2>
<form method="post">
    <p>Are you sure?</p>
    <button>Delete</button>
    <a href="article.php?id=<?= $articles->id; ?>">Cancel</a>
</form>
<?php require '../includes/footer.php'; ?>