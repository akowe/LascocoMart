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
                              <li class="breadcrumb-item active" aria-current="page">Funds</li>
                        </ol>
                  </nav>
                  <div class="row">

                        <div class="col-lg-4">
                              <div class="card">
                                    <div class="card-header">
                                         Allocate Funds
                                    </div>
                                    <div class="card-body">
                                          <h4 class="card-title"></h4>
                                          <p class="card-text">A Voucher is same as cash or credit. </p>
                                          <a href="{{ route('show-fundrequest')}}" class="btn btn-danger">
                                               View Funds Request </a>
                                    </div>
                              </div>
                              <!--card-->
                        </div>
                  </div>
            </div>


            <br>
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-lg-12">
                              <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                          <div class="card-header-title">Funds allocated to cooperative</div>

                                    </div>
                                    <div class="card-body collapse show tabel-resposive" >

                                          <table class="table-striped table" id="table">
                                                <thead>
                                                      <tr class="small">
                                                            <th>Date</th>
                                                            <th>cooperative</th>
                                                            <th>Amount</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach($funds as $fund)

                                                      <tr class="small">
                                                            <td>{{ date('d/M/Y', strtotime($fund->created_at))}}
                                                            </td>
                                                            <td class=""> {{$fund['email']}}
                                                            </td>

                                                            <td id="amount">
                                                                  {{ number_format($fund['amount']) }}
                                                            </td>
                                                      </tr>

                                                      @endforeach
                                                </tbody>

                                          </table>
                                    </div>
                              </div>
                        </div><!-- col-12-->
                  </div>
            </div>
</div>
      </div> <!-- section -->

      @endsection