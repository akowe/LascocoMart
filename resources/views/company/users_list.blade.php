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
                              <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                  </nav>

                  <div class="pb-3 bg-dark text-center">
                        <h5>&nbsp;</h5>
                        <h4 class="text-white">All Users</h4>
                  </div>

                  @if(Session::has('credit')== true)
                  <!--show alert-->
                  <p class="alert {{ Session::get('alert-class', 'alert-info') }} text-center">
                        {{ Session::get('credit') }}</p>
                  @endif

                  @if(Session::has('credit')== false)
                  <!--show alert-->
                  <p style="display: none;">{{ Session::get('credit') }}</p>
                  @endif

                  <!-- alert if member is not verified-->
                  @if(Session::has('verified')== true)
                  <!--New registration alert-->
                  <p class="alert {{ Session::get('alert-class', 'alert-info') }} text-center">
                        {{ Session::get('verified') }}</p>
                  @endif

                  @if(Session::has('verified')== false)
                  <!--show alert-->
                  <p style="display: none;">{{ Session::get('verified') }}</p>
                  @endif
                  <p></p>

                  <div class="pb-3">
                        <h4 class="text-end">
                              <a href="{{ url('add-new-admin') }}" class="btn btn-danger"><i class="fa fa-plus"></i>
                                    Add New Admin User</a>
                        </h4>

                        <h4>Cooperatives</h4>
                  </div>
                  <!-- row -->
                  <div class="row">
                        <div class="col-lg-12 table-responsive">
                              <table class="table table-striped " id="table">
                                    <thead>
                                          <tr>
                                                <th>Edit</th>
                                                <th>Cooperative</th>
                                                <th>Email</th>
                                                <th>Contact person</th>
                                                <th>Credit</th>
                                                <th>Remove</th>
                                          </tr>
                                    </thead>
                                    <tbody>

                                          @foreach($coop as $details)
                                          <tr>
                                                <td><a href="user_edit/{{$details->id}}" class="text-danger"> <i
                                                                  class="fa fa-edit"></i></a></td>
                                                <td> <span class="text-capitalize">{{ $details['coopname'] }} </span>
                                                <p><a href="{{ $details['cooperative_cert'] }} "  target="_blank" class="text-success"> View certificate</a></p>
                                                </td>
                                                <td><span class="text-lowercase"> {{ $details['email'] }}</span>
                                                <p> <span class="small"><b>Code:</b></span> {{ $details['code'] }}</p>
                                                      <p>@if(!empty($details['email_verified_at']))
                                                            <span class="small "><b>Status:</b></span> <span
                                                                  class="small text-success">verified</span>
                                                            @else
                                                            @endif
                                                      </p>
                                                      <p>@if(!empty($details['last_login']))
                                                            <span class="small "><b>Last login:</b></span> <span
                                                                  class="small text-danger">{{ date('m/d/Y', strtotime($details->last_login))}}</span>
                                                            @else
                                                            @endif
                                                      </p>
                                                </td>
                                                <td><span class="text-capitalize">{{ $details['fname'] }} &nbsp;
                                                            {{ $details['lname'] }}</span>
                                                      <br>
                                                      <span class="text-lowercase">{{ $details['address'] }}</span>
                                                      <br>
                                                      {{ $details['location'] }}
                                                      <br>
                                                      {{ $details['phone'] }}
                                                </td>
                                                <td>{{number_format($details['credit'])  }}</td>

                                                <td>
                                                <a onclick="return confirm('Do you want to delete? {{$details->email}}')"
                                                            href="delete-user/{{$details->id}}" class="text-danger"> <i class="fa fa-trash"></i></a>
                                                </td>
                                          </tr>

                                          @endforeach
                                    </tbody>
                              </table>

                        </div>
                        <!--col 12-->

                  </div>
                  <!--roww-->

            </div>
            <br>
            <hr>
            <br>
            <div class="container-fluid">
                  <!-- container -->
                  <div class="pb-3">
                        <h4>Members of cooperatives</h4>
                  </div>

                  <!-- row -->
                  <div class="row">
                        <div class="col-lg-12 table-responsive">
                              <table class="table table-striped " id="table2">
                                    <thead>
                                          <tr>
                                                <th>Edit</th>
                                                <th>Member Name</th>
                                                <th>Email</th>
                                                <th>Cooperative</th>
                                                <th>Address</th>

                                          </tr>
                                    </thead>
                                    <tbody>

                                          @foreach($members as $details)
                                          <tr>

                                                <td><a href="user_edit/{{$details->id}}" class="text-danger"> <i
                                                                  class="fa fa-edit"></i> </a></td>
                                                <td><span class="text-capitalize">{{ $details['fname'] }} &nbsp;
                                                            {{ $details['lname'] }}</span> </td>

                                                <td> <span class="text-lowercase">{{ $details['email'] }}</span>
                                                <p> <span class="small"><b>Code:</b></span> {{ $details['code'] }}</p>
                                                      <p>@if(!empty($details['email_verified_at']))
                                                            <span class="small"><b>Status:</b></span> <span
                                                                  class="small text-success">verified</span>
                                                            @else
                                                            @endif
                                                      </p>
                                                      <p>@if(!empty($details['last_login']))
                                                            <span class="small "><b>Last login:</b></span> <span
                                                                  class="small text-danger">{{ date('m/d/Y', strtotime($details->last_login))}}</span>
                                                            @else
                                                            @endif
                                                      </p>
                                                </td>

                                                <td><span class="text-capitalize">{{ $details['coopname'] }} </span>
                                                </td>
                                                <td> <span class="text-lowercase">{{ $details['address'] }}</span>
                                                      <br>
                                                      {{ $details['location'] }}
                                                      <br>

                                                      {{ $details['phone'] }}
                                                </td>

                                          </tr>

                                          @endforeach



                                    </tbody>
                              </table>

                        </div>
                        <!--col 12-->

                  </div>
                  <!--roww-->
            </div>

            <br>
            <hr>
            <br>
            <div class="container-fluid">
                  <!-- container -->
                  <div class="pb-3">
                        <h4>FMCG distributors</h4>

                  </div>

                  <!-- row -->
                  <div class="row">
                        <div class="col-lg-12  table-responsive">
                              <table class="table table-striped " id="table3">
                                    <thead>
                                          <tr>
                                                <th>Edit</th>
                                                <th>FMCG </th>
                                                <th>Email</th>
                                                <th>Contact Person</th>
                                                <th>Details</th>
                                                <th>Remove</th>
                                          </tr>
                                    </thead>
                                    <tbody>

                                          @foreach($fmcg as $details)
                                          <tr>
                                                <td><a href="user_edit/{{$details->id}}" class="text-danger">
                                                            <i class="fa fa-edit"></i> Edit</a></td>
                                                <td><span class="text-capitalize">{{ $details['coopname'] }}</span>
                                                </td>
                                                <td> <span class="text-lowercase">{{ $details['email'] }}</span>
                                                <p> <span class="small"><b>Code:</b></span> {{ $details['code'] }}</p>
                                                      <p>@if(!empty($details['email_verified_at']))
                                                            <span class="small"><b>Status:</b></span> <span
                                                                  class="small text-success">verified</span>
                                                            @else
                                                            @endif
                                                      </p>
                                                      <p>@if(!empty($details['last_login']))
                                                            <span class="small "><b>Last login:</b></span> <span
                                                                  class="small text-danger">{{ date('m/d/Y', strtotime($details->last_login))}}</span>
                                                            @else
                                                            @endif
                                                      </p>
                                                </td>
                                                <td><span class="text-capitalize">{{ $details['fname'] }}
                                                            &nbsp;{{ $details['lname'] }}</span> </td>
                                                <td> <span class="text-lowercase">{{ $details['address'] }}</span>
                                                      <br>{{ $details['phone'] }}<br>{{ $details['location'] }}
                                                </td>
                                                <td>
                                                <a onclick="return confirm('Do you want to delete? {{$details->email}}')"
                                                            href="delete-user/{{$details->id}}" class="text-danger"> <i class="fa fa-trash"></i></a>

                                                </td>

                                          </tr>

                                          @endforeach



                                    </tbody>
                              </table>

                        </div>
                        <!--col 12-->

                  </div>
                  <!--roww-->
            </div>
            <br>
            <hr>
            <br>
            <div class="container-fluid">
                  <!-- container -->
                  <div class="pb-3">
                        <h4>Sellers</h4>
                  </div>

                  <!-- row -->
                  <div class="row">
                        <div class="col-lg-12  table-responsive">
                              <table class="table table-striped " id="table4">
                                    <thead>
                                          <tr>
                                                <th>Edit</th>
                                                <th>Store Name</th>
                                                <th>Email</th>
                                                <th>Contact Person</th>
                                                <th>Address</th>
                                                <th>Bank Details</th>
                                                <th>Remove</th>
                                          </tr>
                                    </thead>
                                    <tbody>

                                          @foreach($merchants as $details)
                                          <tr>
                                                <td><a href="user_edit/{{$details->id}}" class="text-danger"> <i
                                                                  class="fa fa-edit"></i> Edit</a></td>
                                                <td><span class="text-capitalize">{{ $details['coopname'] }}</span>
                                                </td>
                                                <td><span class="text-lowercase">{{ $details['email'] }}</span>
                                                <p> <span class="small"><b>Code:</b></span> {{ $details['code'] }}</p>
                                                      <p>@if(!empty($details['email_verified_at']))
                                                            <span class="small"><b>Status:</b></span> <span
                                                                  class="small text-success">verified</span>
                                                            @else
                                                            @endif
                                                      </p>
                                                      <p>@if(!empty($details['last_login']))
                                                            <span class="small "><b>Last login:</b></span> <span
                                                                  class="small text-danger">{{ date('m/d/Y', strtotime($details->last_login))}}</span>
                                                            @else
                                                            @endif
                                                      </p>
                                                </td>
                                                <td><span class="text-capitalize">{{ $details['fname'] }}
                                                            &nbsp;{{ $details['lname'] }}</span></td>
                                                <td> <span class="text-lowercase">{{ $details['address'] }}</span>
                                                      <br>
                                                      {{ $details['location'] }}
                                                      <br>
                                                      {{ $details['phone'] }}
                                                </td>
                                                <td><span class="text-capitalize">{{ $details['bank'] }}</span>
                                                      <br>
                                                      <span
                                                            class="text-capitalize">{{ $details['account_name'] }}</span>
                                                      <br>
                                                      {{ $details['account_number'] }}
                                                </td>
                                                <td>
                                                <a onclick="return confirm('Do you want to delete? {{$details->email}}')"
                                                            href="delete-user/{{$details->id}}" class="text-danger"> <i class="fa fa-trash"></i></a>
                                                </td>
                                          </tr>

                                          @endforeach
                                    </tbody>
                              </table>

                        </div>
                        <!--col 12-->
                  </div>
                  <!--roww-->
            </div>
      </div> <!-- section -->

      <script type="text/javascript">
      $(document).ready(function() {
            $('#myTable').DataTable();
      });
      </script>
      <script>
      function removeCoop() {
            var name = document.getElementById('coop_id').value;
            var answer = window.confirm("Are you sure you want to remove this user?" + name);

            if (answer) {
                  var id = document.getElementById('coop_id').value;
                  var showRoute = "{{ route('delete-user', ':id') }}";
                  url = showRoute.replace(':id', id);

                  window.location = url;

            } else {
                  // window.location.reload();
            }
      }

      function removeFMCG() {
            var name = document.getElementById('fmcg_id').value;
            var answer = window.confirm("Are you sure you want to remove this user?" + name);

            if (answer) {
                  var id = document.getElementById('fmcg_id').value;
                  var showRoute = "{{ route('delete-user', ':id') }}";
                  url = showRoute.replace(':id', id);

                  window.location = url;

            } else {
                  // window.location.reload();
            }
      }

      function removeSeller() {
            var name = document.getElementById('seller_id').value;
            var answer = window.confirm("Are you sure you want to remove this user?" + name);

            if (answer) {
                  var id = document.getElementById('seller_id').value;
                  var showRoute = "{{ route('delete-user', ':id') }}";
                  url = showRoute.replace(':id', id);

                  window.location = url;

            } else {
                  // window.location.reload();
            }
      }
      </script>

      @endsection