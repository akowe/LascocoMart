<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/adminx.css') }}" media="screen" />
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
      <title>{{ config('app.name', 'LascocoMart') }}</title>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
            integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      <style>
      button.dt-button,
      div.dt-button,
      a.dt-button {
            position: relative;
            display: inline-block;
            box-sizing: border-box;
            margin-right: 0.333em;
            padding: 0.2em 1em;
            border: 1px solid #D10024;
            border-radius: 2px;
            cursor: pointer;
            font-size: 0.88em;
            color: #000;
            white-space: nowrap;
            overflow: hidden;
            background-color: rgba(209, 0, 36, 0.1);
      }
      </style>
      <!-- Google tag (gtag.js) -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-R14072TPRF"></script>
      <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
            dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'G-R14072TPRF');
      </script>
</head>

<body>
      <div id="app" class="adminx-container">
            <!-- COOP NAV BAR-->
            <nav class="navbar navbar-expand justify-content-between fixed-top">
                  <a class="navbar-brand mb-0 h1 d-none d-md-block text-danger" href="{{ url('/') }}">
                        <img src="{{ asset('admin/img/lascoco-logo.png') }}" class="d-inline-block align-top mr-2"
                              width="139" height="93" alt="Lascoco" title="Lascoco">

                  </a>
                  <div class="d-flex flex-1 d-block d-md-none">
                        <a href="#" class="sidebar-toggle ml-3">
                              <i data-feather="menu"></i>
                        </a>
                  </div>
                  <ul class="navbar-nav d-flex justify-content-end mr-2">
                        <!-- Notificatoins -->
                        <li class="nav-item dropdown d-flex align-items-center mr-2">
                        </li>

                        <!-- <li class="nav-item dropdown d-flex align-items-center mr-2">
                        </li> -->

                  </ul>
            </nav>

            <main class="py-4">
                  @yield('content')
            </main>


            @yield('scripts')
      </div>
      <!--adminx-container-->


      <!-- footer-->
      <!--script-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
      <script src="admin/js/vendor.js"></script>
      <script src="admin/js/adminx.js"></script>
      <script src="admin/js/custom.js"></script>
      <!-- Footer row -->

</body>

</html>