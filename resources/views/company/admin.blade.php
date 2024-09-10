@extends('layouts.home')
@section('content')

<!-- Page header -->
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
                              Dashboard
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
                                    Generate Report
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

      <div class="container">
            <div class="row row-deck row-cards">
                  <div class="col-sm-6 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">   <a href="{{url('transactions') }}" class="subheader">Transaction (s)</a></div>
                                          <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                      <a class="dropdown-toggle text-secondary" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Last 7 days</a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item active" href="#">Last 7 days</a>
                                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                                            <a class="dropdown-item" href="#">Last 3 months</a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                          <div class="h1 mb-0 me-2">₦0</div>
                                          <div class="me-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                      0%
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 17l6 -6l4 4l8 -8" />
                                                            <path d="M14 7l7 0l0 7" />
                                                      </svg>
                                                </span>
                                          </div>
                                    </div>
                              </div>
                              <div id="chart-revenue-bg" class="chart-sm"></div>
                        </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">Revenue</div>
                                          <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                      <a class="dropdown-toggle text-secondary" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Last 7 days</a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item active" href="#">Last 7 days</a>
                                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                                            <a class="dropdown-item" href="#">Last 3 months</a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                          <div class="h1 mb-3 me-2">₦0</div>
                                          <div class="me-auto">
                                                <span class="text-yellow d-inline-flex align-items-center lh-1">
                                                      0%
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l14 0" />
                                                      </svg>
                                                </span>
                                          </div>
                                    </div>
                                    <div id="chart-new-clients" class="chart-sm"></div>
                              </div>
                        </div>
                  </div>

                  <div class="col-sm-6 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">Sales</div>
                                          <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                      <a class="dropdown-toggle text-secondary" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Last 7 days</a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item active" href="#">Last 7 days</a>
                                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                                            <a class="dropdown-item" href="#">Last 3 months</a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="h1 mb-3">0%</div>
                                    <div class="d-flex mb-2">
                                          <div>Conversion rate</div>
                                          <div class="ms-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                      0%
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 17l6 -6l4 4l8 -8" />
                                                            <path d="M14 7l7 0l0 7" />
                                                      </svg>
                                                </span>
                                          </div>
                                    </div>
                                    <div class="progress progress-sm">
                                          <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                aria-label="75% Complete">
                                                <span class="visually-hidden">0% Complete</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="col-sm-6 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader"> <a class="subheader"
                                                      href="">Active users</a></div>
                                          <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                      <a class="dropdown-toggle text-secondary" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Last 7 days</a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item active" href="#">Last 7 days</a>
                                                            <a class="dropdown-item" href="#">Last 30 days</a>
                                                            <a class="dropdown-item" href="#">Last 3 months</a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="d-flex align-items-baseline">
                                          <div class="h1 mb-3 me-2">{{ $users->count() }}</div>
                                          <div class="me-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                      {{ $activeUser->count() }}%
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                                      <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1"
                                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 17l6 -6l4 4l8 -8" />
                                                            <path d="M14 7l7 0l0 7" />
                                                      </svg>
                                                </span>
                                          </div>
                                    </div>
                                    <div id="chart-active-users" class="chart-sm"></div>
                              </div>
                        </div>
                  </div>
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
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
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
                                                                  {{ $count_sales->count() }} Transaction (s)
                                                            </div>
                                                            <div class="text-secondary">
                                                                {{$countProductSold}}  products sold
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
                                                                  <a href="{{ url('order-history') }}"  class="text-white">
                                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none" />
                                                                        <path
                                                                              d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                        <path
                                                                              d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                        <path d="M17 17h-11v-14h-2" />
                                                                        <path d="M6 5l14 1l-1 7h-13" />
                                                                  </svg>
                                                                  </a>
                                                               
                                                            </span>
                                                      </div>
                                                      <div class="col">
                                                            <div class="font-weight-medium">
                                                                  {{ $count_orders->count() }} Orders
                                                            </div>
                                                            <div class="text-secondary">
                                                                  0 shipped
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
                                                            <span class="bg-lime text-white avatar">
                                                                  <!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none" />
                                                                        <path
                                                                              d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                                                        <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                                                  </svg>

                                                            </span>
                                                      </div>
                                                      <div class="col">
                                                            <div class="font-weight-medium">
                                                                  {{$countWalletAccount->count()}} Wallet Account (s)
                                                            </div>
                                                            <div class="text-secondary">
                                                                  {{$activeWallet->count()}} active
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
                                                            <span class="bg-cyan text-white avatar">
                                                                  <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-coins"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none" />
                                                                        <path
                                                                              d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" />
                                                                        <path
                                                                              d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" />
                                                                        <path
                                                                              d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" />
                                                                        <path d="M3 6v10c0 .888 .772 1.45 2 2" />
                                                                        <path d="M3 11c0 .888 .772 1.45 2 2" />
                                                                  </svg>
                                                            </span>
                                                      </div>
                                                      <div class="col">
                                                            <div class="font-weight-medium">
                                                                  {{$countLoan->count()}} Loan (s)
                                                            </div>
                                                            <div class="text-secondary">
                                                                  {{$countLoanPayout->count()}} payouts
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="col-12">
                        <div class="row row-cards">

                              <div class="col-sm-6 col-lg-3">
                                    <div class="card card-sm">
                                          <div class="card-body">
                                                <div class="row align-items-center">
                                                      <div class="col-auto">
                                                            <span class="avatar bg-facebook">
                                                                  <a href="{{ url('all-vendors') }}"
                                                                        class="text-white" cursor>
                                                                        <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon" width="24" height="24"
                                                                              viewBox="0 0 24 24" stroke-width="2"
                                                                              stroke="currentColor" fill="none"
                                                                              stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path d="M3 21l18 0" />
                                                                              <path
                                                                                    d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                                                                              <path d="M5 21l0 -10.15" />
                                                                              <path d="M19 21l0 -10.15" />
                                                                              <path
                                                                                    d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                                                        </svg>

                                                                  </a>
                                                            </span>
                                                      </div>
                                                      <div class="col">
                                                            <div class="font-weight-medium">

                                                                  {{ $sellers->count() }} Vendor (s)
                                                            </div>

                                                            <div class="text-secondary">
                                                                  {{$products->count()}} products
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
                                                            <span class="avatar bg-azure">
                                                                  <a href="{{ url('all-cooperatives') }}"
                                                                        class="text-white" cursor>
                                                                        <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon" width="24" height="24"
                                                                              viewBox="0 0 24 24" stroke-width="2"
                                                                              stroke="currentColor" fill="none"
                                                                              stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                              <path
                                                                                    d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                                                              <path
                                                                                    d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                              <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                                                              <path
                                                                                    d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                              <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                                                        </svg>

                                                                  </a>
                                                            </span>
                                                      </div>
                                                      <div class="col">
                                                            <div class="font-weight-medium">
                                                                  {{ $cooperatives->count() }} Cooperative (s)
                                                            </div>

                                                            <div class="text-secondary">
                                                                  {{ $members->count() }} members
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
                                                            <span class="avatar bg-blue">
                                                                  <a href="{{ url('all-fmcgs') }}"
                                                                        class="text-white" cursor>
                                                                        <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon" width="24" height="24"
                                                                              viewBox="0 0 24 24" stroke-width="2"
                                                                              stroke="currentColor" fill="none"
                                                                              stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                                              <path
                                                                                    d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                                              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                                              <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                                                        </svg>

                                                                  </a>
                                                            </span>
                                                      </div>
                                                      <div class="col">
                                                            <div class="font-weight-medium">

                                                                  {{$fmcg->count()}} FMCG (s)
                                                            </div>

                                                            <div class="text-secondary">
                                                                  {{$fmcgProducts->count()}} products
                                                            </div>
                                                      </div>

                                                </div>
                                          </div>
                                    </div>
                              </div>

                              <div class="col-sm-6 col-lg-3">
                              </div>

                        </div>
                        <!---- row-cards --->
                  </div>

                  <!--- chart/ graph --->

                  <div class="col-lg-12">
                        <div class="card">
                              <div class="card-body">
                                    <h3 class="card-title">Sales summary</h3>
                                    <div id="chart-mentions" class="chart-lg"></div>
                              </div>
                        </div>
                  </div>

                  <!---end graph--->
            </div>
            <!---- row-deck --->
      </div>
      <!---- container-xl --->
