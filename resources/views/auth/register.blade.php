@extends('layouts.navigation')
@section('content')

<x-guest-layout>
    <main class="dash-content">
    @if(session()->has('message'))
    <div class="alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
@endif
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-xl-12">
                    <div class="card easion-card">
                        <div class="card-header">
                            <div class="easion-card-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="easion-card-title"> Create Students  </div>
                        </div>
                        <div class="card-body ">
                            <form method="POST" action="{{ route('register') }}">
            @csrf
            

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus />
               
            </div>
            @if ($errors->has('name'))
    <span class="error" style="color:red;">{{ $errors->first('name') }}</span>
@endif

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
             @if ($errors->has('email'))
    <span class="error" style="color:red;">{{ $errors->first('email') }}</span>
@endif
            <div class="mt-4">
                <x-label for="guardian_name" :value="__('Guardian Name')" />

                <x-input id="guardian_name" class="block mt-1 w-full" type="text" name="guardian_name" :value="old('guardian_name')" required autofocus />
            </div>
            @if ($errors->has('guardian_name'))
    <span class="error" style="color:red;">{{ $errors->first('guardian_name') }}</span>
@endif
            <div class="mt-4" >    
            <x-label for="class" :value="__('Class')" />
                
              <select class="form-control" id="class" name="class" required focus>
                  @foreach($class_list as $class)
                  <option value="{{ $class->name }}"  selected>{{ $class->name }}</option>        
                       
                  @endforeach       
              </select>
         
            </div>
            <div class="mt-4">    
            <x-label for="class" :value="__('Division')" />
         
              <select class="form-control" id="division" name="division" required focus>
                  <option value="1"  selected>A</option>        
                  <option value="2"  selected>B</option>        
                  <option value="3"  selected>C</option>        
                  <option value="4"  selected>D</option>        
              </select>
         
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>
            @if ($errors->has('password'))
    <span class="error" style="color:red;">{{ $errors->first('password') }}</span>
@endif
            
            
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
                        </div>
                    </div>
                </div>
</x-guest-layout>

@stop
