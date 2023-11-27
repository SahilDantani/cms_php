<?php

require '../includes/init.php';

Auth::requireLogin();

$conn = require'../includes/db.php';

$article = Article::getById($conn,$_POST['id']);

$publish_at = $article->publish($conn);
?><time><?= $publish_at ?></time>