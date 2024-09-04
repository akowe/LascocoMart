@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Wallet 
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Wallet</span>
                        </h2>
                  </div>
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

                                    <div class="input-group " id="show_hide_wallet">
                                          <span class="input-group-text">
                                                Balance
                                          </span>
                                          <input type="password" value="₦ {{number_format($accountBalance)}}"
                                                class="btn text-secondary" style="width:140px;">
                                          <span class="input-group-text">
                                                <a href="" class="text-secondary">
                                                      <i class="fa fa-eye-slash"></i>
                                                </a>
                                          </span>
                                    </div>
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
                              <a href="#" class="btn btn-danger d-sm-none btn-icon" data-bs-toggle="modal"
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

                  @if(session('fund-wallet-error'))
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
                              <div> {{ session('fund-wallet-error') }}</div>
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

                  <!---wallet history --->
                  <div class="col-12">

                        <div class="d-flex">
                              <div class="text-secondary">

                              </div>
                              <div class="ms-auto text-secondary">
                                    <!--search text here -->
                                    Filter:
                                    <div class="ms-2 d-inline-block">
                                          <form action="wallet-history" method="get" role="submit">
                                                @csrf 
                                                <div class="input-group mb-2">
                                                      <div class="row">
                                                            <div class="col-md">
                                                                  From <div class="input-icon mb-2">
                                                                        <span class="input-icon-addon">
                                                                              <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon" width="24" height="24"
                                                                                    viewBox="0 0 24 24" stroke-width="2"
                                                                                    stroke="currentColor" fill="none"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path stroke="none"
                                                                                          d="M0 0h24v24H0z" fill="none">
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
                                                                        <input type="text" class="form-control "
                                                                              placeholder="Select old date"
                                                                              id="datepicker-icon" name="from" value="">
                                                                  </div>
                                                            </div>

                                                            <div class="col-md">
                                                                  To
                                                                  <div class="input-icon mb-2">
                                                                        <span class="input-icon-addon">
                                                                              <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon" width="24" height="24"
                                                                                    viewBox="0 0 24 24" stroke-width="2"
                                                                                    stroke="currentColor" fill="none"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path stroke="none"
                                                                                          d="M0 0h24v24H0z" fill="none">
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
                                                                        <div class="input-group mb-2">
                                                                              <input type="text" class="form-control "
                                                                                    placeholder="Select recent date"
                                                                                    id="datepicker-default" name="to"
                                                                                    value="">
                                                                              <button type="submit" name="submit" class="btn"
                                                                                    type="button">Go!</button>
                                                                        </div>
                                                                  </div>

                                                            </div>
                                                      </div>





                                                </div>
                                          </form>
                                    </div>
                              </div>
                        </div>

                  </div>

               
                  <div class="col-12">
                        <div class="card">
                              <div class="card-header">
                                    <h3 class="card-title">Transaction (s) </h3>
                              </div>
                              <div class="table-responsive" id="card">
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

                                          <tbody>@if(empty($walletTransaction))
                                                @else
                                                @foreach($walletTransaction as $data)
                                                <tr>
                                                      <td><input class="form-check-input m-0 align-middle"
                                                                  type="checkbox" aria-label="Select"></td>
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
                              <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-secondary">


                                    </p>

                                    <ul class="pagination m-0 ms-auto">



                                    </ul>
                              </div>
                        </div>
                        <!--- card-->

                  </div>
            </div>
            <!---row deck--->
      </div>
</div>

<!--- show wallet account modal --->
<div class="modal modal-blur fade" id="modal-showWalletAcount" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title">Add Fund To Wallet </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                        <div class="mb-3">
                              <label class="form-label">Money transfer to this bank account will automatically top
                                    up
                                    your LascocoMart wallet.</label>
                        </div>
                        <div class="row">
                              <div class="row align-items-center">

                                    <div class="col">
                                          <div class="font-weight-medium">

                                                <h4>Account Name</h4>
                                          </div>
                                          <div class="text-secondary">
                                                <h4>{{$WalletAccountName}}</h4>
                                          </div>
                                    </div>
                                    <div class="col-auto">
                                          <a href="" class="text-muted"
                                                onclick="copyAccountName('{{$WalletAccountName}}')">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-copy  " width="24" height="24"
                                                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                      fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                                      <path
                                                            d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                                                </svg>Copy</a>
                                    </div>
                              </div>
                              <hr>
                              <div class="row align-items-center">
                                    <div class="col">
                                          <div class="font-weight-medium">

                                                <h4>Account Number</h4>
                                          </div>
                                          <div class="text-secondary">
                                                <h4>{{$WalletAccountNumber}}</h4>
                                          </div>
                                    </div>
                                    <div class="col-auto">
                                          <a href="" class="text-muted"
                                                onclick="copyAccountNumber('{{$WalletAccountNumber}}')">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-copy  " width="24" height="24"
                                                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                      fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                                      <path
                                                            d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                                                </svg>Copy</a>
                                    </div>
                              </div>
                              <hr>
                              <div class="row align-items-center">
                                    <div class="col">
                                          <div class="font-weight-medium">

                                                <h4>Bank Name</h4>
                                          </div>
                                          <div class="text-secondary">
                                                <h4>{{$WalletBankName}}</h4>
                                          </div>
                                    </div>
                                    <div class="col-auto">
                                          <a href="" class="text-muted" onclick="copyBankName('{{$WalletBankName}}')">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-copy  " width="24" height="24"
                                                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                      fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M7 7m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" />
                                                      <path
                                                            d="M4.012 16.737a2.005 2.005 0 0 1 -1.012 -1.737v-10c0 -1.1 .9 -2 2 -2h10c.75 0 1.158 .385 1.5 1" />
                                                </svg>Copy</a>
                                    </div>
                              </div>
                        </div>
                        <!--- row--->
                        <!---save text for sharing -->
                        <div class="row" style="display:none;">
                              <textarea id="text" type="text">
                                    Account Name:
                                    {{$WalletAccountName}}
                                    
                                    Account Number:
                                    {{$WalletAccountNumber}}

                                    Bank Name:
                                    {{$WalletBankName}}
                              </textarea>

                        </div>
                        <!---end save text for sharing -->

                        <div class="modal-footer">

                              <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                                    Cancel
                              </a>
                              <button type="button" id="btnSave" class="btn btn-danger ms-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send"
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M10 14l11 -11" />
                                          <path
                                                d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                    </svg>
                                    Share account details
                              </button>
                        </div>
                        </form>

                  </div>

            </div>
      </div>
</div>
<!--- end show wallet account modal --->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js">
</script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script>
function checkbalance() {
      var phone = document.getElementById('phone').value;
      var account = document.getElementById('accountNumber').value;

      fetch('https://api.staging.ogaranya.com/v1/2347033141516/wallet/info', {
                  method: 'POST',
                  headers: {
                        'Accept': 'application/json',
                        'Content-type': 'application/json',
                        'token': 'e4f3f028-c0b4-4c9b-b8ef-8be41a7613f6',
                        'publickey': '62f2da03d13992642d5416b3b1977071bf3adfe99a93b8daea6194306b168b84901f49025f25a245f083b0d627c921f5642ff124047e4a143dfe4cc1dd526d1b',
                  },
                  body: JSON.stringify({
                        phone: phone,
                        account: account
                  })
            }).then(response => response.json())
            .then((responseJson) => console.log(responseJson))
            .catch(error => console.log(error));
}

function balance() {
      var url = "{{ route('wallet') }}";
      window.location = url;
}
</script>
@endsection