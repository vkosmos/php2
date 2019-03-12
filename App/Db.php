<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=localhost;dbname=php2', 'root', '');
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
        $data = $sth->fetchAll();

        return $data;
    }

    public function queryN($sql, $data = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(1, $data[0], \PDO::PARAM_INT);
        $sth->execute();

        if (null === $class){
            $sth->setFetchMode(\PDO::FETCH_ASSOC);
        }
        else {
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        }
        $data = $sth->fetchAll();

        return $data;
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

}
