<?php

class database
{
    public $connection;

    // public $table="users";
    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->connection = new PDO('mysql:host=localhost;dbname=project', 'mumo', 'root');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
//    public function settable($table){
//        $this->table=$table;
//    }
    public function fetchdata($tables)
    {
        $stat = $this->connection->prepare("select*from  $tables");
        $stat->execute();
        $result = $stat->fetchAll();
        return $result;

    }

    public function insertdata($table, $parameters)
    {
        $sql = sprintf("insert into %s (%s)values (%s)",
            $table,
            implode(",", array_keys($parameters)),
            ":" . implode(",:", array_keys($parameters))
        );
        try {

            $stmt = $this->connection->prepare($sql);
            $stmt->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }

    }

    function delete($table, $value)
    {
        $sql2 = sprintf("delete from %s where %s = %s",
            $table,
            implode(",", array_keys($value)),
            ":" . implode(",:", array_keys($value))
        );
        try {
            $stmt = $this->connection->prepare($sql2);
            $stmt->execute($value);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function update($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("update $table set name=:name,sname=:sname,no=:no where id=:id");
            $stmt->execute($post);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function update_law($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("update $table set lawyer=:lawyer where id=:id");
            $stmt->execute($post);

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function login($table, $post)
    {
        try {
            $stmt = $this->connection->prepare("select * from $table where username=:username and password=:password");
            $stmt->execute($post);
//            $result = $stmt->rowCount();
            $result=$stmt->fetchall();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function admin_login($table, $post){
        try {
            $stmt = $this->connection->prepare("select * from $table where username=:username and password=:password");
            $stmt->execute($post);
            $result = $stmt->rowCount();
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

$dbcon = new database();

