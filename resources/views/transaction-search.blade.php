@extends('layouts.navigation')
@section('content')
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
                    <div  class="col-xl-6"class="form-group">
                        <label for="exampleFormControlSelect1">Class</label>
                        <select name="class" class="form-control" id="exampleFormControlSelect1">
                            <option value="" selected>Select</option>
                            @foreach($class_list as $class)
                              <option value="{{ $class->name }}" >{{ $class->name }}</option>        
                                   
                              @endforeach  
                        </select>

                    </div>
                    <div class="col-xl-6" class="form-group">
                        <label for="exampleFormControlSelect1">Division</label>
                        <select name="division" class="form-control" id="exampleFormControlSelect2">
                            <option value="" selected>Select</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                            
                        </select>
                        
                    </div>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>
@php  $class_in_letter = ['1' => 'A','2' => 'B','3' => 'C','4' => 'D'];  @endphp

    <div class="col-xl-12">
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
                                                <th scope="col">Action</th>

                                            </tr>

                                        </thead>
                                        
                                        <tbody>
                                            
                                           
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
<script>

    $(document).ready(function () {
        $("#exampleFormControlSelect1, #exampleFormControlInput1,#exampleFormControlSelect2").on("keyup change ", function(e) {
            var value = $("#exampleFormControlInput1").val();;
            var class_name = $("#exampleFormControlSelect1").val();
            var division = $("#exampleFormControlSelect2").val();
                console.log(value,division,class_name)
             var id = 1;   

            var class_in_letter = { 1 : 'A', 2 : 'B', 3:'C',4:'D' };

            var division_name = '';

            $.ajax({
                type: "get",
                url: "/search",
                data: {'name':value,'division':division,'class_name':class_name},
                success: function (data) {
                    console.log(data)
                    division_name = '';
                    var res = '';


                    
                     $.each (data, function (key, value) {

                        res +='<tr>'+
                                    '<th scope="row">'+id+++' </th>'+
                                    '<td>'+value.name+'</td>'+
                                    '<td>'+value.email+' </td>'+
                                    '<td>'+value.guardian_name+' </td>'+
                                    '<td>'+value.class+' </td>'+
                                    '<td>'+class_in_letter[value.division]+' </td>'+
                                    '<td><a class="btn btn-primary" href="transaction-create/'+ value.id+'">'+'Create Txn'+'</a> </td>'+
                                    '<td><a class="btn btn-primary" href="transaction-show/'+ value.id+'">'+'Txn History'+'</a> </td>'+
    
                                '</tr>';

                    });
                      $('tbody').html(res);
                }
            });
        });
    });
   $(window).on('load', function(){ 

        var value = $("#exampleFormControlInput1").val();;
            var class_name = $("#exampleFormControlSelect1").val();
            var division = $("#exampleFormControlSelect2").val();
                console.log(value,division,class_name)
             var id = 1;   

            var class_in_letter = { 1 : 'A', 2 : 'B', 3:'C',4:'D' };

            var division_name = '';

            $.ajax({
                type: "get",
                url: "/search",
                data: {'name':value,'division':division,'class_name':class_name},
                success: function (data) {
                    console.log(data)
                    division_name = '';
                    var res = '';


                    
                     $.each (data, function (key, value) {

                        res +='<tr>'+
                                    '<th scope="row">'+id+++' </th>'+
                                    '<td>'+value.name+'</td>'+
                                    '<td>'+value.email+' </td>'+
                                    '<td>'+value.guardian_name+' </td>'+
                                    '<td>'+value.class+' </td>'+
                                    '<td>'+class_in_letter[value.division]+' </td>'+
                                    '<td><a class="btn btn-primary" href="transaction-create/'+ value.id+'">'+'Create Txn'+'</a> </td>'+
                                    '<td><a class="btn btn-primary" href="transaction-show/'+ value.id+'">'+'Txn History'+'</a> </td>'+
                                '</tr>';

                    });
                      $('tbody').html(res);
                }
            });

   });


</script>
@stop
