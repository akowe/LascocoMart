@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Edit Product
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block ">Edit
                              </span>
                              <span class=" d-sm-block d-md-none ">
                              </span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block">

                              </span>
                              <a href="{{ url('vendor-products') }}" class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                                    Back to product list

                              </a>
                              <a href="{{ url('vendor-products') }}" class="btn btn-danger d-sm-none btn-icon"
                                    data-bs-toggle="modal" data-bs-target="#modal-fund" aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                              </a>
                        </div>
                  </div>
            </div>
      </div>
</div>

<div class="page-body">
      <div class="container-xl">
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
                  <div class="card">
                        <div class="card-body">
                              <div class="row">
                                    <div class="col-md-6 ">
                                          @csrf
                                          @method('PUT')

                                          <div class="form-group">
                                                <p></p>
                                                <h6>Product Name</h6>
                                                <input type="text" value="{{$product->prod_name}}" name="productname"
                                                      class="form-control" readonly>
                                          </div>


                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <p></p>
                                                <h6> Quantity </h6>
                                                <input type="text" value="{{$product->quantity}}" name="quantity"
                                                      class="form-control">
                                          </div>
                                    </div>


                                    <div class="col-md-4">
                                          <div class="form-group">
                                                <p></p>
                                                <h6> Old price (optional)</h6>
                                                <input type="text" value="{{$product->old_price}}" name="old_price"
                                                      class="form-control">
                                          </div>
                                    </div>

                                    <div class="col-md-4">
                                          <div class="form-group">
                                                <p></p>
                                                <h6>New Price</h6>
                                                <input type="text" value="{{$product->seller_price}}" name="price"
                                                      class="form-control">
                                          </div>
                                    </div>

                                    <div class="col-md-4">
                                          <div class="form-group">
                                                <p></p>
                                                <h6>Brand</h6>
                                                <input type="text" value="{{$product->prod_brand}}" name="brand"
                                                      class="form-control">
                                          </div>
                                    </div>

                                    <div class="col-md-12">
                                          <div class="form-group">
                                                <p></p>
                                                <h6>Description</h6>
                                                <input type="text" value="{{$product->description}}" name="description"
                                                      class="form-control">
                                          </div>
                                    </div>

                                    <p><br></p>
                                          <div class="form-group row {{ $errors->has('captcha') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label"></label>
                                                <div class="col-md-12">

                                                <label for="captcha" class="col-md-12 col-form-label text-md-right  required">I'm
                                                      not a robot</label>
                                                      <div class="captcha">
                                                            <span> {!! captcha_img('flat') !!}</span>
                                                            <button type="button" class="btn btn-danger" class="reload"
                                                                  id="reload">
                                                                  &#x21bb;<small> Reset</small>
                                                            </button>
                                                      </div>

                                                </div>
                                          </div>
                                          <p></p>
                                          <div class="form-group row">
                                                <div class="col-md-6">
                                                      <input id="captcha" type="text" class="form-control"
                                                            placeholder="Enter the above code here" name="captcha">
                                                </div>

                                          </div>
                                    </div>
                                    <!--row-->

                              </div>
                              <div class="row row-cards">
                                    <div class="col-12">
                                         
                                    </div>
                                    <!--row-->

                              </div>
                                    <div class="form-group">
                                          <p></p>
                                          
                                          <button type="submit" class="btn btn-ghost-danger active"><svg
                                                      xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-device-floppy" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                      <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                      <path d="M14 4l0 4l-6 0l0 -4" />
                                                </svg> Save </button>
                                    </div>
                              </div>
                              <!--roww-->
                        </div>
                  </div>
            </form>

      </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
      $('#reload').click(function() {
            $.ajax({
                  type: 'GET',
                  url: 'reload-captcha',
                  success: function(data) {
                        $(".captcha span").html(data.captcha);
                  }
            });
      });
      </script>
<script type="text/javascript">
$(document).ready(function() {
      $('#myTable').DataTable();
});
</script>

@endsection