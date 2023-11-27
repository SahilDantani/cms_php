<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require '../includes/db.php';

if (isset($_GET['id'])) {
    $articles = Article::getWithCategories($conn, $_GET['id']);
} else {
    $articles = null;
}
?>

<?php require '../includes/header.php' ?>
<?php if ($articles) : ?>
    <ul>
        <li>
            <article>
                <h2><?= htmlspecialchars($articles[0]['title']); ?></h2>
                <?php if($articles[0]['publish_at']): ?>
                            <time><?= $articles[0]['publish_at'] ?></time>
                        <?php else: ?>
                            Unpublished
                        <?php endif; ?>
                <?php if ($articles[0]['category_name']) : ?>
                    <p>Categories:
                        <?php foreach ($articles as $a) : ?>
                            <?= htmlspecialchars($a['category_name']); ?>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
                <p><?= htmlspecialchars($articles[0]['content']); ?></p>

                <?php if(!empty($articles[0]['image_file'])) :  ?>
                    <img src="/php_web/cms_php/uploads/<?= htmlspecialchars($articles[0]['image_file']); ?>" style="height: 18rem;width: 18rem;" alt="img not available">
                <?php endif; ?>
            </article>
        </li>
    </ul>
    <a href="edit-article.php?id=<?= $articles[0]['id']; ?>">Edit</a>
    <a class="delete" href="delete-article.php?id=<?= $articles[0]['id']; ?>">Delete</a>
    <a href="edit-article-image.php?id=<?= $articles[0]['id']; ?>">Edit Image</a>
<?php else : ?>
    <p>Article not found.</p>
<?php endif; ?>
<?php require '../includes/footer.php' ?>