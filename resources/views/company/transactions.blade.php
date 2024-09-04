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
                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h4>All Payments</h4>
              <p class="text-danger">Should there be issue with payment; maybe due to bad network while the customer was using Paystack, copy the "payment reference " contact paystack with it. <br>Also check your paystack merchant dashboard on paystack.com</p>
             
            </div>
              
          
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12  table-responsive">
                    <table class="table table-striped  table" id="table">
                    <thead>
                        <tr>
                            
                            <th>Payment Date</th>
                             <th>Email</th>
                               <th>Cooperative</th>
                            <!--    <th>Order Number</th> -->
                               <th>Amount</th>
                               <th>Payment Status</th>
                               <th>Payment Reference</th>
                               <th>Payment Type</th>
                       
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
       
                         @foreach($transactions as  $details)
                         <tr >
                                  
                         <td >{{ date('m/d/Y', strtotime($details->date)) }}</td>
                         <td >{{ $details['email'] }}</td>
                         
                             <td >{{ $details['coopname'] }}</td>
                             <!--   <td >{{ $details['order_number'] }}</td> -->
                                 <td >{{ number_format($details['tran_amount']) }}</td>
                                 <td >{{ $details['pay_status'] }}</td>  
                                  <td >{{ $details['paystack_ref'] }}</td> 
                         <td >
                             @if($details['pay_status'] == 'success')
                             Paystack
                             @else
                             @endif
                         </td>

                     
                    
                        <td>
                       

                         
                    </td>
                      </tr>

                    @endforeach
                
                    
                   
                </tbody>
            </table>
    	    
        </div><!--col 12-->
 {{ $transactions->links() }}
    </div><!--roww-->

</div>
</div> <!-- section -->

<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection