@extends('layouts.home')
@section('content')
<!-- Page header -->

<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Users
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Edit</span>

                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">

                        </div>
                  </div>
            </div>
      </div>
</div>


<!-- Page body -->
<div class="page-body">
      <!-- Alert start --->
      <div class="container-xl">
            <div class="row ">
                  <div class="col-12">
                        <p></p>
                        @if (session('status'))
                        <div class="alert  alert-success alert-dismissible" role="alert">
                              <div class="d-flex">
                                    <div>
                                          <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                          </svg>

                                    </div>
                                    <div>{{ session('status') }}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif

                        @if (session('users-status'))
                        <div class="alert  alert-danger alert-dismissible" role="alert">
                              <div class="d-flex">
                                    <div>
                                          <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                          </svg>

                                    </div>
                                    <div>{{ session('users-status') }}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @else
                        @endif
                  </div>
            </div>
      </div>
      <!-- Alert stop --->

      <div class="page-header d-print-none">
            <div class="container-xl">
                  <div class="row row-cards">
                        <div class="col-12">
                              <form action="{{ url('update-product/'.$product->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">

                                          <div class="card-header">
                                                <h3 class="card-title">Confirm from vendor
                                                before editing their
                                                product </h3>
                                          </div>

                                          <div class="card-body p-4">
                                                <!-- row -->

                                                <div class="row">
                                                      <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                  <h6>Product Name</h6>
                                                                  <input type="text" value="{{$product->prod_name}}"
                                                                        name="productname" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                  <h6> Quantity </h6>
                                                                  <input type="text" value="{{$product->quantity}}"
                                                                        name="quantity" class="form-control">
                                                            </div>

                                                      </div>

                                                      <div class="col-lg-6">
                                                            <div class="form-group">
                                                                  <h6> Old price (optional)</h6>
                                                                  <input type="text" value="{{$product->old_price}}"
                                                                        name="old_price" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                  <h6>Seller (new) Price</h6>
                                                                  <input type="text" value="{{$product->seller_price}}"
                                                                        name="price" class="form-control">
                                                            </div>
                                                      </div>
                                                     <p></p>
                                                      <div class="form-group">
                                                            <button type="submit" class="btn btn-outline-danger"><i
                                                                        class="fa fa-arrow-up"></i>
                                                                  Save Changes</button>
                                                      </div>
                                                </div>
                                                <!--roww-->


                                          </div>
                                    </div> <!-- card stop --->
                              </form>
                        </div>
                  </div>

            </div>
      </div>

      <script type="text/javascript">
      $(document).ready(function() {
            $('#myTable').DataTable();
      });
      </script>

      @endsection