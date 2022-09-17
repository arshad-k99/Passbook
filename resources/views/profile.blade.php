@extends('layouts.navigation')
@section('content')
@php  $class_in_letter = ['1' => 'A','2' => 'B','3' => 'C','4' => 'D'];  @endphp
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
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
                        
                    </div>
                    <div class="row">
                        
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@stop