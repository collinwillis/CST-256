<?php 
namespace App\Services\Business;

use \App\Models\UserModel;
use \App\Services\Data\SecurityDAO;
use \App\Models\CustomerModel;
use \App\Services\Data\CustomerDAO;
use \App\Services\Data\OrderDAO;
use App\Services\Data\Utility\DBConnect;

class SecurityService 
{
    //Deine the properties
    private $verifyCred;
    private $addNewCustomer;
    
    // Method that will pass credentials to the data access layer
    public function login(UserModel $credentials) 
    {
        // Instantiate the DAO
        $this->verifyCred = new SecurityDAO();
        
        //Return true or false by passing the credentials to the object
        return $this->verifyCred->findByUser($credentials);
    }
    
    public function addCustomer(CustomerModel $customerData) 
    {
        $this->addNewCustomer = new CustomerDAO();
        return $this->addNewCustomer->addCustomer($customerData);
    }
    
    public function addOrder(string $product, int $customerID)
    {
        $this->addNewOrder = new OrderDAO();
        return $this->addNewOrder->addOrder($product, $customerID);
    }
    
    //Manage ACID Transactions
    public function addAllInformation(string $product, int $customerID, CustomerModel $customerData) 
    {
       //Create a connection to the database
       //Create an instance of the class
       $conn = new DBConnect("activity3");
       
       //Call the method to make the connection
       $dbObj = $conn->getDbConnect();
       
       //Turn off Auto Commit
       $conn->setDbAutocommitFalse();
       
       //Begin the Transaction
       $conn->beginTransaction();
       
       //Instantiate the Data Access Layer
       $this->addNewCustomer = new CustomerDAO($dbObj);
       
       // Get Next Customer ID
       $customerID = $this->addNewCustomer->getNextID();
       
       //Add Customer Data
       $isSuccessful = $this->addNewCustomer->addCustomer($customerData);
       
       //Instantiate the Data Access Layer for The Order
       $this->addNewOrder = new OrderDAO($dbObj);
       //Add the Product Order Data
       $isSuccessfulOrder = $this->addNewOrder->addOrder($product, $customerID);
       
       if($isSuccessful && $isSuccessfulOrder)
       {
           $conn->commitTransaction();
           return true;
       }
       else
       {
           $conn->rollbackTransaction();
           return false;
       }
    }
}



?>