</div>
<!---page body --->

<script>
// @formatter:off
document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
            chart: {
                  type: "area",
                  fontFamily: 'inherit',
                  height: 40.0,
                  sparkline: {
                        enabled: true
                  },
                  animations: {
                        enabled: false
                  },
            },
            dataLabels: {
                  enabled: false,
            },
            fill: {
                  opacity: .16,
                  type: 'solid'
            },
            stroke: {
                  width: 2,
                  lineCap: "round",
                  curve: "smooth",
            },
            series: [{
                  name: "Profits",
                  data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35,
                        41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39,
                        62, 51, 35, 41, 67
                  ]
            }],
            tooltip: {
                  theme: 'dark'
            },
            grid: {
                  strokeDashArray: 4,
            },
            xaxis: {
                  labels: {
                        padding: 0,
                  },
                  tooltip: {
                        enabled: false
                  },
                  axisBorder: {
                        show: false,
                  },
                  type: 'datetime',
            },
            yaxis: {
                  labels: {
                        padding: 4
                  },
            },
            labels: [
                  '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23',
                  '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27',
                  '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01',
                  '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05',
                  '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                  '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13',
                  '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17',
                  '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                  show: false,
            },
      })).render();
});
// @formatter:on
</script>
<script>
// @formatter:off
document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
            chart: {
                  type: "line",
                  fontFamily: 'inherit',
                  height: 40.0,
                  sparkline: {
                        enabled: true
                  },
                  animations: {
                        enabled: false
                  },
            },
            fill: {
                  opacity: 1,
            },
            stroke: {
                  width: [2, 1],
                  dashArray: [0, 3],
                  lineCap: "round",
                  curve: "smooth",
            },
            series: [{
                  name: "May",
                  data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35,
                        41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39,
                        62, 51, 35, 41, 67
                  ]
            }, {
                  name: "April",
                  data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62,
                        61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44,
                        53, 41, 65, 39, 37
                  ]
            }],
            tooltip: {
                  theme: 'dark'
            },
            grid: {
                  strokeDashArray: 4,
            },
            xaxis: {
                  labels: {
                        padding: 0,
                  },
                  tooltip: {
                        enabled: false
                  },
                  type: 'datetime',
            },
            yaxis: {
                  labels: {
                        padding: 4
                  },
            },
            labels: [
                  '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23',
                  '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27',
                  '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01',
                  '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05',
                  '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                  '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13',
                  '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17',
                  '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary"), tabler.getColor("gray-600")],
            legend: {
                  show: false,
            },
      })).render();
});
// @formatter:on
</script>
<script>
// @formatter:off
document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
            chart: {
                  type: "bar",
                  fontFamily: 'inherit',
                  height: 40.0,
                  sparkline: {
                        enabled: true
                  },
                  animations: {
                        enabled: false
                  },
            },
            plotOptions: {
                  bar: {
                        columnWidth: '50%',
                  }
            },
            dataLabels: {
                  enabled: false,
            },
            fill: {
                  opacity: 1,
            },
            series: [{
                  name: "Profits",
                  data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35,
                        41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39,
                        62, 51, 35, 41, 67
                  ]
            }],
            tooltip: {
                  theme: 'dark'
            },
            grid: {
                  strokeDashArray: 4,
            },
            xaxis: {
                  labels: {
                        padding: 0,
                  },
                  tooltip: {
                        enabled: false
                  },
                  axisBorder: {
                        show: false,
                  },
                  type: 'datetime',
            },
            yaxis: {
                  labels: {
                        padding: 4
                  },
            },
            labels: [
                  '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23',
                  '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27',
                  '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01',
                  '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05',
                  '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09',
                  '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13',
                  '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17',
                  '2020-07-18', '2020-07-19'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                  show: false,
            },
      })).render();
});
// @formatter:on
</script>

