@extends('layouts.home')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              T&C
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block"> Terms and Condition</span>

                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">

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
                              @if(session('approve'))
                              <div class="alert  alert-success alert-dismissible" role="alert">
                                    <div class="d-flex">
                                          <div>
                                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                      width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                      <path d="M12 9v4" />
                                                      <path d="M12 17h.01" />
                                                </svg>
                                          </div>
                                          <div> {!! session('approve') !!}</div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                              </div>
                              @endif

                              @if(session('remove'))
                              <div class="alert  alert-success alert-dismissible" role="alert">
                                    <div class="d-flex">
                                          <div>
                                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                      width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                      <path d="M12 9v4" />
                                                      <path d="M12 17h.01" />
                                                </svg>
                                          </div>
                                          <div> {!! session('remove') !!}</div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                              </div>
                              @endif

                              @if(session('success'))
                              <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                    <div class="d-flex">
                                          <div>
                                                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                      width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                      <path d="M12 9v4" />
                                                      <path d="M12 17h.01" />
                                                </svg>
                                          </div>
                                          <div> {!! session('success') !!}</div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                              </div>
                              @endif
                        </div>
                  </div>
            </div>

            <div class="container-xl">
                  <div class="row row-deck row-cards">
                        <div class="col-12">
                              <form action="{{ url('tandc_update/'.$about->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">
                                          <div class="card-header">
                                                <h3 class="card-title"> </h3>
                                          </div>
                                          <div class="card-body">
                                                <div class="row">
                                                      <div class="col-md-12">

                                                            <div class="form-group">
                                                                  <h6>T & C </h6>
                                                                  <textarea type="text" name="terms_c" rows="135"
                                                                        cols="130"
                                                                        style="text-align:justify !important; display: flex; padding: 10px;">
                            {{$about->terms_c}}
                            </textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                  <button type="submit"
                                                                        class="btn btn-outline-danger">Update</button>
                                                            </div>
                                                      </div>
                                                      <!--col 12-->
                                                </div>
                                          </div>

                                    </div> <!-- CARD SECTION -->
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