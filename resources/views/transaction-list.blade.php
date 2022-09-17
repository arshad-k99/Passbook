@extends('layouts.navigation')
@section('content')
@php  $class_in_letter = ['1' => 'A','2' => 'B','3' => 'C','4' => 'D']; $transaction_type_array = ['1'=> 'Deposit', '2' => 'Withdrawal']; $total_amount = 0; @endphp
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
                <form method="POST" action="{{ route('transaction-list-search') }}">
                 {{ csrf_field() }}
                    <div class="row">
                    <div  class="col-xl-4"class="form-group">
                        <label for="exampleFormControlSelect1">Class</label>
                        <select name="class" class="form-control" id="exampleFormControlSelect1">
                            <option value="" selected>Select</option>
                            @foreach($class_list as $class)
                              <option value="{{ $class->name }}" {{ $class->name == $old_value['class_name'] ? "selected":"" }}>{{ $class->name }}</option>        
                                   
                              @endforeach  
                        </select>

                    </div>
                    <div class="col-xl-4" class="form-group">
                        <label for="exampleFormControlSelect1">Division</label>
                        <select name="division"  class="form-control" id="exampleFormControlSelect2">
                            <option value="" selected>Select</option>
                            
                            <option  value="1" {{ '1' == $old_value['division'] ? "selected":"" }}>A</option>
                            <option value="2"  {{ '2' == $old_value['division'] ? "selected":"" }}>B</option>
                            <option value="3"  {{ '3' == $old_value['division'] ? "selected":"" }}>C</option>
                            <option value="4"  {{ '4' == $old_value['division'] ? "selected":"" }}>D</option>
                            
                        </select>
                        
                    </div>
                    <div class="col-xl-4" class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" value="{{$old_value['name']}}" name="name" class="form-control" id="exampleFormControlInput1" >
                    </div>
                    
                   
                    </div>
                    
                    <div class="row">
                        
                            <div class="col-xl-4" class="form-group">
                        <label for="exampleFormControlInput1">From Date</label>
                        <input value="{{$old_value['from_date']}}"  name="from_date" id="datepicker" width="290" />
                    </div>
                     <div class="col-xl-4" class="form-group">
                        <label for="exampleFormControlInput1">To Date</label>
                        <input value="{{$old_value['to_date']}}"value="{{old('to_date')}}" name="to_date" id="datepicker2" width="290" />
                    </div>

                    </div><br>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>

	<div class="col-lg-12">
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="easion-card-title">Students List</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Guardian Name</th>
                                                <th scope="col">Class</th>
                                                <th scope="col">Division</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Transaction Type</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Action</th>
                                                
                                            </tr>

                                        </thead>
                                        @foreach($transaction_list as $txn)
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $txn->name }}</td>
                                                <td>{{ $txn->guardian_name }}</td>
                                                <td>{{ $txn->class }}</td>
                                                <td>{{ $class_in_letter[$txn->division] }}</td>
                                                <td>{{ $txn->created_at }}</td>
                                                <td>{{ $transaction_type_array[$txn->transaction_type] }}</td>
                                                <td>{{ $txn->amount }}</td>
                                                <td><a class="btn btn-primary" href="transaction-edit/{{ $txn->id}}">Edit</a> </td>
                                            </tr>
                                           
                                        </tbody>
                                        @php if($txn->transaction_type == 1){ $total_amount += $txn->amount ; } elseif($txn->transaction_type == 2)  {
                                            $total_amount -= $txn->amount ;

                                        }  @endphp
                                        @endforeach
                                        <tr>
                                                <td>Total</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $total_amount }}</td>
                                                <td></td>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@stop