<script>
// @formatter:on
document.addEventListener("DOMContentLoaded", function() {
      const map = new jsVectorMap({
            selector: '#map-world',
            map: 'world',
            backgroundColor: 'transparent',
            regionStyle: {
                  initial: {
                        fill: tabler.getColor('body-bg'),
                        stroke: tabler.getColor('border-color'),
                        strokeWidth: 2,
                  }
            },
            zoomOnScroll: false,
            zoomButtons: false,
            // -------- Series --------
            visualizeData: {
                  scale: [tabler.getColor('bg-surface'), tabler.getColor('primary')],
                  values: {
                        "AF": 16,
                        "AL": 11,
                        "DZ": 158,
                        "AO": 85,
                        "AG": 1,
                        "AR": 351,
                        "AM": 8,
                        "AU": 1219,
                        "AT": 366,
                        "AZ": 52,
                        "BS": 7,
                        "BH": 21,
                        "BD": 105,
                        "BB": 3,
                        "BY": 52,
                        "BE": 461,
                        "BZ": 1,
                        "BJ": 6,
                        "BT": 1,
                        "BO": 19,
                        "BA": 16,
                        "BW": 12,
                        "BR": 2023,
                        "BN": 11,
                        "BG": 44,
                        "BF": 8,
                        "BI": 1,
                        "KH": 11,
                        "CM": 21,
                        "CA": 1563,
                        "CV": 1,
                        "CF": 2,
                        "TD": 7,
                        "CL": 199,
                        "CN": 5745,
                        "CO": 283,
                        "KM": 0,
                        "CD": 12,
                        "CG": 11,
                        "CR": 35,
                        "CI": 22,
                        "HR": 59,
                        "CY": 22,
                        "CZ": 195,
                        "DK": 304,
                        "DJ": 1,
                        "DM": 0,
                        "DO": 50,
                        "EC": 61,
                        "EG": 216,
                        "SV": 21,
                        "GQ": 14,
                        "ER": 2,
                        "EE": 19,
                        "ET": 30,
                        "FJ": 3,
                        "FI": 231,
                        "FR": 2555,
                        "GA": 12,
                        "GM": 1,
                        "GE": 11,
                        "DE": 3305,
                        "GH": 18,
                        "GR": 305,
                        "GD": 0,
                        "GT": 40,
                        "GN": 4,
                        "GW": 0,
                        "GY": 2,
                        "HT": 6,
                        "HN": 15,
                        "HK": 226,
                        "HU": 132,
                        "IS": 12,
                        "IN": 1430,
                        "ID": 695,
                        "IR": 337,
                        "IQ": 84,
                        "IE": 204,
                        "IL": 201,
                        "IT": 2036,
                        "JM": 13,
                        "JP": 5390,
                        "JO": 27,
                        "KZ": 129,
                        "KE": 32,
                        "KI": 0,
                        "KR": 986,
                        "KW": 117,
                        "KG": 4,
                        "LA": 6,
                        "LV": 23,
                        "LB": 39,
                        "LS": 1,
                        "LR": 0,
                        "LY": 77,
                        "LT": 35,
                        "LU": 52,
                        "MK": 9,
                        "MG": 8,
                        "MW": 5,
                        "MY": 218,
                        "MV": 1,
                        "ML": 9,
                        "MT": 7,
                        "MR": 3,
                        "MU": 9,
                        "MX": 1004,
                        "MD": 5,
                        "MN": 5,
                        "ME": 3,
                        "MA": 91,
                        "MZ": 10,
                        "MM": 35,
                        "NA": 11,
                        "NP": 15,
                        "NL": 770,
                        "NZ": 138,
                        "NI": 6,
                        "NE": 5,
                        "NG": 206,
                        "NO": 413,
                        "OM": 53,
                        "PK": 174,
                        "PA": 27,
                        "PG": 8,
                        "PY": 17,
                        "PE": 153,
                        "PH": 189,
                        "PL": 438,
                        "PT": 223,
                        "QA": 126,
                        "RO": 158,
                        "RU": 1476,
                        "RW": 5,
                        "WS": 0,
                        "ST": 0,
                        "SA": 434,
                        "SN": 12,
                        "RS": 38,
                        "SC": 0,
                        "SL": 1,
                        "SG": 217,
                        "SK": 86,
                        "SI": 46,
                        "SB": 0,
                        "ZA": 354,
                        "ES": 1374,
                        "LK": 48,
                        "KN": 0,
                        "LC": 1,
                        "VC": 0,
                        "SD": 65,
                        "SR": 3,
                        "SZ": 3,
                        "SE": 444,
                        "CH": 522,
                        "SY": 59,
                        "TW": 426,
                        "TJ": 5,
                        "TZ": 22,
                        "TH": 312,
                        "TL": 0,
                        "TG": 3,
                        "TO": 0,
                        "TT": 21,
                        "TN": 43,
                        "TR": 729,
                        "TM": 0,
                        "UG": 17,
                        "UA": 136,
                        "AE": 239,
                        "GB": 2258,
                        "US": 4624,
                        "UY": 40,
                        "UZ": 37,
                        "VU": 0,
                        "VE": 285,
                        "VN": 101,
                        "YE": 30,
                        "ZM": 15,
                        "ZW": 5
                  },
            },
      });
      window.addEventListener("resize", () => {
            map.updateSize();
      });
});
// @formatter:off
</script>




@endsection