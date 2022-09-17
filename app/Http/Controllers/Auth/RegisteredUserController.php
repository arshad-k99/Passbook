<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\ClassList;
use Redirect;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $class_list = ClassList::orderBy('name', 'asc')
                ->distinct()->get('name');

        //dd($class_list)   ;     

        return view('auth.register',compact('class_list'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        //dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'guardian_name' => ['required', 'string', 'max:255'],
            'class' => ['required'],
            'division' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $class_ex_check = ClassList::where('name',$request->class)->where('division',$request->division)->first();

        if(!$class_ex_check){

          // dd('gfg');

            return Redirect::back()->with('message', 'Selected Class Does not exist');


        }

        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'guardian_name' => $request->guardian_name,
            'class' => $request->class,
            'division' => $request->division,
            'role' => 2,
            'password' => Hash::make($request->password),
        ]);
        return Redirect::back()->with('success_message', 'New Student Added');

        
    }
}
