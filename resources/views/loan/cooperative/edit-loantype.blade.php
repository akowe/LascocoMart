@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Edit LoanType
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block ">Edit
                              </span>
                              <span class=" d-sm-block d-md-none ">
                              </span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block">

                              </span>
                              <a href="{{ url('cooperative-loan-type') }}" class="btn btn-danger d-none d-sm-inline-block">
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
                                    View Loan Type (s)

                              </a>
                              <a href="{{ url('cooperative-loan-type') }}" class="btn btn-danger d-sm-none btn-icon"
                                    data-bs-toggle="modal" data-bs-target="#modal-fund" aria-label="Create new report">
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

<div class="page-body">
      <div class="container-xl">
            <div class="pb-3">
            <p><small class="text-muted"><strong class="text-danger">Flat/Fixed Rate</strong>: Admin
                                    get's fixed
                                    annual interest regardless of the loan duration. <strong class="text-danger ">Simple
                                          Rate</strong>: The higher the loan duration, the more interest
                                    admin get's.
                              </small></p>
                  <p class="text-danger"></p>
            </div>
            <!-- row -->
            <form action="{{ url('admin-update-loan-type/'.$loantype->id) }}" method="POST">
                  <div class="card">
                        <div class="card-body">
                              <div class="row">
                                    <div class="col-md-6 ">
                                          @csrf
                                          @method('PUT')

                                          <div class="form-group">
                                                <p></p>
                                                <div class="form-label">Name</div>
                                                <input type="text" value="{{$loantype->name}}" name="loantype"
                                                      class="form-control" disabled>
                                          </div>


                                    </div>

                                    <div class="col-md-6">
                                          <div class="form-group">
                                                <p></p>
                                                <div class="form-label required">Rate type <i class="">(Choose)</i></div>
                                                <select name="rate_type" id="" class="form-control">
                                                                        <option  value="{{$loantype->rate_type}}">{{$loantype->rate_type}}</option>
                                                                        <option value="flat rate">Flat /
                                                                              Fixed Rate</option>
                                                                        <option value="simple interest">
                                                                              Simple Interest Rate</option>
                                                                  </select>

                                                <!-- <input type="text" value="{{$loantype->rate_type}}" name="rate_type"
                                                      class="form-control"> -->
                                          </div>
                                    </div>


                                    <div class="col-md-3">
                                          <div class="form-group">
                                                <p></p>
                                                <div class="form-label required">Percentage (%)</div>
                                                <input type="text" value="{{$loantype->percentage_rate}}" name="percentage_rate"
                                                      class="form-control">
                                          </div>
                                    </div>

                                    <div class="col-md-3">
                                          <div class="form-group">
                                                <p></p>
                                                <div class="form-label required">Minimum Duration (months)</div>
                                               
                                                <input type="text" value="{{$loantype->min_duration}}" name="mininum_duration"
                                                      class="form-control">
                                          </div>
                                    </div>

                                    <div class="col-md-3">
                                          <div class="form-group">
                                                <p></p>
                                                <div class="form-label required">Maximum Duration (months)</div>
                                                <input type="text" value="{{$loantype->max_duration}}" name="maximum_duration"
                                                      class="form-control">
                                          </div>
                                    </div>

                                    <div class="col-md-3">
                                          <div class="form-group">
                                                <p></p>
                                                <div class="form-label">Guarantor? (optional)</div>
                                                <input type="text" value="{{$loantype->guarantor}}" name="guarantor"
                                                      class="form-control">
                                          </div>
                                    </div>

                                    <div class="col-md-12">
                                          <div class="form-group">
                                                <p></p>
                                                <div class="form-label">Description</div>
                                                <input type="text" value="{{$loantype->description}}" name="description"
                                                      class="form-control">
                                          </div>
                                    </div>

                                    <div class="form-group">
                                          <p></p>
                                          
                                          <button type="submit" class="btn btn-ghost-danger active"><svg
                                                      xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-device-floppy" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                      <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                      <path d="M14 4l0 4l-6 0l0 -4" />
                                                </svg> Save </button>
                                    </div>
                              </div>
                              <!--roww-->
                        </div>
                  </div>
            </form>

      </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
      $('#myTable').DataTable();
});
</script>

@endsection