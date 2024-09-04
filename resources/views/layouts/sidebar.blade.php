 <!-- expand-hover push -->
 <!-- COOPERATIVE Sidebar -->
 @auth
 @if(Auth::user()->role_name == 'cooperative')
 <div class="adminx-sidebar expand-hover push">
       <p></p>

       <ul class="sidebar-nav">

             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a href="{{ url('cooperative') }}" class="sidebar-nav-link active">
                         <span class="sidebar-nav-icon">
                               <i data-feather="home"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Dashboard
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>
             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a href="{{ url('request-fund') }}" class="sidebar-nav-link">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-credit-card"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Fund Wallet
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>
             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link collapsed" href="{{url('members')}}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-group"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Members
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>


             </li>
             <!-- <hr style="color:#f7f7f7;"></hr>-->
             <!--  <li class="sidebar-nav-item">-->
             <!--<a class="sidebar-nav-link " href="{{ url('fcmgproducts') }}">-->
             <!--     <span class="sidebar-nav-icon">-->
             <!--     <i class="fa fa-user-o"></i> -->
             <!--    </span>Buy From FMCG-->
             <!--   </a>-->
             <!--  </li>-->
             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link collapsed" href="{{url('admin-products')}}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-product-hunt"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Store
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>
             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('admin-order-history') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-shopping-cart"></i>
                         </span>
                         <span class="sidebar-nav-name">Order History</span>

                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>
             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('view-canceled-orders') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-shopping-cart"></i>
                         </span>
                         <span class="sidebar-nav-name">Canceled Orders</span>

                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>
             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('fmcgs_products') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-product-hunt"></i>
                         </span> <span class="sidebar-nav-name">FMCG Products</span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>
             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('profile') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-user-o"></i>
                         </span>
                         <span class="sidebar-nav-name">Profile</span>

                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-right"></i>
                         </span>{{ __('Logout') }}
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                   </form>
             </li>


             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('/') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-left"></i>
                         </span> LascocoMart
                   </a>

             </li>

       </ul>
 </div><!-- Sidebar End -->
 @endif
 @endauth

 <!-- Sidebar FCMG -->
 @auth
 @if(Auth::user()->role_name == 'fmcg')
 <div class="adminx-sidebar expand-hover push">
       <p></p>

       <ul class="sidebar-nav">

             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a href="{{ url('fmcg') }}" class="sidebar-nav-link active">
                         <span class="sidebar-nav-icon">
                               <i data-feather="home"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Dashboard
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>
             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <!-- <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#member" aria-expanded="false"
                         aria-controls="member">
                         <span class="sidebar-nav-icon">
                               <i data-feather="users"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Members
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

                   <ul class="sidebar-sub-nav collapse" id="member">
                         <li class="sidebar-nav-item">
                               <a href="{{url('fcmgmembers')}}" class="sidebar-nav-link">
                                     <span class="sidebar-nav-abbr">
                                           View
                                     </span>
                                     <span class="sidebar-nav-name">
                                           &nbsp; all
                                     </span>
                               </a>
                         </li>
                   </ul>
             </li> -->

             </hr>
             <li class="sidebar-nav-item">
                   <a href="{{url('fmcgall_products')}}" class="sidebar-nav-link">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-list"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Store
                         </span>
                         <span class="sidebar-nav-end">

                         </span>

                   </a>

             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('profile') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-user-o"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Profile
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>

             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-right"></i>
                         </span>
                         <span class="sidebar-nav-name">
                         {{ __('Logout') }}
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                   </form>
             </li>


             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('fmcgs_products') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-left"></i>
                         </span> 
                         <span class="sidebar-nav-name">
                         FMCG
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>

             </li>

       </ul>
 </div><!-- Sidebar End -->
 @endif
 @endauth
 <!-- End of Sidebar FCMG -->


 <!-- Sidebar Members -->
 @auth
 @if(Auth::user()->role_name == 'member')
 <div class="adminx-sidebar expand-hover push">
       <p></p>

       <ul class="sidebar-nav">
             <li class="sidebar-nav-item">
                   <a href="{{ url('dashboard') }}" class="sidebar-nav-link active">
                         <span class="sidebar-nav-icon">
                               <i data-feather="home"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Dashboard
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>
             </li>
             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('profile') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-user-o"></i>
                         </span>
                         <span class="sidebar-nav-name">Profile</span>
                   </a>

             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-right"></i>
                         </span>
                         <span class="sidebar-nav-name">{{ __('Logout') }}</span>
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                   </form>
             </li>


             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('/') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-left"></i>
                         </span>
                         <span class="sidebar-nav-name">LascocoMart</span>
                   </a>

             </li>

       </ul>
 </div><!-- Sidebar Member End -->
 @endif
 @endauth



 <!-- Sidebar Merchant -->
 @auth
 @if(Auth::user()->role_name == 'merchant')
 <div class="adminx-sidebar expand-hover push">
       <p></p>

       <ul class="sidebar-nav">
             <li class="sidebar-nav-item">
                   <a href="{{ url('merchant') }}" class="sidebar-nav-link active">
                         <span class="sidebar-nav-icon">
                               <i data-feather="home"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Dashboard
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>
             </li>
             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a href="{{ url('sales_preview') }}" class="sidebar-nav-link active">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-coins"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Sales
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>
             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{url('all-products')}}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-product-hunt"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Store
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>


             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <!-- <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('payout') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-money"></i>
                         </span>
                         <span class="sidebar-nav-name">
                         Payout
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

             </li> -->


             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('profile') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-user-o"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Profile
                         </span>

                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-right"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               {{ __('Logout') }}
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                   </form>
             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('/') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-left"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               LascocoMart
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

             </li>

       </ul>
 </div><!-- Sidebar Merchant End -->
 @endif
 @endauth




 <!-- SIDE BAR for Super admin -->
 @auth
 @if(Auth::user()->role_name == 'superadmin')
 <div class="adminx-sidebar expand-hover push">
       <p></p>

       <ul class="sidebar-nav">
             <li class="sidebar-nav-item">
                   <a href="{{ url('superadmin') }}" class="sidebar-nav-link active">
                         <span class="sidebar-nav-icon">
                               <i data-feather="home"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Dashboard
                         </span>
                         <span class="sidebar-nav-end">

                         </span>
                   </a>
             </li>
             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a href="{{ url('logActivity') }}" class="sidebar-nav-link collapsed" aria-controls="products">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-eye"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Activities
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

                   <ul class="sidebar-sub-nav collapse" id="products">



                   </ul>
             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a href="{{ url('products_list') }}" class="sidebar-nav-link collapsed" aria-controls="products">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-th-list"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Products
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

                   <ul class="sidebar-sub-nav collapse" id="products">
                         <!-- <li class="sidebar-nav-item">
                               <a href="{{ url('products_list') }}" class="sidebar-nav-link">
                                     <span class="sidebar-nav-abbr">
                                           All
                                     </span>
                               </a>
                         </li> -->

                         <!-- <li class="sidebar-nav-item">
                               <a href="{{ url('removed_product') }}" class="sidebar-nav-link">
                                     <span class="sidebar-nav-abbr">
                                           Trashed
                                     </span>

                                     <span class="sidebar-nav-name">
                                           &nbsp;
                                     </span>
                               </a>
                         </li> -->


                   </ul>
             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a href="{{ url('users_list')}}" class="sidebar-nav-link collapsed" aria-controls="member">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-users"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Users
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

                   <ul class="sidebar-sub-nav collapse" id="member">
                         <li class="sidebar-nav-item">
                               class="sidebar-nav-link">
                               <span class="sidebar-nav-abbr">
                                     View
                               </span>
                               <span class="sidebar-nav-name">
                                     &nbsp; all
                               </span>
                               </a>
                         </li>

                   </ul>
             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('show-fundrequest') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-credit-card"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Funds
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('order-history') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-shopping-cart"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Order History
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('sales-details') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-coins"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Sales
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

             </li>


             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a href="{{url('transactions') }}" class="sidebar-nav-link">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-credit-card"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Transactions
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>


             </li>


             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link c" href="{{url('about_us') }}" aria-controls="about">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-file"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               About
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>


             </li>

             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{url('privacy') }}" aria-controls="privacy">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-file"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Privacy Policy
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>


             </li>


             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{url('refund') }}" class="sidebar-nav-link"
                         aria-controls="return">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-file"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               Return Policy
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

             </li>


             <hr style="color:#f7f7f7;">
             </hr>
             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{url('tandc') }}" class="sidebar-nav-link" aria-controls="terms">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-file"></i>
                         </span>
                         <span class="sidebar-nav-name">
                               T & C
                         </span>
                         <span class="sidebar-nav-end">
                               <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                         </span>
                   </a>

                   <ul class="sidebar-sub-nav collapse" id="terms">
                         <li class="sidebar-nav-item">
                               <a href="{{url('tandc') }}" class="sidebar-nav-link">
                                     <span class="sidebar-nav-abbr">
                                           T & C
                                     </span>
                               </a>

                         </li>

                   </ul>
             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('subscribers') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-envelope-o"></i>
                         </span>Newsletter
                   </a>

             </li>

             <hr style="color:#f7f7f7;">
             </hr>


             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('profile') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-user-o"></i>
                         </span>Profile
                   </a>

             </li>
             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-right"></i>
                         </span>{{ __('Logout') }}
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                   </form>
             </li>

             <hr style="color:#f7f7f7;">
             </hr>

             <li class="sidebar-nav-item">
                   <a class="sidebar-nav-link " href="{{ url('/') }}">
                         <span class="sidebar-nav-icon">
                               <i class="fa fa-arrow-circle-left"></i>
                         </span> LascocoMart
                   </a>

             </li>

       </ul>
 </div><!-- Sidebar End -->
 @endif
 @endauth