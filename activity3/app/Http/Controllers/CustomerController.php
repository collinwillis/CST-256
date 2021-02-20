<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Services\Business\SecurityService;

class CustomerController extends Controller
{
    // To obtain an instance of the current Http reauest from a post
    public function index(Request $request) 
    {
        
        $nextID = 0;
        return redirect('neworder')->with('nextID', $nextID)
                                   ->with('firstName', request()->get('firstName'))
                                   ->with('lastName', request()->get('lastName'));
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
