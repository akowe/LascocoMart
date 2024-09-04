@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Wallet History
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Wallet</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  @if(empty($checkUser))
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
                              <a href="{{ url('create-loan-wallet')  }}" class="btn btn-danger d-sm-none btn-icon">
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

                                    <div class="input-group " id="show_hide_wallet">
                                          <span class="input-group-text">
                                                Balance
                                          </span>
                                          <input type="password" value="₦ " class="btn" style="width:140px; color:#00;"
                                                disabled>
                                          <span class="input-group-text">
                                                <a href="" class="text-secondary">
                                                      <i class="fa fa-eye-slash"></i>
                                                </a>
                                          </span>
                                    </div>
                              </span>
                              <a href="#" class="btn btn-danger d-none d-sm-inline-block" data-bs-toggle="modal"
                                    data-bs-target="#modal">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                                    Fuund Wallet
                              </a>
                              <a href="#" class="btn btn-danger d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal" aria-label="">
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
                  @if(session('no-wallet'))
                  <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="d-flex">
                              <div>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                          fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                          <path d="M12 8v4" />
                                          <path d="M12 16h.01" />
                                    </svg>

                              </div>
                              <div> {{ session('no-wallet') }}</div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>
                  @endif

                  @if(session('success'))
                  <div class="alert alert-important alert-success alert-dismissible" role="alert">
                        <div class="d-flex">
                              <div>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                          fill="none" stroke-linecap="round" stroke-linejoin="round">
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

                  @if(session('wallet'))
                  <div class="alert alert-important alert-success alert-dismissible" role="alert">
                        <div class="d-flex">
                              <div>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                          fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                          <path d="M12 8v4" />
                                          <path d="M12 16h.01" />
                                    </svg>

                              </div>
                              <div> {{ session('wallet') }}</div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>
                  @endif
            </div>
      </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection