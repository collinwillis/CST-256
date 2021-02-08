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
}
