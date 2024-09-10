@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Overview
                        </div>
                        <h2 class="page-title">
                              Vendor Details
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block ">
                                    <a href="#" class="btn d-none ">
                                    </a>
                              </span>
                              <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal-report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                                    Export
                              </a>
                              <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-report" aria-label="Create new report">
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

<!-- Page body -->
<div class="page-body">
      <div class="card-body">

            @if (session('pay'))
            <div class="alert alert-success" role="alert">
                  {{ session('pay') }}
            </div>
            @endif
      </div>

      <!-- Alert start --->
      <div class="container-xl">
            <div class="row ">
                  <div class="col-12">
                        <p></p>
                        @if(session('status'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                              <div class="d-flex">
                                    <div>
                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                <path d="M12 8v4" />
                                                <path d="M12 16h.01" />
                                          </svg>

                                    </div>
                                    <div> {{ session('status') }}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif
                  </div>
            </div>
      </div>
      <!-- Alert end --->
      <div class="container-xl">
            <div class="row row-deck row-cards">
                  <div class="col-12">
                        <div class="card">
                          <p>Sellers details of "Paid" orders </p>
                              <div class="card-body border-bottom py-3">
                                    <div class="d-flex">
                                          <div class="text-secondary">
                                                Show
                                                <div class="mx-2 d-inline-block">
                                                      <select id="pagination" class="form-control form-control-sm"
                                                            name="perPage">
                                                            <option value="5" @if($perPage==5) selected @endif>5
                                                            </option>
                                                            <option value="10" @if($perPage==10) selected @endif>10
                                                            </option>
                                                            <option value="25" @if($perPage==25) selected @endif>25
                                                            </option>
                                                            <option value="50" @if($perPage==50) selected @endif>50
                                                            </option>
                                                      </select>
                                                </div>
                                                records
                                          </div>
                                          <div class="ms-auto text-secondary">
                                                Search:
                                                <div class="ms-2 d-inline-block">

                                                      <form action="/order-history" method="GET" role="search">
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

                              <div class="table-responsive" id="card">
                                    <table class="table card-table table-vcenter text-nowrap datatable" id="orders">
                                          <thead>
                                                <tr>
                                                      <th class="w-1"><input class="form-check-input m-0 align-middle"
                                                                  type="checkbox" aria-label="Select all invoices"></th>
                                                      <th class="w-1">Date
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                  class="icon icon-sm icon-thick" width="24" height="24"
                                                                  viewBox="0 0 24 24" stroke-width="2"
                                                                  stroke="currentColor" fill="none"
                                                                  stroke-linecap="round" stroke-linejoin="round">
                                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                  <path d="M6 15l6 -6l6 6" />
                                                            </svg>
                                                      </th>

                                                      <th>Payment Date</th>
                                                      <th>Seller Details</th>
                                                      <th>Order Number</th>
                                                      <th>Product</th>
                                                      <th>Company Price</th>
                                                      <th>Seller Price</th>
                                                      <th>Payment Type</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($orders as $order)
                                                <tr>
                                                      <td><input class="form-check-input m-0 align-middle"
                                                                  type="checkbox" aria-label="Select"></td>
                                                      <td><span
                                                                  class="text-secondary">{{ date('d/M/Y', strtotime($details->date))}}</span>
                                                      </td>

                                                    
                                                <td>{{ $details['coopname'] }}<br>
                                                      {{ $details['fname'] }}
                                                      <br>
                                                      {{ $details['lname'] }}

                                                      <br>
                                                      {{ $details['email'] }}
                                                      <br>
                                                      {{ $details['phone'] }}
                                                      <br>
                                                      {{ $details['address'] }}
                                                      <br>
                                                      {{ $details['location'] }}
                                                </td>

                                                <td> <a href="{{ route ('sales_invoice', $details->order_number) }}"
                                                            title="Click to view">{{$details['order_number'] }}</a></td>
                                                <td> {{ $details['prod_name'] }}</td>
                                                <td> {{ number_format($details['price']) }}</td>
                                                <td> {{ number_format($details['seller_price']) }}</td>
                                                <td>{{ $details['pay_type'] }} </td>

                                                      <td>{{ number_format($order->grandtotal) }}</td>
                                                      <td> {{$order['order_number'] }}</td>
                                                      <td>
                                                            @if($order->status =='paid')
                                                            <span class="badge bg-green-lt">{{$order->status}}</span>

                                                            @elseif($order->status =='pending')
                                                            <span class="badge bg-yellow-lt">{{$order->status}}</span>

                                                            @elseif($order->status =='cancel')
                                                            <span class="badge bg-red-lt">{{$order->status}}</span>
                                                            @else

                                                            @endif
                                                      </td>


                                                </tr>
                                                @endforeach

                                          </tbody>

                                    </table>
                              </div>
                              <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-secondary">

                                          Showing {{ ($orders->currentPage() - 1) * $orders->perPage() + 1; }} to
                                          {{ min($orders->currentPage()* $orders->perPage(), $orders->total()) }} of
                                          {{$orders->total()}} entries
                                    </p>

                                    <ul class="pagination m-0 ms-auto">
                                          @if(isset($orders))
                                          @if($orders->currentPage() > 1)
                                          <li class="page-item ">
                                                <a class="page-link text-danger" href="{{ $orders->previousPageUrl() }}"
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


                                          <li class="page-item"> {{ $orders->appends(compact('perPage'))->links()  }}
                                          </li>
                                          @if($orders->hasMorePages())
                                          <li class="page-item">
                                                <a class="page-link text-danger" href="{{ $orders->nextPageUrl() }}">
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
                        <!--- card-->

                  </div>
                  <!---- col-12 --->
            </div>
      </div>
</div>
<!-- Page body -->

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
                              <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                        </ol>
                  </nav>

                  <div class="pb-3">
                        <h4>Details</h4>
                        <p class="text-danger"></p>
                  </div>

                  <!-- row -->
                  <div class="row">
                        <div class="col-lg-12 d-flex table-responsive">
                              <table class="table table-striped " id="table">
                                    <thead>
                                          <tr>

                                                <th>Payment Date</th>
                                                <th>Seller Details</th>
                                                <th>Order Number</th>
                                                <th>Product</th>
                                                <th>Company Price</th>
                                                <th>Seller Price</th>
                                                <th>Payment Type</th>
                                          </tr>
                                    </thead>
                                    <tbody>

                                          @foreach($orders as $details)
                                          <tr>

                                                <td>
                                                      {{ date('d/M/Y', strtotime($details->date))}}</td>


                                                <td>{{ $details['coopname'] }}<br>
                                                      {{ $details['fname'] }}
                                                      <br>
                                                      {{ $details['lname'] }}

                                                      <br>
                                                      {{ $details['email'] }}
                                                      <br>
                                                      {{ $details['phone'] }}
                                                      <br>
                                                      {{ $details['address'] }}
                                                      <br>
                                                      {{ $details['location'] }}
                                                </td>
                                                <td> <a href="{{ route ('sales_invoice', $details->order_number) }}"
                                                            title="Click to view">{{$details['order_number'] }}</a></td>
                                                <td> {{ $details['prod_name'] }}</td>
                                                <td> {{ number_format($details['price']) }}</td>
                                                <td> {{ number_format($details['seller_price']) }}</td>
                                                <td>
                                                      {{ $details['pay_type'] }}

                                                </td>

                                                </form>


                                                </td>
                                          </tr>

                                          @endforeach



                                    </tbody>
                              </table>

                        </div>
                        <!--col 12-->
                        {{$orders->links()}}
                  </div>
                  <!--roww-->

            </div>

      </div> <!-- section -->

      <script type="text/javascript">
      $(document).ready(function() {
            $('#myTable').DataTable();
      });
      </script>

      @endsection