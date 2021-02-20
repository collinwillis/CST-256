<?php
namespace App\Services\Data\Utility;

use mysqli;

class DBConnect{
    
    private $conn;
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $port;
    private $dbQuery;
    
    //Constructor that creates a connection with the database
    public function __construct(string $dbname)
    {
        $this->dbname = $dbname;
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
    }
    
    public function getDbConnect() 
    {
        //OOP
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        
//        Procedural
//        $this->conn  = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
//        Scope Resolution
//        Only use when you are connecting within the same class as the SQL queries.
//        $this->conn = mysqli::connect($this->servername, $this->username, $this->password, $this->dbname);
        
        
        if($this->conn->connect_error)
        {
            echo "Failed to connect to MySQL: " . $this->conn->connect_error;
            exit();
        }
        return($this->conn);
    }
    
    /*
     * Turn ON Autocommit
     */
    public function setDbAutocommitTrue() 
    {
        $this->conn->autocommit(TRUE);
    }
    
    /*
     * Turn OFF Autocommit
     */
    public function setDbAutocommitFalse()
    {
        $this->conn->autocommit(FALSE);
    }
    
    /*
     * Close the connection
     */
    public function closeDbConnect() {
        $this->conn->close();
    }
    
    /*
     * Begin a Transaction
     */
    public function beginTransaction() 
    {
        $this->conn->begin_transaction();
    }
    
    /*
     * Commit a Transaction
     */
    public function commitTransaction() 
    {
        $this->conn->commit();
    }
    
    /*
     * Rollback a Transaction
     */
    public function rollbackTransaction() 
    {
        $this->conn->rollback();
    }



}