<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Employee;

class customerServiceController extends Controller
{
    //
    public function getSelaeRepByUser($id)
	{
        $customer = Customer::where('customerNumber', 103)->get();
        $employee = $customer->salesrep;
        return $employee;
    }

    public function getListUsersByEmployee($id)
    {
        $employees = Employee::find($id);
        $customers = $employees->SupportUsers;
        return $customers;
    }
}
