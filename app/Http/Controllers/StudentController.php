<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $students_list = User::where('role',2)->orderBy('class','ASC')->orderBy('division','ASC')->get();
        return view('student-list',compact('students_list'));
       
    }
}
