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

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

      <div class="adminx-container">

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

            <div class="container-fluid">
                  <div class="row">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                              {!! session('success') !!}
                        </div>
                        @endif
                  </div>
            </div>
            <!--content-->
            <div class="container">
                  <div class="row justify-content-center">
                        <div class="col-md-8">
                        <div class="header-logo text-center ">
                                    <a href="{{ url('/') }}" class="logo">
                                          <img src="./images/lascoco-logo.png" alt="LASCOCO" title="LASCOCO" width="139"
                                                height="93">
                                    </a>
                              </div>
                              <div class="card">
                                    <div class="card-header">Do you have an account? {{ __('Login') }}</div>

                                    <div class="card-body">
                                          <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="row mb-3">
                                                      <label for="email"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                      <div class="col-md-6">
                                                            <input id="email" type="email"
                                                                  class="form-control @error('email') is-invalid @enderror"
                                                                  name="email" value="{{ old('email') }}" required
                                                                  autocomplete="email" autofocus>

                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                      </div>
                                                </div>

                                                <div class="row mb-3">
                                                      <label for="password"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                      <div class="col-md-6">
                                                            <input id="password" type="password"
                                                                  class="form-control @error('password') is-invalid @enderror"
                                                                  name="password" required
                                                                  autocomplete="current-password">

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                      </div>
                                                </div>

                                                <div class="row mb-3">
                                                      <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="remember" id="remember"
                                                                        {{ old('remember') ? 'checked' : '' }}>

                                                                  <label class="form-check-label" for="remember">
                                                                        {{ __('Remember Me') }}
                                                                  </label>
                                                            </div>
                                                      </div>
                                                </div>

                                                <div class="row mb-0">
                                                      <div class="col-md-8 offset-md-4">
                                                            <button type="submit" class="btn btn-outline-danger">
                                                                  {{ __('Login') }}
                                                            </button>

                                                            @if (Route::has('password.request'))
                                                            <a class="btn btn-link"
                                                                  href="{{ route('password.request') }}">
                                                                  {{ __('Forgot Your Password?') }}
                                                            </a>
                                                            @endif
                                                      </div>
                                                </div>
                                          </form>
                                    </div>
                                    <div class="text-center">
                                          <p></p>
                                               <span class="text-dark"><strong>Don't have an account? Click below to create one</strong></span> 
                                          <p></p>
                                          </div>
                                    <div class="container">
                                    <div class="row">
                 
                                          <div class="col-md-4 col-sm-4">
                                                <div class="text-center  bg-danger">
                                                    <a href="{{ route('cooperative-register') }}" class="text-white">Cooperatives</a>  
                                                </div>
                                          </div>

                                          <div class="col-md-4 col-sm-4">
                                                <div class="text-center text-white bg-dark">
                                                <a href="{{ route('member-register') }}" class="text-white">Members </a>
                                                </div>
                                          </div>

                                          <div class="col-md-4 col-sm-4">
                                                <div class="text-center text-white bg-danger">
                                                <a href="{{ route('seller-register') }}" class="text-white">Seller</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <br><br>

                              </div>
                              <!--card-->


                        </div>
                  </div>
            </div>
            <!--container content-->

      </div>
      <!--adminx-container-->
      <div class="container">
            <p></p>
      </div>
      <div class="container">
            <p></p>
      </div>
      



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