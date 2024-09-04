@extends('layouts.home')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                             History
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Wallet</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
          
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block ">
                                    <a href="#" class="btn d-none ">
                                    </a>
                              </span>
                              <a href="{{ url('wallet')  }}" class="btn btn-danger d-none d-sm-inline-block">
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

                                  View Wallet
                              </a>
                              <a href="{{ url('wallet')  }}" class="btn btn-danger d-sm-none btn-icon">
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
                  <div class="col-12">
                        <div class="card">
                              <div class="card-header">
                                    <h3 class="card-title">Wallet History </h3>
                              </div>
                              <table class="table card-table table-vcenter text-nowrap datatable" id="orders">
                                    <thead>
                                          <tr>
                                                <th class="w-1"><input class="form-check-input m-0 align-middle"
                                                            type="checkbox" aria-label="Select all product">
                                                </th>

                                                <th>Transaction Ref.</th>
                                                <th>Amount</th>
                                                <th>Description </th>
                                                <th>Balance</th>
                                                <th>Date</th>

                                          </tr>
                                    </thead>

                                    <tbody>

                                          @if(empty($data))
                                          @else
                                          @foreach($data as $data)
                                          <tr>
                                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                            aria-label="Select"></td>
                                                <td>{{$data['reference']}}</td>


                                                <td>
                                                      @if(Str::contains($data['narration'], 'CREDIT'))
                                                      {{$data['amount']}} <small> <span
                                                                  class="badge bg-green-lt">Credit</span></small>
                                                      @else
                                                      {{$data['amount']}} <small><span
                                                                  class="badge bg-danger-lt">Debit</span></small>
                                                      @endif
                                                </td>

                                                <td>{{$data['narration']}}</td>
                                                <td>{{$data['balance']}}</td>
                                                <td>{{ date('m/d/Y', strtotime($data['transaction_date']))}}
                                                </td>

                                          </tr>
                                          @endforeach

                                          @endif
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection