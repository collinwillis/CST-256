<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Services\Business\SecurityService;

class OrderController extends Controller
{

    // To obtain an instance of the current Http reauest from a post
    public function index(Request $request)
    {
        $customerData = new CustomerModel($request->input('firstName'), $request->input('lastName'));
        

        // Since we are not using a model
        $product = request()->get('product');
        // This is more efficient it is not calling a method
        $customerID = $request->input('customerID');

        // Create an instance of the security service
        $serviceCustomer = new SecurityService();

        // Pass the credentials to the business layer
        $isValid = $serviceCustomer->addAllInformation($product, $customerID, $customerData);

        if ($isValid) {
            echo ("Order Data Comitted Successfully");
        } else {
            echo ("Order Data Was Rolled Back");
        }

        return view('order');
    }

    // Validation added for Activity 3
    private function validateForm(Request $request)
    {
        // Setup Data Validation Rules for Login Form
        $rules = [
            'user_name' => 'Required | Between: 4, 10 | Alpha',
            'password' => 'Required | Between: 4, 10'
        ];

        // Run the data validation rules
        $this->validate($request, $rules);
    }
}
