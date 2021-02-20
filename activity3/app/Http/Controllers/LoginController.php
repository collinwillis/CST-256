<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
{
    // To obtain an instance of the current Http reauest from a post
    public function index(Request $request) 
    {
        //Test the form variables being passed in.
        $this->validateForm($request);
        // Create a userModel with username and password
        $credentials = new UserModel(request()->get('user_name'), request()->get('password'));
        
        //Instantiate the Business Logic Layer
        $serviceLogin = new SecurityService();
        //Pass the credentials to the business layer
        $isValid = $serviceLogin->login($credentials);
        
        if($isValid)
        {
            return view('loginPassed2');
        }
        else 
        {
            return view('loginFailed');
        }
    }
    
    // Validation added for Activity 3
    private function validateForm(Request $request) 
    {
        //Setup Data Validation Rules for Login Form
        $rules = ['user_name' => 'Required | Between: 4, 10 | Alpha',
            'password'=> 'Required | Between: 4, 10'];
        
        //Run the data validation rules
        $this->validate($request, $rules);
        
    }
}
