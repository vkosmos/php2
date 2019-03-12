<?php

function __autoload($class)
{
    $file = str_replace('\\', '/', $class) . '.php';
    require __DIR__ . '/' .$file;
}


function debug($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}