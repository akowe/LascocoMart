@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Loan
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">History</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-none d-sm-inline">
                                    <a href="#" class="btn d-none">

                                    </a>
                              </span>
                              <a href="{{ url('member-request-loan') }}"
                                    class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                                    Request Loan
                              </a>
                              <a href="{{ url('member-request-loan') }}" class="btn btn-danger d-sm-none btn-icon">
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

                  <!-- Alert start --->
                  <div class="container-xl">
                        <div class="row ">
                              <div class="col-12">
                                    <p></p>
                                    @if(session('loan'))
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
                                                <div> {{ session('loan') }}</div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @endif

                              </div>
                        </div>
                  </div>
                  <!-- Alert stop --->
                  <div class="container-xl">
                        <div class="card card-lg ">
                              <div class="card-body">
                                    <div class="row">
                                          <div class="loan-datagrid">
                                                <div class="datagrid-item">
                                                      <div class="datagrid-title">Existing Loan</div>
                                                      <div class="ms-auto lh-1" id="principal">
                                                            <strong>₦{{number_format($loanPrincipal) }}</strong>
                                                      </div>
                                                </div>
                                                <div class="datagrid-item">
                                                      <div class="datagrid-title">Interest</div>
                                                      <div class="ms-auto lh-1" id="interest">
                                                            ₦{{number_format($loanInterest) }}
                                                      </div>
                                                </div>

                                                <div class="datagrid-item">
                                                      <div class="datagrid-title">Next Due Date</div>
                                                      <div class="ms-auto lh-1" id="interest">
                                                            {{ $nextDueDate }}
                                                      </div>
                                                </div>
                                                <div class="datagrid-item">
                                                      <div class="datagrid-title">Amount Due</div>
                                                      @foreach($monthlyDueLoan as $due)
                                                      <div class="ms-auto lh-1" id="interest">
                                                        
                                                             @if($loop->first)
                                                             ₦{{round($due->monthly_due, 2)}}
                                                             <p></p>
                                                             <a href="" class="btn">Pay Now</a>
                                                             @endif 
                                                      </div>
                                                      @endforeach
                                                </div>

                                              
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="col-12">
                        <div class="card">
                              <div class="card-header">
                                    <h3 class="card-title">Monthly repayment </h3>
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
                                                      <th>Monthly Due</th>
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
                                                      <td>{{round($data->monthly_principal, 2)}}</td>
                                                      <td>{{round($data->monthly_interest, 2)}}</td>
                                                      <td>{{round($data->monthly_due, 2)}}</td>
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
                                                                              href="loan-statement/{{$data->id}}">
                                                                              View
                                                                        </a>
                                                                        @if($data->loan_status =='approved')
                                                                        @elseif($data->loan_status =='payout')
                                                                        @else 
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
      </div>
</div>
@endsection