<?php

class Db
{
    private static $instance;
    private $pdo;
    private $log;

    private function __construct()
    {
    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function connect()
    {
        if (!$this->pdo) {
            $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=burgers', 'root', '');
        }

        return $this->pdo;
    }

    public function exec(string $str, array $params = [])
    {
        $this->connect();
        $query = $this->pdo->prepare($str);
        $ret = $query->execute($params);
        if(!$ret){
            if($query->errorCode()){
                trigger_error(json_encode($query->errorInfo()));
            }
            return false;
        }
    }

    public function fetch(string $str, array $params = [])
    {
        $this->connect();
        $query = $this->pdo->prepare($str);
        $ret = $query->execute($params);
        if(!$ret){
            if($query->errorCode()){
                trigger_error(json_enccode($query->errorInfo()));
            }
            return false;
        }
        return $query->fetch(PDO::FETCH_ASSOC);
    }

}