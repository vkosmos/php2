<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$data = Article::findN(3);
include(__DIR__ . '/templates/index.php');
