@extends('layouts.fcmgheader')

@section('content')

        <!-- ALL CART SECTION -->
        <div  class="section">
            <!-- container -->
            <div class="container">

                <!-- row -->
                <div class="row">
                    <div class="col-md-10">
                      
                     <table id="cart" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width:50%">Product</th>
                            <th style="width:10%">Price</th>
                            <th style="width:8%">Quantity</th>
                            <th style="width:22%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @if(session('fcmgcart'))
                            @foreach(session('fcmgcart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr data-id="{{ $id }}">
                                    <td data-th="Product">
                                        <div class="row">
                            <div class="col-sm-3 hidden-xs">
                                <img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h5 class="nomargin">{{ $details['prod_name'] }}</h5>
                            </div>
                        </div>
                    </td>
                    
                    <td data-th="Price">₦{{number_format($details['price'])  }}</td>
                    
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    
                    <td data-th="Subtotal" class="text-center">₦{{number_format($details['price'] * $details['quantity'] )  }}</td>
                    
                     <td class="actions" data-th="">
                        
            
                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                    </td>

                  
                </tr>
            @endforeach
        @endif
    </tbody></table>

</div>

      <div class="col-md-2">
        <table id="cart" class="table">
            <tr>
            <td  class="text-right">
                <h4><strong>Total ₦{{number_format($total),  }}</strong>
                </h4>
            </td>
            </tr>

            <tr>
            <td class="text-right">
                <a href="{{ url('/fcmgproductsview') }}" class="btn btn-link">
                    <i class="fa fa-angle-left"></i> Continue Shopping</a>
                <a href="{{ url('/fcmgcheckout') }}" class="btn primary-btn">Checkout</a>
            </td>
            </tr>
        </table>

        </div>

                </div> <!-- /row -->
            </div> <!-- /container -->
        </div> <!-- /CART SECTION -->

@endsection

@section('scripts')
<script type="text/javascript">

 $(".update-cart").change(function (e) {

        e.preventDefault();

  

        var ele = $(this);

  

        $.ajax({

            url: '{{ route('update.cart') }}',

            method: "patch",

            data: {

                _token: '{{ csrf_token() }}', 

                id: ele.parents("tr").attr("data-id"), 

                quantity: ele.parents("tr").find(".quantity").val()

            },

            success: function (response) {

               window.location.reload();

            }

        });

    });

    

  $(".remove-from-cart").click(function (e) {

        e.preventDefault();

  

        var ele = $(this);

  

        if(confirm("Are you sure want to remove?")) {

            $.ajax({

                url: '{{ route('remove.from.cart') }}',

                method: "DELETE",

                data: {

                    _token: '{{ csrf_token() }}', 

                    id: ele.parents("tr").attr("data-id")

                },

                success: function (response) {

                    window.location.reload();

                }

            });

        }

    });
         

    
  
 
  
</script>
@endsection