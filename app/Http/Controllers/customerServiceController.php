<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Customer;
use App\Models\Employee;

class customerServiceController extends Controller
{
    //
    public function getSelaeRepByEmployee($id)
	{
        $customers = DB::table('customers')
        ->join('employees','customers.salesRepEmployeeNumber',"=",'employees.employeeNumber')
        //Customer::join('employees','customers.salesRepEmployeeNumber',"=",'employees.employeeNumber')
        ->where('employees.employeeNumber',$id)
        ->get(['customerNumber','customerName','salesRepEmployeeNumber',
               'employeeNumber','lastName','firstName','jobTitle']);
        return $customers;
    }

    public function getTotalEachOrderByCustomer($id)
    {
        /*
        $result = DB::table('customers')
        
        
        ->join('orders','orders.customerNumber', "=", 'customers.customerNumber')
        ->join('orderdetails','orderdetails.orderNumber', "=", 'orders.orderNumber')
        ->where('customers.customerNumber', $id)
        
        ->groupBy('orders.orderNumber')
        //->selectRaw('*, sum(orderdetails.priceEach)')
        ->get();
        */
        $result = DB::select(DB::raw(" 
        SELECT customers.customerNumber, 
        orders.orderNumber, orders.status
        FROM customers
            Join orders on orders.customerNumber = customers.customerNumber
            Join orderdetails on orderdetails.orderNumber = orders.orderNumber
        where customers.customerNumber = 103
        "
        ));

        return $result;
    }
}
