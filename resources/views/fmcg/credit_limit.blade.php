@extends('layouts.app')

@extends('layouts.sidebar')


@section('content')
<form id="paymentForm" method="" action="">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                              <div class="form-group">
                                
                                <input type="email" id="email-address" value="{{$order['email']}}" required />
                              </div>

                              <div class="form-group">
                              
                                <input type="tel" id="amount" value="{{$order['total']}}"  required />
                              </div>

                              <div class="form-group">
                          
                                <input type="text" value="{{$order['fname']}}"  id="first-name" />
                              </div>

                              <div class="form-group">
                             
                                <input type="text" value="{{$order['lname']}}" id="last-name" />
                              </div>

                              <div class="form-submit">
                                <button type="submit" onclick="payWithPaystack()"> Pay </button>
                              </div>

                            </form>
                            <script src="https://js.paystack.co/v1/inline.js"></script>   
 @endsection

@section('scripts')
   <script type="text/javascript">
      const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_bc9a0d7fb2c4c13c4fc1d9f65d44da3cc55d7f45', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
    }
  });
  handler.openIframe();
}


    </script>


@endsection