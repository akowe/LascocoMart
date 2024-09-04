@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              PayOut Loan
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block ">Approval Level : &nbsp;
                                    <span class="text-danger"> {{$checkApprovalLevel }}</span>
                              </span>
                              <span class=" d-sm-block d-md-none ">
                                    Approval Level: <span class="text-danger"> {{$checkApprovalLevel}}</span>
                              </span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block">
                                    <a href="{{ url('cooperative-loan') }}" class="btn">
                                          Back to loan page
                                    </a>

                              </span>
                              <a href="{{ url('admin-loan-statement',$loan_id)}}" class="btn btn-ghost-danger active d-none d-sm-inline-block">
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
                                    View Loan Details

                              </a>
                              <a href="{{ route('admin-loan-statement',$loan_id)}}" class="btn btn-ghost-danger active d-sm-none btn-icon"
                                    data-bs-toggle="modal" data-bs-target="#modal-fund" aria-label="Create new report">
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
                                    @if (session('status'))
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
                                                      {{ session('status') }}
                                                </div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @endif

                                    @if (session('approval'))
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
                                                      {{ session('approval') }}
                                                </div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @endif
                              </div>
                        </div>
                  </div>
                  <!-- Alert stop --->
                  <div class="col-md-6 col-lg-6">
                        <div class="card">
                              <div class="card-body">

                                    <div class="row g-3">
                                          <div class="col-md">
                                                <div class="form-label">Member </div>
                                                <input type="text" class="form-control" value="{{ $loanBeneficiary}}"
                                                      disabled>
                                          </div>

                                          <div class="col-md">
                                                <div class="form-label">Principal </div>
                                                <input type="text" class="form-control"
                                                      value="{{number_format($loanPrincipal)}}" disabled>
                                          </div>
                                    </div>
                                    <p></p>
                                    <form method="post" action="{{ url('calulate-loan-repayment/'.$loan_id) }}">
                                          @csrf
                                          <div class="row g-3">
                                                <div class="col-md">
                                                      <div class="form-label">Duration </div>
                                                      <input type="text" class="form-control"
                                                            value="{{ $loanDuration}} month (s)" disabled>
                                                </div>

                                                <div class="col-md">
                                                      <div class="form-label required">Enter Payment Date </div>
                                                      <div class="input-icon mb-2">
                                                            <input class="form-control " placeholder="Select a date"
                                                                  id="datepicker-icon" name="payOutDate"
                                                                  value="{{$payOutDate}}">
                                                            <span class="input-icon-addon">
                                                                  <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none">
                                                                        </path>
                                                                        <path
                                                                              d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z">
                                                                        </path>
                                                                        <path d="M16 3v4"></path>
                                                                        <path d="M8 3v4"></path>
                                                                        <path d="M4 11h16"></path>
                                                                        <path d="M11 15h1"></path>
                                                                        <path d="M12 15v3"></path>
                                                                  </svg>
                                                            </span>
                                                      </div>
                                                      <span id="dtaeError"></span>
                                                </div>
                                          </div>
                                          <p></p>
                                          <!-- send button here -->
                                          <div class="card-footer bg-transparent mt-auto">
                                                <div class="btn-list justify-content-end">
                                                      <button type="button" onclick="calStartEndDate()" name="submit"
                                                            class="btn btn-ghost-danger active ms-auto">
                                                            Confirm
                                                      </button>
                                                </div>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
                  <!--col-6 --->

                  <div class="col-md-6 col-lg-6">
                        <div class="card">
                              <div class="card-body">
                                    <div class="row g-3">
                                          <div class="col-md">
                                                <div class="page-title">Repayment start's <span class="text-danger">
                                                            &nbsp;{{$loanRepaymentStart}} month </span>&nbsp;after
                                                      payment date</div>
                                          </div>
                                    </div>
                                    <p></p>
                                    <form action="{{route('cooperative-loan-repayment')}}"  method ="post">
                                          @csrf
                                          <div class="row g-3">

                                                <div class="col-md">
                                                      <div class="form-label">Loan Repayment Start Date</div>
                                                      <input type="text" class="form-control"
                                                            value="{{$repaymentStartDate}}" disabled>

                                                </div>

                                                <div class="col-md">
                                                      <div class="form-label">Repayment End Date</div>
                                                      <input type="text" class="form-control"
                                                            value="{{$repaymentEndDate}}" disabled>

                                                </div>
                                                <p></p>
                                                @if($repaymentStartDate == '' && $repaymentEndDate =='' )
                                                <!-- send button here -->
                                                <div class="card-footer bg-transparent mt-auto">
                                                      <div class="btn-list justify-content-end">
                                                            <button type="submnit" name="submit"
                                                                  class="btn btn-ghost-danger active ms-auto" disabled>
                                                                  <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-device-floppy"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none" />
                                                                        <path
                                                                              d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                        <path
                                                                              d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                        <path d="M14 4l0 4l-6 0l0 -4" />
                                                                  </svg>
                                                                  Save
                                                            </button>
                                                      </div>
                                                </div>
                                                @else
                                                <input type="hidden" name="loan" value="{{$loan_id}}">
                                                <input type="hidden" name="startDate"
                                                            value="{{$repaymentStartDate}}">
                                                <input type="hidden" name="endDate"
                                                            value="{{$repaymentEndDate}}" >
                                                <div class="card-footer bg-transparent mt-auto">
                                                      <div class="btn-list justify-content-end">
                                                            <button type="submnit" name="submit"
                                                                  class="btn btn-ghost-danger active ms-auto">
                                                                  <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon icon-tabler icon-tabler-device-floppy"
                                                                        width="24" height="24" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none" />
                                                                        <path
                                                                              d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                        <path
                                                                              d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                        <path d="M14 4l0 4l-6 0l0 -4" />
                                                                  </svg>
                                                                  Save
                                                            </button>
                                                      </div>
                                                </div>
                                                @endif

                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
                  <!--col-6 --->

            </div> <!-- row deck --->
      </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

<script>
function calStartEndDate() {
      let id = @json($loan_id);
      let date = document.getElementById('datepicker-icon').value;
      let loandate =  moment(date,'DD/MM/YYYY').format('YYYY-MM-DD');

      if (date == null || date == "" || date == 0) {
            document.getElementById('dtaeError').style.color = 'red';
            document.getElementById('dtaeError').innerHTML = 'payment date can not be empty';

      } else {
            document.getElementById('dtaeError').innerHTML = ' ';
            var url = "{{ URL('calulate-loan-repayment/') }}" + "/" + id + "/" + loandate;
            location.href = url;
      }

}
</script>
@endsection