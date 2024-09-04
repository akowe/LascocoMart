<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="keywords" content="
        Cooperatives, Cooperatives in Nigeria, Blender, phones, smart phones, tv, television, Phones, Computer, Accessories, Electronics, Foodstuffs, Furniture, Home Appliances, Kitchen, Automobile, Groceries, Fashion, online store, ecommerce website, shopping cart, ecommerce, cooperatives ecommerce,
        cooperatives eccomerce in Nigeria, Buy, Sell, cooperative ecommerce platform in Nigeria" />

      <title>LascocoMart</title>
      <link rel="icon" type="image/x-icon" href="../images/logo-1.png">

      <!-- dataTable css -->
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

      <!-- Google font -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

      <!-- Bootstrap -->
      <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />

      <!-- Slick -->
      <link type="text/css" rel="stylesheet" href="../css/slick.css" />
      <link type="text/css" rel="stylesheet" href="../css/slick-theme.css" />

      <!-- nouislider -->
      <link type="text/css" rel="stylesheet" href="../css/nouislider.min.css" />

      <!-- Font Awesome Icon -->
      <link rel="stylesheet" href="../css/font-awesome.min.css">

      <!-- Custom stlylesheet -->
      <link type="text/css" rel="stylesheet" href="../css/style.css" />
      <style>
      /**Added CSS***/

      .productnamecssnew {

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
      }

      .containercoopmartmenu {
            display: inline-block;
            cursor: pointer;
      }

      .bar1coopmartmenu,
      .bar2coopmartmenu,
      .bar3coopmartmenu {
            width: 35px;
            height: 5px;
            background-color: #fff;
            margin: 6px 0;
            transition: 0.4s;
      }

      .changecoopmartmenu .bar1coopmartmenu {
            transform: translate(0, 11px) rotate(-45deg);
      }

      .changecoopmartmenu .bar2coopmartmenu {
            opacity: 0;
      }

      .changecoopmartmenu .bar3coopmartmenu {
            transform: translate(0, -11px) rotate(45deg);
      }

      .checked {
            color: orange;
      }
      </style>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-4376FNT1XB"></script>
      <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
            dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'G-4376FNT1XB');
      </script>

      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-232659603-1">
      </script>
      <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
            dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'UA-232659603-1');
      </script>


      <script>
      function memucoopmartheremyFunction(x) {
            x.classList.toggle("changecoopmartmenu");
      }
      </script>


      <script type="text/javascript">
      $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                  headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        "X-Requested-With": "XMLHttpRequest"
                  }
                  type: 'get',
                  url: '{{URL::to('
                  category ')}}',
                  data: {
                        'search': $value
                  },
                  success: function(data) {
                        $('tbody').html(data);
                  }
            });
      })
      </script>
      <script type="text/javascript">
      $.ajaxSetup({
            headers: {
                  'csrftoken': '{{ csrf_token() }}'
            }
      });
      </script>
      <style type="text/css">
      .carousel-inner>.item>img,
      .carousel-inner>.item>a>img {
            margin: auto;
      }

      #myCarousel {
            max-width: 650px;
            margin: 0 auto;
            background: #fff;
            background-color: transparent;
      }

      .carousel-control {
            background-color: #fff !important;
            text-shadow: none !important;
            color: #333 !important;
      }

      .carousel-control.right {
            background: #fff !important;
            color: #333 !important;
      }


      .carousel-control.right: hover {

            background: #ffffff !important;
            color: #333 !important;
      }


      .carousel-control.left {
            background: #fff !important;
            color: #333 !important;
      }


      .carousel-control.left: hover {

            background: #ffffff !important;
            color: #333 !important;
      }

      #thumbCarousel {
            /* max-width: 650px;*/
            margin: 0 auto;
            overflow: hidden;
            background: #ffffff;
            padding: 10px 0;
      }

      #thumbCarousel .thumb {
            float: left;
            margin-right: 10px;
            /* border: 1px solid #ccc;*/
            background: #fff;
      }

      #thumbCarousel .thumb:last-child {
            margin-right: 0;
      }

      .thumb:hover {
            cursor: pointer;
      }

      .thumb img {
            opacity: 0.5;
      }

      .thumb img:hover {
            opacity: 1;
      }

      .thumb.active img {
            opacity: 1;
            /* border: 1px solid #1d62b7;*/
      }

      /* rating */

      .rating-css div {
            color: #ffe400;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
      }

      .rating-css input {
            display: none;
      }

      .rating-css input+label {
            font-size: 60px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
      }

      .rating-css input:checked+label~label {
            color: #b4afaf;
      }

      .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
      }

      /* End of Star Rating */
      </style>

