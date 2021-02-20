<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Carbon\Exceptions\Exception;

class SecurityDAO{
    
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbname = "activity2";
    private $port = "8889";
    private $dbQuery;
    
    //Constructor that creates a connection with the database
    public function __construct()
    {
        // Create a connection to the database
        $this->conn  = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        //Make sure to always test the connection and see if there are any errors
        
    }
    
    public function findByUser(UserModel $credentials) 
    {
        try 
        {
            // Define the query to search the database for the credentials
            $this->dbQuery = "SELECT Username, Password
                              FROM user
                              WHERE Username = '{$credentials->getUsername()}'
                                AND Password = '{$credentials->getPassword()}'";
            
            $result = mysqli_query($this->conn, $this->dbQuery);
            
            if(mysqli_num_rows($result) > 0)
            {
              mysqli_free_result($result);
              mysqli_close($this->conn);
              return true;  
            }
            else 
            {
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return false;
            }
        } catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }


}