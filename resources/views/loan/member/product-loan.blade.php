@extends('layouts.home')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Request product loan
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Product Loan</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block ">
                                    <a href="#" class="btn d-none ">
                                    </a>
                              </span>
                              <a href="{{ route('invoice', [$orderNumber]) }}"
                                    class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M4.5 9.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M9.5 4.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M9.5 14.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M4.5 19.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M14.5 9.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M19.5 4.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M14.5 19.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M19.5 14.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    </svg>

                                   View Order
                              </a>
                              <a href="{{ url('member-loan-history') }}" class="btn btn-danger d-sm-none btn-icon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M4.5 9.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M9.5 4.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M9.5 14.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M4.5 19.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M14.5 9.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M19.5 4.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M14.5 19.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                          <path d="M19.5 14.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
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
                  <div class="container-xl">
                        <div class="row">
                              <div class="col-12">
                                    @if(session('order'))
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
                                                <div> {{ session('order') }}</div>
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
                              </div>
                        </div>
                  </div>


                  <div class="col-md-12 col-lg-12">
            
                        <div class="card">
                        @if($getAdminLoanDuration == null)
                        <span> <a href="{{ url('account-settings') }}" class="btn btn-ghost-danger active ms-auto">Click
                                    here
                                    to set your loan duration and interest rate</a></span>
                        @else

                        <input type="hidden" id="loanTenure" value="{{$getAdminLoanDuration}}">
                        <input type="hidden" id="order_id" value="{{$orderId}}">
                        <div class="card-footer bg-transparent mt-auto">
                              <div class="btn-list justify-content-end">
                                    <span id="previewError"></span>
                                    <span id="urlError"></span>
                                    <!-- <button type="button" name="submit"
                                                                        class="btn btn-ghost-danger active ms-auto"
                                                                        onclick="cal_interest()" style="display:block;"
                                                                        id="preview">

                                                                        Click To View Monthly Repayment
                                                                  </button> -->
                              </div>
                        </div>
                        @endif
                       
                        <input type="hidden" id="order_id" value="{{$getOrderID}}" class="form-control" disabled>
                        <input type="hidden" id="amount" value="{{$getOrderTotal}}" class="form-control" disabled>
                              <div class="navbar">
                                    <h3 class="navbar-brand" style="margin-left:20px; font-size:15px"> {{$getMemberName}} Order  Amount ₦{{number_format($getOrderTotal)}}.  
                                    </h3>
                                    <h3 class="navbar-brand" style=" font-size:15px"> Loan Type:&nbsp;
                                    <span class="text-danger text-capitalize">{{ $loanTypeName }}</span>. Duration:&nbsp; <span
                                                class="text-danger"> {{ $duration }}
                                                month (s)</span>&nbsp; &nbsp; </h3>
                              </div>

                              <div class="card-body">
                                    <div class="loan-datagrid">
                                          @if($rateType == 'flat rate')
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Principal</div>
                                                <div class="ms-auto lh-1" id="principal"> {{number_format($principal) }}
                                                </div>
                                          </div>
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Total Interest</div>
                                                <div class="datagrid-content" id="interest">
                                                      {{number_format($annualInterest)}}</div>
                                          </div>
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Total Due</div>
                                                <div class="datagrid-content" id="totalDue">{{number_format($totalDue)}}
                                                </div>
                                          </div>
                                          @endif

                                          @if($rateType == 'simple interest')
                                          @php
                                          $annualInterest= 0;
                                          $totalDue = 0;
                                          $totalMonthlyDue = 0;
                                          @endphp
                                          @php
                                          $annualInterest += $percentage * $duration;
                                          $totalDue += $principal + $annualInterest ;
                                          @endphp

                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Principal</div>
                                                <div class="ms-auto lh-1" id="principal"> {{number_format($principal)}}
                                                </div>
                                          </div>
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Total Interest</div>
                                                <div class="datagrid-content" id="interest">
                                                      {{ number_format($annualInterest)}}</div>
                                          </div>
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Total Due</div>
                                                <div class="datagrid-content" id="totalDue">
                                                      {{number_format($totalDue)}}</div>
                                          </div>
                                          @endif
                                    </div>
                              </div>

                              <div class="card-body">
                                    <h3 class="card-title"><b>Member  Monthly Repayment</b></h3>
                                    <div class="loan-datagrid">
                                          @if($rateType == 'flat rate')
                                          @php
                                          $monthlyPrincipal= 0;
                                          $monthlyInterest = 0;
                                          $totalMonthlyDue = 0;
                                          @endphp
                                          @php
                                          $monthlyPrincipal += $principal / $duration;
                                          $monthlyInterest += $annualInterest / $duration;
                                          $totalMonthlyDue += $monthlyPrincipal + $monthlyInterest ;
                                          @endphp
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Monthly Principal</div>
                                                <div class="ms-auto lh-1" id="principal">
                                                      {{ number_format($monthlyPrincipal) }}</div>
                                          </div>
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Monthly Interest</div>
                                                <div class="datagrid-content" id="interest">
                                                      {{ number_format($monthlyInterest) }}</div>
                                          </div>
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Monthly Due</div>
                                                <div class="datagrid-content" id="totalDue">
                                                      {{number_format($totalMonthlyDue)}}</div>
                                          </div>
                                          @endif
                                          @if($rateType == 'reducing balance')
                                          @php
                                          $annualInterest= 0;
                                          $monthlyPrincipal= 0;
                                          $monthlyInterest = 0;
                                          $totalMonthlyDue = 0;
                                          @endphp
                                          @php
                                          $monthlyPrincipal += $principal / $duration;
                                          $annualInterest += $percentage * $duration;
                                          $monthlyInterest += $annualInterest / $duration;
                                          $totalMonthlyDue += $monthlyPrincipal + $monthlyInterest ;
                                          @endphp
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Monthly Principal</div>
                                                <div class="ms-auto lh-1" id="principal">
                                                      {{number_format( $monthlyPrincipal) }}</div>
                                          </div>
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Monthly Interest</div>
                                                <div class="datagrid-content" id="interest">
                                                      {{number_format( $monthlyInterest) }}</div>
                                          </div>
                                          <div class="datagrid-item">
                                                <div class="datagrid-title">Monthly Due</div>
                                                <div class="datagrid-content" id="totalDue">
                                                      {{number_format($totalMonthlyDue)}}</div>
                                          </div>
                                          @endif
                                          <p></p>
                                    </div>
                                    <div class="form-group">
                                          <p></p>
                                    </div>
                                    @if($principal)
                                    <form action="{{route ('admin-approve-order') }}" method="post">
                                          @csrf
                                          <input type="hidden" name="order_id" value="{{$getOrderID}}">
                                          <input type="hidden" name="loanTypeID" value="{{$loanTypeID}}">
                                          <input type="hidden" name="duration" value="{{ $duration }}">

                                          <!-- send button here -->
                                          <div class="card-footer bg-transparent mt-auto">
                                                @if($duration > $maxTenure )

                                                <div class="btn-list justify-content-end">
                                                      <span class="text-danger"><b>Maximum duration for this loan type
                                                                  is: {{$maxTenure}} month(s)</b></span>
                                                      <button type="submit" name="submit"
                                                            class="btn btn-ghost-danger active ms-auto" disabled>
                                                          Confirm Approve Order
                                                      </button>
                                                </div>
                                                @else

                                                <p></p>

                                                <div class="btn-list justify-content-end">
                                                      <button type="submit" name="submit"
                                                            class="btn btn-ghost-danger active ms-auto">
                                                            Confirm Approve Order
                                                      </button>
                                                </div>
                                                @endif
                                          </div>
                                    </form>
                                    @endif
                              </div>
                        </div>
                        <!---card--->

                  </div>
                  <!---row--->
            </div>
      </div>
      <script>
      function cal_interest() {
            let id = document.getElementById('ratetype').value;
            let amount = document.getElementById('amount').value;
            let duration = document.getElementById('loanTenure').value;
            let order = document.getElementById('order_id').value;

            if (amount == null || amount == "" || amount == 0) {
                  document.getElementById('amountError').style.color = 'red';
                  document.getElementById('amountError').innerHTML = 'amount can not be empty';


            } else {
                  document.getElementById('amountError').innerHTML = '';
            }

            if (id == null || id == "" || id == 0) {
                  document.getElementById('loanError').style.color = 'red';
                  document.getElementById('loanError').innerHTML = 'choose  a loan type';
                  return false;

            } else {
                  document.getElementById('loanError').innerHTML = '';
            }

            if (duration == null || duration == "" || duration == 0) {
                  document.getElementById('monthError').style.color = 'red';
                  document.getElementById('monthError').innerHTML = 'duration can not empty';
                  return false;

            } else {
                  document.getElementById('preview').style.display = 'block';
                  document.getElementById('monthError').innerHTML = ' ';
                  var url = "{{ URL('calculate-product-interest/') }}" + "/" + id + "/" + order + "/" + duration;
                  location.href = url;
            }

      }


      function ClearFields() {
            document.getElementById("ratetype").value = "";
            document.getElementById("amount").value = "";
            document.getElementById("loanTenure").value = "";
            var url = "member-request-loan";
            window.location.href = url;
      }
      </script>
      @endsection