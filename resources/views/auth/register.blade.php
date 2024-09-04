<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
   
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/adminx.css') }}" media="screen" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LascocoMart') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
   
    <div  class="adminx-container">

          <nav class="navbar navbar-expand justify-content-between fixed-top">
        

        <div class="d-flex flex-1 d-block d-md-none">
          <a href="#" class="sidebar-toggle ml-3">
            <i data-feather="menu"></i>
          </a>
        </div>

        <ul class="navbar-nav d-flex justify-content-end mr-2">
          <!-- Notificatoins -->

         
                          <!--   @if (Route::has('register'))
                                  <li class="nav-item">
                                 <a class="nav-link" href="{{ route('register') }}"> {{ __('Register') }} &nbsp;</a>

                                </li>
                            @endif -->
                        
                        </ul>
                      </nav>


<!--content-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <a class="navbar-brand mb-0 h1 d-block d-md-block text-danger text-center" href="{{ url('/') }}">
         <!--  <img src="{{ asset('admin/img/logo.png') }}" class="navbar-brand-image d-inline-block align-top mr-2" alt=""> -->
         
       <h4> {{ config('app.name', 'LascocoMart') }}</h4>
              
        </a>
            <div class="card">
                <div class="card-header">Don't have an account? {{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                          <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Cooperative Code or ID</label>

                            <div class="col-md-6">
                                <input id="coopcope" type="text" class="form-control @error('name') is-invalid @enderror" name="code" value="" required autocomplete="coopcode" autofocus>
                                <span class="small text-danger">get it from your cooperative admin</span>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="hidden"  name="role" value="4">
                                 <input type="hidden"  name="role_name" value="member">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('name') is-invalid @enderror" name="fname" value="" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('name') is-invalid @enderror" name="lname" value="" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span class="small text-danger">Password minimum length: 6</span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                         @php
                            $rand = rand(100000000,999999999);
                            @endphp

                        <div class="row mb-0">
                            <input type="hidden" name="voucher" value="C{{ $rand }}">

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--card-->
 <div class="text-center">
                <br>
                      @if (Route::has('login'))
                                  
                   Already a member?    <a class="" href="{{ route('login') }}">{{ __('Login') }} &nbsp;</a>

                            @endif
                </div>

        </div>
    </div>
</div>


   </div><!--adminx-container-->

       

    <!-- footer-->
    <!--script-->
     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="admin/js/vendor.js"></script>
    <script src="admin/js/adminx.js"></script>
     <script src="admin/js/custom.js"></script>
</body>
</html>
