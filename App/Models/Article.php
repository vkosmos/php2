<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    protected const TABLE = 'news';

    public $title;
    public $content;

    public static function findN(int $number)
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY ID DESC LIMIT ?';
        $params[] = $number;

        $data = $db->queryN(
            $sql,
            $params,
            static::class
        );

        return $data;
    }
}

