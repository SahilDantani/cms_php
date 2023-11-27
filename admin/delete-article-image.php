<?php

require '../includes/init.php';

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {
    $articles = Article::getById($conn, $_GET['id']);

    if (!$articles) {
        die("article not found");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $previous_image = $articles->image_file;

        if ($articles->setImageFile($conn, null)) {
            if ($previous_image) {
                unlink("../uploads/$previous_image");
            }
            Url::redirect("/php_web/cms_php/admin/edit-article-image.php?id={$articles->id}");
        }
    }
} else {
    $articles = null;
}
?>

<?php require '../includes/header.php'; ?>

<h2>Delete article image</h2>
<?php if (!empty($articles->image_file) && file_exists(dirname(__DIR__) . "/uploads/{$articles->image_file}")) : ?>
    <img src="/php_web/cms_php/uploads/<?= htmlspecialchars($articles->image_file); ?>" style="height: 18rem;width: 18rem;" alt="img not available">
<?php else : ?>
    <p>Image not available</p>
<?php endif; ?>

<form method="post">
    <p>Are you sure?</p>
    <button>Delete</button>
    <a href="edit-article-image.php?id=<?= $articles->id; ?>">cancel</a>
</form>

<?php require '../includes/footer.php'; ?>