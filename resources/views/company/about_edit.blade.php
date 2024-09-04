@extends('layouts.home')
@section('content')


<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                        Edit About
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">About Page</span>

                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">

                        </div>
                  </div>
            </div>
      </div>


   <!-- ALL CART SECTION -->
           <div class="adminx-content">
        <!-- <div class="adminx-aside">

        </div> -->

        <div class="adminx-main-content">
          <div class="container-fluid">
            <!-- container -->
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Page</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h4>  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif</h4>
              <p class="text-danger"></p>
            </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 d-flex table-responsive">
                    
    	       <form action="{{ url('about_update/'.$about->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-group">
                     <h6>About</h6>
                        <textarea type="text" name="about" rows="5" cols="120" style="text-align:justify !important; display: flex; padding:10px;">
                            {{$about->about}}
                            </textarea>
                    </div>
                    <div class="form-group">
                        <h6>Our Story</h6>
                        <textarea type="text" name="our_story"  rows="15" cols="120" style="text-align:justify !important; display: flex; padding:10px;">
                            {{$about->our_story}}
                            </textarea>
                     </div>
                          
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-danger">Update</button>
                    </div>
                </form>
           
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