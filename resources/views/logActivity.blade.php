@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Log Activity
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Users Activity History</span>

                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">

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
                        @if(session('success'))
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
                                    <div> {!! session('success') !!}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif


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

                                                      <form action="{{ route('products_list') }}" method="GET"
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
                                    <table class="table-striped table" id="log">
                                          <thead>
                                                <tr class="text-uppercase small">
                                                      <th>No</th>
                                                      <th>User</th>
                                                      <th>Event</th>
                                                      <th>URL</th>
                                                      <th>Ip</th>
                                                      <th>User Agent</th>
                                                      <th>TimeStamp</th>
                                                      <th>Show</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @if($logs->count())
                                                @foreach($logs as $key => $log)
                                                <tr class="small">
                                                      <td>{{ ++$key }}</td>
                                                      <td><strong>{{ $log->fname }}</strong><br>
                                                            <span class="text_light">{{ $log->email }}</span>
                                                      </td>
                                                      <td>{{ $log->subject }}</td>
                                                      <td class="text-success">{{ $log->url }}</td>

                                                      <td class="text-warning">{{ $log->ip }}</td>
                                                      <td class="text-danger">{{ $log->agent }}</td>
                                                      <td>{{ $log->created_at->format('d/M/Y H:i:s') }}
                                                            <br>({{ $log->created_at->diffForHumans() }})
                                                      </td>

                                                      <td class="text-center"><a href="" class="text-danger"><i
                                                                        class="fa fa-eye"></i> </a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                          </tbody>
                                    </table>

                              </div>

                              <p></p>
                              <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-secondary">

                                          Showing
                                          {{ ($logs->currentPage() - 1) * $logs->perPage() + 1; }}
                                          to
                                          {{ min($logs->currentPage()* $logs->perPage(), $logs->total()) }}
                                          of
                                          {{$logs->total()}} entries
                                    </p>

                                    <ul class="pagination m-0 ms-auto">
                                          @if(isset($logs))
                                          @if($logs->currentPage() > 1)
                                          <li class="page-item ">
                                                <a class="page-link text-danger"
                                                      href="{{ $logs->previousPageUrl() }}" tabindex="-1"
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
                                                {{ $logs->appends(compact('perPage'))->links()  }}
                                          </li>
                                          @if($logs->hasMorePages())
                                          <li class="page-item">
                                                <a class="page-link text-danger" href="{{ $logs->nextPageUrl() }}">
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



<script type="text/javascript">
$(document).ready(function() {
      $('#log').DataTable({
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                  "<'row'<'col-sm-12'tr>>" +
                  "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            // dom: 'Bfrtip',
            button: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
            ],

            aLengthMenu: [
                  [5, 10, 20, 50, 100, 250, 500, -1],
                  [5, 10, 20, 50, 100, 250, 500, "All"]
            ],
            iDisplayLength: 5,
            "order": [
                  [0, "asc"]
            ],

            "language": {
                  "lengthMenu": "_MENU_ Records per page",
            }


      });
});
</script>
@endsection