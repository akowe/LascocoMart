@extends('layouts.home')
@section('content')
<!-- Page header -->

<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Users
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block">Members</span>

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
                                    Add New User
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
      <div class="container-xl">
            <div class="row row-deck row-cards">
                  <div class="col-12">
                        <div class="row row-cards">
                              <div class="col-sm-6 col-lg-6">
                                    
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
                                    @if (session('success'))
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
                                                <div>{{ session('success') }}</div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @endif

                                    @if (session('users-status'))
                                    <div class="alert  alert-danger alert-dismissible" role="alert">
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
                                                <div>{{ session('users-status') }}</div>
                                          </div>
                                          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                    </div>
                                    @else
                                    @endif
                              </div>
                        </div>
                  </div>
                  <!-- Alert stop --->
                  <!-- Page header -->
                  <div class="page-header d-print-none">
                        <div class="container-xl">
                              <div class="row g-2 align-items-center">
                                    <div class="col">
                                          <h2 class="page-title">
                                          Members of &nbsp; <span class="text-info"> {{$cooperativeName}}  </span>
                                          </h2>
                                    </div>
                                    <p></p>
                                    <div class="d-flex">
                                          <div class="text-secondary">
                                                Show
                                                <div class="mx-2 d-inline-block">
                                                      <select id="pagination" class="form-control form-control-sm"
                                                            name="perPage">
                                                            <option value="5" @if($perPage==5) selected @endif>5
                                                            </option>
                                                            <option value="12" @if($perPage==12) selected @endif>
                                                                  12
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

                                                      <form action="/all-cooperative-members" method="GET" role="search">
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
                              <div class="row row-cards">
                                    <p></p>

                                    @foreach($users as $details)
                                    @php
                                    $words = explode(" ", $details->fname, 2 );
                                    $initials = null;
                                    foreach ($words as $w) {
                                    $initials .= $w[0];
                                    }
                                    @endphp
                                    <div class="col-md-4 col-lg-4  col-sm-6">
                                          <div class="card">
                                                <div class="card-body p-4 text-center">
                                                      <div class="d-flex align-items-center">
                                                            <div class="ms-auto lh-1">
                                                                  <div class="dropdown">
                                                                        <a class="text-secondary" href="#"
                                                                              data-bs-toggle="dropdown"
                                                                              aria-haspopup="true"
                                                                              aria-expanded="false">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-dots-vertical"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke-width="1.5"
                                                                                    stroke="currentColor" fill="none"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round">
                                                                                    <path stroke="none"
                                                                                          d="M0 0h24v24H0z"
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
                                                                              @csrf
                                                                              <a href="delete-user/{{$details->id}}"
                                                                                    onclick="return confirm('Do you want to remove? {{$details->fname}}')"
                                                                                    class="dropdown-item"> Remove
                                                                              </a>
                                                                        </div>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      @if($details->profile_img)
                                                      <span class="avatar avatar-xl mb-3 rounded"
                                                            style="background-image: url({{$details->profile_img}} )"></span>
                                                      @else
                                                      <span class="avatar avatar-xl mb-3 rounded">{{$initials}}</span>
                                                      @endif
                                                      <h3 class="m-0 mb-1 text-capitalize"><a
                                                                  href="#">{{ $details->fname }}</a></h3>
                                                      <p></p>
                                                      @if($details->phone == '')
                                                      <div class="text-secondary">&nbsp;</div>
                                                      @else
                                                      <div class="text-secondary">{{ $details->phone }}</div>
                                                      @endif

                                                      <div class="text-secondary">{{ $details->email }}</div>
                                                      <div class="mt-3">
                                                            @if( $details->member_role_name == 'vice president')
                                                            <span
                                                                  class="badge bg-cyan-lt text-capitalize">{{ $details->member_role_name }}</span>
                                                            @elseif( $details->member_role_name == 'general secretary')
                                                            <span
                                                                  class="badge bg-azure-lt text-capitalize">{{ $details->member_role_name }}</span>
                                                            @elseif( $details->member_role_name == 'financial
                                                            secretary')
                                                            <span
                                                                  class="badge bg-indigo-lt text-capitalize">{{ $details->member_role_name }}</span>
                                                            @elseif( $details->member_role_name == 'treasurer')
                                                            <span
                                                                  class="badge bg-green-lt text-capitalize">{{ $details->member_role_name }}</span>
                                                            @else
                                                            <span
                                                                  class="badge bg-pink-lt text-capitalize">{{ $details->member_role_name }}</span>
                                                            @endif
                                                      </div>


                                                </div>

                                                <div class="d-flex">
                                                      <a href="mailto:{{ $details->email }}" class="card-btn">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                  class="icon me-2 text-muted" width="24" height="24"
                                                                  viewBox="0 0 24 24" stroke-width="2"
                                                                  stroke="currentColor" fill="none"
                                                                  stroke-linecap="round" stroke-linejoin="round">
                                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                  <path
                                                                        d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                                                  <path d="M3 7l9 6l9 -6" />
                                                            </svg>
                                                            Email
                                                      </a>
                                                      <a href="tel:{{ $details->phone }}" class="card-btn">
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                  class="icon me-2 text-muted" width="24" height="24"
                                                                  viewBox="0 0 24 24" stroke-width="2"
                                                                  stroke="currentColor" fill="none"
                                                                  stroke-linecap="round" stroke-linejoin="round">
                                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                  <path
                                                                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                                            </svg>
                                                            Call
                              </a>

                                                </div>
                                          </div>
                                          <!---card--->
                                    </div>
                                    <!--col-6--->
                                    @endforeach
                              </div>
                              <p></p>
                              <div class="card-footer d-flex align-items-center">
                                    <p class="m-0 text-secondary">

                                          Showing {{ ($users->currentPage() - 1) * $users->perPage() + 1; }} to
                                          {{ min($users->currentPage()* $users->perPage(), $users->total()) }}
                                          of
                                          {{$users->total()}} entries
                                    </p>

                                    <ul class="pagination m-0 ms-auto">
                                          @if(isset($users))
                                          @if($users->currentPage() > 1)
                                          <li class="page-item ">
                                                <a class="page-link text-danger" href="{{ $users->previousPageUrl() }}"
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
                                          <li class="page-item"> {{ $users->appends(compact('perPage'))->links()  }}
                                          </li>
                                          @if($users->hasMorePages())
                                          <li class="page-item">
                                                <a class="page-link text-danger" href="{{ $users->nextPageUrl() }}">
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
<!---page body --->

@endsection