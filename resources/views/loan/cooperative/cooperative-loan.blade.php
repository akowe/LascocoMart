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
                              <span class=" d-none  d-md-block">Loan</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block ">
                                    <a href="#" class="btn d-none ">
                                    </a>
                              </span>
                              <a  href="{{ url('cooperative-create-loan')  }}" class="btn btn-danger d-none d-sm-inline-block" >
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>

                                   Add New Loan 
                              </a>
                              <a href="{{ url('cooperative-create-loan')  }}" class="btn btn-danger d-sm-none btn-icon">
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
      <div class="container-xl">
            <div class="row row-deck row-cards">
                  <div class="col-sm-6 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">Total loan</div>
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
                                    <div class="h1 mb-3">₦{{ number_format($totalLoan->sum('principal')) }}</div>
                                    <div class="d-flex mb-2">
                                          <div>number of members</div>
                                          <div class="ms-auto">
                                                @if($countMemberLoan->count() >0)
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                      {{ $countMemberLoan->count() }}
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
                                                @else
                                                {{ $countMemberLoan->count() }}
                                                <span class="text-danger d-inline-flex align-items-center lh-1">
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/trending-down -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trending-down"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 7l6 6l4 -4l8 8" />
                                                            <path d="M21 10l0 7l-7 0" />
                                                      </svg>
                                                      @endif
                                                </span>
                                          </div>
                                    </div>
                                    <div class="progress progress-sm">
                                          <div class="progress-bar bg-primary"
                                                style="width:  {{ $countMemberLoan->count() }}%" role="progressbar"
                                                aria-valuenow=" {{ $countMemberLoan->count() }}" aria-valuemin="0"
                                                aria-valuemax="100"
                                                aria-label=" {{ $countMemberLoan->count() }}% Complete">
                                                <span class="visually-hidden"> {{ $countMemberLoan->count() }}%
                                                      Complete</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">total interest</div>
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
                                          <div class="h1 mb-0 me-2">₦{{ number_format($totalLoan->sum('interest')) }}
                                          </div>
                                          <div class="me-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">

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
                                          <div class="subheader">total remaining</div>
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
                                          <div class="h1 mb-3 me-2">
                                                ₦{{ number_format($totalLoan->sum('loan_balance')) }}</div>
                                          <div class="me-auto">
                                                <span class="text-yellow d-inline-flex align-items-center lh-1">

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
                                    <div id="chart-loan-balance" class="chart-sm"></div>
                              </div>
                        </div>
                  </div>
                  <div class="col-sm-6 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">Current Monthly Due</div>
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
                                          <div class="h1 mb-3 me-2">
                                                ₦{{ round($totalMonthlyDueLoan->sum('monthly_due'), 2) }}
                                          </div>
                                          <div class="me-auto">
                                                <span class="text-red d-inline-flex align-items-center lh-1">

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
                                    <div id="chart-loan-monthly" class="chart-sm"></div>
                              </div>
                        </div>
                  </div>

                  <!-- Alert start --->
                  <div class="container-xl">
                        <div class="row ">
                              <div class="col-12">
                                    <p></p>
                                    @if(session('loan-status'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
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
                                                <div> {{ session('loan-status') }}</div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @endif

                                    @if(session('loanExist'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
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
                                                <div> {{ session('loanExist') }}</div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @endif

                                    @if(session('success'))
                                    <div class="alert alert-important alert-success alert-dismissible" role="alert">
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
                                                <div> {{ session('success') }}</div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @endif


                              </div>
                        </div>
                  </div>
                  <!-- Alert stop --->

                  <div class="col-12">
                        <div class="card">
                              <div class="card-header">
                                    <h3 class="card-title">Loan History </h3>
                              </div>
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

                                                      <form action="/cooperative-loan" method="GET" role="search">
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
                                                                  type="checkbox" aria-label="Select all product"></th>
                                   
                                                      <th>Name</th>
                                                      <th>Loan</th>
                                                      <th>Duration (in month) </th>
                                                      <th>Principal</th>
                                                      <th>Interest</th>
                                                      <th>Status</th>
                                                      
                                                      <th></th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($loan as $data)
                                                <tr>
                                                      <td><input class="form-check-input m-0 align-middle"
                                                                  type="checkbox" aria-label="Select"></td>
                                                      <td>{{$data->fname}}</td>
                                                      <td>{{$data->name}}</td>
                                                      <td>{{$data->duration}} </td>
                                                      <td>{{number_format($data->principal)}}</td>
                                                      <td>{{number_format($data->interest)}}</td>
                                                      <td class="">
                                                            @if($data->loan_status =='request')
                                                            <span
                                                                  class="badge bg-yellow-lt text-capitalize">{{$data->loan_status}}</span>

                                                            @elseif($data->loan_status =='approved')
                                                            <span
                                                                  class="badge bg-azure-lt text-capitalize">{{$data->loan_status}}</span>
                                                            @elseif($data->loan_status =='payout')
                                                            <span
                                                                  class="badge bg-success-lt text-capitalize">{{$data->loan_status}}</span>
                                                            @else
                                                            @endif

                                                      </td>
                                                      <td class="text-end">
                                                            <span class="dropdown">
                                                                  <button
                                                                        class="btn dropdown-toggle align-text-top text-red"
                                                                        data-bs-boundary="viewport"
                                                                        data-bs-toggle="dropdown">Actions</button>
                                                                  <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item text-capitalize"
                                                                              href="admin-loan-statement/{{$data->id}}">
                                                                              View
                                                                        </a>
                                                                        @if($data->loan_status =='approved' && $data->approval_agent == auth()->user()->id)
                                                                        @elseif($data->loan_status =='payout')
                                                                        @else 
                                                                        <a class="dropdown-item text-capitalize" href="cooperative-approve-loan/{{$data->id}}">Approve</a>
                                                                        @endif 
                                                                        @if($data->loan_status =='payout')
                                                                        @else 
                                                                        <a class="dropdown-item text-capitalize" href="cooperative-loan-payout/{{$data->id}}">PayOut</a>
                                                                        @endif 

                                                                  </div>
                                                            </span>
                                                      </td>


                                                </tr>
                                                @endforeach

                                          </tbody>

                                    </table>
                              </div>
                              <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-secondary">

                                          Showing {{ ($loan->currentPage() - 1) * $loan->perPage() + 1; }} to
                                          {{ min($loan->currentPage()* $loan->perPage(), $loan->total()) }}
                                          of
                                          {{$loan->total()}} entries
                                    </p>

                                    <ul class="pagination m-0 ms-auto">
                                          @if(isset($loan))
                                          @if($loan->currentPage() > 1)
                                          <li class="page-item ">
                                                <a class="page-link text-danger"
                                                      href="{{ $loan->previousPageUrl() }}" tabindex="-1"
                                                      aria-disabled="true">
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


                                          <li class="page-item"> {{ $loan->appends(compact('perPage'))->links()  }}
                                          </li>
                                          @if($loan->hasMorePages())
                                          <li class="page-item">
                                                <a class="page-link text-danger" href="{{ $loan->nextPageUrl() }}">
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
            </div>
            <!---row--->
      </div>
</div>


<script>
// @formatter:off
document.addEventListener("DOMContentLoaded", function() {
      window.ApexCharts && (new ApexCharts(document
            .getElementById('chart-revenue-bg'), {
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
                        name: "interest",
                        data:  @json($interest),

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
                  xaxis: {
                        labels: {
                              padding: 4
                        },
                  },
                  labels:   @json($date),
                  colors: [tabler.getColor(
                        "primary")],
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
      window.ApexCharts && (new ApexCharts(document
            .getElementById('chart-loan-balance'), {
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
                        name: "Paid",
                        data:   @json($paidLoan)
                  }, {
                        name: "Remain",
                        data:  @json($loanBalance)
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
                  xaxis: {
                        labels: {
                              padding: 4
                        },
                  },
                  labels:  @json($date) ,
                  colors: [tabler.getColor("primary"),
                        tabler.getColor(
                              "gray-600")
                  ],
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
      window.ApexCharts && (new ApexCharts(document
            .getElementById('chart-loan-monthly'), {
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
                        name: "members",
                        data: @json($loanMonthly)

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
                        type: 'date',
                  },
                  xaxis: {
                        labels: {
                              padding: 4
                        },
                  },
                  labels: [

                        //'2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
                  ],
                  colors: [tabler.getColor(
                        "primary")],
                  legend: {
                        show: false,
                  },
            })).render();
});
// @formatter:on
</script>
@endsection