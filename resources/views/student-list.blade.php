@extends('layouts.navigation')
@section('content')
@php  $class_in_letter = ['1' => 'A','2' => 'B','3' => 'C','4' => 'D'];  @endphp

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
                                                <th scope="col">Email</th>
                                                <th scope="col">Guardian Name</th>
                                                <th scope="col">Class</th>
                                                
                                                <th scope="col">Division</th>
                                            </tr>

                                        </thead>
                                        @foreach($students_list as $student)
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->guardian_name }}</td>
                                                <td>{{ $student->class }}</td>
                                                <td>{{ $class_in_letter[$student->division] }}</td>
                                                <td><a class="btn btn-primary" href="{{route('transaction-show', ['id' =>$student->id])}}">Txn History</a></td>
                                            </tr>
                                           
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@stop