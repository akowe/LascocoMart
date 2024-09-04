@extends('layouts.home')
@extends('layouts.sidebar')
@section('content')

<div class="adminx-content">

      <div class="adminx-main-content">
            <div class="container-fluid">
                  <!-- container -->
                  <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Edit product</li>
                        </ol>
                  </nav>
<div class="container bg-warning">
      <div class="row">
            <div class="col-12 text-center"><b>Confirm from vendor before editing their product</b></div>
      </div>
</div>
                  <div class="pb-3">
                        <h4> @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                              </div>
                              @endif
                        </h4>
                        <p class="text-danger"></p>
                  </div>
                  <!-- row -->
                  <form action="{{ url('update-product/'.$product->id) }}" method="POST">

                        <div class="row">
                              <div class="col-md-6 ">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                          <h6>Product Name</h6>
                                          <input type="text" value="{{$product->prod_name}}" name="productname"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                          <h6> Quantity </h6>
                                          <input type="text" value="{{$product->quantity}}" name="quantity"
                                                class="form-control">
                                    </div>

                              </div>

                              <div class="col-lg-6">
                                    <div class="form-group">
                                          <h6> Old price (optional)</h6>
                                          <input type="text" value="{{$product->old_price}}" name="old_price"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                          <h6>Seller (new) Price</h6>
                                          <input type="text" value="{{$product->seller_price}}" name="price"
                                                class="form-control">
                                    </div>
                              </div>
                              <div class="form-group">
                                          <button type="submit" class="btn btn-outline-danger"><i
                                                      class="fa fa-arrow-up"></i> Save Changes</button>
                                    </div>
                        </div>
                        <!--roww-->
                  </form>


            </div>
      </div> <!-- section -->
</div>

<script type="text/javascript">
$(document).ready(function() {
      $('#myTable').DataTable();
});
</script>

@endsection