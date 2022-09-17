@extends('layouts.navigation')
@section('content')
@php  $class_in_letter = ['1' => 'A','2' => 'B','3' => 'C','4' => 'D'];  @endphp
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
<div class="row">
    <div class="col-xl-12">
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="easion-card-title"> Simple Form </div>
            </div>
            <div class="card-body ">
                <form>
                    
                    <div class="row">
                        <div class="col-xl-4" class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $user_details->name }}" disabled>
                        </div>
                        <div class="col-xl-4" class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" value="{{ $user_details->email }}" id="exampleFormControlInput1" placeholder="name@example.com" disabled>
                        </div>
                        <div class="col-xl-4" class="form-group">
                            <label for="exampleFormControlInput1">Class</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $user_details->class }} {{ $class_in_letter[$user_details->division] }}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4" class="form-group">
                            <label for="exampleFormControlInput1">Guardian Name</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $user_details->guardian_name }}"  disabled>
                        </div>
                        
                        <div class="col-xl-4" class="form-group">
                            <label for="exampleFormControlInput1">Account Balance</label>
                            <input type="email" value="{{ $account_balance }}"  class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" disabled>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card easion-card">
            
            <div class="card-body ">
                <form method="POST" action="{{ route('transaction-store') }}">
                   {{ csrf_field() }} 
                    <div class="row">
                        <input type="hidden" class="form-control" value="{{ $user_details->id }}" name="user_id" id="exampleFormControlInput1">
                        <div  class="col-xl-4"class="form-group">
                            <label for="exampleFormControlSelect1">Transaction  Type</label>
                                 <select name="transaction_type" class="form-control" id="exampleFormControlSelect1">
                             <option value="1">Deposit</option>
                            <option value="2">Withdrawal</option>
                                                
                         </select>

                         </div>
                        <div class="col-xl-4" class="form-group">
                            <label for="exampleFormControlInput1">Amount</label>
                            <input type="text" class="form-control" value="" id="exampleFormControlInput1" name="amount" placeholder="" >
                            @if($errors->has('amount'))
                            <div class="text-danger">{{ $errors->first('amount') }}</div>
                        @endif
                        </div>

                        
                    </div><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{route('transaction-search')}}">List</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop