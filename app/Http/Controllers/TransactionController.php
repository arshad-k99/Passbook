<?php

namespace App\Http\Controllers;
use App\Models\ClassList;
use App\Models\User;
use Illuminate\Http\Request;
use Log;
use Validator; // <------
use Redirect;
use App\Models\Transactions;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index(Request $request)
    {


        $class_list = ClassList::orderBy('name', 'asc')
                ->distinct()->get('name');

        $students_list = User::where('role',2)->orderBy('class','ASC')->orderBy('division','ASC')->get();        

        return view('transaction-search',compact('class_list','students_list'));
    }
    public function search(Request $request)
    {

        //if($request->name == '' && $request->class_name = '' && $request->division = ''){ 

            $students_list = User::where('role',2)->where('name', 'LIKE', '%'.$request->name.'%')
                            ;
            if($request->class_name != ''){

                $students_list = $students_list->Where('class', $request->class_name);

            }

            if(isset($request->division)){

                Log::info($request);

                $students_list = $students_list->Where('division', $request->division);

            }

            $students_list = $students_list->orderBy('class','ASC')->orderBy('division','ASC')->get();

            Log::info($request->name);
        //}
        
        return response()->json($students_list);

        


    }
    public function create(Request $request)
    {

        

        $user_details = User::where('id',$request->id)->first();

        $deposit_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$request->id)->where('transaction_type',1)->sum('amount');

        $withdrawal_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$request->id)->where('transaction_type',2)->sum('amount');

        $account_balance = $deposit_amount - $withdrawal_amount;

       // dd($account_balance);

        return view('transaction-create',compact('user_details','account_balance'));


    }
    public function store(Request $request)
    {
        //dd($request);

         $validator = Validator::make($request->all(), [ // <---
            'amount' => 'required|numeric',
            
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        


        $user_details = User::where('id',$request->user_id)->first();

        $deposit_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$request->user_id)->where('transaction_type',1)->sum('amount');

        $withdrawal_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$request->user_id)->where('transaction_type',2)->sum('amount');

        $account_balance = $deposit_amount - $withdrawal_amount;

        if($request->transaction_type == 2){

            if( $account_balance < $request->amount){ 


            return Redirect::back()->with('error', 'Account does not have sufficient balance');

            }

        }



        $transaction = new Transactions;

        $transaction->user_id = $request->user_id;
        $transaction->transaction_type = $request->transaction_type;
        $transaction->amount = $request->amount;
        $transaction->save();

    

        



        return redirect()->route('transaction-create', $request->user_id)->with('message', 'Transaction Successfully Added!
');



    }

    public function list(){


        $transaction_list = Transactions::select('transactions.user_id','transactions.id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id');


       

        $transaction_list = $transaction_list->get();

        $class_list = ClassList::orderBy('name', 'asc')
                ->distinct()->get('name');

        $old_value = ['name' => '','class_name' => '','division' => '','from_date' => '','to_date' => ''];

        return view('transaction-list',compact('transaction_list','class_list','old_value'));



    }
    public function transaction_search(Request $request){

        $from_date = '';

        $to_date = '';

        if($request->from_date){

            $from_date = Carbon::createFromFormat('m/d/Y', $request->from_date);

            $from_date = Carbon::parse($from_date);

        }

        if($request->to_date){

            $to_date = Carbon::createFromFormat('m/d/Y', $request->to_date);

            $to_date = Carbon::parse($to_date);

        }

        $transaction_list = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division','transactions.id')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id');

        if($request->class){

            $transaction_list = $transaction_list->Where('class', $request->class);

        }

        if($request->division){

            $transaction_list = $transaction_list->Where('division', $request->division);

        }

        if($request->name){

            $transaction_list = $transaction_list->Where('name', 'LIKE', '%'.$request->name.'%');

        }
        if($from_date){

            $transaction_list = $transaction_list->WhereDate('transactions.created_at','>=',$from_date);

        }
        if($to_date){

            $transaction_list = $transaction_list->Wheredate('transactions.created_at','<=',$to_date);

        }

        $transaction_list = $transaction_list->get();

        $old_value = ['name' => $request->name,'class_name' => $request->class,'division' => $request->division,'from_date' => $request->from_date,'to_date' => $request->to_date];

       // dd($old_value['name']);


        $class_list = ClassList::orderBy('name', 'asc')
                ->distinct()->get('name');
    

        return view('transaction-list',compact('transaction_list','class_list','old_value'));



    }

    public function show($id){

        $transaction_list = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$id)->orderBy('created_at','DESC')->get();

        $deposit_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$id)->where('transaction_type',1)->sum('amount');

        $withdrawal_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$id)->where('transaction_type',2)->sum('amount');

        $account_balance = $deposit_amount - $withdrawal_amount;



        return view('transaction-show',compact('transaction_list','account_balance'));


    }

    public function student_show(){

        $id = Auth::user()->id;



        $transaction_list = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$id)->orderBy('created_at','DESC')->get();

        $deposit_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$id)->where('transaction_type',1)->sum('amount');

        $withdrawal_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$id)->where('transaction_type',2)->sum('amount');

        $account_balance = $deposit_amount - $withdrawal_amount;



        return view('transaction-student-show',compact('transaction_list','account_balance'));



    }

     public function edit($id)
    {

        $user_details = Transactions::select('user_id')->where('id',$id)->first();

        $user_id = $user_details->user_id;



        $deposit_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$user_id)->where('transaction_type',1)->sum('amount');

        $withdrawal_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$user_id)->where('transaction_type',2)->sum('amount');

        $account_balance = $deposit_amount - $withdrawal_amount;

        $transaction_details = Transactions::select('transactions.id','transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('transactions.id',$id)->orderBy('created_at','DESC')->first();

        //dd($transaction_list);

        return view('transaction-edit',compact('transaction_details','account_balance'));


    }
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [ // <---
            'amount' => 'required|numeric',
            
        ]);

        if ($validator->fails()) {
            return redirect::back()->withErrors($validator);
        }

        $user_details = Transactions::select('user_id')->where('id',$request->transaction_id)->first();

        $user_id = $user_details->user_id;



        $deposit_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$user_id)->where('transaction_type',1)->sum('amount');

        $withdrawal_amount = Transactions::select('transactions.user_id','transactions.transaction_type','transactions.amount','transactions.created_at','name','guardian_name','role','class','division')->where('role','2')
        ->leftjoin('users', 'users.id', '=', 'transactions.user_id')->where('user_id',$user_id)->where('transaction_type',2)->sum('amount');

        $account_balance = $deposit_amount - $withdrawal_amount;

        if($request->transaction_type == 2){

            if( $account_balance < $request->amount){ 


            return Redirect::back()->with('error', 'Account does not have sufficient balance');

            }

        }

        Transactions::where('id', $request->transaction_id)
       ->update([
           'amount' => $request->amount,
           'transaction_type' => $request->transaction_type
        ]);


       return redirect()->route('transaction-edit', $request->transaction_id)->with('message', 'Transaction Successfully Updated!');
        


    }

    public function profile(){

        $user_id = Auth::user()->id;


        $user_details = User::where('id',$user_id)->first();

        if(Auth::user()->role == 1){

            return view('profile',compact('user_details'));


        }elseif(Auth::user()->role == 2){

            return view('profile-student',compact('user_details'));

        }

        



    }



}
