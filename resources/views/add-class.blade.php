@extends('layouts.navigation')
@section('content')
<div class="row">
                        <div class="col-xl-12">
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="easion-card-title"> Add Class </div>
                                </div>
                                <div class="card-body ">
                                    <form method="POST" action="{{ route('add-class') }}">
                                      {{ csrf_field() }}
                                        <div class="row">
                                        <div  class="col-xl-6"class="form-group">
                                            <label for="exampleFormControlSelect1">Class</label>
                                            <select name="class" class="form-control" id="exampleFormControlSelect1">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>

                                        </div>
                                        <div class="col-xl-6" class="form-group">
                                            <label for="exampleFormControlSelect1">Division</label>
                                            <select name="division" class="form-control" id="exampleFormControlSelect1">
                                                <option value="1">A</option>
                                                <option value="2">B</option>
                                                <option value="3">C</option>
                                                <option value="4">D</option>
                                                
                                            </select>
                                            
                                        </div>
                                        
                                        </div><br>
                                        
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @php  $class_in_letter = ['1' => 'A','2' => 'B','3' => 'C','4' => 'D'];  @endphp
                        <div class="col-lg-12">
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="easion-card-title">List Class</div>
                                </div>
                                <div class="card-body ">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Class</th>
                                                <th scope="col">Division</th>
                                                
                                            </tr>
                                        </thead>
                                        @foreach($class_lists as $class)
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $class->name }}</td>
                                                <td>{{ $class_in_letter[$class->division] }}</td>
                                                
                                            </tr>
                                            
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
@stop