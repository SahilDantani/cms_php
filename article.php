<?php

require 'includes/init.php';

$conn=require 'includes/db.php';

if (isset($_GET['id'])) {
$articles = Article::getWithCategories($conn,$_GET['id'],true);
} else {
    $articles = null;
}
?>

<?php require 'includes/header.php' ?>
<?php if ($articles) : ?>
            <article>
                <h2><?= htmlspecialchars($articles[0]['title']); ?></h2>
                <time datetime="<?= $articles[0]['publish_at'] ?>"><?php $datetime=new DateTime($article[0]['publish_at']); echo $datetime->format("j F, Y");  ?></time>
                <?php if($articles[0]['category_name']): ?>
                    <p>Categories:
                        <?php foreach($articles as $a): ?>
                            <?=htmlspecialchars($a['category_name']); ?>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
                <?php if (!empty($articles[0]['image_file']) && file_exists(__DIR__."/uploads/{$articles[0]['image_file']}")) : ?>
                    <img src="/php_web/cms_php/uploads/<?= htmlspecialchars($articles[0]['image_file']); ?>" style="height: 18rem;width: 18rem;" alt="img not available">
                <?php endif; ?>
                <p><?= htmlspecialchars($articles[0]['content']); ?></p>
            </article>

<?php else : ?>
    <p>Article not found.</p>
<?php endif; ?>
<?php require 'includes/footer.php' ?>