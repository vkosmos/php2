<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$article = null;

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $article = Article::findById($id)[0];
}

include __DIR__ . '/templates/article.php';
