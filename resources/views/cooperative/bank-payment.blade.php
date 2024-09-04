@extends('layouts.home')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Make Payment for approved order
                        </div>
                        <h2 class="page-title">

                              <span class=" d-none  d-md-block">Cooperative&nbsp;</span>ID: {{Auth::user()->code}}&nbsp;

                              <a href="" alt="Copy" title="Copy" class="text-danger"
                                    onclick="copyToClipboard('{{Auth::user()->code}}')"><svg
                                          xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy  "
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path
                                                d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                          <path
                                                d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                                    </svg></a>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block">
                                    <!-- <a href="#" class="btn">
                                         
                                    </a> -->
                              </span>
                              <a href="{{ url('admin-member-order') }}" class="btn btn-danger d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                          <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                    Member Order (s)
                              </a>
                              <a href="{{ url('admin-member-order') }}" class="btn btn-danger d-sm-none btn-icon"
                                    aria-label="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                          <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                              </a>
                        </div>
                  </div>
            </div>
      </div>
</div>
<div class="page-body">
      <div class="container-xl">
            <div class="alert alert-important alert-info alert-dismissible" role="alert">
                  <div class="d-flex">
                        <div>
                              <!-- Download SVG icon from http://tabler-icons.io/i/info-circle -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                    <path d="M12 9h.01" />
                                    <path d="M11 12h1v4h1" />
                              </svg>
                        </div>
                        <div>
                              Pay with debit card or click "Transfer".
                        </div>
                  </div>
                  <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>

      </div>

      <div class="container-xl">
            <div class="card">
                  <div class="card-body">
                        <div class="row">
                              <p class="text-danger">From the pop-up, click "Transfer"</p>
                              <p class="text-danger"><span class="text-dark">
                                    <strong>Next:</strong> </span> Go to you
                                    internet
                                    banking,
                                    transfer to the unique account number on your screen. </p>
                              <p class="text-danger"><span class="text-dark">
                                    <strong>Next:</strong> </span> Wait for your transfer to be successful from your bank </p>
                              <p class="text-danger"><span class="text-dark"> <strong>Next:</strong></span> Do not save
                                    the account
                                    number
                              </p>
                              <p class="text-danger"><span class="text-dark"><strong>Next:</strong></span> Comback to this app. Click "i have
                                    sent the
                                    money".
                                    wait for it to verify....</p>
                              <div class="col-md-6">

                                    <form id="paymentForm" method="GET" name="submit">
                                          @csrf
                                          <script src="https://js.paystack.co/v1/inline.js"></script>
                                          <div class="form-group">
                                                <input type="hidden" class="form-control" id="email" name="email"
                                                      readonly value="{{Auth::user()->email}}" />
                                          </div>
                                          <p></p>
                                          <div class="form-group">
                                                <label for="amount"><strong>Total amount for all approved order</strong></label>
                                                <p></p>
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                      readonly value="{{$all_orders->sum('grandtotal')}}" />

                                          </div>
                                          <div class="form-group">
                                                <input type="hidden" class="form-control" id="order_id" name="id[][id]"
                                                      value="{{ $orders->pluck('id') }}" />

                                          </div>
                                          <p></p>
                                          <div class="form-submit">
                                                <button type="button" class=" btn btn-ghost-danger active" name="submit"
                                                      onclick=" payWithPaystack() "> Pay
                                                      Now </button>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

</div>
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
                        order_id: document.getElementById("order_id").value
                  }]
            },


            callback: function(response) {
                  var email = document.getElementById("email").value;
                  var amount = document.getElementById("amount").value;
                  var order_id = document.getElementById("order_id").value;

                  var paystack_reference = response.reference;
                  var reference = paystack_reference;
 
                  // var success ='ref='+paystack_reference + '&email=' + email + '&amount=' +
                  // amount + '&order_id=' + order_id;
                  var contact = JSON.parse(order_id);

                  var ref = paystack_reference;
                  var order_id = JSON.parse(order_id);
                  var order_amount = +amount;

                  // let message = 'Payment complete! Reference number: ' + response.reference;
                  // alert(order_id); 

                  var url = "{{ URL('payment-bank-tranfer/') }}" + "/" + reference + "/" +
                        order_id + "/" + order_amount;
                  location.href = url;

                  //or

                  // window.location = "<?php echo url('payment-bank-tranfer');?>/success=" +
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

</div>
</div>

@endsection