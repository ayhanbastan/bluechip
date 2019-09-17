<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\CustomerDefination;
use App\Models\Departman;

class BudgetController extends Controller
{
    public function create()
    {
        $customers  = CustomerDefination::all();
        $departmans = Departman::all();
        return view('budget.create',compact('customers','departmans'));
    }
}
