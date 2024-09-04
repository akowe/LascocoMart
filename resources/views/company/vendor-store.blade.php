@extends('layouts.home')
@section('content')
<!-- Page header -->

<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              vendor
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Store</span>

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
      <div class="container-xl">
            <div class="row row-deck row-cards">
                  <div class="col-12">
                        <div class="row row-cards">
                              <div class="col-sm-6 col-lg-6">
                                    <div class="card ">
                                          <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                      <div class="subheader">Total Items Sold</div>
                                                      <div class="ms-auto lh-1">
                                                            <div class="dropdown">
                                                                  <a class="dropdown-toggle text-secondary" href="#"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">Last 7 days</a>
                                                                  <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item active"
                                                                              href="">Last 7
                                                                              days</a>
                                                                        <a class="dropdown-item"
                                                                              href="">Last 30
                                                                              days</a>
                                                                        <a class="dropdown-item"
                                                                              href="">Last 3
                                                                              months</a>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                <div class="h1 mb-3">{{ $soldProduct->count() }}</div>
                                                <div class="d-flex mb-2">
                                                      <div>number of product (s)</div>
                                                      <div class="ms-auto">
                                                            @if($countProduct->count() > 0)
                                                            <span
                                                                  class="text-green d-inline-flex align-items-center lh-1">
                                                                  {{$countProduct->count()}}
                                                                  <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                                  <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon ms-1" width="24" height="24"
                                                                        viewBox="0 0 24 24" stroke-width="2"
                                                                        stroke="currentColor" fill="none"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none" />
                                                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                                                        <path d="M14 7l7 0l0 7" />
                                                                  </svg>
                                                            </span>
                                                            @else
                                                            <span
                                                                  class="text-danger d-inline-flex align-items-center lh-1">
                                                                  {{$countProduct->count()}}
                                                                  <!-- Download SVG icon from http://tabler-icons.io/i/trending-down -->
                                                                  <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-trending-down"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none" />
                                                                        <path d="M3 7l6 6l4 -4l8 8" />
                                                                        <path d="M21 10l0 7l-7 0" />
                                                                  </svg>
                                                            </span>
                                                            @endif
                                                      </div>
                                                </div>
                                                <div class="progress progress-sm">
                                                      <div class="progress-bar bg-primary"
                                                            style="width: {{$countProduct->count()}}%"
                                                            role="progressbar"
                                                            aria-valuenow="{{$countProduct->count()}}"
                                                            aria-valuemin="0" aria-valuemax="100"
                                                            aria-label="{{$countProduct->count()}}% Complete">
                                                            <span class="visually-hidden">{{$countProduct->count()}}%
                                                                  Complete</span>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>




                        </div>
                        <!---- row-cards --->
                  </div>
                  <!---col-12 --->
                  <!-- Alert start --->
                  <div class="container-xl">
                        <div class="row ">
                              <div class="col-12">
                                    <p></p>
                                    @if (session('success'))
                                    <div class="alert alert-important alert-success alert-dismissible" role="alert">
                                          <div class="d-flex">
                                                <div>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>

                                                </div>
                                                <div>{{ session('success') }}</div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @endif

                                    @if (session('users-status'))
                                    <div class="alert  alert-danger alert-dismissible" role="alert">
                                          <div class="d-flex">
                                                <div>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
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
                  <!-- Page header -->
                  <div class="page-header d-print-none">
                        <div class="container-xl">
                              <div class="row g-2 align-items-center">
                                    <div class="col">
                                          <h2 class="page-title">
                                              {{$storeName}}  Products (s)
                                          </h2>
                                    </div>
                                    <p></p>
                                    <div class="d-flex">
                                          <div class="text-secondary">
                                                Show
                                                <div class="mx-2 d-inline-block">
                                                      <select id="pagination" class="form-control form-control-sm"
                                                            name="perPage">
                                                            <option value="5" @if($perPage==5) selected @endif>5
                                                            </option>
                                                            <option value="12" @if($perPage==12) selected @endif>
                                                                  12
                                                            </option>
                                                            <option value="25" @if($perPage==25) selected @endif>
                                                                  25
                                                            </option>
                                                            <option value="50" @if($perPage==50) selected @endif>
                                                                  50
                                                            </option>
                                                      </select>
                                                </div>
                                                records
                                          </div>
                                          <div class="ms-auto text-secondary">
                                                Search:
                                                <div class="ms-2 d-inline-block">

                                                      <form action="/all-cooperatives" method="GET" role="search">
                                                            {{ csrf_field() }}
                                                            <div class="input-group mb-2">
                                                                  <input type="text" class="form-control"
                                                                        placeholder="Search for…" name="search">
                                                                  <button type="submit" class="btn"
                                                                        type="button">Go!</button>
                                                            </div>

                                                      </form>
                                                </div>
                                          </div>

                                    </div>


                              </div>
                              <div class="row row-cards">
                                    <p></p>

                                    @foreach($products as $details)
                                    @php
                                    $words = explode(" ", $details->prod_name, 2 );
                                    $initials = null;
                                    foreach ($words as $w) {
                                    $initials .= $w[0];
                                    }
                                    @endphp
                                    <div class="col-md-6 col-lg-6  col-sm-6">
                                          <div class="card">
                                                <div class="card-body p-4 text-center">
                                                      <div class="d-flex align-items-center">
                                                            <div class="ms-auto lh-1">
                                                                  <div class="dropdown">
                                                                        <a class="text-danger" href="#"
                                                                              data-bs-toggle="dropdown"
                                                                              aria-haspopup="true"
                                                                              aria-expanded="false">
                                                                            Action <i class="fa fa-caret-down"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                              @csrf
                                                                             <div>
                                                                             <form action="/remove_product"
                                                                                    method="post" name="submit">
                                                                                    @csrf

                                                                                    <input type="hidden" name="id"
                                                                                          value="{{$details->id }}">

                                                                                    <button type="submit" name="submit"
                                                                                          class="btn text-danger btn-sm"><i
                                                                                                class="fa fa-trash-o"></i> &nbsp; Delete
                                                                                          </button>


                                                                              </form>
                                                                             </div>
                                                                              <br>
                                                                             <div>
                                                                             @if($details->prod_status == 'approve')
                                                                             <span class="text-success"> <i class="fa fa-check"></i></span>

                                                                              @else
                                                                              <form method="POST" action="/approved"
                                                                                    accept-charset="UTF-8"
                                                                                    class="form-horizontal" role="form"
                                                                                    style="display:block;">

                                                                                    @csrf
                                                                                    <input type="hidden" name="id"
                                                                                          value="{{$details->id }}">
                                                                                    <button type="submit" name="submit"
                                                                                          class="btn btn-success btn-sm">
                                                                                          Approve</button>

                                                                              </form>
                                                                              @endif
                                                                             </div>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      @if($details->image)
                                                      <span class="avatar avatar-xl mb-3 rounded"
                                                            style="background-image: url({{$details->image}} )"></span>
                                                      @else
                                                      <span class="avatar avatar-xl mb-3 rounded">{{$initials}}</span>
                                                      @endif
                                                      <h3 class="m-0 mb-1 text-capitalize"><a
                                                                  href="#">{{ $details->prod_name }}</a></h3>
                                                      <p></p>
                     
                                                      <div class="text-secondary">Quantity: {{ $details->quantity }}</div>
                                                   
                                                      <div class="text-info text-uppercase"> {{ $details->prod_status }}</div>

                                                </div>

                                                <div class="d-flex">
                                                      <a href="" class="card-btn">
                                                            Vendor price: &nbsp; ( <small class="text-info"> {{number_format( $details->seller_price) }}</small> )
                                                      </a>
                                                      <a href="" class="card-btn">
                                                           
                                                            LascocoMart price: &nbsp; ( <span class="text-info"> {{ number_format($details->price) }}</span> )
                                                      </a>

                                                      

                                                </div>
                                          </div>
                                          <!---card--->
                                    </div>
                                    <!--col-6--->
                                    @endforeach
                              </div>
                              <p></p>
                              <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-secondary">

                                          Showing {{ ($products->currentPage() - 1) * $products->perPage() + 1; }} to
                                          {{ min($products->currentPage()* $products->perPage(), $products->total()) }}
                                          of
                                          {{$products->total()}} entries
                                    </p>

                                    <ul class="pagination m-0 ms-auto">
                                          @if(isset($products))
                                          @if($products->currentPage() > 1)
                                          <li class="page-item ">
                                                <a class="page-link text-danger" href="{{ $products->previousPageUrl() }}"
                                                      tabindex="-1" aria-disabled="true">
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M15 6l-6 6l6 6" />
                                                      </svg>
                                                      prev
                                                </a>
                                          </li>
                                          @endif
                                          <li class="page-item"> {{ $products->appends(compact('perPage'))->links()  }}
                                          </li>
                                          @if($products->hasMorePages())
                                          <li class="page-item">
                                                <a class="page-link text-danger" href="{{ $products->nextPageUrl() }}">
                                                      next
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M9 6l6 6l-6 6" />
                                                      </svg>
                                                </a>
                                          </li>
                                          @endif
                                          @endif
                                    </ul>
                              </div>
                        </div>
                  </div>

            </div>
      </div>
</div>
<!---page body --->

@endsection