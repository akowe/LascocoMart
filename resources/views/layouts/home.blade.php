<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <meta http-equiv=“refresh” content="{{config('session.lifetime') * 60}}">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="icon" type="image/x-icon" href="./back/static/lascoco-mart-icon.svg">
      <title>{{ config('app.name', 'LascocoMart') }}</title>
      <!-- CSS files -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- <link href="back/dist/css/tabler.min.css" rel="stylesheet"/> -->
      <link href="/back/dist/css/tabler-flags.min.css?v=echo filemtime();" rel="stylesheet" />
      <link href="/back/dist/css/tabler-payments.min.css?v=echo filemtime();" rel="stylesheet" />
      <link href="/back/dist/css/tabler-vendors.min.css?v=echo filemtime();" rel="stylesheet" />
      <link href="/back/dist/css/demo.css?v=echo filemtime();" rel="stylesheet" />
      <link href="/back/dist/css/tabler.css?v=echo filemtime();" rel="stylesheet" />
      <style>
      @import url('https://rsms.me/inter/inter.css');

      :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }

      body {
            font-feature-settings: "cv03", "cv04", "cv11";
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
      <script src="/back/dist/js/demo-theme.min.js"></script>
      <div class="page">
            <!-- Navbar -->
            <div class="sticky-top">
                  <header class="navbar navbar-expand-md sticky-top d-print-none" data-bs-theme="dark">
                        <div class="container-xl">
                              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                              </button>
                              <span class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                                    <a href="."><img src="{{ asset('back/static/lascoco-logo.png') }}" width="70"
                                                height="42" alt="LascocoMart">
                                    </a>
                              </span>
                              <div class="navbar-nav flex-row order-md-last">
                                    <!-- Dark / Light Mode show on medium and large device only -->
                                    <a href="?theme=dark" class="nav-link d-sm-block d-md-none px-0 hide-theme-dark"
                                          title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                          <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                      d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                          </svg>
                                    </a>
                                    <a href="?theme=light" class="nav-link d-sm-block d-md-none px-0 hide-theme-light"
                                          title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                                          <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                <path
                                                      d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                          </svg>
                                    </a>
                                    <div class="nav-item d-none d-md-flex me-3">
                                          <div class="btn-list">
                                                @auth
                                                @if(Auth::user()->role_name == 'cooperative')

                                                <a href="{{ url('fmcgs_products') }}" class="btn" rel="noreferrer">
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-shopping-cart"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M17 17h-11v-14h-2" />
                                                            <path d="M6 5l14 1l-1 7h-13" />
                                                      </svg>

                                                      FMCG Mart
                                                </a>
                                                @endif
                                                @endauth

                                                @auth
                                                @if(Auth::user()->role_name == 'superadmin')

                                                <a href="{{ url('fmcgs_products') }}" class="btn" rel="noreferrer">
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-shopping-cart"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M17 17h-11v-14h-2" />
                                                            <path d="M6 5l14 1l-1 7h-13" />
                                                      </svg>

                                                      FMCG Mart
                                                </a>
                                                @endif
                                                @endauth


                                                @auth
                                                @if(Auth::user()->role_name == 'fmcg')
                                                <a href="{{ url('fmcgs_products') }}" class="btn" rel="noreferrer">
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-brand-producthunt"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 16v-8h2.5a2.5 2.5 0 1 1 0 5h-2.5" />
                                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                      </svg>

                                                      FMCG Products
                                                </a>


                                                @endif
                                                @endauth

                                                <a href="{{ url('/') }}" class="btn" rel="noreferrer">
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-shopping-cart"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                            <path d="M17 17h-11v-14h-2" />
                                                            <path d="M6 5l14 1l-1 7h-13" />
                                                      </svg>

                                                      LascocoMart
                                                </a>


                                          </div>
                                    </div>


                                    <div class=" d-md-flex">
                                          <!-- Dark / Light Mode show on medium and large device only -->
                                          <a href="?theme=dark" class="nav-link d-none d-md-block px-0 hide-theme-dark"
                                                title="Enable dark mode" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="2"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                                                </svg>
                                          </a>
                                          <a href="?theme=light"
                                                class="nav-link d-none d-md-block px-0 hide-theme-light"
                                                title="Enable light mode" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="2"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                      <path
                                                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                                </svg>
                                          </a>
                                          <!-- start notification -->
                                          <!-- cooperative notification-->
                                          @auth
                                          @if(Auth::user()->role_name == 'cooperative')

                                          <div class="nav-item dropdown d-none d-md-flex me-3">
                                                <a href="#" class="nav-link px-0 show" data-bs-toggle="dropdown"
                                                      tabindex="-1" aria-label="Show notifications"
                                                      aria-expanded="true">
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                  d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                                                            </path>
                                                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                                                      </svg>
                                                      <span
                                                            class="badge bg-red text-white">{{ auth()->user()->unreadNotifications()->count() }}</span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card show"
                                                      data-bs-popper="static">
                                                      <div class="card">
                                                            <div class="card-header">
                                                                  <h3 class="card-title">Recent Notificatioin</h3>
                                                            </div>
                                                            <div
                                                                  class="list-group list-group-flush list-group-hoverable">
                                                                  <div class="list-group-item">
                                                                        <div class="row align-items-center">
                                                                              <div class="col-auto">
                                                                              <!-- <span class="status-dot status-dot-animated bg-red d-block"></span>    -->
                                                                              </div>
                                                                                  
                                                                              <div class="col text-truncate">
                                                                                    <span class="text-body d-block">
                                                                                          {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\NewOrder')->count()}}
                                                                                          Order (s)</span>
                                                                                         
                                                                                    <div
                                                                                          class="d-block text-secondary text-truncate mt-n1">
                                                                                          
                                                                                          <!--member order here-->
                                                                                          @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewOrder') as $notification)
                                                                                          <div class="row align-items-center">
                                                                                                <div class="col-auto">
                                                                                                      <small> <span class="status-dot status-dot-animated bg-red d-block"></span>  </small> 
                                                                                                </div>
                                                                                                <div class="col text-truncate">
                                                                                                <a href="{{ url('read-admin-member-order') }}/{{ $notification->id }}"
                                                                                                      data-id="{{$notification->id}}"
                                                                                                      class=" text-secondary">
                                                                                                      <small> {{$notification->data}}</small></a><br>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                    
                                                                                                      @if(auth()->user()->unreadNotifications->where('type',
                                                                                                      'App\Notifications\NewOrder'))
                                                                                                      <a href="{{url('read-order')}}/{{ $notification->id }}"
                                                                                                            title="Clear" alt="Clear"
                                                                                                            class="list-group-item-actions  show text-white">
                                                                                                            <small><svg
                                                                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                                                                  class="icon icon-tabler icon-tabler-x"
                                                                                                                  width="24" height="24"
                                                                                                                  viewBox="0 0 24 24"
                                                                                                                  stroke-width="1.5"
                                                                                                                  stroke="currentColor"
                                                                                                                  fill="none"
                                                                                                                  stroke-linecap="round"
                                                                                                                  stroke-linejoin="round">
                                                                                                                  <path stroke="none"
                                                                                                                        d="M0 0h24v24H0z"
                                                                                                                        fill="none" />
                                                                                                                  <path
                                                                                                                        d="M18 6l-12 12" />
                                                                                                                  <path d="M6 6l12 12" />
                                                                                                            </svg></small>
                                                                                                      </a>

                                                                                                      @endif
                                                                                                </div>
                                                                                          </div>
                                                                                        
                                                                                           @endforeach

                                                                                      
                                                                                          <!-- customer order here--->
                                                                                          @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\CustomerOrder') as $notification)
                                                                                        
                                                                                          <div class="row align-items-center">
                                                                                                <div class="col-auto">
                                                                                                      <small> <span class="status-dot status-dot-animated bg-red d-block"></span>  </small> 
                                                                                                </div>
                                                                                                <div class="col text-truncate">
                                                                                                <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                                                      data-id="{{$notification->id}}"
                                                                                                      class=" text-secondary">
                                                                                                      <small> {{$notification->data}}</small></a><br>
                                                                                                </div>
                                                                                                <div class="col-auto">
                                                                                    
                                                                                                      @if(auth()->user()->unreadNotifications->where('type',
                                                                                                      'App\Notifications\NewOrder'))
                                                                                                      <a href="{{route('read-all-order')}}"
                                                                                                            title="Clear" alt="Clear"
                                                                                                            class="list-group-item-actions  show text-white">
                                                                                                            <small><svg
                                                                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                                                                  class="icon icon-tabler icon-tabler-x"
                                                                                                                  width="24" height="24"
                                                                                                                  viewBox="0 0 24 24"
                                                                                                                  stroke-width="1.5"
                                                                                                                  stroke="currentColor"
                                                                                                                  fill="none"
                                                                                                                  stroke-linecap="round"
                                                                                                                  stroke-linejoin="round">
                                                                                                                  <path stroke="none"
                                                                                                                        d="M0 0h24v24H0z"
                                                                                                                        fill="none" />
                                                                                                                  <path
                                                                                                                        d="M18 6l-12 12" />
                                                                                                                  <path d="M6 6l12 12" />
                                                                                                            </svg></small>
                                                                                                      </a>

                                                                                                      @endif
                                                                                                </div>
                                                                                          </div>
                                                                                             
                                                                                          @endforeach
                                                                                    </div>
                                                                              </div>
                                                                              
                                                                        </div>
                                                                  </div>
                                                                  <div class="list-group-item">
                                                                        <div class="row align-items-center">
                                                                              <div class="col-auto"><span
                                                                                          class="status-dot status-dot-animated d-block bg-yellow"></span>
                                                                              </div>
                                                                              <div class="col text-truncate">
                                                                                    <a href="#"
                                                                                          class="text-body d-block">
                                                                                          {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ProductDelivered')->count()}}
                                                                                          Product (s)</a>
                                                                                    <div
                                                                                          class="d-block text-secondary text-truncate mt-n1">
                                                                                          <!-- my product approval here -->
                                                                                          @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ProductDelivered') as $notification)
                                                                                          <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                                                data-id="{{$notification->id}}"
                                                                                                class=" text-secondary">
                                                                                                {!!
                                                                                                Str::limit("$notification->data",
                                                                                                50, ' ...') !!}
                                                                                          </a><br>
                                                                                          @endforeach
                                                                                          <!-- product delivery here product i boguth when a seller click delivery -->
                                                                                          @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ProductDelivered') as $notification)
                                                                                          <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                                                data-id="{{$notification->id}}"
                                                                                                class=" text-secondary">
                                                                                                {!!
                                                                                                Str::limit("$notification->data",
                                                                                                50, ' ...') !!}
                                                                                          </a><br>
                                                                                          @endforeach
                                                                                    </div>
                                                                              </div>
                                                                              <div class="col-auto">

                                                                                    @if(auth()->user()->unreadNotifications->where('type',
                                                                                    'App\Notifications\ProductDelivered'))
                                                                                    <a href="{{route('product-delivered')}}"
                                                                                          title="Clear" alt="Clear"
                                                                                          class="list-group-item-actions show small"><svg
                                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-x"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M18 6l-12 12" />
                                                                                                <path d="M6 6l12 12" />
                                                                                          </svg>
                                                                                    </a>
                                                                                    @endif

                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="list-group-item">
                                                                        <div class="row align-items-center">
                                                                              <div class="col-auto"><span
                                                                                          class="status-dot status-dot-animated d-block bg-info"></span>
                                                                              </div>
                                                                              <div class="col text-truncate">
                                                                                    <a href="#"
                                                                                          class="text-body d-block">{{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ApproveFund')->orwhere('type', 'App\Notifications\CancelFundRequest')->count()}}
                                                                                          Loan (s)</a>
                                                                                    <div
                                                                                          class="d-block text-secondary text-truncate mt-n1">
                                                                                         
                                                                                          <!-- loan request from members -->
                                                                                          @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ApproveFund') as $notification)
                                                                                        
                                                                                                <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                                                      data-id="{{$notification->id}}"
                                                                                                      class=" text-secondary">

                                                                                                      {!!
                                                                                                      Str::limit("$notification->data",
                                                                                                      50, ' ...') !!}

                                                                                                </a><br>
                                                                                       
                                                                                          @endforeach

                                                                                          <!-- loan repayment my member -->
                                                                                          @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\CancelFundRequest') as $notification)
                                                                                        
                                                                                                <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                                                      data-id="{{$notification->id}}"
                                                                                                      class=" text-secondary">

                                                                                                      {!!
                                                                                                      Str::limit("$notification->data",
                                                                                                      50, ' ...') !!}

                                                                                                </a><br>
                                                                                          @endforeach
                                                                                    </div>
                                                                              </div>
                                                                              <div class="col-auto">
                                                                                    <a href="#"
                                                                                          class="list-group-item-actions">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon text-muted"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none">
                                                                                                </path>
                                                                                                <path
                                                                                                      d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z">
                                                                                                </path>
                                                                                          </svg>
                                                                                    </a>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                

                                                                  <div class="list-group-item bg-white">
                                                                        <div class="row align-items-center">
                                                                              <div class="col-auto ">
                                                                                    <a href=""
                                                                                          class="small text-secondary">
                                                                                          Show all notifications 
                                                                                    </a>
                                                                              </div>
                                                                              <div class="col text-truncate">
                                                                                    <div
                                                                                          class="d-block text-secondary text-truncate mt-n1">
                                                                                          <div class=" text-secondary">
                                                                                                <a href="" data-id=""
                                                                                                      class=" text-secondary">
                                                                                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                           

                                                                                                </a>
                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                              <div class="col-auto">
                                                                                    <a href="" title="Clear" alt="Clear"
                                                                                          class="text-secondary small">
                                                                                          Cancel all
                                                                                    </a>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <!-- show and clear all notification -->
                                                                   
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>

                                    @endif
                                    @endauth
                                    <!-- end cooperative notification -->

                                    <!-- Member notification start --->
                                    @auth
                                    @if(Auth::user()->role_name == 'member')
                                    <div class="nav-item dropdown d-none d-md-flex me-3">
                                          <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                                aria-label="Show notifications">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="2"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                                      <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                                </svg>
                                                <span
                                                      class="badge bg-red text-white">{{ auth()->user()->unreadNotifications()->count() }}</span>
                                          </a>
                                          <div
                                                class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                                <div class="card">
                                                      <div class="card-header">
                                                            <h3 class="card-title">Recent notifications</h3>
                                                      </div>
                                                      <div class="list-group list-group-flush list-group-hoverable">
                                                            <!-- my order notification--->
                                                            <div class="list-group-item">
                                                                  <div class="row align-items-center">
                                                                        <div class="col-auto "><span
                                                                                    class="status-dot status-dot-animated bg-yellow d-block"></span>
                                                                        </div>
                                                                        <div class="col text-truncate">
                                                                              <span class="text-body d-block">
                                                                              {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ApprovedOrder')->count()}}
                                                                                    
                                                                                    Order (s)
                                                                              </span>
                                                                              <div
                                                                                    class="d-block text-secondary text-truncate mt-n1">
                                                                                    @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ApprovedOrder') as $notification)
                                                                                 <a href="{{ url('read-member-order') }}/{{ $notification->id }}"
                                                                                                data-id="{{$notification->id}}"
                                                                                                class=" text-secondary">

                                                                                     <small> {!! Str::limit("$notification->data", 100, ' ...') !!}</small>
                                                                                    </a><br>
                                                                                    @endforeach
                                                                                    @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\AdminCancelOrder') as $notification)
                                                                                 <a href="{{ url('read-cancel-order') }}/{{ $notification->id }}"
                                                                                                data-id="{{$notification->id}}"
                                                                                                class=" text-secondary">

                                                                                     <small> {!! Str::limit("$notification->data", 100, ' ...') !!}</small>
                                                                                    </a><br>
                                                                                    @endforeach
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                              @if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\AdminCancelOrder'))
                                                                              <a href="" title="Clear" alt="Clear"
                                                                                    class="small"><svg
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon icon-tabler icon-tabler-x"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="1.5"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path d="M18 6l-12 12" />
                                                                                          <path d="M6 6l12 12" />
                                                                                    </svg>
                                                                              </a>

                                                                              @endif
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <!-- end new order notification--->


                                                            <!-- product delivery notification--->
                                                            <div class="list-group-item">
                                                                  <div class="row align-items-center">
                                                                        <div class="col-auto"><span
                                                                                    class="status-dot status-dot-animated bg-green d-block"></span>
                                                                        </div>
                                                                        <div class="col text-truncate">
                                                                              <a href="#" class="text-body d-block">
                                                                                    {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ProductDelivered')->count()}}
                                                                                    Product (s)
                                                                              </a>
                                                                              <div
                                                                                    class="d-block text-secondary text-truncate mt-n1">
                                                                                    @foreach(auth()->user()->unreadNotifications->where('type',  'App\Notifications\ProductDelivered')  as $notification)
                                                                                 
                                                                                          <a href="{{ url('read-product-delivered') }}/{{ $notification->id }}"
                                                                                                data-id="{{$notification->id}}"
                                                                                                class=" text-secondary">

                                                                                                {!!
                                                                                                Str::limit("$notification->data",
                                                                                                50, ' ...') !!}

                                                                                          </a>
                                                                                    @endforeach

                                                                              </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                              @if(auth()->user()->unreadNotifications->where('type',
                                                                              'App\Notifications\ProductDelivered'))
                                                                              <a href="" title="Clear" alt="Clear"
                                                                                    class="small"><svg
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon icon-tabler icon-tabler-x"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="1.5"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path d="M18 6l-12 12" />
                                                                                          <path d="M6 6l12 12" />
                                                                                    </svg>
                                                                              </a>

                                                                              @endif
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <!-- end product delivery notification--->

                                                            <!-- loan funds  notification--->
                                                            <div class="list-group-item">
                                                                  <div class="row align-items-center">
                                                                        <div class="col-auto"><span
                                                                                    class="status-dot status-dot-animated bg-azure d-block"></span>
                                                                        </div>
                                                                        <div class="col text-truncate">
                                                                              <a href="#" class="text-body d-block">
                                                                                    {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ApproveFund')->orwhere('type', 'App\Notifications\CancelFundRequest')->count()}}
                                                                                    Loan (s)
                                                                              </a>
                                                                              <div
                                                                                    class="d-block text-secondary text-truncate mt-n1">
                                                                                    <!-- loan approval -->
                                                                                    @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ApproveFund') as  $notification)
                                                                                 
                                                                                          <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                                                data-id="{{$notification->id}}"
                                                                                                class=" text-secondary">

                                                                                                {!!
                                                                                                Str::limit("$notification->data",
                                                                                                50, ' ...') !!}

                                                                                          </a>
                                                                                    @endforeach

                                                                                 
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                              @if(auth()->user()->unreadNotifications->where('type',
                                                                              'App\Notifications\ApproveFund'))
                                                                              <a href="{{route('read-all-approve-funds')}}"
                                                                                    title="Clear" alt="Clear"
                                                                                    class="small"><svg
                                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon icon-tabler icon-tabler-x"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="1.5"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path d="M18 6l-12 12" />
                                                                                          <path d="M6 6l12 12" />
                                                                                    </svg>
                                                                              </a>

                                                                              @endif
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <!-- end loan notification--->
                                                            <!-- end notification group-item --->


                                                            <div class="list-group-item bg-white">
                                                                  <div class="row align-items-center">
                                                                        <div class="col-auto ">
                                                                              <a href="" class="small text-secondary">
                                                                                    Show all notifications
                                                                              </a>
                                                                        </div>
                                                                        <div class="col text-truncate"
                                                                              style="width:300px;">
                                                                              <div
                                                                                    class="d-block text-secondary text-truncate mt-n1">
                                                                                    <div class=" text-secondary">
                                                                                          <a href="" data-id=""
                                                                                                class=" text-secondary">

                                                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                         
                                                                                          </a>
                                                                                    </div>
                                                                              </div>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                              <a href="" title="Clear" alt="Clear"
                                                                                    class="text-secondary small">
                                                                                    Cancel all
                                                                              </a>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <!-- show and clear all notification -->

                                                      </div>
                                                      <!-- group list -->
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              @endif
                              @endauth
                              <!--- end member notification --->

                              <!--- Merchant notification start --->
                              @auth
                              @if(Auth::user()->role_name == 'merchant')
                              <div class="nav-item dropdown d-none d-md-flex me-3">
                                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                          aria-label="Show notifications">
                                          <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                      d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                                <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                          </svg>
                                          <span
                                                class="badge bg-red text-white">{{ auth()->user()->unreadNotifications()->count() }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                          <div class="card">
                                                <div class="card-header">
                                                      <h3 class="card-title">Recent notifications</h3>
                                                </div>
                                                <div class="list-group list-group-flush list-group-hoverable">
                                                      <!-- my order notification--->
                                                      <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                  <div class="col-auto "><span
                                                                              class="status-dot status-dot-animated bg-yellow d-block"></span>
                                                                  </div>
                                                                  <div class="col text-truncate">
                                                                        <a href="#" class="text-body d-block">

                                                                              {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\NewOrder')->count()}}
                                                                              Order (s)
                                                                        </a>
                                                                        <div
                                                                              class="d-block text-secondary text-truncate mt-n1">
                                                                              @foreach(auth()->user()->unreadNotifications->where('type',  'App\Notifications\NewOrder') as $notification)
                                                                          
                                                                                    <a href="{{ url('read-cancel-order') }}/{{ $notification->id }}"
                                                                                          data-id="{{$notification->id}}"
                                                                                          class=" text-secondary">

                                                                                          {!!
                                                                                          Str::limit("$notification->data",
                                                                                          50, ' ...') !!}

                                                                                    </a>
                                                                              @endforeach
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-auto">
                                                                        @if(auth()->user()->unreadNotifications->where('type',
                                                                        'App\Notifications\NewOrder'))
                                                                        <a href="" title="Clear" alt="Clear"
                                                                              class="small"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-x"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke-width="1.5"
                                                                                    stroke="currentColor" fill="none"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path stroke="none"
                                                                                          d="M0 0h24v24H0z"
                                                                                          fill="none" />
                                                                                    <path d="M18 6l-12 12" />
                                                                                    <path d="M6 6l12 12" />
                                                                              </svg>
                                                                        </a>

                                                                        @endif
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!-- end new order notification--->


                                                      <!-- product delivery notification--->
                                                      <div class="list-group-item">
                                                            <div class="row align-items-center">
                                                                  <div class="col-auto"><span
                                                                              class="status-dot status-dot-animated bg-green d-block"></span>
                                                                  </div>
                                                                  <div class="col text-truncate">
                                                                        <a href="#" class="text-body d-block">
                                                                              {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ProductApproved')->count()}}
                                                                              Product (s)
                                                                        </a>
                                                                        <div
                                                                              class="d-block text-secondary text-truncate mt-n1">
                                                                              @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ProductApproved') as $notification)
                                                                           
                                                                                    <a href="{{ url('read-product-delivered') }}/{{ $notification->id }}"
                                                                                          data-id="{{$notification->id}}"
                                                                                          class=" text-secondary">

                                                                                          {!!
                                                                                          Str::limit("$notification->data",
                                                                                          50, ' ...') !!}

                                                                                    </a>
                                                                              @endforeach

                                                                        </div>
                                                                  </div>
                                                                  <div class="col-auto">
                                                                        @if(auth()->user()->unreadNotifications->where('type',
                                                                        'App\Notifications\ProductApproved'))
                                                                        <a href="" title="Clear" alt="Clear"
                                                                              class="small"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-x"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke-width="1.5"
                                                                                    stroke="currentColor" fill="none"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path stroke="none"
                                                                                          d="M0 0h24v24H0z"
                                                                                          fill="none" />
                                                                                    <path d="M18 6l-12 12" />
                                                                                    <path d="M6 6l12 12" />
                                                                              </svg>
                                                                        </a>

                                                                        @endif
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!-- end product delivery notification--->

                                                      <!-- loan funds  notification--->
                                                      <!-- end loan notification--->
                                                      <!-- end notification group-item --->


                                                      <div class="list-group-item bg-white">
                                                            <div class="row align-items-center">
                                                                  <div class="col-auto ">
                                                                        <a href="" class="small text-secondary">
                                                                              Show all notifications
                                                                        </a>
                                                                  </div>
                                                                  <div class="col text-truncate" style="width:300px;">
                                                                        <div
                                                                              class="d-block text-secondary text-truncate mt-n1">
                                                                              <div class=" text-secondary">
                                                                                    <a href="" data-id=""
                                                                                          class=" text-secondary">

                                                                                    </a>
                                                                              </div>
                                                                        </div>
                                                                  </div>
                                                                  <div class="col-auto">
                                                                        <a href="" title="Clear" alt="Clear"
                                                                              class="text-secondary small">
                                                                              Cancel all
                                                                        </a>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!-- show and clear all notification -->

                                                </div>
                                                <!-- group list -->
                                          </div>
                                    </div>
                              </div>
                        </div>
                        @endif
                        @endauth
                        <!--- end merchant notification --->

                        <!--- FMCG notification start --->
                        @auth
                        @if(Auth::user()->role_name == 'fmcg')
                        <div class="nav-item dropdown d-none d-md-flex me-3">
                              <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                                    aria-label="Show notifications">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path
                                                d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                          <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                    </svg>
                                    <span
                                          class="badge bg-red text-white">{{ auth()->user()->unreadNotifications()->count() }}</span>
                              </a>
                              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                                    <div class="card">
                                          <div class="card-header">
                                                <h3 class="card-title">Recent notifications</h3>
                                          </div>
                                          <div class="list-group list-group-flush list-group-hoverable">
                                                <!-- my order notification--->
                                                <div class="list-group-item">
                                                      <div class="row align-items-center">
                                                            <div class="col-auto "><span
                                                                        class="status-dot status-dot-animated bg-yellow d-block"></span>
                                                            </div>
                                                            <div class="col text-truncate">
                                                                  <a href="#" class="text-body d-block">
                                                                        {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\NewOrder')->count()}}
                                                                        Order (s)
                                                                  </a>
                                                                  <div
                                                                        class="d-block text-secondary text-truncate mt-n1">
                                                                        @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewOrder') as $notification)
                                                                    
                                                                              <a href="{{ url('read-cancel-order') }}/{{ $notification->id }}"
                                                                                    data-id="{{$notification->id}}"
                                                                                    class=" text-secondary">

                                                                                    {!!
                                                                                    Str::limit("$notification->data",
                                                                                    50, ' ...') !!}

                                                                              </a>
                                                                        @endforeach
                                                                  </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                  @if(auth()->user()->unreadNotifications->where('type',
                                                                  'App\Notifications\NewOrder'))
                                                                  <a href="" title="Clear" alt="Clear"
                                                                        class="small"><svg
                                                                              xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-x"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path d="M18 6l-12 12" />
                                                                              <path d="M6 6l12 12" />
                                                                        </svg>
                                                                  </a>

                                                                  @endif
                                                            </div>
                                                      </div>
                                                </div>
                                                <!-- end new order notification--->


                                                <!-- product delivery notification--->
                                                <div class="list-group-item">
                                                      <div class="row align-items-center">
                                                            <div class="col-auto"><span
                                                                        class="status-dot status-dot-animated bg-green d-block"></span>
                                                            </div>
                                                            <div class="col text-truncate">
                                                                  <a href="#" class="text-body d-block">
                                                                        {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ProductApproved')->count()}}
                                                                        Product (s)
                                                                  </a>
                                                                  <div
                                                                        class="d-block text-secondary text-truncate mt-n1">
                                                                        @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ProductApproved') as $notification)
                                                                 
                                                                              <a href="{{ url('read-product-delivered') }}/{{ $notification->id }}"
                                                                                    data-id="{{$notification->id}}"
                                                                                    class=" text-secondary">

                                                                                    {!!
                                                                                    Str::limit("$notification->data",
                                                                                    50, ' ...') !!}

                                                                              </a>
                                                                        @endforeach

                                                                  </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                  @if(auth()->user()->unreadNotifications->where('type',
                                                                  'App\Notifications\ProductApproved'))
                                                                  <a href="" title="Clear" alt="Clear"
                                                                        class="small"><svg
                                                                              xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-x"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path d="M18 6l-12 12" />
                                                                              <path d="M6 6l12 12" />
                                                                        </svg>
                                                                  </a>

                                                                  @endif
                                                            </div>
                                                      </div>
                                                </div>
                                                <!-- end product delivery notification--->

                                                <!-- loan funds  notification--->
                                                <!-- end loan notification--->
                                                <!-- end notification group-item --->

                                                <div class="list-group-item bg-white">
                                                      <div class="row align-items-center">
                                                            <div class="col-auto ">
                                                                  <a href="" class="small text-secondary">
                                                                        Show all notifications
                                                                  </a>
                                                            </div>
                                                            <div class="col text-truncate" style="width:300px;">
                                                                  <div
                                                                        class="d-block text-secondary text-truncate mt-n1">
                                                                        <div class=" text-secondary">
                                                                              <a href="" data-id=""
                                                                                    class=" text-secondary">

                                                                              </a>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                  <a href="" title="Clear" alt="Clear"
                                                                        class="text-secondary small">
                                                                        Cancel all
                                                                  </a>
                                                            </div>
                                                      </div>
                                                </div>
                                                <!-- show and clear all notification -->

                                          </div>
                                          <!-- group list -->
                                    </div>
                              </div>
                        </div>
            </div>
            @endif
            @endauth
            <!--- end FMCG notification --->

            <!--- SuperAdmin notification start --->

            @auth
            @if(Auth::user()->role_name == 'superadmin')
            <div class="nav-item dropdown d-none d-md-flex me-3">
                  <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                              stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                              stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                    d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                              <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        </svg>
                        <span
                              class="badge bg-red text-white">{{ auth()->user()->unreadNotifications()->count() }}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                              <div class="card-header">
                                    <h3 class="card-title">Recent notifications</h3>
                              </div>
                              <div class="list-group list-group-flush list-group-hoverable">
                                    <!-- my order notification--->
                                    <div class="list-group-item">
                                          <div class="row align-items-center">
                                                <div class="col-auto "><span
                                                            class="status-dot status-dot-animated bg-yellow d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                      <a href="#" class="text-body d-block">

                                                            {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\NewOrder')->count()}}
                                                            Order (s)
                                                      </a>
                                                      <div class="d-block text-secondary text-truncate mt-n1">

                                                            <!--member order here-->
                                                            @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\NewOrder') as $notification)
                                                           
                                                                  <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                        data-id="{{$notification->id}}"
                                                                        class=" text-secondary">

                                                                        Member:
                                                                        {!!
                                                                        Str::limit("$notification->data",
                                                                        50, ' ...') !!}

                                                                  </a>
                                                            @endforeach

                                                            <!-- customer order here--->
                                                            @foreach(auth()->user()->unreadNotifications->where('type',  'App\Notifications\CustomerOrder')  as $notification)
                                                        
                                                                  <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                        data-id="{{$notification->id}}"
                                                                        class=" text-secondary">

                                                                        Customer:
                                                                        {!!
                                                                        Str::limit("$notification->data",
                                                                        50, ' ...') !!}

                                                                  </a>
                                                            @endforeach
                                                      </div>
                                                </div>
                                                <div class="col-auto">
                                                      @if(auth()->user()->unreadNotifications->where('type',
                                                      'App\Notifications\NewOrder'))
                                                      <a href="{{route('read-all-order')}}" title="Clear" alt="Clear"
                                                            class="small"><svg xmlns="http://www.w3.org/2000/svg"
                                                                  class="icon icon-tabler icon-tabler-x" width="24"
                                                                  height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                                  stroke="currentColor" fill="none"
                                                                  stroke-linecap="round" stroke-linejoin="round">
                                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                  <path d="M18 6l-12 12" />
                                                                  <path d="M6 6l12 12" />
                                                            </svg>
                                                      </a>

                                                      @endif
                                                </div>
                                          </div>
                                    </div>
                                    <!-- end new order notification--->


                                    <!-- product delivery notification--->
                                    <div class="list-group-item">
                                          <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                            class="status-dot status-dot-animated bg-green d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                      <a href="#" class="text-body d-block">
                                                            {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ProductDelivered')->count()}}
                                                            Product (s)
                                                      </a>
                                                      <div class="d-block text-secondary text-truncate mt-n1">
                                                            <!-- my product approval here -->
                                                            @foreach(auth()->user()->unreadNotifications->where('type',  'App\Notifications\ProductDelivered') as $notification)
                                            
                                                                  <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                        data-id="{{$notification->id}}"
                                                                        class=" text-secondary">

                                                                        {!!
                                                                        Str::limit("$notification->data",
                                                                        50, ' ...') !!}

                                                                  </a>
                                                            @endforeach
                                                            <!-- product delivery here product i boguth when a seller click delivery -->
                                                            @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ProductDelivered') as $notification)
                                                           
                                                                  <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                        data-id="{{$notification->id}}"
                                                                        class=" text-secondary">

                                                                        {!!
                                                                        Str::limit("$notification->data",
                                                                        50, ' ...') !!}

                                                                  </a>
                                                            @endforeach
                                                      </div>
                                                </div>
                                                <div class="col-auto">
                                                      @if(auth()->user()->unreadNotifications->where('type',
                                                      'App\Notifications\ProductDelivered'))
                                                      <a href="{{route('product-delivered')}}" title="Clear" alt="Clear"
                                                            class="small"><svg xmlns="http://www.w3.org/2000/svg"
                                                                  class="icon icon-tabler icon-tabler-x" width="24"
                                                                  height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                                  stroke="currentColor" fill="none"
                                                                  stroke-linecap="round" stroke-linejoin="round">
                                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                  <path d="M18 6l-12 12" />
                                                                  <path d="M6 6l12 12" />
                                                            </svg>
                                                      </a>

                                                      @endif
                                                </div>
                                          </div>
                                    </div>
                                    <!-- end product delivery notification--->

                                    <!-- loan funds  notification--->
                                    <div class="list-group-item">
                                          <div class="row align-items-center">
                                                <div class="col-auto"><span
                                                            class="status-dot status-dot-animated bg-azure d-block"></span>
                                                </div>
                                                <div class="col text-truncate">
                                                      <a href="#" class="text-body d-block">
                                                            {{auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ApproveFund')->orwhere('type', 'App\Notifications\CancelFundRequest')->count()}}
                                                            Loan (s)
                                                      </a>
                                                      <div class="d-block text-secondary text-truncate mt-n1">
                                                            <!-- loan request from members -->
                                                            @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\ApproveFund') as $notification)
                                                       
                                                                  <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                        data-id="{{$notification->id}}"
                                                                        class=" text-secondary">

                                                                        {!!
                                                                        Str::limit("$notification->data",
                                                                        50, ' ...') !!}

                                                                  </a>
                                                            @endforeach

                                                            <!-- loan repayment my member -->
                                                            @foreach(auth()->user()->unreadNotifications->where('type', 'App\Notifications\CancelFundRequest') as $notification)
                                                         
                                                                  <a href="{{ url('read-admin-order') }}/{{ $notification->id }}"
                                                                        data-id="{{$notification->id}}"
                                                                        class=" text-secondary">

                                                                        {!!
                                                                        Str::limit("$notification->data",
                                                                        50, ' ...') !!}

                                                                  </a>
                                                            @endforeach
                                                      </div>
                                                </div>
                                                <div class="col-auto">
                                                      @if(auth()->user()->unreadNotifications->where('type',
                                                      'App\Notifications\ApproveFund'))
                                                      <a href="{{route('read-all-approve-funds')}}" title="Clear"
                                                            alt="Clear" class="small"><svg
                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                  class="icon icon-tabler icon-tabler-x" width="24"
                                                                  height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                                  stroke="currentColor" fill="none"
                                                                  stroke-linecap="round" stroke-linejoin="round">
                                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                  <path d="M18 6l-12 12" />
                                                                  <path d="M6 6l12 12" />
                                                            </svg>
                                                      </a>

                                                      @endif
                                                </div>
                                          </div>
                                    </div>
                                    <!-- end loan notification--->
                                    <!-- end notification group-item --->


                                    <div class="list-group-item bg-white">
                                          <div class="row align-items-center">
                                                <div class="col-auto ">
                                                      <a href="" class="small text-secondary">
                                                            Show all notifications
                                                      </a>
                                                </div>
                                                <div class="col text-truncate">
                                                      <div class="d-block text-secondary text-truncate mt-n1">
                                                            <div class=" text-secondary">
                                                                  <a href="" data-id="" class=" text-secondary">

                                                                  </a>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="col-auto">
                                                      <a href="" title="Clear" alt="Clear" class="text-secondary small">
                                                            Cancel all
                                                      </a>
                                                </div>
                                          </div>
                                    </div>
                                    <!-- show and clear all notification -->

                              </div>
                              <!-- group list -->
                        </div>
                  </div>
            </div>
      </div>
      @endif
      @endauth
      <!-- end cooperative notification -->

      <!--- end SuperAdmin notification --->

      <!-- cooperative profile -->
      @auth
      @if(Auth::user()->role_name == 'cooperative')
      <div class="nav-item dropdown ">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-0 " data-bs-toggle="dropdown"
                  aria-label="Open user menu">
                  <!-- logo --->
                  @php $image = Auth::user()->profile_img;
                  @endphp
                  <span class="avatar avatar-sm d-none d-sm-none  d-md-block"
                        style="background-image: url({{$image}} )"></span>
                  <div class="d-block d-xl-block ps-2 ">
                        @php $companyName = Auth::user()->coopname;
                        @endphp
                        <div class="dropdown-toggle">
                              {!! Str::limit("$companyName", 9, '...') !!}
                        </div>
                        <div class="mt-1 small text-secondary">Admin</div>
                  </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                  <a href="{{ url('account-settings') }}" class="dropdown-item">Settings</a>
                  @endif
                  @endauth
                  <!--end cooperative profile -->

                  <!-- merchant profile -->
                  @auth
                  @if(Auth::user()->role_name == 'merchant')
                  <div class="nav-item dropdown ">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0 " data-bs-toggle="dropdown"
                              aria-label="Open user menu">
                              <!-- logo --->
                              @php $image = Auth::user()->profile_img;
                              @endphp
                              <span class="avatar avatar-sm d-none d-sm-none  d-md-block"
                                    style="background-image: url({{$image}} )"></span>
                              <div class="d-block d-xl-block ps-2 ">
                                    @php $companyName = Auth::user()->coopname;
                                    @endphp
                                    <div class="dropdown-toggle">
                                          {!! Str::limit("$companyName", 9, '...') !!}
                                    </div>
                                    <div class="mt-1 small text-secondary">
                                          Vendor</div>
                              </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                              <a href="{{ url('account-settings') }}" class="dropdown-item">Settings</a>
                              @endif
                              @endauth
                              <!--end merchant profile -->

                              <!-- fmcg profile -->
                              @auth
                              @if(Auth::user()->role_name == 'fmcg')
                              <div class="nav-item dropdown ">
                                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0 " data-bs-toggle="dropdown"
                                          aria-label="Open user menu">
                                          <!-- logo --->
                                          @php $image = Auth::user()->profile_img;
                                          @endphp
                                          <span class="avatar avatar-sm d-none d-sm-none  d-md-block"
                                                style="background-image: url({{$image}} )"></span>
                                          <div class="d-block d-xl-block ps-2 ">
                                                @php $companyName = Auth::user()->coopname;
                                                @endphp
                                                <div class="dropdown-toggle">
                                                      {!! Str::limit("$companyName", 9, '...') !!}
                                                </div>
                                                <div class="mt-1 small text-secondary">
                                                      Fmcg</div>
                                          </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                          <a href="{{ url('account-settings') }}" class="dropdown-item">Settings</a>
                                          @endif
                                          @endauth
                                          <!--end fmcg profile -->
                                          <!-- member profile -->
                                          @auth
                                          @if(Auth::user()->role_name == 'member')
                                          <div class="nav-item dropdown ">
                                                <a href="#" class="nav-link d-flex lh-1 text-reset p-0 "
                                                      data-bs-toggle="dropdown" aria-label="Open user menu">
                                                      <!-- logo --->
                                                      @php $image =
                                                      App\Models\User::where('code',
                                                      Auth::user()->code)
                                                      ->where('coopname',
                                                      Auth::user()->coopname)
                                                      ->where('role_name', 'cooperative');

                                                      $getLogo = $image->pluck('profile_img')->toArray();
                                                      $cooperativeLogo = implode(" ", $getLogo);
                                                      @endphp

                                                      <span class="avatar avatar-sm d-none d-sm-none  d-md-block"
                                                            style="background-image: url( {{$cooperativeLogo}} )"></span>
                                                      <div class="d-block d-xl-block ps-2 ">
                                                            @php $companyName =
                                                            Auth::user()->coopname;
                                                            @endphp
                                                            <div class="dropdown-toggle">
                                                                  {!! Str::limit("$companyName", 9, '...') !!}
                                                            </div>
                                                            <div class="mt-1 small text-secondary">
                                                                  Member</div>
                                                      </div>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                                      <a href="{{ url('account-settings') }}"
                                                            class="dropdown-item">Settings</a>
                                                      @endif
                                                      @endauth
                                                      <!--end member profile -->
                                                      <!-- SuperAdmin profile -->
                                                      @auth
                                                      @if(Auth::user()->role_name == 'superadmin')
                                                      <div class="nav-item dropdown ">
                                                            <a href="#" class="nav-link d-flex lh-1 text-reset p-0 "
                                                                  data-bs-toggle="dropdown" aria-label="Open user menu">
                                                                  <!-- logo --->
                                                                  @php $image =
                                                                  Auth::user()->profile_img;
                                                                  @endphp
                                                                  <span class="avatar avatar-sm d-none d-sm-none  d-md-block"
                                                                        style="background-image: url({{$image}} )"></span>
                                                                  <div class="d-block d-xl-block ps-2 ">
                                                                        @php $companyName =
                                                                        Auth::user()->coopname;
                                                                        @endphp
                                                                        <div class="dropdown-toggle">
                                                                              {!!
                                                                              Str::limit("$companyName", 9, '...')
                                                                              !!}
                                                                        </div>
                                                                        <div class="mt-1 small text-secondary">
                                                                              SuperAdmin
                                                                        </div>
                                                                  </div>
                                                            </a>
                                                            <div
                                                                  class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">

                                                                  <a href="{{ url('account-settings') }}"
                                                                        class="dropdown-item">Settings</a>
                                                                  @endif
                                                                  @endauth
                                                                  <!--end superadmin profile -->
                                                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault();
                                                                                                      document.getElementById('logout-form').submit();">Logout

                                                                  </a>

                                                                  <form id="logout-form" action="{{ route('logout') }}"
                                                                        method="POST" class="d-none">
                                                                        @csrf
                                                                  </form>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                          </header>
                                          <!--- NAVIGATION HEADER --->
                                          <header class="navbar-expand-md">
                                                <div class="collapse navbar-collapse" id="navbar-menu">
                                                      <div class="navbar">
                                                            <div class="container-xl">
                                                                  <ul class="navbar-nav">
                                                                        @auth
                                                                        @if(Auth::user()->role_name ==
                                                                        'cooperative')
                                                                        <li class="nav-item">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('cooperative') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                                                                                <path
                                                                                                      d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                                                                <path
                                                                                                      d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Home
                                                                                    </span>
                                                                              </a>
                                                                        </li>


                                                                        <li class="nav-item active dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-layout"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-building-store"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path d="M3 21l18 0" />
                                                                                                <path
                                                                                                      d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                                                                                <path
                                                                                                      d="M5 21l0 -10.15" />
                                                                                                <path
                                                                                                      d="M19 21l0 -10.15" />
                                                                                                <path
                                                                                                      d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Store
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">

                                                                                                <a class="dropdown-item"
                                                                                                      href="{{url('admin-products')}}">
                                                                                                      Products
                                                                                                      List
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ route('add_new_product') }}">
                                                                                                      Add Product
                                                                                                      <span
                                                                                                            class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('cooperative-sales') }}">
                                                                                                      Sales
                                                                                                </a>

                                                                                          </div>

                                                                                    </div>
                                                                              </div>
                                                                        </li>



                                                                        <li class="nav-item dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-help"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-users-group"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                                                <path
                                                                                                      d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                                                                                <path
                                                                                                      d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 10h2a2 2 0 0 1 2 2v1" />
                                                                                                <path
                                                                                                      d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                                                <path
                                                                                                      d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Members
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href=""
                                                                                                      data-bs-toggle="modal"
                                                                                                      data-bs-target="#modal-adminAddMember">
                                                                                                      Add Member
                                                                                                      <span
                                                                                                            class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{url('members')}}"
                                                                                                      rel="noopener">
                                                                                                      Members List
                                                                                                </a>
                                                                                                <a
                                                                                                      class="dropdown-item">
                                                                                                      Excos
                                                                                                      Members
                                                                                                </a>


                                                                                          </div>

                                                                                    </div>
                                                                              </div>
                                                                        </li>

                                                                        <li class="nav-item dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-base"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-shopping-bag"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                                                                <path
                                                                                                      d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Order
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('admin-order-history') }}">
                                                                                                      My Order
                                                                                                      History
                                                                                                </a>

                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('admin-member-order') }}">
                                                                                                      Member Order
                                                                                                      (s)
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('view-canceled-orders') }}">
                                                                                                      Cancel
                                                                                                      Orders
                                                                                                </a>

                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </li>

                                                                        <li class="nav-item dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-base"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-shopping-bag"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                                                                <path
                                                                                                      d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Savings
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('wallet') }}">
                                                                                                      Wallet
                                                                                                </a>

                                                                                                <a class="dropdown-item"
                                                                                                      href="">
                                                                                                      Withdrawal
                                                                                                </a>
                                                                                                <!-- <a href="#"
                                                                                                            class="dropdown-item"
                                                                                                            data-bs-toggle="modal"
                                                                                                            data-bs-target="#modal-credit">
                                                                                                            Request
                                                                                                            Credit
                                                                                                      </a> -->

                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </li>

                                                                        <li class="nav-item dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-base"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">

                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-coins"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" />
                                                                                                <path
                                                                                                      d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" />
                                                                                                <path
                                                                                                      d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" />
                                                                                                <path
                                                                                                      d="M3 6v10c0 .888 .772 1.45 2 2" />
                                                                                                <path
                                                                                                      d="M3 11c0 .888 .772 1.45 2 2" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Loan Management
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a href="{{ url('cooperative-loan') }}"
                                                                                                      class="dropdown-item">
                                                                                                      Overview
                                                                                                </a>

                                                                                                <div class="dropend">
                                                                                                      <a class="dropdown-item dropdown-toggle"
                                                                                                            href="#sidebar-authentication"
                                                                                                            data-bs-toggle="dropdown"
                                                                                                            data-bs-auto-close="outside"
                                                                                                            role="button"
                                                                                                            aria-expanded="false">
                                                                                                            Loan
                                                                                                            Stages
                                                                                                      </a>
                                                                                                      <div
                                                                                                            class="dropdown-menu">
                                                                                                            <a href="{{ url('requested-loans') }}"
                                                                                                                  class="dropdown-item">
                                                                                                                  Requested
                                                                                                                  Loans
                                                                                                            </a>
                                                                                                            <a href="{{ url('approved-loans') }}"
                                                                                                                  class="dropdown-item">
                                                                                                                  Approved
                                                                                                                  Loans
                                                                                                            </a>
                                                                                                            <a href="{{ url('payout-loans') }}"
                                                                                                                  class="dropdown-item">
                                                                                                                  PayOut
                                                                                                                  Loans
                                                                                                            </a>
                                                                                                            <a href=""
                                                                                                                  class="dropdown-item">
                                                                                                                  Finished
                                                                                                                  Loans
                                                                                                            </a>
                                                                                                      </div>
                                                                                                </div>
                                                                                                <a href="{{ url('cooperative-due-loan') }}"
                                                                                                      class="dropdown-item">
                                                                                                      Due Loans
                                                                                                </a>


                                                                                          </div>
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a href="{{ url('cooperative-create-loan') }}"
                                                                                                      class="dropdown-item">
                                                                                                      Add Loan
                                                                                                      <span
                                                                                                            class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>

                                                                                                </a>

                                                                                                <!-- <a href="{{ url('cooperative-loan-type') }}"
                                                                                                            class="dropdown-item">
                                                                                                            Loan Type
                                                                                                      </a> -->
                                                                                                <a href=""
                                                                                                      class="dropdown-item">
                                                                                                      Repayments
                                                                                                </a>
                                                                                          </div>


                                                                                    </div>
                                                                              </div>
                                                                        </li>


                                                                        <li class="nav-item d-md-none d-sm-block">
                                                                              <a class="nav-link "
                                                                                    href="{{ url('fmcgs_products') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-shopping-cart"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 17h-11v-14h-2" />
                                                                                                <path
                                                                                                      d="M6 5l14 1l-1 7h-13" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          FMCG Products
                                                                                    </span>
                                                                              </a>
                                                                        </li>
                                                                        @endif
                                                                        @endauth
                                                                        <!--- end cooperative Nav bar --->

                                                                        <!--- start member Nav bar --->
                                                                        @auth
                                                                        @if(Auth::user()->role_name == 'member')
                                                                        <li class="nav-item">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('dashboard') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                                                                                <path
                                                                                                      d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                                                                <path
                                                                                                      d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Home
                                                                                    </span>
                                                                              </a>
                                                                        </li>

                                                                        <li class="nav-item dropdown">
                                                                              <a href="{{ url('member-order') }}"
                                                                                    class="nav-link">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-shopping-bag"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                                                                <path
                                                                                                      d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Order History
                                                                                    </span>
                                                                              </a>

                                                                        </li>

                                                                        <li class="nav-item dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-base"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-shopping-bag"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                                                                <path
                                                                                                      d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Savings
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('wallet') }}">
                                                                                                      Wallet
                                                                                                </a>

                                                                                                <a class="dropdown-item"
                                                                                                      href="">
                                                                                                      Withdrawal
                                                                                                </a>

                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                        </li>

                                                                        <li class="nav-item dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-base"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">

                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-coins"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" />
                                                                                                <path
                                                                                                      d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" />
                                                                                                <path
                                                                                                      d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" />
                                                                                                <path
                                                                                                      d="M3 6v10c0 .888 .772 1.45 2 2" />
                                                                                                <path
                                                                                                      d="M3 11c0 .888 .772 1.45 2 2" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Loan Management
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a href="{{ url('member-request-loan') }}"
                                                                                                      class="dropdown-item">
                                                                                                      Request Loan
                                                                                                      <span
                                                                                                            class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>

                                                                                                </a>

                                                                                                <a href="{{ url('member-loan-history') }}"
                                                                                                      class="dropdown-item">
                                                                                                      Loan History
                                                                                                </a>


                                                                                          </div>
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a href="#"
                                                                                                      class="dropdown-item">
                                                                                                      Loan
                                                                                                      Repayment
                                                                                                </a>
                                                                                          </div>
                                                                                    </div>
                                                                              </div>

                                                                        </li>

                                                                        @endif
                                                                        @endauth
                                                                        <!--- end member Nav bar --->

                                                                        <!--- start merchant Nav bar --->
                                                                        @auth
                                                                        @if(Auth::user()->role_name == 'merchant')
                                                                        <li class="nav-item">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('merchant') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                                                                                <path
                                                                                                      d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                                                                <path
                                                                                                      d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Home
                                                                                    </span>
                                                                              </a>
                                                                        </li>


                                                                        <li class="nav-item active dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-layout"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-building-store"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path d="M3 21l18 0" />
                                                                                                <path
                                                                                                      d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                                                                                <path
                                                                                                      d="M5 21l0 -10.15" />
                                                                                                <path
                                                                                                      d="M19 21l0 -10.15" />
                                                                                                <path
                                                                                                      d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Store
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{url('vendor-products')}}">
                                                                                                      Products
                                                                                                      List
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('vendor-new-product') }}">
                                                                                                      Add Product
                                                                                                      <span
                                                                                                            class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                                                                                </a>

                                                                                          </div>

                                                                                    </div>
                                                                              </div>
                                                                        </li>


                                                                        <li class="nav-item dropdown">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('vendor-sales') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-shopping-bag"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                                                                <path
                                                                                                      d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    Sales

                                                                              </a>
                                                                        </li>
                                                                        @endif
                                                                        @endauth
                                                                        <!--- end merchant Nav bar --->

                                                                        <!--- start FMCG Nav bar --->
                                                                        @auth
                                                                        @if(Auth::user()->role_name == 'fmcg')
                                                                        <li class="nav-item">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('fmcg') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                                                                                <path
                                                                                                      d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                                                                <path
                                                                                                      d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Home
                                                                                    </span>
                                                                              </a>
                                                                        </li>


                                                                        <li class="nav-item active dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-layout"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-building-store"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path d="M3 21l18 0" />
                                                                                                <path
                                                                                                      d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                                                                                <path
                                                                                                      d="M5 21l0 -10.15" />
                                                                                                <path
                                                                                                      d="M19 21l0 -10.15" />
                                                                                                <path
                                                                                                      d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Store
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{url('fmcg-products')}}">
                                                                                                      Products
                                                                                                      List
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('fmcg-new-product') }}">
                                                                                                      Add Product
                                                                                                      <span
                                                                                                            class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                                                                                                </a>

                                                                                          </div>

                                                                                    </div>
                                                                              </div>
                                                                        </li>

                                                                        <li class="nav-item dropdown">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('fmcg-sales') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-shopping-bag"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z" />
                                                                                                <path
                                                                                                      d="M9 11v-5a3 3 0 0 1 6 0v5" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    Sales

                                                                              </a>
                                                                        </li>

                                                                        <li class="nav-item d-md-none d-sm-block">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('fmcgs_products') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-brand-producthunt"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M10 16v-8h2.5a2.5 2.5 0 1 1 0 5h-2.5" />
                                                                                                <path
                                                                                                      d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          FMCG Products
                                                                                    </span>
                                                                              </a>
                                                                        </li>


                                                                        @endif
                                                                        @endauth
                                                                        <!--- end FMCG Nav bar --->

                                                                        <!--- start SuperAdmin Nav bar --->
                                                                        @auth
                                                                        @if(Auth::user()->role_name ==
                                                                        'superadmin')
                                                                        <li class="nav-item">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('superadmin') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                                                                                <path
                                                                                                      d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                                                                <path
                                                                                                      d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Home
                                                                                    </span>
                                                                              </a>
                                                                        </li>


                                                                        <li class="nav-item active dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-layout"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                                                <path
                                                                                                      d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                                                                                <path
                                                                                                      d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 10h2a2 2 0 0 1 2 2v1" />
                                                                                                <path
                                                                                                      d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                                                <path
                                                                                                      d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                                                                          </svg>

                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Users
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{url('all-fmcgs')}}">
                                                                                                      FMCG (s)
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('all-cooperatives') }}">
                                                                                                      Cooperative
                                                                                                      (s)
                                                                                                </a>


                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('all-vendors') }}">
                                                                                                      Vendor (s)
                                                                                                </a>

                                                                                          </div>

                                                                                    </div>
                                                                              </div>
                                                                        </li>

                                                                        <li class="nav-item active dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-layout"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M10 16v-8h2.5a2.5 2.5 0 1 1 0 5h-2.5" />
                                                                                                <path
                                                                                                      d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                                                          </svg>

                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Product List
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{url('products_list')}}">
                                                                                                      Vendor
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('fmcg-products-list') }}">
                                                                                                      FMCG
                                                                                                </a>

                                                                                          </div>

                                                                                    </div>
                                                                              </div>
                                                                        </li>

                                                                        <li class="nav-item">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('order-history') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 17h-11v-14h-2" />
                                                                                                <path
                                                                                                      d="M6 5l14 1l-1 7h-13" />
                                                                                          </svg>

                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Order (s)
                                                                                    </span>
                                                                              </a>
                                                                        </li>



                                                                        <li class="nav-item active dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-layout"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" />
                                                                                                <path
                                                                                                      d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" />
                                                                                                <path
                                                                                                      d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" />
                                                                                                <path
                                                                                                      d="M3 6v10c0 .888 .772 1.45 2 2" />
                                                                                                <path
                                                                                                      d="M3 11c0 .888 .772 1.45 2 2" />
                                                                                          </svg>

                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Loan Management
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{url('products_list')}}">
                                                                                                      Cooperative Loan
                                                                                                      (s)
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('products_list') }}">
                                                                                                      History
                                                                                                </a>



                                                                                          </div>

                                                                                    </div>
                                                                              </div>
                                                                        </li>

                                                                        <li class="nav-item active dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-layout"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                                                                                <path
                                                                                                      d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                                                                          </svg>

                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Wallets
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{url('products_list')}}">
                                                                                                      Accounts
                                                                                                </a>
                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('products_list') }}">
                                                                                                      Withdrawals
                                                                                                </a>

                                                                                                <a class="dropdown-item"
                                                                                                      href="{{ url('products_list') }}">
                                                                                                      Debits
                                                                                                </a>

                                                                                          </div>

                                                                                    </div>
                                                                              </div>
                                                                        </li>

                                                                        <li class="nav-item dropdown">
                                                                              <a class="nav-link dropdown-toggle"
                                                                                    href="#navbar-base"
                                                                                    data-bs-toggle="dropdown"
                                                                                    data-bs-auto-close="outside"
                                                                                    role="button" aria-expanded="false">

                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                                                                <path
                                                                                                      d="M19 18v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1" />
                                                                                                <path
                                                                                                      d="M3 14h3m4.5 0h3m4.5 0h3" />
                                                                                                <path
                                                                                                      d="M5 10v-5a2 2 0 0 1 2 -2h7l5 5v2" />
                                                                                          </svg>

                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Pages
                                                                                    </span>
                                                                              </a>
                                                                              <div class="dropdown-menu">
                                                                                    <div class="dropdown-menu-columns">
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a href="{{ url('about_us') }}"
                                                                                                      class="dropdown-item">
                                                                                                      About

                                                                                                </a>
                                                                                                <a href="{{ url('refund') }}"
                                                                                                      class="dropdown-item">
                                                                                                      Return
                                                                                                      Policy
                                                                                                </a>

                                                                                                <a href="{{ url('subscribers') }}"
                                                                                                      class="dropdown-item">
                                                                                                      Subscribers
                                                                                                </a>

                                                                                          </div>
                                                                                          <div
                                                                                                class="dropdown-menu-column">
                                                                                                <a href="{{ url('privacy') }}"
                                                                                                      class="dropdown-item">
                                                                                                      Privacy
                                                                                                      Policy
                                                                                                </a>
                                                                                                <a href="{{ url('tandc') }}"
                                                                                                      class="dropdown-item">
                                                                                                      T & C
                                                                                                </a>
                                                                                          </div>
                                                                                    </div>
                                                                              </div>

                                                                        </li>

                                                                        <li class="nav-item">
                                                                              <a class="nav-link"
                                                                                    href="{{ url('logActivity') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon" width="24"
                                                                                                height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12h4l3 8l4 -16l3 8h4" />
                                                                                          </svg>

                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          Log Activities
                                                                                    </span>
                                                                              </a>
                                                                        </li>

                                                                        <li class="nav-item d-md-none d-sm-block">
                                                                              <a class="nav-link "
                                                                                    href="{{ url('fmcgs_products') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-shopping-cart"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 17h-11v-14h-2" />
                                                                                                <path
                                                                                                      d="M6 5l14 1l-1 7h-13" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          FMCG Mart
                                                                                    </span>
                                                                              </a>
                                                                        </li>


                                                                        @endif
                                                                        @endauth
                                                                        <!--- end SuperAdmin Nav bar --->

                                                                        <li class="nav-item d-md-none d-sm-block">
                                                                              <a class="nav-link" href="{{ url('/') }}">
                                                                                    <span
                                                                                          class="nav-link-icon d-md-none d-lg-inline-block">
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon icon-tabler icon-tabler-shopping-cart"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="1.5"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                                <path
                                                                                                      d="M17 17h-11v-14h-2" />
                                                                                                <path
                                                                                                      d="M6 5l14 1l-1 7h-13" />
                                                                                          </svg>
                                                                                    </span>
                                                                                    <span class="nav-link-title">
                                                                                          LascocoMart
                                                                                    </span>
                                                                              </a>
                                                                        </li>
                                                                  </ul>

                                                            </div>
                                                      </div>
                                                </div>
                                          </header>
                                    </div>
                                    <!-- NAVIGATION END header -->

                                    <div class="page-wrapper">
                                          @yield('content')
                                          <footer class="footer footer-transparent d-print-none">
                                                <div class="container-xl">
                                                      <div class="row text-center align-items-center flex-row-reverse">
                                                            <div class="col-lg-auto ms-lg-auto">
                                                                  <ul class="list-inline list-inline-dots mb-0">
                                                                        <li class="list-inline-item"><a href=""
                                                                                    target="_blank"
                                                                                    class="link-secondary"
                                                                                    rel="noopener">Privacy</a>
                                                                        </li>
                                                                        <li class="list-inline-item"><a href=""
                                                                                    class="link-secondary">T &
                                                                                    C</a>
                                                                        </li>
                                                                        <li class="list-inline-item"><a href=""
                                                                                    class="link-secondary">FAQ</a>
                                                                        </li>

                                                                        <li class="list-inline-item">
                                                                              <a href="" target="_blank"
                                                                                    class="link-secondary"
                                                                                    rel="noopener">
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon text-pink icon-filled icon-inline"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                                    </svg>
                                                                                    Support
                                                                              </a>
                                                                        </li>
                                                                  </ul>
                                                            </div>
                                                            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                                                                  <ul class="list-inline list-inline-dots mb-0">
                                                                        <li class="list-inline-item">
                                                                              Copyright &copy; {{ date('Y')}}
                                                                              <a href="."
                                                                                    class="link-secondary">LascocoMart</a>.

                                                                        </li>

                                                                  </ul>
                                                            </div>
                                                      </div>
                                                </div>
                                          </footer>
                                    </div>
                                    <!--- end page-div--->
                              </div>

                              <!--- request Credit modal --->
                              <div class="modal modal-blur fade" id="modal-credit" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title">Request New Credit </h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                      @auth
                                                      @if(Auth::user()->role_name == 'cooperative')
                                                      <form method="POST" action="{{ route('send-fund-request') }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                  <label class="form-label">Amount</label>
                                                                  <input type="text" class="form-control" name="amount"
                                                                        placeholder="Enter the amount you are requesting">
                                                            </div>


                                                            <div class="modal-footer">
                                                                  <a href="#" class="btn btn-link link-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Cancel
                                                                  </a>
                                                                  <button type="submit" name="submit"
                                                                        class="btn btn-danger ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-send"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path d="M10 14l11 -11" />
                                                                              <path
                                                                                    d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                                                        </svg>
                                                                        Send
                                                                  </button>
                                                            </div>
                                                      </form>
                                                      @endif
                                                      @endauth
                                                </div>

                                          </div>
                                    </div>
                              </div>
                              <!--- end credit modal --->


                              <!-- admin add member--->

                              <div class="modal modal-blur fade" id="modal-adminAddMember" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title">Add New Member </h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                      @auth
                                                      @if(Auth::user()->role_name == 'cooperative')
                                                      <form method="POST" action="{{ route('add-member') }}">
                                                            @csrf
                                                            <div class="row g-3">
                                                                  <div class="col-md">
                                                                        <div class="form-label required">Full Name
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                              name="fullname" value="">
                                                                        @error('fullname')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>

                                                                  <div class="col-md">
                                                                        <div class="form-label required">Email
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                              name="email" value="">
                                                                        @error('email')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>
                                                            </div>
                                                            <p></p>
                                                            <div class="row g-3">
                                                                  <div class="col-md">
                                                                        <div class="form-label required">Mobile
                                                                        </div>
                                                                        <input type="text" name="phone"
                                                                              class="form-control"
                                                                              data-mask="0000-0000-0000"
                                                                              data-mask-visible="true"
                                                                              placeholder="0000-0000-0000"
                                                                              autocomplete="off" maxlength="13">
                                                                        @error('phone')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>

                                                                  <div class="col-md">
                                                                        <div class="form-label required">Role
                                                                        </div>
                                                                        <select name="role" id=""
                                                                              class="form-control text-capitalize">
                                                                              <option value="">Choose</option>
                                                                              @foreach(App\Models\Role::whereNotIn('id',
                                                                              array(1, 2, 3, 5))->get() as $role)
                                                                              <option value="{{$role->role_name}}">
                                                                                    {{$role->role_name}}</option>

                                                                              @endforeach
                                                                        </select>

                                                                        @error('role')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>
                                                            </div>

                                                            <!-- <h3 class="card-title mt-4">EXCO (s)</h3>
                                                      <p class="card-subtitle">Is  this  person an exco member?
                                                      </p>
                                                      <div>
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="exco">
                                                                  <span class="form-check-label form-check-label-on">EXCO
                                                                        yes</span>
                                                                  <span class="form-check-label form-check-label-off">
                                                                        no</span>
                                                            </label>
                                                      </div> -->


                                                            <div class="modal-footer">
                                                                  <a href="#" class="btn btn-link link-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Cancel
                                                                  </a>
                                                                  <button type="submit" name="submit"
                                                                        class="btn btn-danger ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-send"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path d="M10 14l11 -11" />
                                                                              <path
                                                                                    d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                                                        </svg>
                                                                        Send
                                                                  </button>
                                                            </div>
                                                      </form>
                                                      @endif
                                                      @endauth
                                                </div>

                                          </div>
                                    </div>
                              </div>
                              <!----end add member --->
                              <!--- fund wallet modal --->
                              <div class="modal modal-blur fade" id="modal-wallet" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                          <div class="modal-content">
                                                <div class="modal-header">
                                                      <h5 class="modal-title">Add Fund To Wallet </h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                      <form id="paymentForm" method="GET" name="submit">
                                                            @csrf
                                                            <script src="https://js.paystack.co/v1/inline.js">
                                                            </script>
                                                            <div class="mb-3">
                                                                  <label class="form-label">Amount</label>


                                                                  @auth

                                                                  <input type="hidden" value="{{Auth::user()->email}}"
                                                                        id="email" disabled>
                                                                  <input type="hidden" value="{{Auth::user()->id}}"
                                                                        id="user_id" disabled>
                                                                  @php
                                                                  $walletID = \App\Models\Wallet::where('user_id',
                                                                  Auth::user()->id)->pluck('id')->first();
                                                                  @endphp
                                                                  <input type="hidden" value="{{$walletID}}"
                                                                        id="wallet_id" disabled>

                                                                  <input type="text" class="form-control" name="amount"
                                                                        placeholder="Enter the amount you want to add"
                                                                        id="amount" value="">
                                                                  @endauth
                                                            </div>


                                                            <div class="modal-footer">
                                                                  <a href="#" class="btn btn-link link-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Cancel
                                                                  </a>
                                                                  <button type="button" name="submit"
                                                                        onclick=" payWithPaystack() "
                                                                        class="btn btn-danger ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-send"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path d="M10 14l11 -11" />
                                                                              <path
                                                                                    d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                                                        </svg>
                                                                        Add Fund
                                                                  </button>
                                                            </div>
                                                      </form>

                                                </div>

                                          </div>
                                    </div>
                              </div>
                              <!--- end fund wallet modal --->


                              <!-- Libs JS -->
                              <script src="/back/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
                              <script src="/back/dist/libs/jsvectormap/dist/js/jsvectormap.min.js">
                              </script>
                              <!-- Libs JS -->
                              <script src="/back/dist/libs/nouislider/dist/nouislider.min.js"></script>
                              <script src="/back/dist/libs/litepicker/dist/litepicker.js"></script>
                              <script src="/back/dist/libs/tom-select/dist/js/tom-select.base.min.js" defer>
                              < script src = "/back/dist/libs/apexcharts/dist/apexcharts.min.js" >
                              </script>
                              <script src="/back/dist/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
                              <script src="/back/dist/libs/jsvectormap/dist/maps/world.js"></script>
                              <script src="/back/dist/libs/jsvectormap/dist/maps/world-merc.js"></script>

                              </script>
                              <!-- Tabler Core -->
                              <script src="/back/dist/js/tabler.min.js"></script>
                              <script src="/back/dist/js/demo.min.js"></script>


                              <script>
                              var paymentForm = document.getElementById('paymentForm');
                              paymentForm.addEventListener('submit', payWithPaystack, false);

                              function payWithPaystack() {
                                    var handler = PaystackPop.setup({
                                          // pk_live_483aa57c04940d7f7565b235ab06f9621a15ef25
                                          //pk_test_6ce6e9d31412d8fd2574af630c65d0e9aa78c5c7
                                          key: 'pk_live_a8484bd7353caec4bfa924d6112c76439e5d7e99',
                                          email: document.getElementById("email").value,
                                          amount: document.getElementById("amount").value *
                                                100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                                          currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars

                                          reference: '' + Math.floor((Math.random() * 1000000000) +
                                                1
                                          ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                          metadata: {
                                                custom_fields: [{

                                                }]
                                          },
                                          callback: function(response) {
                                                var email = document.getElementById("email")
                                                      .value;
                                                var amount = document.getElementById("amount")
                                                      .value;
                                                var user_id = document.getElementById("user_id")
                                                      .value;
                                                var wallet_id = document.getElementById(
                                                      "wallet_id").value;

                                                var paystack_reference = response.reference;
                                                var reference = paystack_reference;

                                                var url = "{{ URL('fund-wallet-account/') }}" +
                                                      "/" + reference + "/" +
                                                      user_id + "/" + wallet_id + "/" + amount;
                                                location.href = url;

                                          },


                                          onClose: function() {
                                                alert(
                                                      'Transaction was not completed, window closed.'
                                                );
                                          }
                                    });
                                    handler.openIframe();
                              }
                              </script>
                              <script>
                              $(document).ready(function() {
                                    $("#show_hide_wallet a").on('click', function(event) {
                                          event.preventDefault();
                                          if ($('#show_hide_wallet input').attr("type") ==
                                                "text") {
                                                $('#show_hide_wallet input').attr('type',
                                                      'password');
                                                $('#show_hide_wallet i').addClass(
                                                      "fa-eye-slash");
                                                $('#show_hide_wallet i').removeClass(
                                                      "fa-eye");
                                          } else if ($('#show_hide_wallet input').attr(
                                                      "type") == "password") {
                                                $('#show_hide_wallet input').attr('type',
                                                      'text');
                                                $('#show_hide_wallet i').removeClass(
                                                      "fa-eye-slash");
                                                $('#show_hide_wallet i').addClass(
                                                      "fa-eye");
                                          }
                                    });
                              });
                              </script>
                              <script>
                              // loan type rate
                              function increaseValue() {
                                    var value = parseInt(document.getElementById('number').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value++;
                                    document.getElementById('number').value = value;
                              }

                              function decreaseValue() {
                                    var value = parseInt(document.getElementById('number').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value < 1 ? value = 1 : '';
                                    value--;
                                    document.getElementById('number').value = value;
                              }
                              </script>

                              <script>
                              // loan processing fee
                              function increaseFee() {
                                    var value = parseInt(document.getElementById('fee').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value++;
                                    document.getElementById('fee').value = value;
                              }

                              function decreaseFee() {
                                    var value = parseInt(document.getElementById('fee').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value < 1 ? value = 1 : '';
                                    value--;
                                    document.getElementById('fee').value = value;
                              }
                              </script>

                              <script>
                              // loan repayment duration
                              function increaseLoanTenure() {
                                    var value = parseInt(document.getElementById('loanTenure').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value++;
                                    document.getElementById('loanTenure').value = value;
                              }

                              function decreaseLoanTenure() {
                                    var value = parseInt(document.getElementById('loanTenure').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value < 1 ? value = 1 : '';
                                    value--;
                                    document.getElementById('loanTenure').value = value;
                              }
                              </script>

                              <script>
                              // loan interest rate
                              function increaseRate() {
                                    var value = parseInt(document.getElementById('rate').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value++;
                                    document.getElementById('rate').value = value;
                              }

                              function decreaseRate() {
                                    var value = parseInt(document.getElementById('rate').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value < 1 ? value = 1 : '';
                                    value--;
                                    document.getElementById('rate').value = value;
                              }
                              </script>
                              <script>
                              // loan type minimum duration
                              function increaseMin() {
                                    var value = parseInt(document.getElementById('min').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value++;
                                    document.getElementById('min').value = value;
                              }

                              function decreaseMin() {
                                    var value = parseInt(document.getElementById('min').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value < 1 ? value = 1 : '';
                                    value--;
                                    document.getElementById('min').value = value;
                              }
                              </script>

                              <script>
                              // loan type maximum duration
                              function increaseMax() {
                                    var value = parseInt(document.getElementById('max').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value++;
                                    document.getElementById('max').value = value;
                              }

                              function decreaseMax() {
                                    var value = parseInt(document.getElementById('max').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value < 1 ? value = 1 : '';
                                    value--;
                                    document.getElementById('max').value = value;
                              }
                              </script>

                              <script>
                              // loan approval
                              function increaseApproval() {
                                    var value = parseInt(document.getElementById('approval').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value++;
                                    document.getElementById('approval').value = value;
                              }

                              function decreaseApproval() {
                                    var value = parseInt(document.getElementById('approval').value, 10);
                                    value = isNaN(value) ? 0 : value;
                                    value < 1 ? value = 1 : '';
                                    value--;
                                    document.getElementById('approval').value = value;
                              }
                              </script>

                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document
                                          .getElementById('chart-mentions'), {
                                                chart: {
                                                      type: "bar",
                                                      fontFamily: 'inherit',
                                                      height: 240,
                                                      parentHeightOffset: 0,
                                                      toolbar: {
                                                            show: false,
                                                      },
                                                      animations: {
                                                            enabled: false
                                                      },
                                                      stacked: true,
                                                },
                                                plotOptions: {
                                                      bar: {
                                                            columnWidth: '50%',
                                                      }
                                                },
                                                dataLabels: {
                                                      enabled: false,
                                                },
                                                fill: {
                                                      opacity: 1,
                                                },
                                                series: [{
                                                      name: "Web",
                                                      data: [1, 0, 0, 0,
                                                            0, 1,
                                                            1, 0,
                                                            0, 0,
                                                            2, 12,
                                                            5,
                                                            8, 22,
                                                            6, 8,
                                                            6, 4,
                                                            1, 8,
                                                            24,
                                                            29,
                                                            51,
                                                            40,
                                                            47,
                                                            23,
                                                            26,
                                                            50,
                                                            26,
                                                            41,
                                                            22,
                                                            46,
                                                            47,
                                                            81,
                                                            46, 6
                                                      ]
                                                }, {
                                                      name: "Social",
                                                      data: [2, 5, 4, 3,
                                                            3, 1,
                                                            4, 7,
                                                            5, 1,
                                                            2, 5,
                                                            3, 2,
                                                            6, 7,
                                                            7, 1,
                                                            5, 5,
                                                            2, 12,
                                                            4, 6,
                                                            18,
                                                            3, 5,
                                                            2, 13,
                                                            15,
                                                            20,
                                                            47,
                                                            18,
                                                            15,
                                                            11,
                                                            10, 0
                                                      ]
                                                }, {
                                                      name: "Other",
                                                      data: [2, 9, 1, 7,
                                                            8, 3,
                                                            6, 5,
                                                            5, 4,
                                                            6, 4,
                                                            1, 9,
                                                            3, 6,
                                                            7, 5,
                                                            2, 8,
                                                            4, 9,
                                                            1, 2,
                                                            6, 7,
                                                            5, 1,
                                                            8, 3,
                                                            2, 3,
                                                            4, 9,
                                                            7, 1,
                                                            6
                                                      ]
                                                }],
                                                tooltip: {
                                                      theme: 'dark'
                                                },
                                                grid: {
                                                      padding: {
                                                            top: -20,
                                                            right: 0,
                                                            left: -4,
                                                            bottom: -4
                                                      },
                                                      strokeDashArray: 4,
                                                      xaxis: {
                                                            lines: {
                                                                  show: true
                                                            }
                                                      },
                                                },
                                                xaxis: {
                                                      labels: {
                                                            padding: 0,
                                                      },
                                                      tooltip: {
                                                            enabled: false
                                                      },
                                                      axisBorder: {
                                                            show: false,
                                                      },
                                                      type: 'datetime',
                                                },
                                                yaxis: {
                                                      labels: {
                                                            padding: 4
                                                      },
                                                },
                                                labels: [
                                                      '2020-06-20',
                                                      '2020-06-21',
                                                      '2020-06-22',
                                                      '2020-06-23',
                                                      '2020-06-24',
                                                      '2020-06-25',
                                                      '2020-06-26',
                                                      '2020-06-27',
                                                      '2020-06-28',
                                                      '2020-06-29',
                                                      '2020-06-30',
                                                      '2020-07-01',
                                                      '2020-07-02',
                                                      '2020-07-03',
                                                      '2020-07-04',
                                                      '2020-07-05',
                                                      '2020-07-06',
                                                      '2020-07-07',
                                                      '2020-07-08',
                                                      '2020-07-09',
                                                      '2020-07-10',
                                                      '2020-07-11',
                                                      '2020-07-12',
                                                      '2020-07-13',
                                                      '2020-07-14',
                                                      '2020-07-15',
                                                      '2020-07-16',
                                                      '2020-07-17',
                                                      '2020-07-18',
                                                      '2020-07-19',
                                                      '2020-07-20',
                                                      '2020-07-21',
                                                      '2020-07-22',
                                                      '2020-07-23',
                                                      '2020-07-24',
                                                      '2020-07-25',
                                                      '2020-07-26'
                                                ],
                                                colors: [tabler.getColor("primary"),
                                                      tabler.getColor(
                                                            "primary",
                                                            0.8), tabler
                                                      .getColor("green", 0.8)
                                                ],
                                                legend: {
                                                      show: false,
                                                },
                                          })).render();
                              });
                              // @formatter:on
                              </script>

                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document
                                          .getElementById('sparkline-activity'), {
                                                chart: {
                                                      type: "radialBar",
                                                      fontFamily: 'inherit',
                                                      height: 40,
                                                      width: 40,
                                                      animations: {
                                                            enabled: false
                                                      },
                                                      sparkline: {
                                                            enabled: true
                                                      },
                                                },
                                                tooltip: {
                                                      enabled: false,
                                                },
                                                plotOptions: {
                                                      radialBar: {
                                                            hollow: {
                                                                  margin: 0,
                                                                  size: '75%'
                                                            },
                                                            track: {
                                                                  margin: 0
                                                            },
                                                            dataLabels: {
                                                                  show: false
                                                            }
                                                      }
                                                },
                                                colors: [tabler.getColor("blue")],
                                                series: [35],
                                          })).render();
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document
                                          .getElementById(
                                                'chart-development-activity'), {
                                                chart: {
                                                      type: "area",
                                                      fontFamily: 'inherit',
                                                      height: 192,
                                                      sparkline: {
                                                            enabled: true
                                                      },
                                                      animations: {
                                                            enabled: false
                                                      },
                                                },
                                                dataLabels: {
                                                      enabled: false,
                                                },
                                                fill: {
                                                      opacity: .16,
                                                      type: 'solid'
                                                },
                                                stroke: {
                                                      width: 2,
                                                      lineCap: "round",
                                                      curve: "smooth",
                                                },
                                                series: [{
                                                      name: "Purchases",
                                                      data: [3, 5, 4, 6,
                                                            7, 5,
                                                            6, 8,
                                                            24, 7,
                                                            12, 5,
                                                            6,
                                                            3, 8,
                                                            4, 14,
                                                            30,
                                                            17,
                                                            19,
                                                            15,
                                                            14,
                                                            25,
                                                            32,
                                                            40,
                                                            55,
                                                            60,
                                                            48,
                                                            52, 70
                                                      ]
                                                }],
                                                tooltip: {
                                                      theme: 'dark'
                                                },
                                                grid: {
                                                      strokeDashArray: 4,
                                                },
                                                xaxis: {
                                                      labels: {
                                                            padding: 0,
                                                      },
                                                      tooltip: {
                                                            enabled: false
                                                      },
                                                      axisBorder: {
                                                            show: false,
                                                      },
                                                      type: 'datetime',
                                                },
                                                yaxis: {
                                                      labels: {
                                                            padding: 4
                                                      },
                                                },
                                                labels: [
                                                      '2020-06-20',
                                                      '2020-06-21',
                                                      '2020-06-22',
                                                      '2020-06-23',
                                                      '2020-06-24',
                                                      '2020-06-25',
                                                      '2020-06-26',
                                                      '2020-06-27',
                                                      '2020-06-28',
                                                      '2020-06-29',
                                                      '2020-06-30',
                                                      '2020-07-01',
                                                      '2020-07-02',
                                                      '2020-07-03',
                                                      '2020-07-04',
                                                      '2020-07-05',
                                                      '2020-07-06',
                                                      '2020-07-07',
                                                      '2020-07-08',
                                                      '2020-07-09',
                                                      '2020-07-10',
                                                      '2020-07-11',
                                                      '2020-07-12',
                                                      '2020-07-13',
                                                      '2020-07-14',
                                                      '2020-07-15',
                                                      '2020-07-16',
                                                      '2020-07-17',
                                                      '2020-07-18',
                                                      '2020-07-19'
                                                ],
                                                colors: [tabler.getColor(
                                                      "primary")],
                                                legend: {
                                                      show: false,
                                                },
                                                point: {
                                                      show: false
                                                },
                                          })).render();
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document
                                          .getElementById(
                                                'sparkline-bounce-rate-1'), {
                                                chart: {
                                                      type: "line",
                                                      fontFamily: 'inherit',
                                                      height: 24,
                                                      animations: {
                                                            enabled: false
                                                      },
                                                      sparkline: {
                                                            enabled: true
                                                      },
                                                },
                                                tooltip: {
                                                      enabled: false,
                                                },
                                                stroke: {
                                                      width: 2,
                                                      lineCap: "round",
                                                },
                                                series: [{
                                                      color: tabler
                                                            .getColor(
                                                                  "primary"
                                                            ),
                                                      data: [17, 24, 20,
                                                            10, 5,
                                                            1, 4,
                                                            18, 13
                                                      ]
                                                }],
                                          })).render();
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document
                                          .getElementById(
                                                'sparkline-bounce-rate-2'), {
                                                chart: {
                                                      type: "line",
                                                      fontFamily: 'inherit',
                                                      height: 24,
                                                      animations: {
                                                            enabled: false
                                                      },
                                                      sparkline: {
                                                            enabled: true
                                                      },
                                                },
                                                tooltip: {
                                                      enabled: false,
                                                },
                                                stroke: {
                                                      width: 2,
                                                      lineCap: "round",
                                                },
                                                series: [{
                                                      color: tabler
                                                            .getColor(
                                                                  "primary"
                                                            ),
                                                      data: [13, 11, 19,
                                                            22,
                                                            12, 7,
                                                            14, 3,
                                                            21
                                                      ]
                                                }],
                                          })).render();
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document
                                          .getElementById(
                                                'sparkline-bounce-rate-3'), {
                                                chart: {
                                                      type: "line",
                                                      fontFamily: 'inherit',
                                                      height: 24,
                                                      animations: {
                                                            enabled: false
                                                      },
                                                      sparkline: {
                                                            enabled: true
                                                      },
                                                },
                                                tooltip: {
                                                      enabled: false,
                                                },
                                                stroke: {
                                                      width: 2,
                                                      lineCap: "round",
                                                },
                                                series: [{
                                                      color: tabler
                                                            .getColor(
                                                                  "primary"
                                                            ),
                                                      data: [10, 13, 10,
                                                            4, 17,
                                                            3, 23,
                                                            22, 19
                                                      ]
                                                }],
                                          })).render();
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document
                                          .getElementById(
                                                'sparkline-bounce-rate-4'), {
                                                chart: {
                                                      type: "line",
                                                      fontFamily: 'inherit',
                                                      height: 24,
                                                      animations: {
                                                            enabled: false
                                                      },
                                                      sparkline: {
                                                            enabled: true
                                                      },
                                                },
                                                tooltip: {
                                                      enabled: false,
                                                },
                                                stroke: {
                                                      width: 2,
                                                      lineCap: "round",
                                                },
                                                series: [{
                                                      color: tabler
                                                            .getColor(
                                                                  "primary"
                                                            ),
                                                      data: [6, 15, 13,
                                                            13, 5,
                                                            7, 17,
                                                            20, 19
                                                      ]
                                                }],
                                          })).render();
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document
                                          .getElementById(
                                                'sparkline-bounce-rate-5'), {
                                                chart: {
                                                      type: "line",
                                                      fontFamily: 'inherit',
                                                      height: 24,
                                                      animations: {
                                                            enabled: false
                                                      },
                                                      sparkline: {
                                                            enabled: true
                                                      },
                                                },
                                                tooltip: {
                                                      enabled: false,
                                                },
                                                stroke: {
                                                      width: 2,
                                                      lineCap: "round",
                                                },
                                                series: [{
                                                      color: tabler
                                                            .getColor(
                                                                  "primary"
                                                            ),
                                                      data: [2, 11, 15,
                                                            14,
                                                            21,
                                                            20, 8,
                                                            23,
                                                            18, 14
                                                      ]
                                                }],
                                          })).render();
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.ApexCharts && (new ApexCharts(document
                                          .getElementById(
                                                'sparkline-bounce-rate-6'), {
                                                chart: {
                                                      type: "line",
                                                      fontFamily: 'inherit',
                                                      height: 24,
                                                      animations: {
                                                            enabled: false
                                                      },
                                                      sparkline: {
                                                            enabled: true
                                                      },
                                                },
                                                tooltip: {
                                                      enabled: false,
                                                },
                                                stroke: {
                                                      width: 2,
                                                      lineCap: "round",
                                                },
                                                series: [{
                                                      color: tabler
                                                            .getColor(
                                                                  "primary"
                                                            ),
                                                      data: [22, 12, 7,
                                                            14, 3,
                                                            21, 8,
                                                            23,
                                                            18, 14
                                                      ]
                                                }],
                                          })).render();
                              });
                              // @formatter:on
                              </script>

                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.Litepicker && (new Litepicker({
                                          element: document.getElementById(
                                                'datepicker-default'),
                                          buttonText: {
                                                previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                                                nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                                          },
                                    }));
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.Litepicker && (new Litepicker({
                                          element: document.getElementById(
                                                'datepicker-icon'),

                                          buttonText: {
                                                previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                                                nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                                          },
                                    }));
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.Litepicker && (new Litepicker({
                                          element: document.getElementById(
                                                'datepicker-icon-prepend'),
                                          buttonText: {
                                                previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                                                nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                                          },
                                    }));
                              });
                              // @formatter:on
                              </script>
                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    window.Litepicker && (new Litepicker({
                                          element: document.getElementById(
                                                'datepicker-inline'),
                                          buttonText: {
                                                previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                                                nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                                          },
                                          inlineMode: true,
                                    }));
                              });
                              // @formatter:on
                              </script>

                              <script>
                              // @formatter:off
                              document.addEventListener("DOMContentLoaded", function() {
                                    var el;
                                    window.TomSelect && (new TomSelect(el = document.getElementById(
                                          'members'), {
                                          copyClassesToDropdown: false,
                                          dropdownParent: 'body',
                                          controlInput: '<input>',
                                          render: {
                                                item: function(data, escape) {
                                                      if (data
                                                            .customProperties
                                                      ) {
                                                            return '<div><span class="dropdown-item-indicator">' +
                                                                  data
                                                                  .customProperties +
                                                                  '</span>' +
                                                                  escape(data
                                                                        .text
                                                                  ) +
                                                                  '</div>';
                                                      }
                                                      return '<div>' + escape(
                                                                  data.text) +
                                                            '</div>';
                                                },
                                                option: function(data, escape) {
                                                      if (data
                                                            .customProperties
                                                      ) {
                                                            return '<div><span class="dropdown-item-indicator">' +
                                                                  data
                                                                  .customProperties +
                                                                  '</span>' +
                                                                  escape(data
                                                                        .text
                                                                  ) +
                                                                  '</div>';
                                                      }
                                                      return '<div>' + escape(
                                                                  data.text) +
                                                            '</div>';
                                                },
                                          },
                                    }));
                              });
                              // @formatter:on
                              </script>
                              <script>
                              function copyToClipboard(text) {
                                    navigator.clipboard.writeText(text)
                                          .then(() => {
                                                console.log(`Copied text to clipboard: ${text}`);
                                                alert(`${text} . ID has been copied. `);
                                          })
                                          .catch((error) => {
                                                console.error(`Could not copy text: ${error}`);
                                          });
                              }

                              function copyAccountName(text) {
                                    navigator.clipboard.writeText(text)
                                          .then(() => {
                                                console.log(`Copied text to clipboard: ${text}`);
                                                alert(`${text} . Account name has been copied. `);
                                          })
                                          .catch((error) => {
                                                console.error(`Could not copy text: ${error}`);
                                          });
                              }

                              function copyAccountNumber(text) {
                                    navigator.clipboard.writeText(text)
                                          .then(() => {
                                                console.log(`Copied text to clipboard: ${text}`);
                                                alert(`${text} . Account number has been copied. `);
                                          })
                                          .catch((error) => {
                                                console.error(`Could not copy text: ${error}`);
                                          });
                              }

                              function copyBankName(text) {
                                    navigator.clipboard.writeText(text)
                                          .then(() => {
                                                console.log(`Copied text to clipboard: ${text}`);
                                                alert(`${text} . Bank Name has been copied. `);
                                          })
                                          .catch((error) => {
                                                console.error(`Could not copy text: ${error}`);
                                          });
                              }
                              </script>
                              <script>
                              function download(file, text) {
                                    //creating an invisible element
                                    var element = document.createElement('a');
                                    element.setAttribute('href',
                                          'data:text/plain;charset=utf-8, ' +
                                          encodeURIComponent(text));
                                    element.setAttribute('download', file);
                                    document.body.appendChild(element);
                                    element.click();

                                    document.body.removeChild(element);
                              }

                              // Start file download.

                              document.getElementById("btnSave")
                                    .addEventListener("click", function() {
                                          var text =
                                                document.getElementById("text").value;
                                          var filename = "wallet-account.txt";

                                          download(filename, text);
                                    }, false);
                              </script>

</body>

</html>