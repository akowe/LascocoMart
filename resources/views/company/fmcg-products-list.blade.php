@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              All Products
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">FMCG Products</span>

                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <a href="{{ url('add-new-admin') }}" class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                                    New Product
                              </a>
                              <a href="{{ url('add-new-admin') }}" data-bs-toggle="modal"
                                    data-bs-target="#modal-adminAddMember" class="btn btn-danger d-sm-none btn-icon">
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
      <!-- Alert start --->
      <div class="container-xl">
            <div class="row ">
                  <div class="col-12">
                        <p></p>
                        @if(session('approve'))
                        <div class="alert  alert-success alert-dismissible" role="alert">
                              <div class="d-flex">
                                    <div>
                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                      d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                <path d="M12 9v4" />
                                                <path d="M12 17h.01" />
                                          </svg>
                                    </div>
                                    <div> {!! session('approve') !!}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif

                        @if(session('remove'))
                        <div class="alert  alert-success alert-dismissible" role="alert">
                              <div class="d-flex">
                                    <div>
                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                      d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                <path d="M12 9v4" />
                                                <path d="M12 17h.01" />
                                          </svg>
                                    </div>
                                    <div> {!! session('remove') !!}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif


                        @if(session('success'))
                        <div class="alert alert-important alert-success alert-dismissible" role="alert">
                              <div class="d-flex">
                                    <div>
                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                      d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                                                <path d="M12 9v4" />
                                                <path d="M12 17h.01" />
                                          </svg>
                                    </div>
                                    <div> {!! session('success') !!}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif
                  </div>
            </div>
      </div>

      <div class="container-xl">
            <div class="row g-3 ">
                  <div class="col-12">
                        <div class="alert   alert-danger alert-dismissible" role="alert">
                              <div class="d-flex">
                                    <div>
                                          <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                <path d="M12 9h.01" />
                                                <path d="M11 12h1v4h1" />
                                          </svg>

                                    </div>
                                    <div>
                                          Only "Approved" products will be visible on
                                          FMCG  landing page. <span class="text-dark">"Remove" product; if you want to stop products from
                                          being visible on FMCG landing
                                          page.</span>


                                    </div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>

                  </div>


            </div>
      </div>


      <div class="container-xl">
            <div class="row row-deck row-cards">
                  <div class="col-12">
                        <div class="card">
                              <div class="card-header">
                                    <h3 class="card-title"> </h3>
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
                                                            <option value="10" @if($perPage==10) selected @endif>
                                                                  10
                                                            </option>
                                                            <option value="25" @if($perPage==25) selected @endif>
                                                                  25
                                                            </option>
                                                            <option value="50" @if($perPage==50) selected @endif>
                                                                  50
                                                            </option>
                                                      </select>
                                                </div>
                                                records
                                          </div>
                                          <div class="ms-auto text-secondary">
                                                Search:
                                                <div class="ms-2 d-inline-block">

                                                      <form action="{{ route('fmcg-products-list') }}" method="GET"
                                                            role="search">
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
                              <div class="table-responsive " id="card">
                                    <table class="table-striped table" id="table">
                                          <thead>
                                                <tr class="small">
                                                      <th class="small"></th>
                                                      <th class="small">Date</th>
                                                      <th>FMCG </th>
                                                      <th>Product</th>
                                                      <th>FMCG's Price</th>
                                                      <th>Price</th>
                                                      <th>Images</th>
                                                      <th>Status</th>

                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($products as $product)
                                                <tr class="small">
                                                      <td>
                                                            <span class="dropdown">
                                                                  <button
                                                                        class="btn dropdown-toggle align-text-top text-danger"
                                                                        data-bs-boundary="viewport"
                                                                        data-bs-toggle="dropdown"
                                                                        style="padding:0;">Action</button>

                                                                  <div class="dropdown-menu">
                                                                        <p>
                                                                              <a href="edit-fmcg-product/{{$product->id}}"
                                                                                    class="dropdown-item text-danger">
                                                                                    <i class="fa fa-edit"></i>&nbsp;
                                                                                    Edit
                                                                              </a>
                                                                        </p>

                                                                        @if($product->prod_status ==
                                                                        'approve')
                                                                        <p> <a href=""
                                                                                    class="dropdown-item text-success">
                                                                                    <i class="fa fa-check"></i>
                                                                              </a></p>
                                                                        @else
                                                                        <p>
                                                                        <form method="POST" action="/approved"
                                                                              accept-charset="UTF-8"
                                                                              class="dropdown-item " role="form"
                                                                              style="display:block;">

                                                                              @csrf
                                                                              <input type="hidden" name="id"
                                                                                    value="{{$product->id }}">
                                                                                    <input type="hidden" name="seller_id"
                                                                                    value="{{$product->seller_id }}">
                                                                              <button type="submit" name="submit"
                                                                                    class="btn btn-outline-success btn-sm">
                                                                                    <i class="fa fa-check"></i>&nbsp;
                                                                                    Approve</button>
                                                                        </form>
                                                                        </p>
                                                                        @endif

                                                                        <p>
                                                                        <form action="{{ route('coopremove_product', [$product->id ])}}"
                                                                              method="get" name="submit"
                                                                              class="dropdown-item ">
                                                                              @csrf

                                                                              <input type="hidden" name="id"
                                                                                    value="{{$product->id }}">
                                                                              <button type="submit" name="submit"
                                                                                    class="btn text-danger btn-sm">
                                                                                    <i class="fa fa-trash-o"></i>&nbsp;
                                                                                    Remove
                                                                              </button>

                                                                        </form>
                                                                        </p>
                                                                        <p></p>

                                                                  </div>
                                                            </span>

                                                      </td>
                                                      <td class="small">
                                                            {{ date('d/m/Y', strtotime($product->created_at))}}
                                                      </td>
                                                      <td><span class="text-capitalize">{{$product['coopname']}}
                                                            </span></td>

                                                      <td>
                                                            <p>{{$product['prod_name']}}</p>
                                                            <p><span class="small"><b>Qty:</b></span>
                                                                  <span>{{$product['quantity'] }}</span>
                                                            </p>
                                                      </td>
                                                      <td>₦{{number_format($product['seller_price']) }}
                                                      </td>
                                                      <td>₦{{number_format($product['price']) }}</td>
                                                      <td>
                                                            <img src="{{asset( $product['image'] )}}" width="45"
                                                                  height="45">
                                                            <br>
                                                            <img src="{{asset( $product['img1'] )}}" width="45"
                                                                  height="45">
                                                            <br>
                                                            <img src="{{asset( $product['img2'] )}}" width="45"
                                                                  height="45">
                                                            <br>
                                                            <img src="{{asset( $product['img3'] )}}" width="45"
                                                                  height="45">

                                                            <br>
                                                            <img src="{{asset( $product['img4'] )}}" width="45"
                                                                  height="45">
                                                      </td>
                                                      <td>{{$product['prod_status']}}</td>

                                                </tr>
                                                @endforeach

                                          </tbody>

                                    </table>
                              </div>

                              <p></p>
                              <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-secondary">

                                          Showing
                                          {{ ($products->currentPage() - 1) * $products->perPage() + 1; }}
                                          to
                                          {{ min($products->currentPage()* $products->perPage(), $products->total()) }}
                                          of
                                          {{$products->total()}} entries
                                    </p>

                                    <ul class="pagination m-0 ms-auto">
                                          @if(isset($products))
                                          @if($products->currentPage() > 1)
                                          <li class="page-item ">
                                                <a class="page-link text-danger"
                                                      href="{{ $products->previousPageUrl() }}" tabindex="-1"
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
                                          <li class="page-item">
                                                {{ $products->appends(compact('perPage'))->links()  }}
                                          </li>
                                          @if($products->hasMorePages())
                                          <li class="page-item">
                                                <a class="page-link text-danger" href="{{ $products->nextPageUrl() }}">
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

                  </div>


            </div>
      </div>
</div>




<!--modal-->
<div class="modal fade" id="pModal" tabindex="-1" role="dialog" aria-labelledby="pModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="pModalLabel">
                              Are you sure
                              want to
                              remove this
                              product?
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <p> <span>Product
                                    name

                                    {{$product->prod_name}}
                              </span></p>
                        <form action="/remove_product" method="post" name="submit">
                              @csrf
                              <input type="text" name="id" value="{{$product->id}}">

                              <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-outline-danger btn-xs"
                                          title="Cancel">
                                          Remove
                                          Now</button>
                              </div>
                        </form>
                  </div>
                  <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
            </div>
      </div>
</div>
@endsection