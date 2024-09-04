@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Order
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Order History</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                           
                              <a href="#" class="btn btn-danger d-sm-none btn-icon" data-bs-toggle="modal"
                                    data-bs-target="#modal-request-loan" aria-label="Request Loan">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                   
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
                  <div class="col-sm-6 col-lg-6">
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
                              <div class="card-header">
                                    <h3 class="card-title">My Order (s)</h3>
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
                                                <!--search text here -->
                                                Search:
                                                <div class="ms-2 d-inline-block">
                                                      <form action="/dashboard" method="GET" role="search">
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
                                                                  type="checkbox" aria-label="Select all invoices"></th>
                                                      <th class="w-1">Date
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                  class="icon icon-sm icon-thick" width="24" height="24"
                                                                  viewBox="0 0 24 24" stroke-width="2"
                                                                  stroke="currentColor" fill="none"
                                                                  stroke-linecap="round" stroke-linejoin="round">
                                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                  <path d="M6 15l6 -6l6 6" />
                                                            </svg>
                                                      </th>
                                                      <th>Name</th>
                                                      <th>Amount</th>
                                                      <th>Order Number</th>
                                                      <th>Status</th>
                                                      <th></th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($orders as $order)
                                                <tr>
                                                      <td><input class="form-check-input m-0 align-middle"
                                                                  type="checkbox" aria-label="Select"></td>
                                                      <td><span
                                                                  class="text-secondary">{{ date('m/d/Y', strtotime($order->date))}}</span>
                                                      </td>

                                                      <td>{{$order->fname}}
                                                            {{$order->lname}}</td>

                                                      <td>{{ number_format($order->grandtotal) }}</td>
                                                      <td>{{$order->order_number }}</td>
                                                      <td>
                                                            @if($order->status =='approved')
                                                            <span class="badge bg-azure-lt">{{$order->status}}</span>

                                                            @elseif($order->status =='paid')
                                                            <span class="badge bg-green-lt">{{$order->status}}</span>

                                                            @elseif($order->status =='pending')
                                                            <span class="badge bg-purple-lt">{{$order->status}}</span>

                                                            @elseif($order->status =='cancel')
                                                            <span class="badge bg-red-lt">{{$order->status}}</span>

                                                            @elseif($order->status =='awaits approval')
                                                            <span class="badge bg-yellow-lt">{{$order->status}}</span>


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
                                                                        <a class="dropdown-item"
                                                                              href="member_invoice/{{ $order->order_number }}">
                                                                              View
                                                                        </a>

                                                                        @if($order->status == 'approved')
                                                                        @elseif($order->status == 'cancel')
                                                                        @elseif($order->status == 'paid')
                                                                        @else

                                                                        <a href="cancel-order/{{ $order->id }}"
                                                                              class="dropdown-item">Cancel</a>

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

                                          Showing
                                          {{ ($orders->currentPage() - 1) * $orders->perPage() + 1; }} to
                                          {{ min($orders->currentPage()* $orders->perPage(), $orders->total()) }}
                                          of
                                          {{$orders->total()}} entries
                                    </p>

                                    <ul class="pagination m-0 ms-auto">
                                          @if(isset($orders))
                                          @if($orders->currentPage() > 1)
                                          <li class="page-item ">
                                                <a class="page-link text-danger" href="{{ $orders->previousPageUrl() }}"
                                                      tabindex="-1" aria-disabled="true">
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


                                          <li class="page-item">
                                                {{ $orders->appends(compact('perPage'))->links()  }}
                                          </li>
                                          @if($orders->hasMorePages())
                                          <li class="page-item">
                                                <a class="page-link text-danger" href="{{ $orders->nextPageUrl() }}">
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
                  <!---- col-12 --->

            </div>
            <!---row--->

      </div>
      <!---container--->
</div>
<!---page-body--->


<script>
document.getElementById('pagination').onchange = function() {
      window.location = "{!! $orders->url(1) !!}&perPage=" + this.value;
};
</script>


@endsection