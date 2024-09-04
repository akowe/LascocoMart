@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Dashboard
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Overview</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                     <!-- Page title actions -->
                     @if(empty($WalletAccountNumber))
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block ">
                                    <a href="#" class="btn d-none ">
                                    </a>
                              </span>
                              <a href="{{ url('create-wallet')  }}" class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>

                                    Create A Wallet
                              </a>
                              <a href="{{ url('create-wallet')  }}" class="btn btn-danger d-sm-none btn-icon">
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
                  @else
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block ">
                                  @if(empty($accountBalance))
                                    <div class="input-group " id="show_hide_wallet">
                                          <span class="input-group-text">
                                                Wallet
                                          </span>
                                          <input type="password" value="₦ 0" class="btn text-secondary" style="width:140px;" >
                                          <span class="input-group-text">
                                                <a href="" class="text-secondary">
                                                      <i class="fa fa-eye-slash"></i>
                                                </a>
                                          </span>
                                    </div>
                                    @else 
                                    <div class="input-group " id="show_hide_wallet">
                                          <span class="input-group-text">
                                                Wallet
                                          </span>
                                          <input type="password" value="₦ {{number_format($accountBalance)}}" class="btn text-secondary" style="width:140px;" >
                                          <span class="input-group-text">
                                                <a href="" class="text-secondary">
                                                      <i class="fa fa-eye-slash"></i>
                                                </a>
                                          </span>
                                    </div>
                                    @endif 

                              </span>
                              <a href="#" class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal-showWalletAcount">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                                    Fund Wallet
                              </a>
                              <a href="#" class="btn btn-danger d-sm-none btn-icon"  data-bs-toggle="modal"
                                    data-bs-target="#modal-showWalletAcount">
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
                  @endif
            </div>
      </div>
</div>



