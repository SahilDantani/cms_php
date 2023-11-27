<?php

require '../includes/init.php';

Auth::requireLogin();

$category_ids = [];
$conn=require '../includes/db.php';
$categories = Category::getAll($conn);

$articles = new Article();

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $articles->title = $_POST['title'];
    $articles->content = $_POST['content'];
    $articles->publish_at = $_POST['publish_at'];

    $category_ids=$_POST['category']??[];

       if($articles->create($conn)) {
                $articles->setCategory($conn,$category_ids);
                Url::redirect("/php_web/cms_php/admin/article.php?id={$articles->id}");
        } 
}
?>

<?php require '../includes/header.php'; ?>

<h2>New Article</h2>
<?php require'includes/article-form.php'; ?>


<?php require '../includes/footer.php'; ?>