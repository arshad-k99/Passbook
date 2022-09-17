<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassList;
use App\Models\Transactions;

class ClassController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {

        $deposit_amount = Transactions::where('transaction_type',1)->sum('amount');

        $withdrwal_amount = Transactions::where('transaction_type',2)->sum('amount');

        $account_balance = $deposit_amount - $withdrwal_amount;

        return view('dashboard',compact('account_balance','deposit_amount','withdrwal_amount'));
    }
    public function index(Request $request)
    {

        
        $class_lists = ClassList::orderBy('name', 'asc')
                ->orderBy('division', 'asc')->get();



        return view('add-class',compact('class_lists'));

    }
    public function store(Request $request)
    {

        $class_ex_check = ClassList::where('name',$request->class)->where('division',$request->division)->first();

        if(!isset($class_ex_check)){

            ClassList::insert([
            'name' => $request->class,
            'division' => $request->division,
            ]);

        }
        
        $class_lists = ClassList::orderBy('name', 'asc')
                ->orderBy('division', 'asc')->get();



        return view('add-class',compact('class_lists'));

    }
}
