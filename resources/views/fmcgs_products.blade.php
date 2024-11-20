@extends('layouts.fmcgheader')
@section('content')
<!-- SECTION -->
<span class="text-center">
      @if (session('error'))
      <div class="alert alert-danger" role="alert">
            {!! session('error') !!}
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
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
            </ul>
      </div>
      @endif
</span>

<!-- Advert container -->

<!-- SECTION -->
<div class="section">
      <!-- container -->
      <div class="container">
            <!-- row -->
            <div class="row">

                  <div class="col-md-12">
                        <div class="section-title">
                              <h3 class="title">FMCG Products</h3>
                        </div>
                  </div>
            </div>

            <!-- /section title -->

            <!-- products start -->
            <div class="row">

                  @foreach($products as $product)
                  <div class="col-md-3 col-xs-6">

                        <div class="product ">
                              @if($product->quantity < 1) <div
                                    style="padding-left:25px; padding-right:25px; padding-top:25px;">
                                    <a href="{{ route('fmcg-preview', $product->prod_name )}}" class="product-img">
                                          <img src="{{ asset($product->image) }}" class="cursor" style="height:11em;">
                                          <div id="sold-out">
                                                <div id="sold-out-text">OUT OF STOCK</div>
                                          </div>
                                    </a>
                        </div>
                        <div class="product-body">
                              <p class="product-category">{{ $product->prod_brand }}</p>
                              <h6 class="product-name"><a href="#">{{ $product->prod_name }} </a></h6>
                              <del class="product-category "> ₦{{ number_format($product->price )}}
                              </del>
                        </div>


                        @else
                        <div style="padding-left:25px; padding-right:25px; padding-top:25px;">
                              <a href="{{ route('fmcg-preview', $product->prod_name )}}" class="product-img">
                                    <img src="{{ asset($product->image) }}" class="cursor" style="height:11em;">
                              </a>
                        </div>


                        <div class="product-body">
                              <!--  <p class="product-category">{{ $product->prod_brand }}</p>-->

                              <h3 class="product-name productnamecssnew"><a href="#" m>{{ $product->prod_name }}</a>
                              </h3>
                              <h4 class="product-price"> ₦{{ number_format($product->price )}}
                                    <del class="product-old-price">{{number_format($product->old_price)  }}</del>
                              </h4>
                             
                              <span class="vendor" style="font-size:12px;">VENDOR: <a
                                          href="{{ route('vendor-product', $product->coopname) }}" title="view store"
                                          class="text-danger"> {{$product->coopname}}</a>
                              </span>




                              <div class="product-btns">
                                    <button class="quick-view">
                                          <a href="{{ route('fmcg-preview', $product->prod_name) }}" title="view">
                                                <i class="fa fa-eye"></i>
                                          </a>
                                    </button>

                                    <button class="quick-view">
                                          <a href="{{ route('add.to.wish',$product->id) }}" class="text-danger"
                                                title="Wishlist">
                                                <i class="fa fa-heart-o"></i>
                                          </a>
                                    </button>

                                    <!-- <button class="quick-view" data-toggle="modal"
                                                      data-target="#product_view{{ $product->id }}"><i
                                                            class="fa fa-eye"></i><span class="tooltipp">quick
                                                            view</span></button> -->
                              </div>

                        </div>

                        <button type="button" class="add-to-cart">

                              <a class="add-to-cart-btn btn" href="{{route('add.product.to.cart',$product->id)}}">
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
                                    <a href="#" data-dismiss="modal" class="class pull-right"><span
                                                class="fa fa-times"></span></a>
                                    <h4 class="modal-title">{{ $product->prod_brand }}</h4>
                              </div>
                              <div class="modal-body">
                                    <div class="row">
                                          <div class="col-md-8">
                                                <img src="{{ $product->image }}" alt="" width="500" height="500"
                                                      style="text-align: left;">
                                          </div>
                                          <div class="col-md-4">
                                                <h4>{{ $product->prod_name }}</h4>

                                                <p>{{ $product->description }}</p>
                                                <h4 class="product-price">₦{{ number_format($product->price) }}
                                                      <small><del class="product-old-price">
                                                                  ₦{{number_format($product->old_price)  }}</del></small>
                                                </h4>

                                                <div class="row">
                                                      <!-- end col -->
                                                      <div class="col-md-4 col-sm-6 col-xs-12">

                                                            <p>
                                                                  <br>
                                                                  <label> Qty: </label> <input type="number" name=""
                                                                        value="1" class="form-control">
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
                                                            <a class="add-to-cart-btn btn"
                                                                  href="{{ route('add.product.to.cart', $product->id) }}">
                                                                  <i class="fa fa-shopping-cart"></i> Add To
                                                                  Cart</a></button>
                                                </div>
                                          </div>
                                    </div>
                              </div>

                        </div>
                  </div>
            </div>
            <!-- quick view modal /col-3 -->
            @endforeach

      </div><!-- /row -->
      <div class="store-filter clearfix">
            <!-- count number of item per page -->
            <!--  <span class="store-qty">Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{$products->total()}} products</span> -->

            <!-- pagination -->
            {{ $products->links() }}
      </div>
</div><!-- /container -->
</div><!-- SECTION -->

@endsection