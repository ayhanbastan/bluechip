<?php
declare( strict_types = 1 );

namespace App\Http\Controllers;

use App\Models\CustomerDefination;

class TestController extends Controller
{
    public function test()
    {
        $customers = CustomerDefination::all();
       return view("test.test",compact('customers'));
    }
}