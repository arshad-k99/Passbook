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
@php  $class_in_letter = ['1' => 'A','2' => 'B','3' => 'C','4' => 'D'];  @endphp
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
 
 				<div class="row">
    <div class="col-xl-12">
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <div class="easion-card-title"> Profile </div>
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
                        
                    </div>
                    
                </form>
            </div>
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