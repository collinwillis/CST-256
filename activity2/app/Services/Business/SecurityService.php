<?php 
namespace App\Services\Business;

use \App\Models\UserModel;
use \App\Services\Data\SecurityDAO;

class SecurityService 
{
    //Deine the properties
    private $verifyCred;
    
    // Method that will pass credentials to the data access layer
    public function login(UserModel $credentials) 
    {
        // Instantiate the DAO
        $this->verifyCred = new SecurityDAO();
        
        //Return true or false by passing the credentials to the object
        return $this->verifyCred->findByUser($credentials);
    }
}



?>