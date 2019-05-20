<?php

// $username = 'root';
// $password = '';

// // $connection = new PDO( 'mysql:host=localhost;dbname=progressus', $username, $password );

// try {
//     $connection = new PDO("mysql:host=localhost;dbname=progressus", $username, $password);
//     // set the PDO error mode to exception
//     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully"; 
//     }
// catch(PDOException $e)
//     {
//     echo "Connection failed: " . $e->getMessage();
//     }

   
class Database extends PDO {
    //nombre base de datos
    private $dbname = "progressus";
    //nombre servidor
    private $host = "127.0.0.1";
    //nombre usuarios base de datos
    private $user = "root";
    //password usuario
    private $pass = '';
    //puerto postgreSql
    // private $port = 5432;
    private $dbh;
    //puerto postgreSql
    private $port = 5432;
    
    protected $transactionCounter = 0;

    //creamos la conexión a la base de datos prueba
    public function __construct() {
        try {
            $this->dbh = parent::__construct("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass); 
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// errores de sintaxis
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //función para cerrar una conexión pdo
    public function close_con() {
        $this->dbh = null;
    }

    public function beginTransaction() {
        if (!$this->transactionCounter++) {
            return parent::beginTransaction();
        }
        $this->exec('SAVEPOINT trans' . $this->transactionCounter);
        return $this->transactionCounter >= 0;
    }

    public function commit() {
        if (!--$this->transactionCounter) {
            return parent::commit();
        }
        return $this->transactionCounter >= 0;
    }

    public function rollback() {
        if (--$this->transactionCounter) {
            $this->exec('ROLLBACK TO trans' . $this->transactionCounter + 1);
            return true;
        }
        return parent::rollback();
    }
    
}

?>