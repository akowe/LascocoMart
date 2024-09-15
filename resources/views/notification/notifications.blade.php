@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Notification (s)
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Unread Notifications</span>
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
                                          <div class="subheader">Total Unread</div>
                                          <div class="ms-auto lh-1">
                                                <div class="dropdown">
                                                    <!--last 7days---> 
                                                </div>
                                          </div>
                                    </div>
                                    <div class="h1 mb-3"> <a href="{{ url('') }}"
                                                class="text-dark">{{ $notification->count() }}</a></div>
                                    <div class="d-flex mb-2">
                                          <div></div>
                                          <div class="ms-auto">
                                             
                                          </div>
                                    </div>
                                    <div class="progress progress-sm">
                                          <div class="progress-bar bg-azure"
                                                style="width:{{ $notification->count() }}%" role="progressbar"
                                                aria-valuenow="{{ $notification->count() }}" aria-valuemin="0"
                                                aria-valuemax="100"
                                                aria-label="{{ $notification->count() }}% unread">
                                                <span class="visually-hidden">{{ $notification->count() }}%
                                                      unread</span>
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

                        </div>
                  </div>
            </div>
            <!-- Alert stop --->
            <div class="row g-2">
                  <div class="col-12">
                        <div class="card">
                              <div class="card-header">
                                    <h3 class="card-title"></h3>
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
                                                      <form action="/all-notification" method="GET" role="search">
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
                                                    <th>SN</th>
                                                      <th class="w-1">Date </th>
                                                      <th>Notification</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach($notification as $data)
                                                <tr>
                                                      <td>{{$loop->iteration}}</td>
                                                      <td><span class="text-secondary">{{ date('m/d/Y', strtotime($data->created_at))}}</span>
                                                      </td>

                                                      <td>{{$data->data}}</td>
                                                </tr>
                                                @endforeach

                                          </tbody>

                                    </table>
                              </div>
                              <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-secondary">

                                          Showing
                                          {{ ($notification->currentPage() - 1) * $notification->perPage() + 1; }} to
                                          {{ min($notification->currentPage()* $notification->perPage(), $notification->total()) }}
                                          of
                                          {{$notification->total()}} entries
                                    </p>

                                    <ul class="pagination m-0 ms-auto">
                                          @if(isset($notification))
                                          @if($notification->currentPage() > 1)
                                          <li class="page-item ">
                                                <a class="page-link text-danger" href="{{ $notification->previousPageUrl() }}"
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
                                                {{ $notification->appends(compact('perPage'))->links()  }}
                                          </li>
                                          @if($notification->hasMorePages())
                                          <li class="page-item">
                                                <a class="page-link text-danger" href="{{ $notification->nextPageUrl() }}">
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
      window.location = "{!! $notification->url(1) !!}&perPage=" + this.value;
};
</script>


@endsection