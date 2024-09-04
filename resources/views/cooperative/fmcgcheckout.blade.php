@extends('layouts.fcmgheader')


@section('content')
<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-6">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Shipping Details</h3>
							</div>
							  @foreach($voucher as $user)
							<div class="form-group">
								<input class="input" type="hidden" name="first-name" value="{{ $user->fname }}" placeholder="{{$user->fname}}">
								<input class="input" type="hidden" name="last-name" value="{{$user->lname}}" placeholder="{{$user->lname}}">
								<label>Name:</label> {{ $user->fname }} {{$user->lname}}

							</div>
							
							<div class="form-group">
								<input class="input" type="hidden" name="email"  value="{{$user->email}}" placeholder="{{$user->email}}">
								<label>Email:</label> {{$user->email}}
							</div>

							<div class="form-group">
								<input class="input" type="hidden" name="address" value="{{$user->address}}" placeholder="{{$user->address}}">
								<label>Address:</label> {{$user->address}}
							</div>

							<div class="form-group">
								<input class="input" type="hidden" name="city" value="{{$user->location}}"  placeholder="City">
								<label>City:</label> {{$user->location}}
							</div>
							
							<div class="form-group">
								<input class="input" type="hidden" name="tel" value="{{$user->phone}}" placeholder="Telephone">
								<label>Mobile:</label> {{$user->phone}}
							</div>
							
						</div>
						@endforeach
						<!-- /Billing Details -->

							
						<!-- Shiping Details -->
						<div class="shiping-details">
							
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
								</label>
								<div class="caption">
									
							
									<div class="form-group">
										<input class="input" type="text" name="ship_address" placeholder="Delivery Address" id="ship_address">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="ship_city" placeholder="City" id="ship_city">
									</div>
									
									
									<div class="form-group">
										<input class="input" type="text" name="ship_phone" placeholder="Mobile Number" id="ship_phone">
									</div>
								</div>
							</div>
						</div>
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes" name="note" id="note"></textarea>
						</div>
						<!-- /Order notes -->
					</div><!--col 7-->

				
					<!-- Order Details -->
					<div class="col-md-6 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong></strong></div>
							</div>
								
								
							@php $total = 0 @endphp
				        @if(session('fcmgcart'))
				            @foreach(session('fcmgcart') as $prod => $details)
				                @php $total += $details['price'] * $details['quantity'] @endphp


							<div class="order-products">
								<div class="order-col">
									<div> 
									{{ $details['quantity'] }} x {{ $details['prod_name'] }}</div>

									<div>₦{{number_format($details['price'] * $details['quantity'] ) }} </div>
								</div>
								
							</div>
							
					

							<form action="{{ url('fcmgpay')}}" method="post" enctype=”multipart/form-data”>
								  @csrf

							 <!--submit each item in cart-->
							
							
						  @endforeach
       						 @endif

						<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>Total</strong></div>
								<div id='total'><strong class="">₦{{ number_format($total) }}</strong></div>

								
							</div>
							<input type="hidden" name="" id="total" value="{{ $total }}" >
							
								@php $ran = random_int(10000000, 99999999); @endphp	

							<div class="form-group">
								<input  type="hidden" name="order_number" value="{{ $ran }}" id="order_number" >
					
								<input  type="hidden" name="status" value="confirmed">

								<!--- get value of shipping details-->
								<div class="form-group">
										<input class="input" type="hidden" name="ship_address" placeholder="Delivery Address" id="get_ship_address">
									</div>
									<div class="form-group">
										<input class="input" type="hidden" name="ship_city" placeholder="City" id="get_ship_city">
									</div>
									
									
									<div class="form-group">
										<input class="input" type="hidden" name="ship_phone" placeholder="Mobile Number" id="get_ship_phone">

										<textarea class="input" style="display: none;"  placeholder="Order Notes" name="note" id="get_note"></textarea>
									</div><!--- end value of shipping details-->
						
							</div>

							<!-- hide-->
								<div class="form-group" id="#hide">
									<a href="{{ route('fcmgcart')}}" class="text-primary">Modify Your Order.
										<i class="fa fa-edit"></i></a>
										</div>
									
										<br><br>

									
										@if(Session::has('credit')== true)
										<!--show alert-->
										<p class="alert {{ Session::get('alert-class', 'alert-info') }} text-center">{{ Session::get('credit') }}</p>

										<!--hide button alert-->
										<div class="form-group" style="display: none;">
												<span>Any order that is confirmed, cancellation fee is ₦200. </span>

												<br><br>
												<input type="checkbox" id="terms" required>

												<label for="terms">
													<span></span>
													Yes I want this order
												</label>

												

											<button type="submit" class="primary-btn order-submit form-control">
												Confirm your order
											</button>
											</div>

										@endif

										@if(Session::has('credit')== false)
											<!--hide alert-->
											<p class="" style="display:none;">{{ Session::get('credit') }}</p>

											<!--show button alert-->
											<div class="form-group" style="display: block;">
												<span>Any order that is confirmed, cancellation fee is ₦200.</span>

												<br><br>
												<input type="checkbox" id="terms" required>

												<label for="terms">
													<span></span>
													Yes I want this order
												</label>

												

											<button type="submit" class="primary-btn order-submit form-control">
												Pay
											</button>
											</div>

										@endif

										

									

								
								

								<!-- show balance-->

									

							</form>
								
							</div><!--col-summary-->


											
								
									
						</div>
					<!-- /Order Details -->
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script language="javascript">


$('#ship_address, #ship_city, #ship_phone, #note').on('input',function(){
    var ship_address = $('#ship_address').val();
    var ship_city = $('#ship_city').val();
    var ship_phone = $('#ship_phone').val();
    var note = $('#note').val();

    $('#get_ship_address').val(ship_address);  
    $('#get_ship_city').val(ship_city);     
    $('#get_ship_phone').val(ship_phone);  
    $('#get_note').val(note);   
});

</script>




@endsection