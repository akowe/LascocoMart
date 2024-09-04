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
                        <span class=" d-none  d-md-block">Cooperative&nbsp;</span>ID: {{Auth::user()->code}}&nbsp;

                        <a href="" alt="Copy" title="Copy" class="text-danger"
                              onclick="copyToClipboard('{{Auth::user()->code}}')"><svg
                                    xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copy  "
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                          d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                    <path
                                          d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                              </svg></a>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">

                              <a href="{{ url('admin-products') }}" class="btn btn-danger d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                          <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>
                                    View Products
                              </a>
                              <a href="{{ url('admin-products') }}" class="btn btn-danger d-sm-none btn-icon">
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
                                    <h4><i>All field mark <i class="text-danger">*</i> are required</i></h4>
                                    <form class="card" enctype="multipart/form-data"
                                          action="{{ url('coopupload-image') }}" method="POST">
                                          @csrf
                                          <div class="card-body">
                                                <div class="row row-cards">
                                                      <div class="col-md-5">
                                                            <div class="mb-3">
                                                                  <label class="form-label">Product name <i
                                                                              class="text-danger">*</i></label>
                                                                  <input type="text" class="form-control"
                                                                        placeholder="Product name" value=""
                                                                        name="prod_name">
                                                                  @error('prod_name')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                                  <span class="small text-danger">(" / ") is not allowed
                                                                        in product naming
                                                                        rather use <span class="text-dark">" and "
                                                                        </span> or
                                                                        <span class="text-dark">" & "</span>
                                                                  </span>

                                                            </div>
                                                      </div>
                                                      <div class="col-sm-6 col-md-3">
                                                            <div class="mb-3">
                                                                  <label class="form-label">Quantity <i
                                                                              class="text-danger">*</i> </label>
                                                                  <input type="text" name="quantity"
                                                                        class="form-control" placeholder="Quantity"
                                                                        value="">
                                                                  @error('quantity')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                      </div>
                                                      <div class="col-sm-6 col-md-4">
                                                            <div class="mb-3">
                                                                  <label class="form-label">Old price</label>
                                                                  <input type="text" name="old_price"
                                                                        class="form-control" placeholder="Old price">

                                                            </div>
                                                      </div>
                                                      <div class="col-sm-6 col-md-6">
                                                            <div class="mb-3">
                                                                  <label class="form-label">New price <i
                                                                              class="text-danger">*</i> </label>
                                                                  <input type="text" name="price" class="form-control"
                                                                        placeholder="New price" value="">
                                                                  @error('price')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                      </div>
                                                      <div class="col-sm-6 col-md-6">
                                                            <div class="mb-3">
                                                                  <label>Category <i class="text-danger">*</i></label>
                                                                  <div class="mb-3">
                                                                        <div class="form-label"></div>
                                                                        <select class="form-select text-secondary"
                                                                              name="cat_id">
                                                                              <option class="text-secondary">None
                                                                              </option>
                                                                              @foreach($categories as $details)
                                                                              <option value="{{ $details['cat_id'] }}">
                                                                                    {{ $details['cat_name'] }}</option>
                                                                              @endforeach
                                                                        </select>
                                                                        @error('cat_id')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="col-sm-6 col-md-6">
                                                            <div class="mb-3">
                                                                  <label class="form-label">Brand (optional)</label>
                                                                  <input type="text" class="form-control"
                                                                        name="prod_brand" placeholder="Brand name"
                                                                        value="">
                                                            </div>
                                                      </div>
                                                      <div class="col-sm-6 col-md-6">
                                                            <div class="mb-3">
                                                                  <div class="form-label">Product image <i
                                                                              class="text-danger">*</i></div>
                                                                  <input type="file" name="image"
                                                                        accept=".jpg,.jpeg,.png" id="image"
                                                                        multiple="multiple" class="form-control">
                                                                  <span class="text-danger small"> Image format: <span
                                                                              class="text-dark">.jpg, .png,
                                                                              .jpeg.</span> Max size: <span
                                                                              class="text-dark">300kb.</span></span>
                                                                  <!-- <img id="image-preview" src=""
                                                                        style="max-height: 250px;"> -->
                                                                  @error('image')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror

                                                            </div>
                                                      </div>
                                                      <div class="col-sm-4 col-md-4">
                                                            <div class="mb-3">
                                                                  <div class="form-label">Image back side (optional)
                                                                  </div>
                                                                  <input type="file" name="img1"
                                                                        accept=".jpg,.jpeg,.png" id="image"
                                                                        multiple="multiple" class="form-control">
                                                                  <!-- <img id="img1-preview" src=""
                                                                        style="max-height: 250px;"> -->
                                                                  @error('img1')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror

                                                            </div>
                                                      </div>
                                                      <div class="col-sm-4 col-md-4">
                                                            <div class="mb-3">
                                                                  <div class="form-label">Image left side (optional)
                                                                  </div>
                                                                  <input type="file" name="img2"
                                                                        accept=".jpg,.jpeg,.png" id="image"
                                                                        multiple="multiple" class="form-control">
                                                                  <!-- <img id="img2-preview" src=""
                                                                        style="max-height: 250px;"> -->
                                                                  @error('img2')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                            <div class="mb-3">
                                                                  <div class="form-label">Image right (optional)</div>
                                                                  <input type="file" name="img3"
                                                                        accept=".jpg,.jpeg,.png" id="image"
                                                                        multiple="multiple" class="form-control">
                                                                  <!-- <img id="img3-preview" src=""
                                                                        style="max-height: 250px;"> -->
                                                                  @error('img3')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                            <div class="mb-3">
                                                                  <label class="form-label">Description</label>
                                                                  <textarea rows="5" class="form-control text-secondary"
                                                                        placeholder="Write about this product" value="">
                                                                  </textarea>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="card-footer text-end">
                                                <button type="submit" class="btn  btn-ghost-danger active" id="submit">Add
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


                        </div>
                        <!--row-->
                  </div>
                  <!--container-->
            </div>


            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

            <script type="text/javascript">
            $(document).ready(function(e) {


                  $('#image').change(function() {

                        let reader = new FileReader();

                        reader.onload = (e) => {

                              $('#image-preview').attr('src', e.target.result);
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