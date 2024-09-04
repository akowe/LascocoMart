@extends('layouts.fmcgheader')
<style>
    /*Clearing Floats*/
.cf:before, .cf:after{
    content:"";
    display:table;
}

.cf:after{
    clear:both;
}

.cf{
    zoom:1;
}    
/* Form wrapper styling */

.search-wrapper {
    /* width: 450px; */
    /* margin: 150px auto 50px auto; */
    /* border-radius: 40px; */
  background: transparent;
}

/* Form text input */

.search-wrapper input {
  padding-left: 20px;
  height: 40px;
    /* width: 120px; */
    padding: 10px 5px;
    float: left;   
    font: bold 'lucida sans', 'trebuchet MS', 'Tahoma';
    border: 0;
    background: #fff;
    border-radius: 40px;
    /* text-align:center; */
    border-top-style: none;
    border:1px solid #ccc;
}

.search-wrapper input:focus {
    outline: 0;
    background: #fff;
    box-shadow: 0 0 2px rgba(0,0,0,0.8) inset;
}

.search-wrapper input::-webkit-input-placeholder {
   color: #999;
   font-weight: normal;
   font-style: italic;
  padding-left: 20px;
}

.search-wrapper input:-moz-placeholder {
    
    color: #999;
    font-weight: normal;
    font-style: italic;
}

.search-wrapper input:-ms-input-placeholder {
    color: #999;
    font-weight: normal;
    font-style: italic;
  border-style: none;
}   

/* Form submit button */
.search-wrapper button {
    overflow: visible;
    position: relative;
    float: right;
   right:2px; 
    border: 0;
    padding: 0;
    cursor: pointer;
    height: 40px;
    width: 90px;
    bottom:40px;
    font: 13px/40px 'lucida sans', 'trebuchet MS', 'Tahoma';
    /* color: #fff;
    text-transform: uppercase; */
    /* background: #D10024; */
 border-radius: 40px; 
    text-shadow: 0 -1px 0 rgba(0, 0 ,0, .3); 
}  

.search-wrapper button:hover{    
    background: #D10024;
}  

.search-wrapper button:active,
.search-wrapper button:focus{  
    background: #D10024;
    outline: 0;  
}

.search-wrapper button:focus:before,
.search-wrapper button:active:before{
        border-right-color: #D10024;
}     

.search-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
    border: 0;
    padding: 0;
}   


/* ---- remove button ----- */
.remove-wrapper {
  background: transparent;
}


/* Form submit button */
.remove-wrapper button {
    border: 0;
    padding: 0;
    cursor: pointer;
    background: none;
    font-size:20px;
    text-align:center;
}  

.remove-wrapper button:hover{    
    background: #fff;
    color:#D10024;
}  

.remove-wrapper button:active,
.remove-wrapper button:focus{  
    background: #fff;
    color:#D10024;
    outline: 0;  
}

.remove-wrapper button:focus:before,
.remove-wrapper button:active:before{
        border-right-color: none;
}     

.remove-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
    border: 0;
    padding: 0;
}   


</style>
@section('content')

<!-- ALL CART SECTION -->
<div class="section">
      <!-- container -->
      <div class="container">

            <!-- row -->
            <div class="row">
                  <div class="col-md-10">

                        <table id="cart" class="table">
                              <thead>
                                    <tr>
                                          <th style="width:50%">Product</th>
                                          <th style="width:5%">Price</th>
                                          <th style="width:22%">Quantity</th>
                                          <th style="width:18%" class="text-center">Subtotal</th>
                                          <th style="width:5%">Remove</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @php $total = 0 @endphp
                                    @if(session('fmcgcart'))
                                    @foreach(session('fmcgcart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                          <td data-th="Product">
                                                <div class="row">
                                                      <div class="col-sm-3 hidden-xs">
                                                            <img src="{{ $details['image'] }}" width="100" height="100"
                                                                  class="img-responsive" />
                                                      </div>
                                                      <div class="col-sm-9">
                                                            <h5 class="nomargin">{{ $details['prod_name'] }}</h5>
                                                      </div>
                                                </div>
                                          </td>

                                          <td data-th="Price">₦{{number_format($details['price'])  }}</td>

                                          <td data-th="Quantity">
                                                <form action="{{ route('update.fmcgcart') }}" method="POST" class="search-wrapper">
                                                      @csrf
                                                      <input type="hidden" value="{{ $id }}" name="id">
                                                      <input type="number" name="quantity"
                                                            value="{{ $details['quantity'] }}"
                                                           id="inc"  />
                                                      <button type="submit" class=" btn btn-danger"><i
                                                                  class="fa fa-refresh"></i> Update</button>
                                                    <!-- <button class="btn btn-danger btn-sm "
                                                            onclick="buttonDecrease()"><i
                                                                  class="fa fa-minus"></i></button>
                                                      <button class="btn btn-danger btn-sm "
                                                            onclick="buttonIncrease()"><i
                                                                  class="fa fa-plus"></i></button> -->
                                                </form>

                                          </td>


                                          <td data-th="Subtotal" class="text-center">
                                                ₦{{number_format($details['price'] * $details['quantity'] )  }}</td>

                                          <td data-th="Remove">
                                                <form action="{{ route('remove.from.fmcgcart') }}" method="POST" class="remove-wrapper">
                                                      @csrf
                                                      <input type="hidden" value="{{ $id }}" name="id">
                                                      <button class="btn btn-sm text-danger"><i
                                                                  class="fa fa-trash-o"></i></button>
                                                </form>
                                          </td>


                                    </tr>
                                    @endforeach
                                    @endif
                              </tbody>
                        </table>

                  </div>

                  <div class="col-md-2">
                        <table id="cart" class="table">
                              <tr>
                                    <td class="text-right">
                                          <h4><strong>Total ₦{{number_format($total),  }}</strong>
                                          </h4>
                                    </td>
                              </tr>

                              <tr>
                                    <td class="text-right">
                                          <a href="{{ url('fmcgs_products') }}" class="btn btn-link">
                                                <i class="fa fa-angle-left"></i> Continue Shopping</a>
                                          <a href="{{ url('/fmcgcheckout') }}" class="btn primary-btn">Checkout</a>
                                    </td>
                              </tr>
                        </table>

                  </div>

            </div> <!-- /row -->
      </div> <!-- /container -->
</div> <!-- /CART SECTION -->

@endsection

@section('scripts')
<script>
function buttonIncrease() {
      var inc = document.getElementById('inc').value++;
      document.getElementById('inc') = inc;

    //   let arr =  document.getElementById('inc');
    //   arr.forEach((element, index) => {
    //         arr[index] = element + 1;

    //         document.getElementById('inc')= arr;
    //   });
    //   console.log(arr);
}

function buttonDecrease() {
      var dec = document.getElementById('inc').value--;
      document.getElementById('inc') = dec;
}
</script>
@endsection