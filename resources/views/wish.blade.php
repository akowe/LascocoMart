@extends('layouts.header')
<style>
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
.bg-secondary{
      background-color:#6c757d;
      color:#ffffff;
} 
</style>
@section('content')

<!-- ALL CART SECTION -->
<div class="section">
      <!-- container -->
      <div class="container">

            <!-- row -->
            <div class="row">
                  <div class="col-md-12">  
                        @php $item = 1 @endphp
                        @php $items = 0 @endphp
                        @foreach($wish as $id => $details)
                        @php $items += 1 * $item
                        @endphp
                        @endforeach
                        <h3>Saved Item(s) {{$wish->count()}} </h3>

                        <table id="cart" class="table">
                              <thead>
                                    <tr>
                                          <th style="width:50%">Product</th>
                                          <th style="width:5%">Price</th>
                                          <th style="width:22%"></th>
                                          <th style="width:5%">Remove</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @php $total = 0 @endphp
                                    @if($wish)
                                    @foreach($wish as $id => $details)
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

                                          <td data-th="Status">
                                          @if($details['quantity'] < 1)
                                          <span class="btn bg-secondary">OUT OF STOCK</span>
                                          @else
                                          <a  href="{{ route('add.to.cart', $details['id']) }}"class="btn btn-danger">BUY NOW</a>
                                          @endif
                                    </td> 

                                          <td data-th="Remove">
                                                <form action="{{ route('remove.from.wish') }}" method="POST" class="remove-wrapper">
                                                      @csrf
                                                      <input type="hidden" value="{{ $details['id'] }}" name="id">
                                                      <button type ="submit" class="btn btn-sm text-danger"><i
                                                                  class="fa fa-trash-o"></i></button>
                                                </form>
                                          </td>


                                    </tr>
                                    @endforeach
                                    @endif
                              </tbody>
                        </table>

                  </div>


            </div> <!-- /row -->
      </div> <!-- /container -->
</div> <!-- /CART SECTION -->

@endsection

@section('scripts')

@endsection