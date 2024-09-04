@extends('layouts.home')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Add Loan
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">New Loan</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block ">
                                    <a href="#" class="btn d-none ">
                                    </a>
                              </span>
                              <a href="{{ url('cooperative-loan') }}" class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                          <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                    </svg>

                                    Loan History
                              </a>
                              <a href="{{ url('cooperative-loan') }}" class="btn btn-danger d-sm-none btn-icon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
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

<!-- Page body -->
<div class="page-body">
      <div class="container-xl">
            <div class="row row-deck row-cards">
                  <div class="container-xl">
                        <div class="row">
                              <div class="col-12">
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

                                    @if(session('loan'))
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
                                                <div> 

                                                <a href="{{url('cooperative-loan-type') }}" class="cursor">{{ session('loan') }}</a>
                                                </div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @endif
                              </div>
                        </div>
                  </div>

                  @if(empty($members))
                  <div class="container-xl">
                        <div class="row">
                              <div class="col-md-5 col-lg-5">
                                    <div class="card">
                                          <div class="card-body">
                                                <div class="card-header">
                                                      <h3 class="card-title"> Add loan to member (s)</h3>
                                                </div>
                                                <form id="">
                                                      <div class="row">
                                                            <p></p>
                                                            <div class="mb-3">
                                                                  <div class="form-label">Select Members</div>
                                                                  <select type="text" class="form-select" id="members"
                                                                        value="" multiple>
                                                                        <option value="">Enter name of your member</option>

                                                                        @foreach($memberName as $member)
                                                                        <option value="{{$member->id}}">
                                                                              {{$member->fname}}</option>
                                                                        @endforeach
                                                                  </select>
                                                                  <span id="memberError"></span>
                                                            </div>
                                                            <div class="col-md">
                                                                  <div class="form-label required">Amount </div>
                                                                  <input type="text" name="amount" id="amount"
                                                                        class="form-control" data-mask="00000000,00"
                                                                        data-mask-visible="true"
                                                                        placeholder="Enter the amount you are requsting"
                                                                        data-mask-reverse="true" autocomplete="off"
                                                                        value="{{ $principal}}" required>
                                                                  <span id="amountError"></span>

                                                                  @error('amount')
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
                                                      <!---card-row--->

                                                      <p></p>
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="form-label required">Choose Loan Type
                                                                  </div>
                                                            @if($loanType)
                                                            <input type="text" name="ratetype"  class="form-control"
                                                            value="{{$loanType}}" disabled>
                                                            @else
                                                            <input type="text" name="ratetype"  class="form-control"
                                                            value="{{$chooseLoanTypeName}}" disabled>
                                                            @endif 
                                                            <input type="hidden" id="ratetype" value="{{$chooseLoanTypeID}}">

                                                                  <span id="loanError"></span>
                                                                  @error('loantype')
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

                                                            <div class="col-md">
                                                                  <div class="form-label required">Duration (months)
                                                                  </div>
                                                                  <div class="value-button" id="decrease"
                                                                        onclick="decreaseLoanTenure()"
                                                                        value="decrease Value">-
                                                                  </div>
                                                                  <input type="number" name="duration"
                                                                        value="{{$duration}}" id="loanTenure" required>
                                                                  <div class="value-button" id="increase"
                                                                        onclick="increaseLoanTenure()"
                                                                        value="Increase Value">+
                                                                  </div>

                                                                  <div>
                                                                        <span id="monthError"></span>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!---card-row--->
                                                      <p></p>
                                                      <!-- send button here -->
                                                      <div class="card-footer bg-transparent mt-auto">
                                                            <div class="btn-list justify-content-end">
                                                                  <span id="previewError"></span>
                                                                  <span id="urlError"></span>
                                                                  <button type="button" name="submit"
                                                                        class="btn btn-ghost-danger active ms-auto"
                                                                        onclick="cal_interest()">

                                                                        Preview
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                              </div>

                              <div class="col-md-7 col-lg-7">
                                    <div class="card" style="height:449px;">
                                          <div class="navbar">
                                                <h3 class="navbar-brand" style="margin-left:20px; font-size:15px"> Loan
                                                      Type:&nbsp;
                                                      <span class="text-danger">{{ $loanType }}</span>
                                                </h3>
                                                <h3 class="navbar-brand" style=" font-size:15px">Duration:&nbsp; <span
                                                            class="text-danger"> {{ $duration }}
                                                            month (s)</span>&nbsp; &nbsp; </h3>
                                          </div>

                                          <div class="card-body">
                                                <div class="loan-datagrid">
                                                      @if($rateType == 'flat rate')
                                                      <div class="datagrid-item">
                                                            <div class="datagrid-title">Principal</div>
                                                            <div class="ms-auto lh-1" id="principal">
                                                                  {{number_format($principal) }}
                                                            </div>
                                                      </div>
                                                      <div class="datagrid-item">
                                                            <div class="datagrid-title">Total Interest</div>
                                                            <div class="datagrid-content" id="interest">
                                                                  {{number_format($annualInterest)}}</div>
                                                      </div>
                                                      <div class="datagrid-item">
                                                            <div class="datagrid-title">Total Due</div>
                                                            <div class="datagrid-content" id="totalDue">
                                                                  {{number_format($totalDue)}}
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
                                                            <div class="ms-auto lh-1" id="principal">
                                                                  {{number_format($principal)}}
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
                                                <h3 class="card-title"><b>Monthly Repayment</b></h3>
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
                                                      @if($rateType == 'simple interest')
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

                                          </div>
                                    </div>
                                    <!---card--->
                              </div>
                              <!---col--->

                              <!---CALCULATE INTEREST START HERE--->
                              @else
                              <div class="container-xl">
                                    <div class="row">
                                          <div class="col-md-5 col-lg-5">
                                                <div class="card">
                                                      <div class="card-body">
                                                            <div class="row">
                                                                  <p></p>
                                                                  <div class="mb-3">
                                                                        <div class="form-label">Selected Member (s)
                                                                        </div>
                                                                        <select type="text" class="form-select"
                                                                              id="members" value="" multiple>
                                                                              <option value="">{{$members}}</option>
                                                                        </select>
                                                                  </div>
                                                                  <div class="col-md">
                                                                        <div class="form-label required">Amount </div>
                                                                        <input type="text" name="amount" id="amount"
                                                                              class="form-control"
                                                                              data-mask="00000000,00"
                                                                              data-mask-visible="true"
                                                                              placeholder="Enter the amount you are requsting"
                                                                              data-mask-reverse="true"
                                                                              autocomplete="off" value="{{ $principal}}"
                                                                              disabled>

                                                                  </div>
                                                            </div>
                                                            <!---card-row--->

                                                            <p></p>
                                                            <div class="row g-3">
                                                                  <div class="col-md">
                                                                        <div class="form-label required">Choose Loan
                                                                              Type </div>
                                                                        <select class="form-select" name="ratetype"
                                                                              id="ratetype" disabled>
                                                                              <option value="{{$loanTypeID}}">
                                                                                    {{$loanType}}</option>
                                                                        </select>
                                                                  </div>

                                                                  <div class="col-md">
                                                                        <div class="form-label required">Duration
                                                                              (months)
                                                                        </div>
                                                                        <input type="number" name="duration"
                                                                              value="{{$duration}}" class="form-control"
                                                                              disabled>

                                                                  </div>
                                                            </div>
                                                            <!---card-row--->
                                                            <p></p>
                                                            <!-- send button here -->
                                                            <div class="card-footer bg-transparent mt-auto">
                                                                  <div class="btn-list justify-content-end">
                                                                        <a href="{{ url('cooperative-create-loan') }}"
                                                                              class="btn">Cancel</a>
                                                                        <button type="button" name="submit"
                                                                              class="btn btn-ghost-danger active ms-auto"
                                                                              onclick="cal_interest()" disabled>

                                                                              Preview
                                                                        </button>
                                                                  </div>
                                                            </div>


                                                      </div>
                                                </div>
                                          </div>

                                          <div class="col-md-7 col-lg-7">
                                                <div class="card">
                                                      <div class="navbar">
                                                            <h3 class="navbar-brand"
                                                                  style="margin-left:20px; font-size:15px"> Loan
                                                                  Type:&nbsp;
                                                                  <span class="text-danger">{{ $loanType }}</span>
                                                            </h3>
                                                            <h3 class="navbar-brand" style=" font-size:15px">
                                                                  Duration:&nbsp; <span class="text-danger">
                                                                        {{ $duration }}
                                                                        month (s)</span>&nbsp; &nbsp; </h3>
                                                      </div>

                                                      <div class="card-body">
                                                            <div class="loan-datagrid">
                                                                  @if($rateType == 'flat rate')
                                                                  <div class="datagrid-item">
                                                                        <div class="datagrid-title">Principal</div>
                                                                        <div class="ms-auto lh-1" id="principal">
                                                                              {{number_format($principal) }}
                                                                        </div>
                                                                  </div>
                                                                  <div class="datagrid-item">
                                                                        <div class="datagrid-title">Total Interest</div>
                                                                        <div class="datagrid-content" id="interest">
                                                                              {{number_format($annualInterest)}}</div>
                                                                  </div>
                                                                  <div class="datagrid-item">
                                                                        <div class="datagrid-title">Total Due</div>
                                                                        <div class="datagrid-content" id="totalDue">
                                                                              {{number_format($totalDue)}}
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
                                                                        <div class="ms-auto lh-1" id="principal">
                                                                              {{number_format($principal)}}
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
                                                            <h3 class="card-title"><b>Monthly Repayment</b></h3>
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
                                                                  $totalMonthlyDue += $monthlyPrincipal +
                                                                  $monthlyInterest ;
                                                                  @endphp
                                                                  <div class="datagrid-item">
                                                                        <div class="datagrid-title">Monthly Principal
                                                                        </div>
                                                                        <div class="ms-auto lh-1" id="principal">
                                                                              {{ number_format($monthlyPrincipal) }}
                                                                        </div>
                                                                  </div>
                                                                  <div class="datagrid-item">
                                                                        <div class="datagrid-title">Monthly Interest
                                                                        </div>
                                                                        <div class="datagrid-content" id="interest">
                                                                              {{ number_format($monthlyInterest) }}
                                                                        </div>
                                                                  </div>
                                                                  <div class="datagrid-item">
                                                                        <div class="datagrid-title">Monthly Due</div>
                                                                        <div class="datagrid-content" id="totalDue">
                                                                              {{number_format($totalMonthlyDue)}}</div>
                                                                  </div>
                                                                  @endif
                                                                  @if($rateType == 'simple interest')
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
                                                                  $totalMonthlyDue += $monthlyPrincipal +
                                                                  $monthlyInterest ;
                                                                  @endphp
                                                                  <div class="datagrid-item">
                                                                        <div class="datagrid-title">Monthly Principal
                                                                        </div>
                                                                        <div class="ms-auto lh-1" id="principal">
                                                                              {{number_format( $monthlyPrincipal) }}
                                                                        </div>
                                                                  </div>
                                                                  <div class="datagrid-item">
                                                                        <div class="datagrid-title">Monthly Interest
                                                                        </div>
                                                                        <div class="datagrid-content" id="interest">
                                                                              {{number_format( $monthlyInterest) }}
                                                                        </div>
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
                                                            <form action="{{ route('cooperative-add-loan') }}"
                                                                  method="post">
                                                                  @csrf
                                                                  <input type="hidden" name="memberID"
                                                                        value="{{$memberID}}">
                                                                  <input type="hidden" name="principal"
                                                                        value="{{$principal}}">
                                                                  <input type="hidden" name="annual_interest"
                                                                        value="{{$annualInterest}}">
                                                                  <input type="hidden" name="total_due"
                                                                        value="{{$totalDue}}">

                                                                  <input type="hidden" name="ratetype"
                                                                        value="{{$loanTypeID}}">
                                                                  <input type="hidden" name="duration"
                                                                        value="{{$duration}}">

                                                                  <input type="hidden" name="monthly_principal"
                                                                        value="{{$monthlyPrincipal}}">
                                                                  <input type="hidden" name="monthly_interest"
                                                                        value="{{$monthlyInterest}}">
                                                                  <input type="hidden" name="monthly_due"
                                                                        value="{{$totalMonthlyDue}}">

                                                                  <!-- send button here -->
                                                                  <div class="card-footer bg-transparent mt-auto">
                                                                        @if($duration > $maxTenure )

                                                                        <div class="btn-list justify-content-end">
                                                                              <span class="text-danger"><b>Maximum
                                                                                          duration for this
                                                                                          loan type
                                                                                          is: {{$maxTenure}}
                                                                                          month(s)</b></span>
                                                                              <button type="submit" name="submit"
                                                                                    class="btn btn-ghost-danger active ms-auto"
                                                                                    disabled>
                                                                                    Request Loan
                                                                              </button>
                                                                        </div>
                                                                        @else
                                                                        <!-- <label class="form-check">
                                                                              <input class="form-check-input" type="checkbox"
                                                                                    name="service_fee">
                                                                              <span class="form-check-label">
                                                                                    I accept to pay LascocoMart one time service fee of 200 for
                                                                                    this
                                                                                    loan.
                                                                              </span>
                                                                        </label> -->

                                                                        <p></p>

                                                                        <div class="btn-list justify-content-end">
                                                                              <button type="submit" name="submit"
                                                                                    class="btn btn-ghost-danger active ms-auto">
                                                                                    Send Request
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
                                          <!---col--->
                                    </div>
                              </div>
                              @endif
                              <script>
                              function cal_interest(element) {
                                    let id = document.getElementById('ratetype').value;
                                    let amount = document.getElementById('amount').value;
                                    let duration = document.getElementById('loanTenure').value;
                                    var selected = Array.from(members.options).filter(function(option) {
                                          return option.selected;
                                    }).map(function(option) {
                                          return option.value;
                                    });

                                    if (selected == null || selected == "" || selected == 0) {
                                          document.getElementById('memberError').style.color = 'red';
                                          document.getElementById('memberError').innerHTML = 'Member name can not be empty';

                                    } else {
                                          document.getElementById('memberError').innerHTML = '';
                                    }

                                    if (amount == null || amount == "" || amount == 0) {
                                          document.getElementById('amountError').style.color = 'red';
                                          document.getElementById('amountError').innerHTML = 'amount can not be empty';

                                    } else {
                                          document.getElementById('amountError').innerHTML = '';
                                    }

                                    // if (id == null || id == "" || id == 0) {
                                    //       document.getElementById('loanError').style.color = 'red';
                                    //       document.getElementById('loanError').innerHTML = 'choose  a loan type';
                                    //       return false;

                                    // } else {
                                    //       document.getElementById('loanError').innerHTML = '';
                                    // }

                                    if (duration == null || duration == "" || duration == 0) {
                                          document.getElementById('monthError').style.color = 'red';
                                          document.getElementById('monthError').innerHTML = 'duration can not empty';
                                          return false;

                                    } else {
                                          document.getElementById('monthError').innerHTML = ' ';
                                          var url = "{{ URL('calculate-member-interest/') }}" + "/" + amount + "/" +
                                              
                                                duration + "/" +
                                                selected;
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