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
                <li class="breadcrumb-item active" aria-current="page">Newsletter Subscribers</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h4>Subscribers</h4>
            </div>
               
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 d-flex table-responsive">
                    <table class="table table-striped " id="myTable">
                    <thead>
                        <tr>
                            
                            <th>Date</th>
                            <th>Email</th>
                            
                        </tr>
                    </thead>
                    <tbody>
       
                         @foreach($news as  $details)
                         <tr>
                                  
                         <td>{{ date('d/M/Y', strtotime($details->created_at))}}</td>
                         <td >{{ $details['email'] }}</td>
                      </tr>

                    @endforeach
                
                    
                   
                </tbody>
            </table>
    	    
        </div><!--col 12-->
 {{$news->links()}}
    </div><!--roww-->

</div>

</div> <!-- section -->

<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection