@extends('layouts.home')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Transaction
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Sales</span>

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

            <div class="container">
                  <div class="row row-deck row-cards">
                        <div class="col-12">
                              <div class="row row-cards">
                                    <div class="col-sm-6 col-lg-3">
                                          <div class="card card-sm">
                                                <div class="card-body">
                                                      <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                  <span class="bg-green text-white avatar">
                                                                        <a href="{{url('sales-details') }}"
                                                                              class="text-white">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-currency-naira"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke-width="1.5"
                                                                                    stroke="currentColor" fill="none"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path stroke="none"
                                                                                          d="M0 0h24v24H0z"
                                                                                          fill="none" />
                                                                                    <path
                                                                                          d="M7 18v-10.948a1.05 1.05 0 0 1 1.968 -.51l6.064 10.916a1.05 1.05 0 0 0 1.968 -.51v-10.948" />
                                                                                    <path d="M5 10h14" />
                                                                                    <path d="M5 14h14" />
                                                                              </svg>

                                                                        </a>
                                                                  </span>
                                                            </div>
                                                            <div class="col">
                                                                  <div class="font-weight-medium">
                                                                        {{ number_format($total->sum('total')) }} Sale
                                                                        (s)
                                                                  </div>
                                                                  <div class="text-secondary">
                                                                        ecluding delivery
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                          <div class="card card-sm">
                                                <div class="card-body">
                                                      <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                  <span class="bg-teal text-white avatar">
                                                                        <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                                        <a href="{{ url('order-history') }}"
                                                                              class="text-white">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-currency-naira"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke-width="1.5"
                                                                                    stroke="currentColor" fill="none"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path stroke="none"
                                                                                          d="M0 0h24v24H0z"
                                                                                          fill="none" />
                                                                                    <path
                                                                                          d="M7 18v-10.948a1.05 1.05 0 0 1 1.968 -.51l6.064 10.916a1.05 1.05 0 0 0 1.968 -.51v-10.948" />
                                                                                    <path d="M5 10h14" />
                                                                                    <path d="M5 14h14" />
                                                                              </svg>
                                                                        </a>

                                                                  </span>
                                                            </div>
                                                            <div class="col">
                                                                  <div class="font-weight-medium">
                                                                        {{ number_format($grandtotal->sum('grandtotal')) }}
                                                                        Sales
                                                                  </div>
                                                                  <div class="text-secondary">
                                                                        Delivery included
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>

                              </div>
                              <!-- ROW CARD SECTION -->
                        </div>
                  </div>
            </div>

            <p></p>
            <div class="container">
                  <div class="row row-deck row-cards">
                        <div class="col-12">
                              <div class="card card-sm">
                                    <div class="card-body">
                                          <table class="table table-striped " id="table">
                                                <thead>
                                                      <tr>

                                                            <th>Payment Date</th>
                                                            <th>Order Number</th>
                                                            <th>Product</th>
                                                            <th>Company Price</th>
                                                            <th>Delivery</th>
                                                            <th>Type</th>

                                                            <th>Seller Price</th>
                                                            <th>Seller Details</th>
                                                      </tr>
                                                </thead>
                                                <tbody>

                                                      @foreach($sales as $details)
                                                      <tr>

                                                            <td>
                                                                  {{ date('d/M/Y', strtotime($details->date))}}
                                                            </td>


                                                            <td> <a href="{{ route ('sales_invoice', $details->order_number) }}"
                                                                        title="Click to view">{{$details['order_number'] }}</a>
                                                            </td>
                                                            <td> {{ $details['prod_name'] }}</td>
                                                            <td> {{ number_format($details['price']) }}</td>
                                                          
                                                            <td>{{ number_format($details['delivery_fee']) }}
                                                            </td>
                                                            <td>{{ $details['pay_type']}}</td>
                                                            <td> {{ number_format($details['seller_price']) }}
                                                            </td>

                                                            <td>{{ $details['coopname'] }}
                                                                  <br>
                                                                  {{ $details['fname'] }}
                                                                  {{ $details['lname'] }}
                                                                  <br>
                                                                  {{ $details['email'] }}
                                                                  <br>
                                                                  {{ $details['phone'] }}
                                                                  <br>
                                                                  {{ $details['address'] }}
                                                                  <br>
                                                                  {{ $details['location'] }}
                                                                  <p>Bank Details:
                                                                        {{ $details['bank'] }}
                                                                        <br>
                                                                        {{ $details['account_name'] }}
                                                                        <br>
                                                                        {{ $details['account_number'] }}
                                                                  </p>
                                                            </td>

                                                            </form>


                                                            </td>
                                                      </tr>

                                                      @endforeach



                                                </tbody>
                                          </table>
                                    </div>

                              </div>
                              <!-- CARD SECTION -->
                        </div>
                  </div>
            </div>

      </div>              <!-- Page Body SECTION -->




      @endsection