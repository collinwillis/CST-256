<?php
namespace App\Services\Data;

use App\Models\CustomerModel;
use Carbon\Exceptions\Exception;
use App\Services\Data\Utility\DBConnect;

class OrderDAO{
    
    private $connObject;
    private $dbname = "activity3";
    private $dbQuery;
    private $connection;
    private $dbObj;
    //Constructor that creates a connection with the database
    public function __construct($dbObj)
    {
        $this->dbObj = $dbObj;
    }
    
    public function addOrder(string $product, int $customerID) 
    {
        try 
        {
            
            // Define the query to search the database for the credentials
            $this->dbQuery = @"INSERT INTO `order`
                                (Product, CustomerID)
                                VALUES
                                ('".$product."',".$customerID.")";
           
            
            if($this->dbObj->query($this->dbQuery))
            {
              return true;  
            }
            else 
            {
              return false;
            }
        } catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }


}