@extends('layouts.fmcgheader')


       @section('content')
        <!-- SECTION -->
        <span class="text-center">
               @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {!! session('status') !!}
                            
                        </div>
                    @endif
                    
                @if(Session::has('register')== true)
                                        <!--New registration alert-->
                                        <p class="alert {{ Session::get('alert-class', 'alert-info') }} text-center">{{ Session::get('register') }}</p>
                                        @endif

                @if(Session::has('register')== false)
                                        <!--show alert-->
                    <p style="display: none;">{{ Session::get('register') }}</p>
                 @endif

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif   
        </span>

        <!-- HOT DEAL SECTION -->
        <div id="hot-deal" class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="hot-deal">
                            
                            <h2 class="text-uppercase">Online Marketplace</h2>
                            <p>FMCG Products</p>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /HOT DEAL SECTION -->

        <!-- SECTION -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">All FMCG Products</h3>
                        </div>
                    </div>
               
                    <!-- /section title -->
                       
                    <!-- products start -->

                   
                          @foreach($fmcgproductsview as $product)
                             <div class="col-md-3">
                       
                                <div class="product ">
                                  @if($product->quantity < 1)
                                  <div class="text-center" >
                                            <a href="" class="product-img text-center">
                                                <img src="{{ asset($product->image) }}" class="cursor text-center">
                                                  <div class="top-right">Sold Out !</div>
                                            </a>
                                            </div>
                                             

                                            <div class="product-body">
                                                <p class="product-category">{{ $product->prod_brand }}</p>
                                                <h6 class="product-name"><a href="#">{{ $product->prod_name }}  </a></h6>
                                                <del class="product-price "> ₦{{ number_format($product->price )}}
                                                   </del>
                                                    
                                                 <div class="product-btns" style="background-color: #fff !important;">
                                                   
                                                   
                                                    <button class="">
                                                        <a href="">
                                                        <span class=""></span>
                                                    </a>
                                                    </button>
                                                </div>

                                                </div>
                                    
                                            
                                            @else
                                         <div >
                                            <a href="{{ route('preview', $product->prod_name )}}" class="product-img">
                                                <img src="{{ asset($product->image) }}" class="cursor">
                                            </a>
                                            </div>
                                             

                                            <div class="product-body">
                                               <!--  <p class="product-category">{{ $product->prod_brand }}</p>
                                                --> <h3 class="product-name productnamecssnew"><a href="#" m>{{ $product->prod_name }}</a></h3>
                                                <h4 class="product-price"> ₦{{ number_format($product->price )}}
                                                    <del class="product-old-price">{{number_format($product->old_price)  }}</del></h4>
                                                    
                                                    <i style="display: none;">{{$product->seller_id }}</i>
                                                    <i style="display: none;">{{$product->seller_role }}</i>

                                                <div class="product-btns">
                                                  
                                                   
                                                    <button class="quick-view">
                                                        <a href="{{ route('preview', $product->prod_name) }}">
                                                        <i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                                                    </a>
                                                    </button>
                                                </div>

                                            </div>
                        
                                          <button type="button" class="add-to-cart"> 
                                             <a class="add-to-cart-btn btn" href="{{ route('fmcgaddToCart', $product->id) }}">
                                                <i class="fa fa-shopping-cart"></i> 
                                             add to cart</a>
                                         </button>
                                       
                                       @endif
                                        </div> <!-- /product -->
                                </div><!-- /col-3 -->
                                 
                                 



                                 <!-- quick view modal /col-3 -->
       
                            <div class="modal quick_view" id="product_view{{ $product->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a href="#" data-dismiss="modal" class="class pull-right"><span class="fa fa-times"></span></a>
                                        <h4 class="modal-title">{{ $product->prod_brand }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                               <img src="{{ $product->image }}" alt="" width="500" height="500" style="text-align: left;">
                                           </div>
                                            <div class="col-md-4">
                                                <h4>{{ $product->prod_name }}</h4>
                                               
                                                <p>{{ $product->description }}</p>
                                                <h4 class="product-price">₦{{ number_format($product->price) }}  <small><del class="product-old-price"> ₦{{number_format($product->old_price)  }}</del></small></h4>
                                          
                                          <div class="row">
                                                   <!-- end col -->
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                           
                                             <p>
                                                <br>
                                                  <label>  Qty: </label> <input type="number" name="" value="1" class="form-control">
                                             </p>
                                        </div>
                            <!-- end col -->
                            <div class="col-md-4 col-sm-12">
                            
                            </div>
                            <!-- end col -->
                        </div>
                             <div class="space-ten"></div>
                                <div class="add-to-cart">
                                    <button type="button" class="add-to-cart btn"> 
                                    <a class="add-to-cart-btn btn" href="{{ route('fmcgaddToCart', $product->id) }}">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart</a></button>     
                                    </div>
                         </div>
                    </div>
                 </div>
                                
            </div>
         </div>
    </div>
         <!-- quick view modal /col-3 -->
 @endforeach
                    <!-- store bottom filter -->
                        <div class="store-filter clearfix">
                             <!-- count number of item per page -->
                           <!--  <span class="store-qty">Showing {{ $fmcgproductsview->firstItem() }} - {{ $fmcgproductsview->lastItem() }} of {{$fmcgproductsview->total()}} products</span> -->
                    
                    <!-- pagination -->
                    {{ $fmcgproductsview->links() }}
                        </div>
                        <!-- /store bottom filter -->

            </div><!-- /row -->
                                   
    </div><!-- /container --> 
 </div><!-- SECTION -->
         
     
        
 @endsection