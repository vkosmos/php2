<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=php2', 'root', '');
    }

    public function query($sql, $params = [], $class = '')
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        if (null === $class){
            $sth->setFetchMode(\PDO::FETCH_ASSOC);
        }
        else {
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        }
        $data = $sth->fetchAll();

        return $data;
    }



}
