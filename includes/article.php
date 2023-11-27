<?php
function getArticle($conn, $id, $columns = '*' )
{
    $sql = "SELECT $columns
                FROM article
                WHERE id = :id";

    $stmt = $conn->prepare($sql);
   
    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
}

function validateArticle($title, $content, $publish_at)
{
    $errors = [];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $publish_at = $_POST['publish_at'];

    if ($title == '') {
        $errors[] = 'Title is required';
    }
    if ($content == '') {
        $errors[] = 'Content is required';
    }
    if ($publish_at != '') {
        $date_time = date_create_from_format('Y-m-d\TH:i', $publish_at);
        if ($date_time == false) {
            $errors[] = 'Invalid date and time';
        } else {
            $date_errors = date_get_last_errors();
            if ($date_errors['warning_count'] > 0) {
                $errors[] = 'Invalid date and time';
            }
        }
    }
    return $errors;
}
