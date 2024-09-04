@extends('layouts.home')

@extends('layouts.sidebar')


@section('content')

   <!-- ALL CART SECTION -->
           <div class="adminx-content">
        <!-- <div class="adminx-aside">

        </div> -->

        <div class="adminx-main-content">
          <div class="container-fluid">
            <!-- container -->
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Order Details</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h4>Details</h4>
              <p class="text-danger">Sellers details of "Paid" orders  </p>
            </div>
               
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 d-flex table-responsive">
                    <table class="table table-striped " id="table">
                    <thead>
                        <tr>
                            
                            <th>Payment Date</th>
                            <th>Seller Details</th>
                            <th>Order Number</th>
                            <th>Product</th>
                            <th>Company Price</th>
                            <th>Seller Price</th>
                            <th>Payment Type</th>
                        </tr>
                    </thead>
                    <tbody>
       
                         @foreach($orders as  $details)
                         <tr >
                                  
                         <td>
                            {{ date('d/M/Y', strtotime($details->date))}}</td>
                      
                        
                        <td >{{ $details['coopname'] }}<br>
                            {{ $details['fname'] }}
                            <br>
                            {{ $details['lname'] }}
                            
                            <br>
                            {{ $details['email'] }}
                            <br>
                            {{ $details['phone'] }}
                            <br>
                            {{ $details['address'] }}
                            <br>
                            {{ $details['location'] }}
                        </td>
                        <td>  <a href="{{ route ('sales_invoice', $details->order_number) }}" title="Click to view">{{$details['order_number'] }}</a></td>
                        <td> {{ $details['prod_name'] }}</td>
                        <td> {{ number_format($details['price']) }}</td>
                        <td> {{ number_format($details['seller_price']) }}</td>
                         <td >
                             {{ $details['pay_type'] }}
                            
                         </td>

                        </form>

                         
                    </td>
                      </tr>

                    @endforeach
                
                    
                   
                </tbody>
            </table>
    	    
        </div><!--col 12-->
 {{$orders->links()}}
    </div><!--roww-->

</div>

</div> <!-- section -->

<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection