<?php

require 'includes/database.php';
require 'includes/article.php';
require 'includes/url.php';
require 'includes/auth.php';

session_start();
if(!isLoggedIn()){
    die('anauthorised');
}

$errors = [];
$title = '';
$content = '';
$publish_at = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $publish_at = $_POST['publish_at'];

    $errors = validateArticle($title,$content,$publish_at);

    if (empty($errors)) {
        $conn =  getDB();

        $sql = "INSERT INTO article(title,content,publish_at)
                VALUES (?,?,?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {
            echo mysqli_error($conn);
        } else {
            if($publish_at==''){
                $publish_at = null;
            }
            mysqli_stmt_bind_param($stmt, "sss", $title, $content, $publish_at);

            if (mysqli_stmt_execute($stmt)) {
                $id = mysqli_insert_id($conn);
                redirect("/php_web/cms_php/article.php?id=$id");
               
            } else {
                echo mysqli_stmt_error($stmt);
            }
        }
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>New Article</h2>
<?php require'includes/article-form.php'; ?>


<?php require 'includes/footer.php'; ?>