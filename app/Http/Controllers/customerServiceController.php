<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Customer;
use App\Models\Employee;

class customerServiceController extends Controller
{
    //
    public function getSelaeRepByUser($id)
	{
        $customers = DB::table('customers')
        ->join('employees','customers.salesRepEmployeeNumber',"=",'employees.employeeNumber')
        //Customer::join('employees','customers.salesRepEmployeeNumber',"=",'employees.employeeNumber')
        ->where('employees.employeeNumber',$id)
        ->get(['customerNumber','customerName','salesRepEmployeeNumber',
               'employeeNumber','lastName','firstName','jobTitle']);
        return $customers;
    }

    public function getListUsersByEmployee($id)
    {
        $employees = Employee::find($id);
        $customers = $employees->SupportUsers;
        return $customers;
    }
}
