@extends('layouts.app')

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
                <li class="breadcrumb-item active" aria-current="page">FMCG</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h1>All registered members</h1>
              <!--<p class="text-danger"> To add credit to a member voucher, enter the amount and click "Add Credit"<br> To subtract from a member credit enter "-"" amount example: enter -100</p>-->
            </div>

                 <!-- alert if member is not verified-->
                  @if(Session::has('verified')== true)
                                        <!--New registration alert-->
                                        <p class="alert {{ Session::get('alert-class', 'alert-info') }} text-center">{{ Session::get('verified') }}</p>
                                        @endif

                @if(Session::has('verified')== false)
                                        <!--show alert-->
                    <p style="display: none;">{{ Session::get('verified') }}</p>
                 @endif

          
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 d-flex table-responsive">
                    <table class="table table-striped " id="myTable">
                    <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last name</th>
                             <th>Email</th>
                              <th>Phone</th>
                             <!--  <th>Coop ID</th> -->
                        </tr>
                    </thead>
                    <tbody>
       
                         @foreach($credit as  $details)
                         <tr >
                        <td >{{ $details['fname'] }}</td>
                        <td >{{ $details['lname'] }}</td>
                         <td >{{ $details['email'] }}</td>
                          <td >{{ $details['phone'] }}</td>
                        <!--  <td >{{ $details['code'] }}</td> -->
                      </tr>

                    @endforeach
                
                     {{ $credit->links() }}
                   
                </tbody>
            </table>
    	    
        </div><!--col 12-->

    </div><!--roww-->
</div>
</div> <!-- section -->

<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection