@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Sales History
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Overview</span>
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block ">
                                    <a href="#" class="btn d-none ">

                                    </a>
                              </span>
                              <a href="{{url('fmcg-new-product') }}" class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                                    Add New Product
                              </a>
                              <a href="{{url('fmcg-new-product') }}" class="btn btn-danger d-sm-none btn-icon"
                                    aria-label="product">
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
                  <div class="col-12">
                        <div class="row row-cards">
                              <div class="col-sm-4 col-lg-4">
                                    <div class="card card-sm">
                                          <div class="card-body">
                                                <div class="row align-items-center">
                                                      <div class="col-auto">

                                                            <span class="bg-success text-white avatar">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-currency-naira"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M7 18v-10.948a1.05 1.05 0 0 1 1.968 -.51l6.064 10.916a1.05 1.05 0 0 0 1.968 -.51v-10.948" />
                                                                              <path d="M5 10h14" />
                                                                              <path d="M5 14h14" />
                                                                        </svg>
                                                            </span>
                                                      </div>
                                                      <div class="col">
                                                            <div class="font-weight-medium">
                                                                        {{ number_format($countPaidOrders->sum('seller_price')) }}
                                                                        Sales
                                                            </div>
                                                            <div class="text-secondary">
                                                                  {{ $countSoldProducts->count() }} products
                                                            </div>
                                                      </div>
                                                      <div class="col-auto">
                                                            <div class="dropdown">
                                                                  <a class="text-secondary" href="#"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-dots-vertical"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                                              <path
                                                                                    d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                                              <path
                                                                                    d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                                        </svg>
                                                                  </a>
                                                                  <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item active"
                                                                              href="{{ url('fmcg-sales') }}">Last 7
                                                                              days</a>
                                                                        <a class="dropdown-item"
                                                                              href="{{ url('fmcg-sales') }}">Last 30
                                                                              days</a>
                                                                        <a class="dropdown-item"
                                                                              href="{{ url('fmcg-sales') }}">Last 3
                                                                              months</a>
                                                                  </div>
                                                            </div>
                                                      </div>

                                                </div>
                                          </div>
                                    </div>
                              </div>


                              <div class="col-sm-4 col-lg-4">
                                    <div class="card card-sm">
                                          <div class="card-body">
                                                <div class="row align-items-center">
                                                      <div class="col-auto">
                                                            <span class="bg-primary text-white avatar">
                                                                        <!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon" width="24" height="24"
                                                                              viewBox="0 0 24 24" stroke-width="2"
                                                                              stroke="currentColor" fill="none"
                                                                              stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                              <path
                                                                                    d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                              <path d="M17 17h-11v-14h-2" />
                                                                              <path d="M6 5l14 1l-1 7h-13" />
                                                                        </svg>
                                                            </span>
                                                      </div>
                                                      <div class="col">
                                                            <div class="font-weight-medium">
                                                                        {{ $countPaidOrders->count() }} Customer
                                                                        Order(s)</a>
                                                            </div>
                                                            <div class="text-secondary">
                                                                  {{  $countShippedItem->count() }} shipped
                                                            </div>
                                                      </div>
                                                      <div class="col-auto">
                                                            <div class="dropdown">
                                                                  <a class="text-secondary" href="#"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-dots-vertical"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                                              <path
                                                                                    d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                                              <path
                                                                                    d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                                        </svg>
                                                                  </a>
                                                                  <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item active"
                                                                              href="{{ url('fmcg-sales') }}">Last
                                                                              7
                                                                              days</a>
                                                                        <a class="dropdown-item"
                                                                              href="{{ url('fmcg-sales') }}">Last
                                                                              30
                                                                              days</a>
                                                                        <a class="dropdown-item"
                                                                              href="{{ url('fmcg-sales') }}">Last
                                                                              3
                                                                              months</a>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>




                        </div>
                        <!---- row-cards --->
                  </div>
                  <!---col-12 --->
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

                  <div class="col-12">
                        <div class="card">
                              <div class="card-header">
                                    <h3 class="card-title">Sales </h3>
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
                                                      <form action="/fmcg-sales" method="GET" role="search">
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
                                                      <th>Item </th>
                                                      <th>Qty. </th>
                                                      <th>My Unit Price</th>
                                                      <th>Amount </th>
                                                      <th>Order Number</th>
                                                      <th>Status</th>
                                                      <th></th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($sales as $order)
                                                <tr>
                                                      <td><input class="form-check-input m-0 align-middle"
                                                                  type="checkbox" aria-label="Select"></td>
                                                      <td><span
                                                                  class="text-secondary">{{ date('m/d/Y', strtotime($order->date))}}</span>
                                                      </td>

                                                      <td>{{$order->prod_name}}
                                                            <div class="col-auto">
                                                                  <span class="avatar avatar-sm">
                                                                        <img src="{{ $order->image }}" alt="">
                                                                  </span>
                                                            </div>
                                                      </td>
                                                      <td>{{$order->order_quantity}}</td>
                                                      <td>{{ number_format($order->seller_price) }}</td>
                                                      <td>@php
                                                            $total = 0;
                                                            @endphp
                                                            @php
                                                            $total += $order->seller_price * $order->order_quantity
                                                            @endphp
                                                            {{ number_format($total ) }}
                                                      </td>
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
                                                                              href="fmcg-sales-invoice/{{ $order->order_number }}">
                                                                              Customer Invoice
                                                                        </a>

                                                                        @if(empty($order->delivery_status) &&
                                                                        $order->status =='paid')
                                                                        @csrf
                                                                        <form action="{{ url('fmcg-order-delivery') }}/{{ $order->id}}/{{ $order->product_id }}"
                                                                              method="POST">
                                                                              @csrf
                                                                              <input type="hidden" name="order_id" id=""
                                                                                    value="{{ $order->id}}">
                                                                              <button class="dropdown-item"
                                                                                    type="submit">Shipped</button>
                                                                        </form>

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

                                          Showing
                                          {{ ($sales->currentPage() - 1) * $sales->perPage() + 1; }} to
                                          {{ min($sales->currentPage()* $sales->perPage(), $sales->total()) }}
                                          of
                                          {{$sales->total()}} entries
                                    </p>

                                    <ul class="pagination m-0 ms-auto">
                                          @if(isset($sales))
                                          @if($sales->currentPage() > 1)
                                          <li class="page-item ">
                                                <a class="page-link text-danger" href="{{ $sales->previousPageUrl() }}"
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
                                                {{ $sales->appends(compact('perPage'))->links()  }}
                                          </li>
                                          @if($sales->hasMorePages())
                                          <li class="page-item">
                                                <a class="page-link text-danger" href="{{ $sales->nextPageUrl() }}">
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
            <!--row --->
      </div>
      <!---container --->
</div>

<script>
document.getElementById('pagination').onchange = function() {
      window.location = "{!! $sales->url(1) !!}&perPage=" + this.value;
};
</script>
@endsection