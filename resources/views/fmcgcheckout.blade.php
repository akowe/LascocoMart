@extends('layouts.fmcgheader')

@section('content')
<!-- SECTION -->
<div class="section">
      <!-- container -->
      <div class="container">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                  {{ session('status') }}
            </div>
            @endif
            <!-- row -->
            <div class="row">
                  <div class="col-md-6">
                        <!-- Billing Details -->
                        <!-- <div class="billing-details"> -->
                        <div class="shiping-details">

                              <div class="section-title">
                                    <h3 class="title">Shipping Details</h3>
                              </div>
                              @php $companyName = Auth::user()->coopname;
                              @endphp
                              <h4 class="text-danger"><b>{!! Str::limit("$companyName", 21, '...') !!}</b></h4>

                              @foreach($voucher as $user)
                              <div class="form-group">
                                    <input class="input" type="hidden" name="first-name" value="{{ $user->fname }}"
                                          placeholder="{{$user->fname}}">
                                    <label>Name:</label> {{ $user->fname }}
                              </div>

                              <div class="form-group">
                                    <input class="input" type="hidden" name="email" value="{{$user->email}}"
                                          placeholder="{{$user->email}}">
                                    <label>Email:</label> {{$user->email}}
                              </div>

                              <div class="form-group">
                                    <input class="input" type="hidden" name="address" value="{{$user->address}}"
                                          placeholder="{{$user->address}}">
                                    <label>Address:</label> {{$user->address}}
                              </div>

                              <div class="form-group">
                                    <input class="input" type="hidden" name="city" value="{{$user->location}}"
                                          placeholder="City">
                                    <label>City:</label> {{$user->location}}
                              </div>

                              <div class="form-group">
                                    <input class="input" type="hidden" name="tel" value="{{$user->phone}}"
                                          placeholder="Telephone">
                                    <label>Mobile:</label> {{$user->phone}}
                              </div>

                              <!-- </div> -->
                              @endforeach
                              <!-- /Billing Details -->
                              <!-- Shiping to different address -->
                              <div class="input-checkbox">
                                    <input type="checkbox" id="shiping-address">
                                    <label for="shiping-address">
                                          <span></span>
                                          Ship to a diffrent address?
                                    </label>
                                    <div class="caption">
                                          <div class="form-group">
                                                <input class="input" type="text" name="ship_address"
                                                      placeholder="Delivery Address" id="ship_address">
                                          </div>
                                          <div class="form-group">
                                                <input class="input" type="text" name="ship_city" placeholder="City"
                                                      id="ship_city">
                                          </div>

                                          <div class="form-group">
                                                <input class="input" type="text" name="ship_phone"
                                                      placeholder="Mobile Number" id="ship_phone">
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
                  </div>
                  <!--col 7-->
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
                              @php $delivery = 3000 @endphp
                              @if(session('fmcgcart'))
                              @foreach(session('fmcgcart') as $prod => $details)
                              @php $total += $details['price'] * $details['quantity'] @endphp

                              <div class="order-products">
                                    <div class="order-col">
                                          <div>
                                                {{ $details['quantity'] }} x {{ $details['prod_name'] }}</div>

                                          <div>₦{{number_format($details['price'] * $details['quantity'] ) }} </div>
                                    </div>

                              </div>
                              @endforeach
                              @endif
                              <!--Add Delivery fee-->
                              @php $totalAmount = 0 @endphp
                              @php $totalAmount += round($total) + $delivery @endphp

                              <!--submit each item in cart-->
                              <div class="order-col">
                                    <div><strong>Delivery fee:</strong></div>
                                    <div>
                                          <!-- <strong>FREE</strong> -->
                                          ₦{{ number_format($delivery) }}
                                    </div>
                              </div>
                              <div class="order-col">
                                    <div><strong>Total</strong></div>
                                    <div id='total'><strong class="">₦{{ number_format($totalAmount) }}</strong>
                                    </div>

                              </div>
                              <input type="hidden" name="total" id="total" value="{{ $totalAmount }}">

                              @php $ran = random_int(10000000, 99999999); @endphp
                              <div class="order-col" id="#hide">
                                    <a href="{{ route('fmcgcart')}}" class="text-danger">Modify Your Order.
                                          <i class="fa fa-edit"></i></a>
                              </div>

                              <div class="form-group">
                                    <input type="hidden" name="order_number" value="{{ $ran }}" id="order_number">
                                    <input type="hidden" name="delivery" value="{{$delivery}}">

                                    <!--- get value of shipping details-->
                                    <div class="form-group">
                                          <input class="input" type="hidden" name="ship_address"
                                                placeholder="Delivery Address" id="get_ship_address">
                                    </div>
                                    <div class="form-group">
                                          <input class="input" type="hidden" name="ship_city" placeholder="City"
                                                id="get_ship_city">
                                    </div>

                                    <div class="form-group">
                                          <input class="input" type="hidden" name="ship_phone"
                                                placeholder="Mobile Number" id="get_ship_phone">

                                          <textarea class="input" style="display: none;" placeholder="Order Notes"
                                                name="note" id="get_note"></textarea>
                                    </div>
                                    <!--- end value of shipping details-->

                              </div>
                              <!-- payment method -->
                              <div class="row">
                                    <div class="col-sm-6">
                                          <form method="POST" action="{{ route('fmcg-cash-payment') }}"
                                                accept-charset="UTF-8" class="form-horizontal" role="form">
                                                @csrf
                                                <input type="text" name="amount" value="{{ $totalAmount }}">
                                                <input type="hidden" name="delivery" value="{{$delivery}}">
                                                <input type="hidden" name="ship_address" placeholder="Delivery Address"
                                                      id="get_ship_address">
                                                <input type="hidden" name="ship_city" placeholder="City"
                                                      id="get_ship_city">
                                                <input type="hidden" name="ship_phone" placeholder="Mobile Number"
                                                      id="get_ship_phone">

                                                <button class="btn btn-secondary btn-lg btn-block" type="submit"
                                                      value="">
                                                      Pay With Wallet <i class="fa fa-google-wallet"
                                                            aria-hidden="true"></i> </button>
                                          </form>
                                    </div>
                                    <div class="col-sm-6">
                                          <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8"
                                                class="form-horizontal" role="form">
                                                @csrf
                                                <input type="hidden" name="amount" value="{{ $totalAmount*100  }}">
                                                <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                <input type="hidden" name="ship_address" placeholder="Delivery Address"
                                                      id="get_ship_address">
                                                <input type="hidden" name="ship_city" placeholder="City"
                                                      id="get_ship_city">
                                                <input type="hidden" name="ship_phone" placeholder="Mobile Number"
                                                      id="get_ship_phone">
                                                <input type="hidden" name="currency" value="NGN">
                                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => Auth::user()->id, 
                                                'transaction_type' => 'fmcg', 'delivery' => '3000']) }}">
                                                <input type="hidden" name="reference"
                                                      value="{{ Paystack::genTranxRef() }}">

                                                <button class="btn btn-success btn-lg btn-block" type="submit"
                                                      value="Pay Now!">
                                                      Pay Now <i class="fa fa-money fa-lg"></i> </button>
                                          </form>
                                    </div>
                              </div>
                        </div>
                        <!--col 6 -summary-->




                  </div>
                  <!-- /Order Details -->

            </div>
            <!-- /row -->
      </div>
      <!-- /container -->
