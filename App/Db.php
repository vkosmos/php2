<?php

namespace App;

class Db
{
    protected $dbh;

    protected const HOST = 'localhost';
    protected const DBNAME = 'php2';
    protected const LOGIN = 'root';
    protected const PASSWORD = '';

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=' . static::HOST . ';dbname=' . static::DBNAME, static::LOGIN, static::PASSWORD);

        //Данная строчка внесена, чтобы справиться с ошибкой PDO при подстановке параметров в запросы с LIMIT
        $this->dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function query($sql, $params = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        if (null === $class){
            $sth->setFetchMode(\PDO::FETCH_ASSOC);
        }
        else {
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        }
        return $sth->fetchAll();
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

}
