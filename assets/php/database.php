<?php 

class Database
{
    private $user, $host, $pass, $dbname, $status, $conn;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->dbname = 'guestbook';
        $this->pass = 'Qwerty@$12344';
        $this->status = false;

        $this->conn = $this->init();
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn = null;
    }

    public function getStatus()
    {
        return $this->status;
    }

    private function init()
    {
        try {
            $conn = new PDO("mysql:host=$this->host; dbname=". $this->dbname, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->status = true;

            return $conn;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}

?>