</div>
<!-- /SECTION -->

<script>
var paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener('submit', payWithPaystack, false);

function payWithPaystack() {
      var handler = PaystackPop.setup({
            // pk_live_483aa57c04940d7f7565b235ab06f9621a15ef25
            //pk_test_6ce6e9d31412d8fd2574af630c65d0e9aa78c5c7
            key: 'pk_test_6ce6e9d31412d8fd2574af630c65d0e9aa78c5c7',
            email: document.getElementById("email").value,
            amount: document.getElementById("amount").value *
                  100, // the amount value is multiplied by 100 to convert to the lowest currency unit
            currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars

            reference: '' + Math.floor((Math.random() * 1000000000) +
                  1
            ), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                  custom_fields: [{
                        order_id: document.getElementById("user_id").value
                  }]
            },


            callback: function(response) {
                  var email = document.getElementById("email").value;
                  var amount = document.getElementById("amount").value;

                  var paystack_reference = response.reference;
                  var reference = paystack_reference;

                  // var success ='ref='+paystack_reference + '&email=' + email + '&amount=' +
                  // amount + '&order_id=' + order_id;

                  var ref = paystack_reference;
                  var order_amount = +amount;

                  // let message = 'Payment complete! Reference number: ' + response.reference;
                  // alert(order_id);

                  var url = "{{ URL('fmcg-payment/') }}" + "/" + reference + "/" + order_amount;
                  location.href = url;

                  //or

                  // window.location = "<?php echo url('fmcg-payment');?>/success=" +
                  //       paystack_reference + '&email=' + email + '&amount=' + amount +
                  //       '&order_id=' + order_id;

            },


            onClose: function() {
                  alert('Transaction was not completed, window closed.');
            }
      });
      handler.openIframe();
}
</script>

@endsection