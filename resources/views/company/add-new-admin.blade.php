@extends('layouts.home')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Overview
                        </div>
                        <h2 class="page-title">
                              Create FMCG 
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                              <span class="d-block ">
                                    <a href="#" class="btn d-none ">
                                    </a>
                              </span>
                              <a href="{{ url('all-fmcgs') }}" class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <i class="fa fa-eye"></i>
                                    All FMCG
                              </a>
                              <a href="{{ url('all-fmcgs') }}" class="btn btn-danger d-sm-none btn-icon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <i class="fa fa-eye"></i>
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
                        @if(session('status'))
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
                                    <div> {!! session('status') !!}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert  alert-danger alert-dismissible" role="alert">
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
                                    <div>
                                          <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                          </ul>
                                    </div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif


                  </div>
            </div>
      </div>


      <div class="container-xl">
            <div class="row row-cards">
                  <div class="col-12">
                        <form enctype="multipart/form-data" action="{{ url('add_admin') }}" method="POST">
                              @csrf
                              <div class="card">

                                    <div class="card-body p-4">
                                          <div class="row">
                                                <div class="col-md-6 ">
                                                      <div class="form-group">
                                                            <label>Fullname (contact person) <i
                                                                        class="text-danger">*</i></label><br>
                                                            <input type="text" name="fname" class="form-control">
                                                            @error('fname')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                            @enderror
                                                      </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                      <div class="form-group">
                                                            <label>FMCG Name / Cooperative Name <i
                                                                        class="text-danger">*</i></label><br>
                                                            <input type="text" name="coopname" class="form-control">
                                                            @error('coopname')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                            @enderror
                                                      </div>

                                                </div>
                                          </div>
                                          <!--row-->
                                          <p><br></p>
                                          <div class="row">
                                                <div class="col-md-4 ">
                                                      <div class="form-group">
                                                            <label>Mobile (contact person)</label><br>
                                                            <input type="number" name="phone" class="form-control">
                                                            @error('phone')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                            @enderror
                                                      </div>
                                                </div>

                                                <div class="col-md-4 ">
                                                      <div class="form-group">
                                                            <label>Email <i class="text-danger">*</i></label><br>
                                                            <input type="email" name="email" class="form-control">
                                                            @error('email')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                            @enderror
                                                      </div>
                                                </div>

                                                <div class="col-md-4 ">
                                                      <div class="form-group">
                                                            <label>UserType <i class="text-danger">*</i></label><br>
                                                            <select type="text" name="role_name" class="form-control">
                                                                  <option value="">Choose</option>
                                                                  <option value="fmcg">FMCG</option>
                                                                  <option value="cooperative">Cooperative</option>
                                                            </select>
                                                            @error('role_name')
                                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                                                            </div>
                                                            @enderror
                                                      </div>
                                                </div>
                                          </div>
                                          <!--row-->
                                          <p></p>
                                          <div class="row">
                                                <div class="col-md-4 ">
                                                      <button type="submit" class="btn btn-outline-danger"
                                                            id="submit">Add
                                                            New User</button>
                                                </div>
                                          </div>
                                          <!--row-->

                                    </div>
                                       <!--card body-->
                              </div>
                        </form>
                  </div>
            </div>
      </div>
</div>


@endsection