</head>

<body class="antialiased">

      <!-- HEADER -->
      <header>
            <!-- TOP HEADER -->
            <div id="top-header">
                  <div class="container">
                        <ul class="header-links pull-left">
                              <!-- <li><a href="#"><i class="fa fa-phone"></i> +234 (0) 906 496 5041</a></li> -->
                              <li><a href="mailto:info@lascocomart.com">
                                          <i class="fa fa-envelope-o"></i>info@lascocomart.com</a>
                              </li>

                        </ul>
                        <ul class="header-links pull-right">
                              <!--   <li><a href="" data-toggle="modal" data-target="#coopModal"><i class="fa fa-users"></i>  Cooperative</a></li> -->
                              <li><a href="" data-toggle="modal" data-target="#merchantModal"><i
                                                class="fa fa-user-o"></i> Sell on LascocoMart</a></li>
                              <li>
                                    <!--show member name-->
                                    @if (Route::has('login'))
                                    @auth
                              <li class="nav-item dropdown">

                                    <a href="" class="dropbtn"> My Account</a>
                                    @if(Auth::user()->role_name == 'cooperative')
                                    <div class="dropdown-content">
                                          <a href="{{ route('cooperative') }}">Dashboard</a>

                                          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                          </form>
                                    </div>
                                    @endif


                                    @if(Auth::user()->role_name == 'merchant')
                                    <div class="dropdown-content">
                                          <a href="{{ route('merchant') }}">Dashboard</a>
                                          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                          </form>

                                    </div>
                                    @endif


                                    @if(Auth::user()->role_name == 'member')
                                    <div class="dropdown-content">
                                          <a href="{{ route('dashboard') }}">Dashboard</a>
                                          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                          </form>
                                    </div>
                                    @endif


                                    @if(Auth::user()->role_name == 'superadmin')
                                    <div class="dropdown-content">
                                          <a href="{{ route('superadmin') }}">Dashboard</a>
                                          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                          </form>
                                    </div>
                                    @endif

                                    @else
                                    <a href="" data-toggle="modal" data-target="#loginModal"
                                          class="text-sm text-gray-700 dark:text-gray-500 underline">Log in /
                                          Register</a>
                              </li>
                              @endauth
                              @endif
                              <!-- end show member name-->


                        </ul>
                  </div>
            </div>
            <!-- /TOP HEADER -->

            <!-- MAIN HEADER -->
            <div id="header" class="">
                  <!-- container -->
                  <!-- container -->
                  <div class="container">
                        <!-- row -->
                        <div class="row">
                              <!-- LOGO -->
                              <div class="col-md-2">

                                    <div class="header-logo ">
                                          <a href="{{ url('/') }}" class="logo">
                                                <img src="/images/lascoco-logo.png" alt="LASCOCO" title="LASCOCO"
                                                      width="139" height="93">
                                          </a>
                                    </div>
                              </div>
                              <!-- /LOGO -->

                              <!-- SEARCH BAR -->
                              <div class="col-md-7 text-center">
                                    <div class="header-search">

                                          <form action="{{ route('category') }}" method="GET"
                                                enctype="multipart/form-data">
                                                <!-- <select name="category" id="input" class="input-select ">
                                                      <option value="">All Categories</option>
                                                      @foreach (\App\Models\Categories::select('cat_name')->get() as
                                                      $category)
                                                      <option value="{{ $category->cat_name }}">
                                                            <a
                                                                  href="{{route('category')}}?category={{ $category->cat_name }}">{{ $category['cat_name'] }}</a>
                                                      </option>
                                                      @endforeach
                                                </select> -->

                                                <input class="input search" type="text" name="search" id="search"
                                                      placeholder="Search for products here" autocomplete="off" style="width:80%;"/>
                                                <button class="search-btn" type="submit"><i class="fa fa-search"></i> Search</button>

                                          </form>
                                    </div>
                              </div>

                              <!-- /SEARCH BAR -->

                              <!-- ACCOUNT -->
                              <div class="col-md-3">
                                    <div class="header-ctn">

                                          <!-- Cart -->
                                          <div class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"
                                                      style="cursor: pointer;">
                                                      <i class="fa fa-shopping-cart"></i>
                                                      <span>Cart</span>
                                                      <div class="qty">{{ count((array) session('cart')) }}</div>
                                                </a>
                                                @php $total = 0 @endphp
                                                @php $items = 0 @endphp
                                                @php $item = 1 @endphp
                                                @foreach((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity']
                                                @endphp

                                                @php $items += $details['quantity'] * $item
                                                @endphp
                                                @endforeach
                                                <div class="cart-dropdown">
                                                      @if(session('cart'))
                                                      <div class="cart-list">

                                                            @foreach(session('cart') as $id => $details)
                                                            <div class="product-widget">

                                                                  <div class="product-img">
                                                                        <img src="{{ $details['image'] }}" alt=""
                                                                              width="40">
                                                                  </div>
                                                                  <div class="product-body">
                                                                        <h6 class="product-name">
                                                                              <a href="#"
                                                                                    style="cursor:pointer;">{{ $details['prod_name'] }}</a>
                                                                        </h6>

                                                                        <h6 class="product-price">
                                                                              <span class="qty">{{ $details['quantity'] }}
                                                                                    &nbsp; x </span>
                                                                              ₦
                                                                              {{ number_format($details['price']) }}
                                                                        </h6>
                                                                  </div>
                                                            </div><!-- product widget-->
                                                            @endforeach

                                                      </div>

                                                      <div class="cart-summary">
                                                            <small>{{$items}} Item(s) selected</small>
                                                            <h5>SUBTOTAL: ₦ {{ number_format($total) }}</h5>
                                                      </div>
                                                      @endif

                                                      <div class="cart-btns">
                                                            <a href="{{ route('cart') }}" class="cursor">View
                                                                  Cart</a>
                                                            <a href="{{ url('/checkout')}}"
                                                                  style="cursor:pointer;">Checkout <i
                                                                        class="fa fa-arrow-circle-right"></i></a>
                                                      </div>

                                                </div><!-- cart dropdownt -->
                                          </div><!-- /Cart -->

            <!-- WishList -->
            @if (Route::has('login'))
                                          @auth
                                          <div class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"
                                                      style="cursor: pointer;">
                                                      <i class="fa fa-heart"></i>
                                                      <span>WishList</span>
                                                      <div class="qty">{{ $wishlist->count() }}</div>
                                                </a>
                                                @php $total = 0 @endphp
                                                @php $items = 0 @endphp
                                                @php $item = 1 @endphp
                                                @foreach($wish as $id => $details)
                                                @php $total += $details['price'] * 1
                                                @endphp

                                                @php $items += 1 * $item
                                                @endphp
                                                @endforeach
                                                <div class="cart-dropdown">
                                                      @if($wish)
                                                      <div class="cart-summary">
                                                            <h5> {{$items}} saved Item(s). </h5>
                                                            <a href="{{url('wishlist') }}"
                                                                  class="btn btn-danger btn-block">View all</a>

                                                      </div>
                                                      @endif
                                                </div><!-- Wish dropdownt -->
                                          </div><!-- /WishList -->
                                          @endauth
                                          @endif




                                          <div class="hidden-lg hidden-md">
                                                <!-- <a href="{{ route('seller-register') }}" data-toggle="modal" data-target="#merchantModal"> Sell on LascocoMart</a> -->
                                                <a href="{{ route('seller-register') }}"> Sell on LascocoMart</a>
                                          </div>

                                          <!--show member name-->

                                          <div class="nav-item dropdown hidden-lg hidden-md">
                                                @if (Route::has('login'))
                                                @auth

                                                <a href="" class="dropbtn"> My Account</a>
                                                @if(Auth::user()->role_name == 'cooperative')
                                                <div class="dropdown-content">
                                                      <a href="{{ route('cooperative') }}">Dashboard</a>

                                                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                      </a>
                                                      <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                      </form>
                                                </div>
                                                @endif

                                                @if(Auth::user()->role_name == 'merchant')
                                                <div class="dropdown-content">
                                                      <a href="{{ route('merchant') }}">Dashboard</a>
                                                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                      </a>
                                                      <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                      </form>

                                                </div>
                                                @endif

                                                @if(Auth::user()->role_name == 'member')
                                                <div class="dropdown-content">
                                                      <a href="{{ route('dashboard') }}">Dashboard</a>
                                                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                      </a>
                                                      <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                      </form>
                                                </div>
                                                @endif

                                                @if(Auth::user()->role_name == 'superadmin')
                                                <div class="dropdown-content">
                                                      <a href="{{ route('superadmin') }}">Dashboard</a>
                                                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                      </a>
                                                      <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                      </form>
                                                </div>
                                                @endif
                                                @if(Auth::user()->role_name == 'fcmg')
                                                <div class="dropdown-content">
                                                      <a href="{{ route('fcmg') }}">Dashboard</a>

                                                      <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                      </a>
                                                      <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                      </form>
                                                </div>
                                                @endif
                                                @else
                                                <a href="{{ route('login') }}"
                                                      class="text-sm text-gray-700 dark:text-gray-500 underline">
                                                      Login/Register</a>
                                                @endauth
                                                @endif
                                          </div>

                                          <!-- end show member name-->

                                          <!-- Menu Toogle -->
                                          <div class="menu-toggle">
                                                <a href="#">
                                                      <div class="containercoopmartmenu"
                                                            onclick="memucoopmartheremyFunction(this)">
                                                            <div class="bar1coopmartmenu"></div>
                                                            <div class="bar2coopmartmenu"></div>
                                                            <div class="bar3coopmartmenu"></div>
                                                      </div>
                                                      <!--<i class="fa fa-bars" ></i>-->
                                                      <!--<span>Menu</span>-->
                                                </a>
                                          </div>
                                          <!-- /Menu Toogle -->
                                    </div>
                              </div>
                              <!-- /ACCOUNT -->
                        </div>
                        <!-- row -->
                  </div>
                  <!-- container -->
            </div>
            <!-- /MAIN HEADER -->
      </header>
      <!-- /HEADER -->

      <!-- NAVIGATION -->
      <nav id="navigation" class="">
            <!-- container -->
            <div class="container">
                  <!-- responsive-nav -->
                  <div id="responsive-nav">
                        <!-- NAV -->
                        <ul class="main-nav nav navbar-nav" style="font-size:14px;">
                              <li class="active"><a href="{{ url('/')}}">Home</a></li>
                              @foreach (\App\Models\Categories::select('cat_name')->limit(8)->get() as
                              $id => $category)


                              <li class="myClass" data-option-id="{{ $category->cat_name }}">
                                    <a
                                          href="{{route('category')}}?category={{ $category->cat_name }}">{{ $category->cat_name }}</a>
                              </li>

                              @endforeach
                        </ul>
                        <!-- /NAV -->
                  </div>
                  <!-- /responsive-nav -->
            </div>
            <!-- /container -->
      </nav>

      <div class="container">

            @if(session('success'))
            <div class="alert alert-success">
                  {{ session('success') }}
            </div>
            @endif
      </div>

      <!-- /NAVIGATION -->
      @yield('content')
      @extends('layouts.footer')
      @yield('scripts')



      <br>
      <div class="container">
            <div class="row">

                  <div class="col-md-12">
                        <div class="col-md-2">
                        </div>

                        <h4>Product Preview </h4>
                        <div class="col-md-8">
                              @foreach($products as $product)


                              <div id="myCarousel" class="carousel slide" data-interval="false">

                                    <div class="carousel-inner" role="listbox">
                                          <div class="item active">

                                                <img src="{{ $product->image }}" style="width: 420px; height: 440px">
                                          </div>
                                          @if($product->img1 == '')
                                          @else
                                          <div class="item">
                                                <img src="{{ $product->img1 }}" style="width: 420px; height: 440px">
                                          </div>
                                          @endif

                                          @if($product->img2 == '')
                                          @else
                                          <div class="item">
                                                <img src="{{ $product->img2 }}" style="width: 420px; height: 440px">
                                          </div>
                                          @endif

                                          @if($product->img3 == '')
                                          @else
                                          <div class="item">
                                                <img src="{{ $product->img3 }}" style="width: 420px; height: 440px">
                                          </div>
                                          @endif

                                          @if($product->img4 == '')
                                          @else
                                          <div class="item">
                                                <img src="{{ $product->img4 }}" style="width: 420px; height: 440px">
                                          </div>
                                          @endif



                                         <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="fa fa-caret-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="fa fa-caret-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a> 
                                    </div>

                                    <div id="thumbCarousel">
                                          <div data-target="#myCarousel" data-slide-to="0" class="thumb active">
                                                <img src="{{ $product->image }}" style="width: 120px; height: 130px">
                                          </div>
                                          @if($product->img1 == '')
                                          @else
                                          <div data-target="#myCarousel" data-slide-to="1" class="thumb">
                                                <img src="{{ $product->img1 }}" style="width: 120px; height: 130px">
                                          </div>
                                          @endif
                                          @if($product->img2 == '')
                                          @else
                                          <div data-target="#myCarousel" data-slide-to="2" class="thumb">
                                                <img src="{{ $product->img2 }}" style="width: 120px; height: 130px">
                                          </div>
                                          @endif
                                          @if($product->img3 == '')
                                          @else
                                          <div data-target="#myCarousel" data-slide-to="3" class="thumb">
                                                <img src="{{ $product->img3 }}" style="width: 120px; height: 130px">
                                          </div>
                                          @endif
                                          @if($product->img4 == '')
                                          @else
                                          <div data-target="#myCarousel" data-slide-to="4" class="thumb">

                                                <img src="{{ $product->img4 }}" style="width: 120px; height: 130px">

                                          </div>
                                          @endif
                                    </div>

                              </div>



                              @endforeach

                              <div class="col-md-12">
                                    <h4>{{ $product->prod_name }}</h4>
                                    <h4 class="">Brand: {{ $product->prod_brand }}</h4><br>
                                    <p style="text-align: justify; text-justify: inter-word;"><strong>Description:
                                          </strong><br><br>{{ $product->description }}</p>

                              </div>
                        </div>

                        <div class="col-md-4">
                              <h4>{{ $product->prod_name }}</h4>
                              <h4 class="">{{ $product->prod_brand }}</h4>
                              @if($product->quantity < 1) <del class="product-price">
                                    ₦{{ number_format($product->price) }}
                                    </del>


                                    <br><br>

                                    <div class="add-to-cart">
                                          <button type="button" class="add-to-cart btn">

                                                <i class="fa fa-shopping-cart"></i> Sold Out !</button>
                                    </div>
                                    @else

                                    <h4 class="product-price">₦{{ number_format($product->price) }} <small><del
                                                      class="product-old-price">
                                                      ₦{{number_format($product->old_price)  }}</del></small></h4>


                                    <div class="row">
                                          <!-- end col -->
                                          <div class="col-md-4 col-sm-6 col-xs-12 form-group">

                                                <p>
                                                      <br>
                                                      <label> Qty </label> <input type="number" name="" value="1"
                                                            class="form-control">
                                                </p>
                                          </div>
                                          <!-- end col -->

                                    </div>
                                    <div class="add-to-cart">
                                          <button type="button" class="btn btn-danger ">
                                                <a class="text-white" href="{{ route('add.cart', $product->id) }}"
                                                      style="color:#ffffff;">
                                                      <i class="fa fa-shopping-cart"></i> Add To Cart</a></button>
                                    </div>
                                    @endif
                                    <br>
                                    <div>

                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <div class="modal-content">
                                                      <form action="{{ url('/add-rating') }}" method="POST">
                                                            @csrf
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        {{ $product->prod_name }}</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <div class="rating-css">
                                                                        <div class="star-icon">
                                                                              <input type="radio" value="1"
                                                                                    name="product_rating" checked
                                                                                    id="rating1">
                                                                              <label for="rating1"
                                                                                    class="fa fa-star"></label>
                                                                              <input type="radio" value="2"
                                                                                    name="product_rating" id="rating2">
                                                                              <label for="rating2"
                                                                                    class="fa fa-star"></label>
                                                                              <input type="radio" value="3"
                                                                                    name="product_rating" id="rating3">
                                                                              <label for="rating3"
                                                                                    class="fa fa-star"></label>
                                                                              <input type="radio" value="4"
                                                                                    name="product_rating" id="rating4">
                                                                              <label for="rating4"
                                                                                    class="fa fa-star"></label>
                                                                              <input type="radio" value="5"
                                                                                    name="product_rating" id="rating5">
                                                                              <label for="rating5"
                                                                                    class="fa fa-star"></label>
                                                                        </div>
                                                                  </div>
                                                                  <div>
                                                                        <input type="hidden" name="prod_id"
                                                                              value="{{ $product->prod_id }}">
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                  <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                            </div>
                                                      </form>
                                                </div>
                                          </div>
                                    </div>
                                    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                                    <!--      Rate this product-->
                                    <!--    </button>-->
                                    <a href="{{ url('add-review/'.$product->id.'/userreview') }}"
                                          class="btn btn-info">Write a review</a>
                                    <br>
                                    <hr><br>
                                    @foreach($reviews as $item)
                                    <div class="user-review">
                                          <label for="">{{ $item->fname }}</label>
                                          <p>{{ $item->user_review }}</p>
                                          <!-- <a href="#">edit</a><br> -->
                                          @if($item->stars_rated == 1)
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star-o "></i>
                                          <i class="fa fa-star-o "></i>
                                          <i class="fa fa-star-o "></i>
                                          <i class="fa fa-star-o "></i>
                                          @endif
                                          @if($item->stars_rated == 2)
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star-o "></i>
                                          <i class="fa fa-star-o "></i>
                                          <i class="fa fa-star-o "></i>
                                          @endif
                                          @if($item->stars_rated == 3)
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star-o "></i>
                                          <i class="fa fa-star-o "></i>
                                          @endif
                                          @if($item->stars_rated == 4)
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star-o "></i>
                                          @endif
                                          @if($item->stars_rated == 5)
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          <i class="fa fa-star checked"></i>
                                          @endif

                                          <small>Reviewed on {{ $item->created_at->format('d M Y') }}</small>

                                    </div>
                                    @endforeach

                        </div>


                  </div>
                  <!--col-12-->

            </div><!-- end row-->
      </div>
      <!--container-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
      </script>

      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/slick.min.js"></script>
      <script src="../js/nouislider.min.js"></script>
      <script src="../js/main.js"></script>

      <script type="text/javascript">
      $(document).ready(function() {

            //Show carousel-control

            $("#myCarousel").mouseover(function() {
                  $("#myCarousel .carousel-control").show();
            });

            $("#myCarousel").mouseleave(function() {
                  $("#myCarousel .carousel-control").hide();
            });

            //Active thumbnail

            $("#thumbCarousel .thumb").on("click", function() {
                  $(this).addClass("active");
                  $(this).siblings().removeClass("active");

            });

            //When the carousel slides, auto update

            $('#myCarousel').on('slide.bs.carousel', function() {
                  var index = $('.carousel-inner .item.active').index();
                  //console.log(index);
                  var thumbnailActive = $('#thumbCarousel .thumb[data-slide-to="' + index +
                        '"]');
                  thumbnailActive.addClass('active');
                  $(thumbnailActive).siblings().removeClass("active");
                  //console.log($(thumbnailActive).siblings()); 
            });
      });
      </script>

      <!-- header search bar js -->
      <script type="text/javascript">
      var path = "{{ route('autocomplete') }}";
      $('input.search').typeahead({
            source: function(str, process) {
                  return $.get(path, {
                        str: str
                  }, function(data) {
                        return process(data);
                  });
            }
      });
      </script>

</body>

</html>