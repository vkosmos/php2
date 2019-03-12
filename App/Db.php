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
        $sth->setFetchMode(\PDO::FETCH_ASSOC);
        $data = $sth->fetchAll();

        if (null === $class){
            return $data;
        }

        $ret = [];
        foreach ($data as $row) {
            $obj = new $class;
            foreach ($row as $name => $value) {
                $obj->$name = $value;
            }
            $ret[] = $obj;
        }

        return $ret;
    }



}
