<?php
namespace App\Services\Data;

use App\Models\CustomerModel;
use Carbon\Exceptions\Exception;
use App\Services\Data\Utility\DBConnect;

class CustomerDAO
{

    private $connObject;

    private $dbname = "activity3";

    private $dbQuery;

    private $connection;

    private $dbObj;

    // Constructor that creates a connection with the database
    public function __construct($dbObj)
    {
        $this->dbObj = $dbObj;
    }

    public function addCustomer(CustomerModel $customerData)
    {
        try {

            // Define the query to search the database for the credentials
            $this->dbQuery = "INSERT INTO Customer
                                (FirstName, LastName)
                                VALUES
                                ('{$customerData->getFirstName()}', '{$customerData->getLastName()}')";

            if ($this->dbObj->query($this->dbQuery)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getNextID()
    {
        try {
            $this->dbQuery = "SELECT CustomerID FROM customer ORDER BY CustomerID DESC Limit 0,1";
            $result = $this->dbObj->query($this->dbQuery);
            while ($row = mysqli_fetch_array($result)) 
            {
                return $row['CustomerID'] + 1;
            }
        } catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }
}