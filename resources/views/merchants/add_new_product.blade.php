@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Add New Product
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Product</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <a href="{{ url('vendor-products') }}" class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                          <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                    Vew Products
                              </a>
                              <a href="{{ url('vendor-products') }}" class="btn btn-danger d-sm-none btn-icon"
                                    aria-label="product">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                          <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                              </a>
                        </div>
                  </div>
            </div>
      </div>
</div>


<div class="page-body">
      <div class="container-xl">
            <div class="row row-deck row-cards">
                  <div class="col-lg-12">
                        <div class="row row-cards">
                              <div class="col-12">
                                    <div class="alert alert-important alert-info alert-dismissible" role="alert">
                                          <div class="d-flex">
                                                <div>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/info-circle -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                            <path d="M12 9h.01" />
                                                            <path d="M11 12h1v4h1" />
                                                      </svg>
                                                </div>
                                                <div>
                                                      We assume your prices are wholesale. Note that LascocoMart
                                                      percentage would be added to each
                                                      product on our landing page.
                                                </div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    <!-- alert start--->
                                
                                    @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                          <div class="d-flex">
                                                <div>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                            <path d="M12 8v4" />
                                                            <path d="M12 16h.01" />
                                                      </svg>
                                                </div>
                                                <div>
                                                      <h4 class="alert-title">Oops!</h4>
                                                      <div class="text-secondary">
                                                            <ul>
                                                                  @foreach ($errors->all() as $error)
                                                                  <li>{{ $error }}</li>
                                                                  @endforeach
                                                            </ul>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    @endif
                                    <!-- alert stops--->
                              </div>
                        </div>
                  </div>
            </div>

            <!-- row -->

            <div class="row row-cards">
                  <div class="col-12">
                        <h6>All field mark <i class="text-danger">*</i> are required</h6>

                        <form class="card" enctype="multipart/form-data" action="{{ url('add-product') }}"
                              method="POST">
                              @csrf
                              <div class="card-body">
                                    <div class="row">
                                          <div class="col-md-6 ">

                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label required">Product name </div>
                                                      <input type="text" name="prod_name" class="form-control">
                                                      @error('prod_name')
                                                      <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}</div>
                                                      @enderror
                                                      <span class="small text-danger">(" / ") is not allowed
                                                                        in product naming
                                                                        rather use <span class="text-dark">" and "
                                                                        </span> or
                                                                        <span class="text-dark">" & "</span>
                                                                  </span>
                                                </div>
                                          </div>
                                          <div class="col-md-6 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label required">Quantity </div>
                                                      <input type="number" name="quantity" value=""
                                                            class="form-control">
                                                      @error('quantity')
                                                      <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}</div>
                                                      @enderror
                                                </div>
                                          </div>

                                          <div class="col-md-6 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label">Old price</div>
                                                      <input type="number" name="old_price" value=""
                                                            class="form-control">
                                                </div>
                                          </div>

                                          <div class="col-md-6 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label required">New price </div>
                                                      <input type="number" name="price" value="" class="form-control">
                                                      @error('price')
                                                      <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}</div>
                                                      @enderror
                                                </div>
                                          </div>

                                          <div class="col-md-6 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label required">Product category </div>
                                                      <select name="cat_id" class="form-control">
                                                            <option>Select a category</option>
                                                            @foreach($categories as $details)
                                                            <option value="{{ $details['cat_id'] }}">
                                                                  {{ $details['cat_name'] }}</option>
                                                            @endforeach
                                                      </select>
                                                      @error('cat_id')
                                                      <div class="alert alert-danger mt-1 mb-1">
                                                            {{ $message }}</div>
                                                      @enderror
                                                </div>
                                          </div>

                                          <div class="col-md-6 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label">Brand name</div>
                                                      <input type="text" name="prod_brand" class="form-control">
                                                </div>
                                          </div>

                                          <div class="col-md-12 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label">Product description</div>
                                                      <textarea type="text" name="description"
                                                            placeholder="describe your product here"
                                                            class="form-control"></textarea>
                                                </div>

                                          </div>
                                          <!--col-12 description-->

                                          <div class="col-md-6 ">
                                                <p></p>
                                                <div class="form-group">
                                                <div class="form-label required">Front image</div>
                                                            <input type="file" name="image" accept=".jpg,.jpeg,.png"
                                                                  id="image" multiple="multiple" class="form-control">
                                                            <!--  <input #imageInput accept="image/*" (change)="processFile(imageInput)" name="image" type="file" id="image"  class="form-control" /> -->
                                                            @error('image')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                  {{ $message }}</div>
                                                            @enderror
                                                </div>
                                          </div>

                                          <div class="col-md-6 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label">Back image (Optional)</div>

                                                            <input type="file" name="img1" accept=".jpg,.jpeg,.png"
                                                                  id="img1" multiple="multiple" class="form-control">
                                                            @error('img1')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                  {{ $message }}
                                                            </div>
                                                            @enderror
                                                </div>
                                          </div>

                                          <div class="col-md-4 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label">Left side image (Optional)</div>
                                                            <input type="file" name="img2" accept=".jpg,.jpeg,.png"
                                                                  id="img2" multiple="multiple" class="form-control">
                                                            @error('img2')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                  {{ $message }}</div>
                                                            @enderror
                                                </div>
                                          </div>

                                          <div class="col-md-4 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label">Right side image (Optional)</div>
                                                            <input type="file" name="img3" accept=".jpg,.jpeg,.png"
                                                                  id="img3" multiple="multiple" class="form-control">
                                                            @error('img3')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                  {{ $message }}</div>
                                                            @enderror
                                                </div>
                                          </div>

                                          <div class="col-md-4 ">
                                                <div class="form-group">
                                                      <p></p>
                                                      <div class="form-label">Image (Optional)</div>
                                                            <input type="file" name="img4" accept=".jpg,.jpeg,.png"
                                                                  id="img4" multiple="multiple" class="form-control">
                                                            @error('img4')
                                                            <div class="alert alert-danger mt-1 mb-1">
                                                                  {{ $message }}</div>
                                                            @enderror
                                                </div>

                                          </div><!--col-4-->

                                    </div><!--row-->
                              </div>
                              <div class="card-footer text-end">
                                                <button type="submit" class="btn  btn-ghost-danger active " id="submit">Add
                                                      Product &nbsp;
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-upload" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                            <path d="M7 9l5 -5l5 5" />
                                                            <path d="M12 4l0 12" />
                                                      </svg>

                                                </button>
                                          </div>
                        </form>
                  </div>
                  <!--col-12-->
            </div>


      </div>
      <!--container-->
</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(e) {


      $('#image').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                  $('#image-preview').attr('src', e.target
                        .result);
            }

            reader.readAsDataURL(this.files[0]);

      });


      $('#img1').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                  $('#img1-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

      });

      $('#img2').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                  $('#img2-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

      });

      $('#img3').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                  $('#img3-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

      });

      $('#img4').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                  $('#img4-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

      });

});
</script>


@endsection