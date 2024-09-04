@extends('layouts.home')

@extends('layouts.sidebar')


@section('content')

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
                              <li class="breadcrumb-item active" aria-current="page">Sales</li>
                        </ol>
                  </nav>

                  <div class="pb-3">
                        <h4>All Sales Details -> Online & Offline Payments</h4>
                        <p class="text-danger">Sellers details of all "Paid" orders </p>
                  </div>

                  <div class="row">

                        <div class="col-md-6 col-lg-6 d-flex">
                              <div class="card border-0 bg-success text-white text-center mb-grid w-100">
                                    <div class="d-flex flex-row align-items-center h-100">
                                          <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                                          Payments
                                          </div>
                                          <a href="{{url('transactions') }}" class="card-body text-decoration-none text-white">
                                                <div class="card-info-title"><i class="fa fa-coins"></i></div>
                                                <h3 class="card-title mb-0">

                                                      ₦{{ number_format($grandtotal->sum('grandtotal')) }}
                                                </h3>
                                                <span class="text-dark text-decoration-none">( delivery included )</span>  
                                          </a>
                                    </div>
                              </div>
                        </div>


                        <div class="col-md-6 col-lg-6 d-flex">
                              <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
                                    <div class="d-flex flex-row align-items-center h-100">
                                          <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                                          Sales
                                          </div>
                                          <a href="{{url('transactions') }}" class="card-body text-decoration-none text-white">
                                                <div class="card-info-title"><i class="fa fa-coins"></i></div>
                                                <h3 class="card-title mb-0">

                                                      ₦{{ number_format($total->sum('total')) }}
                                                </h3>
                                              <span class="text-dark">  ( excluding delivery )</span> 
                                          </a>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <!-- row -->
                  <div class="row">
                        <div class="col-lg-12 table-responsive">
                              <table class="table table-striped " id="table">
                                    <thead>
                                          <tr>

                                                <th>Payment Date</th>
                                                <th>Seller Details</th>
                                                <th>Order Number</th>
                                                <th>Product</th>
                                                <th>Company Price</th>
                                                <th>Seller Price</th>
                                                <th>Delivery</th>
                                                <th>Type</th>
                                          </tr>
                                    </thead>
                                    <tbody>

                                          @foreach($sales as $details)
                                          <tr>

                                                <td>
                                                      {{ date('d/M/Y', strtotime($details->date))}}</td>


                                                <td>{{ $details['coopname'] }}
                                                      <br>
                                                      {{ $details['fname'] }}  {{ $details['lname'] }}
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
                                                <td> <a href="{{ route ('sales_invoice', $details->order_number) }}"
                                                            title="Click to view">{{$details['order_number'] }}</a>
                                                </td>
                                                <td> {{ $details['prod_name'] }}</td>
                                                <td> {{ number_format($details['price']) }}</td>
                                                <td> {{ number_format($details['seller_price']) }}</td>
                                                <td>{{ number_format($details['delivery_fee']) }}</td>
                                                <td>{{ $details['pay_type']}}</td>


                                                </form>


                                                </td>
                                          </tr>

                                          @endforeach



                                    </tbody>
                              </table>

                        </div>
                        <!--col 12-->
                  
                  </div>
                  <!--roww-->

            </div>

      </div> <!-- section -->

      @endsection