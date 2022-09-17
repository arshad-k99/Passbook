<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/easion.css">
    @vite(['resources/css/easion.css', 'resources/js/easion.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../js/chart-js-config.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>Passbook</title>
</head>

<body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            
            
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
               
                <a href="#!" class="searchbox-toggle">
                    <i class="fas fa-search"></i>
                </a>
                
                <div class="tools">
                    
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
 

            <style>
@import url('https://fonts.googleapis.com/css2?family=Lato&family=Poppins&display=swap');*{padding: 0;margin: 0;box-sizing: border-box}body{background-color: #fff;font-family: 'Poppins', sans-serif}.wrapper{background-color: #f9dd8a;min-height: 100px;max-width: 800px;margin: 10px auto;padding: 10px 30px}.dark,.input:focus{background-color: #f9dd8a}.navbar{padding: 0.5rem 0rem}.navbar .navbar-brand{font-size: 30px}#income{border-right: 1px solid #3e3636}.notify{display: none}.nav-item .nav-link .fa-bell-o, .fa-long-arrow-down, .fa-long-arrow-up{padding: 10px 10px;background-color: #444;border-radius: 50%;position: relative;font-size: 18px}.nav-item .nav-link .fa-bell-o::after{content: '';position: absolute;width: 7px;height: 7px;border-radius: 50%;background-color: #ffc0cb;right: 10px;top: 10px}.nav-item input{border: none;outline: none;box-shadow: none;padding: 3px 8px;width: 75%;color: #eee}.nav-item .fa-search{font-size: 18px;color: #3e3636;cursor: pointer}.navbar-nav:last-child{display: flex;align-items: center;width: 40%}.navbar-nav .nav-item{padding: 0px 0px 0px 10px}.navbar-brand p{display: block;font-size: 14px;margin-bottom: 3px}.text{color: #3e3636}.money{font-family: 'Lato', sans-serif}.fa-long-arrow-down, .fa-long-arrow-up{padding-left: 12px;padding-top: 8px;height: 30px;width: 30px;border-radius: 50%;font-size: 1rem;font-weight: 100;color: #28df99}.fa-long-arrow-up{color: #ffa500}.nav.nav-tabs{border: none}.nav.nav-tabs .nav-item .nav-link{color: #3e3636;border: none}.nav.nav-tabs .nav-link.active{background-color: #f9dd8a;border: none;color: #fff;border-bottom: 4px solid #fff}.nav.nav-tabs .nav-item .nav-link:hover{border: none;color: #eee}.nav.nav-tabs .nav-item .nav-link.active:hover{border-bottom: 4px solid #fff}.nav.nav-tabs .nav-item .nav-link:focus{border-bottom: 4px solid #4e3f3f;color: #fff}.table-dark{background-color: #f9dd8a}.table thead th{text-transform: uppercase;color: #3e3636;font-size: 12px}.table thead th, .table td, .table th{border: none;overflow: auto auto}td .fa-briefcase, td .fa-bed, td .fa-exchange, td .fa-cutlery{color: #ff6347;background-color: #444;padding: 5px;border-radius: 50%}td .fa-bed, td .fa-cutlery{color: #40a8c4}td .fa-exchange{color: #b15ac7}tbody tr td .fa-cc-mastercard, tbody tr td .fa-cc-visa{color: #3e3636}tbody tr td.text{font-family: 'Lato', sans-serif}tbody tr td .fa-long-arrow-up, tbody tr td .fa-long-arrow-down{font-size: 12px;padding-left: 7px;padding-top: 3px;height: 20px;width: 20px}.results span{color: #3e3636;font-size: 12px}.results span b{font-family: 'Lato', sans-serif}.pagination .page-item .page-link{background-color: #444;color: #fff;padding: 0.3rem .75rem;border: none;border-radius: 0}.pagination .page-item .page-link span{font-size: 16px}.pagination .page-item.disabled .page-link{background-color: #333;color: #eee;cursor: crosshair}@media(min-width:768px) and (max-width: 991px){.wrapper{margin: auto}.navbar-nav:last-child{display: flex;align-items: start;justify-content: center;width: 100%}.notify{display: inline}.nav-item .fa-search{padding-left: 10px}.navbar-nav .nav-item{padding: 0px}}@media(min-width: 300px) and (max-width: 767px){.wrapper{margin: auto}.navbar-nav:last-child{display: flex;align-items: start;justify-content: center;width: 100%}.notify{display: inline}.nav-item .fa-search{padding-left: 10px}.navbar-nav .nav-item{padding: 0px}#income{border: none}}@media(max-width: 400px){.wrapper{padding: 10px 15px;margin: auto}.btn{font-size: 12px;padding: 10px}.nav.nav-tabs .nav-link{padding: 10px}}
</style>
<div class="wrapper rounded"> 
    <nav class="navbar navbar-expand-lg navbar-dark dark d-lg-flex align-items-lg-start"> <a class="navbar-brand" style="color: #212529;" href="#">Transactions <p class="text pl-1">Welcome to your transactions</p> </a>
        <div class="collapse navbar-collapse" id="navbarNav"> <ul class="navbar-nav ml-lg-auto"> <li class="nav-item"> </li> </ul> </div> </nav>
         <div class="row mt-2 pt-2"> <div class="col-md-12" id="income"> <div class="d-flex justify-content-start align-items-center"> <p class="fas fa-wallet fa-2x mr-1" style="color: #489448;"></p> <p class="text mx-3">Account Balance</p> <p class="text-black ml-4 money"> ₹{{ $account_balance }}/-</p> </div> </div>  </div> <div class="d-flex justify-content-between align-items-center mt-3"> <ul class="nav nav-tabs w-75"> <li class="nav-item"> History </li>  </ul> </div> <div class="table-responsive mt-3"> <table class="table  table-borderless"> <thead> <tr>   <th scope="col">Date</th><th scope="col">Mode</th> <th scope="col" class="text-right">Amount</th> </tr> </thead> <tbody>   @foreach($transaction_list as $data)  <tr>  <td class="text">{{ $data->created_at->toDayDateTimeString(); }}</td> <td class="text">@if($data->transaction_type == 1) Deposit @elseif($data->transaction_type == 2) Withdrawal @endif</td>
 <td class="d-flex justify-content-end align-items-center" style="color: black;"> @if($data->transaction_type == 1) <span  class='fas fa-arrow-circle-up fa-1x' style='color:#0c730b;font-size: 20px;'></span> @elseif($data->transaction_type == 2) <span class="fas fa-arrow-circle-down mr-1" style='color:#dc0d0d;font-size: 20px'></span>  @endif &nbsp; {{ $data->amount }} </td> </tr>@endforeach </tbody> </table> </div> <div class="d-flex justify-content-between align-items-center results"> <div class="pt-3"> 
  </div>
  </div>
</div>
    
            </main>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/easion.js"></script>
    
</body>

</html>