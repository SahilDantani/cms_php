<?php

require '../includes/init.php';

$conn=require '../includes/db.php';

if (isset($_GET['id'])) {
    $articles = Article::getById($conn,$_GET['id']);

    if(!$articles){
        die("article not found");
    }

    $category_ids = array_column($articles->getCategories($conn), 'id');
    $categories = Category::getAll($conn);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $articles->title = $_POST['title'];
        $articles->content = $_POST['content'];
        $articles->publish_at = $_POST['publish_at'];

        $category_ids=$_POST['category']??[];
       

           if($articles->update($conn)) {
                    $articles->setCategory($conn,$category_ids);
                    Url::redirect("/php_web/cms_php/admin/article.php?id={$articles->id}");
            } 
        }
    
} else {
    $articles = null;
}
?>

<?php require '../includes/header.php'; ?>
<h2>Edit Article</h2>
<?php require 'includes/article-form.php'; ?>


<?php require '../includes/footer.php'; ?>