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
                <li class="breadcrumb-item active" aria-current="page">Return & Refund Page</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h4></h4>
              <p class="text-danger"></p>
            </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 d-flex table-responsive">
                    
    	    
            <table class="table">
                <thead>
                    <tr>
                    <th></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($about as $details)
                    <tr>
                        <td>{!! nl2br($details->return_policy) !!}</td>
                        <td><a href="refund_edit/{{$details->id}}"><i class="fa fa-edit"></i>Edit</a></td>
                    </tr>
                     
            @endforeach
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