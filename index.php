<?php

use App\Models\Article;
use App\Models\User;

require __DIR__ . '/autoload.php';

//$data = Article::findAll();
$data = Article::findN(3);

include(__DIR__ . '/templates/index.php');
