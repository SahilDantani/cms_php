<?php

require 'includes/database.php';
require 'includes/article.php';
$conn = getDB();

if (isset($_GET['id'])) {
    $articles = getArticle($conn, $_GET['id']);
} else {
    $articles = null;
}
?>

<?php require 'includes/header.php' ?>
<?php if ($articles === null) : ?>
    <p>Article not found.</p>
<?php else : ?>
    <ul>
        <li>
            <article>
                <h2><?= htmlspecialchars($articles['title']); ?></h2>
                <p><?= htmlspecialchars($articles['content']); ?></p>
            </article>
        </li>
    </ul>
    <a href="edit-article.php?id=<?= $articles['id']; ?>">Edit</a>
    <a href="delete-article.php?id=<?= $articles['id']; ?>">Delete</a>
<?php endif; ?>
<?php require 'includes/footer.php' ?>