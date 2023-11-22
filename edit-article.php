<?php

require 'includes/database.php';
require 'includes/article.php';
require 'includes/url.php';

$conn = getDB();

if (isset($_GET['id'])) {
    $articles = getArticle($conn, $_GET['id']);

    if ($articles) {
        $id = $articles['id'];
        $title = $articles['title'];
        $content = $articles['content'];
        $publish_at = $articles['publish_at'];
    } else {
        die("article not found");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = $_POST['title'];
        $content = $_POST['content'];
        $publish_at = $_POST['publish_at'];

        $errors = validateArticle($title, $content, $publish_at);

        if (empty($errors)) {

            $sql = "UPDATE article
                    SET title = ?,
                        content = ?,
                        publish_at = ?
                        WHERE id = ?";

            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt === false) {
                echo mysqli_error($conn);
            } else {
                if ($publish_at == '') {
                    $publish_at = null;
                }
                mysqli_stmt_bind_param($stmt, "sssi", $title, $content, $publish_at, $id);

                if (mysqli_stmt_execute($stmt)) {
                    redirect("/php_web/cms_php/article.php?id=$id");
                } else {
                    echo mysqli_stmt_error($stmt);
                }
            }
        }
    }
} else {
    $articles = null;
}
?>

<?php require 'includes/header.php'; ?>

<h2>Edit Article</h2>
<?php require 'includes/article-form.php'; ?>


<?php require 'includes/footer.php'; ?>