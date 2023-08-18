@extends('layouts.app')

@section('content')


 

   <!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('/public../assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{url('/public../assets/vendor/fonts/circular-std/style.css" rel="stylesheet')}}">
    <link rel="stylesheet" href="{{url('/public../assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/public../assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">

    
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container " style="width: 40% !important; max-width: 100% !important;">
        <div class="card">
            <h3 class="card-header text-center"><span class="splash-description"  style="font-size: 20px !important;">Enter Your Login Information</span></h3>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" id="username" type="email" placeholder="Email" autocomplete="off" name="email" required value="{{ old('email') }}">
                               @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                </form>
            </div>
           
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{url('/public../assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{url('/public../assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>
 
</html>

@endsection