<!-- Page body -->
<div class="page-body">
      <div class="container-xl">
            <div class="row row-deck row-cards">
                  <div class="col-sm-3 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">Total Order</div>
                                          <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                      <a class="dropdown-toggle text-secondary" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Last 7 days</a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item active"
                                                                  href="{{ url('member-order') }}">Last 7 days</a>
                                                            <a class="dropdown-item"
                                                                  href="{{ url('member-order') }}">Last 30 days</a>
                                                            <a class="dropdown-item"
                                                                  href="{{ url('member-order') }}">Last 3 months</a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="h1 mb-3"> <a href="{{ url('member-order') }}"
                                                class="text-dark">{{ $countOrders->count() }}</a></div>
                                    <div class="d-flex mb-2">
                                          <div>approved order</div>
                                          <div class="ms-auto">
                                                @if($approvedOrders->count() > 0)
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                      {{ $approvedOrders->count() }}
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
                                                <span class="text-danger d-inline-flex align-items-center lh-1">
                                                      {{ $approvedOrders->count() }}
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trending-down"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M3 7l6 6l4 -4l8 8" />
                                                            <path d="M21 10l0 7l-7 0" />
                                                      </svg>
                                                </span>
                                                @endif
                                          </div>
                                    </div>
                                    <div class="progress progress-sm">
                                          <div class="progress-bar bg-azure"
                                                style="width:{{ $approvedOrders->count() }}%" role="progressbar"
                                                aria-valuenow="{{ $approvedOrders->count() }}" aria-valuemin="0"
                                                aria-valuemax="100"
                                                aria-label="{{ $approvedOrders->count() }}% Complete">
                                                <span class="visually-hidden">{{ $approvedOrders->count() }}%
                                                      Complete</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="col-sm-3 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">Current Loan</div>
                                          <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                      <a class="dropdown-toggle text-secondary" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Last 7 days</a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item active" href="member-loan-history">Last 7 days</a>
                                                            <a class="dropdown-item" href="member-loan-history">Last 30 days</a>
                                                            <a class="dropdown-item" href="member-loan-history">Last 3 months</a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="h1 mb-3">{{number_format($loan->sum('principal'))}}</div>
                                    <div class="d-flex mb-2">
                                          <div>loan count</div>
                                          <div class="ms-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                      {{$loan->count()}}
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
                                          <div class="progress-bar bg-success" style="width:    {{$loan->count()}}%" role="progressbar"
                                                aria-valuenow="{{$loan->count()}}" aria-valuemin="0" aria-valuemax="100"
                                                aria-label="{{$loan->count()}}% Complete">
                                                <span class="visually-hidden">{{$loan->count()}}% Complete</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>


                  <div class="col-sm-3 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">Total Due Loan</div>
                                          <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                      <a class="dropdown-toggle text-secondary" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Last 7 days</a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item active" href="member-loan-history">Last 7 days</a>
                                                            <a class="dropdown-item" href="member-loan-history">Last 30 days</a>
                                                            <a class="dropdown-item" href="member-loan-history">Last 3 months</a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="h1 mb-3">{{number_format($loan->sum('total'))}}</div>
                                    <div class="d-flex mb-2">
                                          <div>loan duration</div>
                                          <div class="ms-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                      {{$loanPeriod}}
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
                                          <div class="progress-bar bg-yellow" style="width:{{$loanPeriod}}%" role="progressbar"
                                                aria-valuenow="{{$loanPeriod}}" aria-valuemin="0" aria-valuemax="100"
                                                aria-label="{{$loanPeriod}}% Complete">
                                                <span class="visually-hidden">{{$loanPeriod}}% Complete</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>


                  <div class="col-sm-3 col-lg-3">
                        <div class="card">
                              <div class="card-body">
                                    <div class="d-flex align-items-center">
                                          <div class="subheader">Monthly Due</div>
                                          <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                      <a class="dropdown-toggle text-secondary" href="#"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Last 7 days</a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item active" href="member-loan-history">Last 7 days</a>
                                                            <a class="dropdown-item" href="member-loan-history">Last 30 days</a>
                                                            <a class="dropdown-item" href="member-loan-history">Last 3 months</a>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="h1 mb-3">{{number_format($loan->sum('monthly_due'))}}</div>
                                    <div class="d-flex mb-2">
                                          <div>next due date</div>
                                          <div class="ms-auto">
                                                <span class="text-green d-inline-flex align-items-center lh-1">
                                                {{$dueDtae}}
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
                                          <div class="progress-bar bg-danger" style="width: 75%" role="progressbar"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                aria-label="75% Complete">
                                                <span class="visually-hidden">75% Complete</span>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            <!---row--->
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
                                          <div> {{ session('status') }}</div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                              </div>
                              @endif
                              @if(session('profile'))
                              <div class="alert  alert-yellow alert-dismissible" role="alert">
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
                                          <div><a href="{{url('account-settins') }}" class="cursor"> {!!
                                                      session('profile') !!}</a></div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                              </div>
                              @endif

                              @if(session('success'))
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
                                          <div>{!! session('success') !!}</div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                              </div>
                              @endif

                              @if(session('error'))
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
                                          <div>{!! session('error') !!}</div>
                                    </div>
                                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                              </div>
                              @endif
                        </div>
                  </div>
            </div>
            <!-- Alert stop --->
            <div class="row g-2">
                  <div class="col-12">
                        <div class="card">
                             
                        </div>
                        <!--- card-->

                  </div>
                  <!---- col-12 --->

            </div>
            <!---row--->

      </div>
      <!---container--->
</div>
<!---page-body--->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
document.getElementById('pagination').onchange = function() {
      window.location = "{!! $orders->url(1) !!}&perPage=" + this.value;
};
</script>
<script>
$(document).ready(function() {
      $("#show_hide_wallet a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_wallet input').attr("type") == "text") {
                  $('#show_hide_wallet input').attr('type', 'password');
                  $('#show_hide_wallet i').addClass("fa-eye-slash");
                  $('#show_hide_wallet i').removeClass("fa-eye");
            } else if ($('#show_hide_wallet input').attr("type") == "password") {
                  $('#show_hide_wallet input').attr('type', 'text');
                  $('#show_hide_wallet i').removeClass("fa-eye-slash");
                  $('#show_hide_wallet i').addClass("fa-eye");
            }
      });
});
</script>

@endsection