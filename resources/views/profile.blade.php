@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <h2 class="page-title">
                              Settings
                        </h2>
                  </div>
            </div>
      </div>
</div>
<!-- Alert start --->
<div class="container-xl">
      <div class="row ">
            <div class="col-12">
                  @if($interest =='0')
                  <div class="alert alert-important  alert-azure alert-dismissible" role="alert">
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
                              <div><strong class="text-dark">Untill you add your interest rate on loan , </strong>
                                    before member (s) can request for cash / product loan </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>

                  @else
                  @endif
            </div>
            <div class="col-12">
                  <p></p>
                  @if(session('profile'))
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
                              <div><a href="{{url('account-settings') }}" class="cursor"> {!!
                                          session('profile') !!}</a></div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>
                  @endif

                  @if(session('loan-repayment'))
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
                              <div> {!! session('loan-repayment') !!}</div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>
                  @endif

                  @if(session('loan'))
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
                              <div> {!! session('loan') !!}</div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>
                  @endif

                  @if(session('success'))
                  <div class="alert alert-important alert-success alert-dismissible" role="alert">
                        <div class="d-flex">
                              <div>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                          fill="none" stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M5 12l5 5l10 -10" />
                                    </svg>

                              </div>
                              <div>{!! session('success') !!}</div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>
                  @endif

                  @if ($errors->any())
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

                  @if (session('error'))
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
                              <div>
                                    {{ session('error') }}
                              </div>
                        </div>
                        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                  </div>
                  @endif

            </div>
      </div>
</div>
<!-- Alert stop --->
<!-- Page body -->
<div class="page-body">
      <div class="container-xl">
            <div class="card">
                  <div class="row g-0">
                        <div class="col-12 col-md-3 border-end">
                              <div class="card-body">
                                    <h4 class="subheader">Account settings</h4>
                                    <div class="list-group list-group-transparent " data-bs-toggle="tabs">
                                          @auth
                                          @if(Auth::user()->role_name == 'cooperative')
                                          <a href="#tabs-home-5" data-bs-toggle="tab"
                                                class="list-group-item list-group-item-action d-flex align-items-center active">
                                                Profile</a>

                                          <a href="#tabs-bank" data-bs-toggle="tab"
                                                class="list-group-item list-group-item-action d-flex align-items-center">Bank
                                                Details</a>

                                          <a href="#tabs-loan-settings" data-bs-toggle="tab"
                                                class="list-group-item list-group-item-action d-flex align-items-center">Loan
                                          </a>
                                          <!-- <a href="#tabs-savings-settings" data-bs-toggle="tab"
                                                class="list-group-item list-group-item-action d-flex align-items-center">Savings</a> -->

                                          @else
                                          <a href="#tabs-home-5" data-bs-toggle="tab"
                                                class="list-group-item list-group-item-action d-flex align-items-center active">
                                                Profile</a>

                                          <a href="#tabs-bank" data-bs-toggle="tab"
                                                class="list-group-item list-group-item-action d-flex align-items-center">Bank
                                                Details</a>
                                          @endif

                                          <a href="#tabs-change-password" data-bs-toggle="tab"
                                                class="list-group-item list-group-item-action d-flex align-items-center">Change
                                                Password</a>
                                          @endauth
                                    </div>
                              </div>
                        </div>
                        <div class="col-12 col-md-9 d-flex flex-column">
                              <div class="card-body">
                                    @auth
                                    @if(Auth::user()->role_name == 'cooperative')
                                    <div class="tab-content">
                                          @php $image = Auth::user()->profile_img;
                                          @endphp
                                          <div class="tab-pane active show" id="tabs-home-5">
                                                <form method="post" action="/cooperative-update-profile" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <h2 class="mb-4">{!! Str::limit("$companyName", 21, '...') !!}
                                                      </h2>
                                                      <h3 class="card-title">Company Logo</h3>
                                                      <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                  <span class="avatar avatar-xl"
                                                                        style="background-image: url({{$image}} )">
                                                                        <img id="logo" src="">
                                                                  </span>
                                                            </div>
                                                            <div class="col-auto">
                                                                  <input type="file" id="myFileInput"
                                                                        style="display:none;" name="image"
                                                                        accept=".jpg,.jpeg,.png" value="" />
                                                                  <input type="button"
                                                                        onclick="document.getElementById('myFileInput').click()"
                                                                        value="Change Logo"
                                                                        class="align-items-center btn ">
                                                                  <!-- Download SVG icon from http://tabler-icons.io/i/camera -->
                                                                  <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                        width="22" height="22" viewBox="0 0 22 22"
                                                                        stroke-width="2" stroke="currentColor"
                                                                        fill="none" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                              fill="none"></path>
                                                                        <path
                                                                              d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2">
                                                                        </path>
                                                                        <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0">
                                                                        </path>
                                                                  </svg> -->

                                                            </div>

                                                            <span class="text-danger small"> Image format: <span
                                                                        class="text-secondary">.jpg, .png,
                                                                        .jpeg.</span> Max size: <span
                                                                        class="text-secondary">300kb.</span></span>
                                                      </div>
                                                      <h3 class="card-title mt-4">Business Profile</h3>
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="form-label">Full Name </div>
                                                                  <input type="text" class="form-control"
                                                                        name="fullname" value="{{Auth::user()->fname}}"
                                                                        disabled>
                                                                  @error('fullname')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <div class="col-md">
                                                                  <div class="form-label required">Cooperative Name
                                                                  </div>
                                                                  <input type="text" class="form-control"
                                                                        name="cooperative_name"
                                                                        value="{{Auth::user()->coopname}}" disabled>
                                                                  @error('cooperative_name')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <div class="col-md">
                                                                  <div class="form-label">Company Registration Number
                                                                  </div>
                                                                  <input type="text" class="form-control"
                                                                        name="rcnumber"
                                                                        value="{{Auth::user()->rcnumber}}">
                                                                  @error('rcnumber')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                      </div>
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <p></p>
                                                                  <div class="form-label required">Phone</div>
                                                                  <input type="text" class="form-control" name="phone"
                                                                        value="{{Auth::user()->phone}}">
                                                                  @error('phone')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">
                                                                  <p></p>
                                                                  <div class="form-label required">Cooperative Type
                                                                  </div>
                                                                  <input type="text" class="form-control"
                                                                        name="cooperative_type"
                                                                        value="{{Auth::user()->cooptype}}">
                                                                  @error('cooperative_type')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror

                                                            </div>
                                                      </div>
                                                      <div class="row ">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <p></p>
                                                                        <div class="form-label required">Office Address
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                              name="address"
                                                                              placeholder="Business Address"
                                                                              value="{{Auth::user()->address}}">
                                                                        @error('address')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>
                                                            </div>


                                                      </div>
                                                      <h3 class="card-title mt-4">Email</h3>
                                                      <!-- <p class="card-subtitle">This will be your login email. 
                                                      Also all
                                                      notifications will be sent to this email.
                                                      So choose it
                                                      carefully.</p> -->
                                                      <div>
                                                            <div class="row">
                                                                  <div class="col-auto">
                                                                        <span class=" text-muted" disabled=""
                                                                              value="">{{Auth::user()->email}}
                                                                        </span>
                                                                  </div>
                                                            </div>
                                                      </div>

                                                      <h3 class="card-title mt-4">SMS</h3>
                                                      <p class="card-subtitle">Activating SMS means we will charge ₦4
                                                            per SMS
                                                      </p>
                                                      <div>
                                                            @if(Auth::user()->sms == 'on')
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms" checked>
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                            </label>
                                                            @else
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms">
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                                  <span class="form-check-label form-check-label-off">SMS
                                                                        disabled</span>
                                                            </label>
                                                            @endif
                                                      </div>
                                                      <div class="card-footer bg-transparent mt-auto">
                                                            <div class="btn-list justify-content-end">
                                                                  <!-- <a href="#" class="btn">
                                                                  Cancel
                                                            </a> -->
                                                                  <button type="submit" name="submit"
                                                                        class="btn btn-danger ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-device-floppy"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                              <path
                                                                                    d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                              <path d="M14 4l0 4l-6 0l0 -4" />
                                                                        </svg>
                                                                        Save
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                          <!----account tab end ---->

                                          <!----bank tab start ---->
                                          <div class="tab-pane" id="tabs-bank">
                                                <h4>Bank </h4>

                                                <form method="post" action="/update-bank-details" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <div class="form-label required">Bank Name
                                                                        </div>
                                                                        @if(!empty(Auth::user()->bank))

                                                                        <select type="text" class="form-select"
                                                                              id="select-bank-name" name="bankName">
                                                                              <option value="{{Auth::user()->bank}}">
                                                                                    {{Auth::user()->bank}}
                                                                              </option>
                                                                              @foreach($selectBankName as $bank)
                                                                              <option value="{{$bank->code}}">
                                                                                    {{$bank->name}}</option>
                                                                              @endforeach
                                                                        </select>

                                                                        @else
                                                                        <select type="text" class="form-select"
                                                                              id="select-bank-name" name="bankName">
                                                                              <option value="0">Search your bank
                                                                              </option>
                                                                              @foreach($selectBankName as $bank)
                                                                              <option value="{{$bank->code}}">
                                                                                    {{$bank->name}}</option>
                                                                              @endforeach
                                                                        </select>
                                                                        @endif
                                                                  </div>

                                                                  @error('bankName')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">
                                                                  <div class="form-label required">Account Number</div>
                                                                  <input type="text" class="form-control"
                                                                        name="accountNumber"
                                                                        placeholder="Valid account number only "
                                                                        value="{{Auth::user()->account_number}}"
                                                                        id="accountNumber" maxlength="10"
                                                                        onkeyup="check_account_number()">
                                                                  <!---account number validation error --->
                                                                  <span id="check_account"></span>
                                                                  <span class="text-danger" id="accountError"></span>
                                                                  <div class="progress" id="show-progress"
                                                                        style="display:none;">
                                                                        <div
                                                                              class="progress-bar progress-bar-indeterminate bg-green">
                                                                        </div>
                                                                  </div>
                                                                  <!--- end validation error --->
                                                                  @error('accountNumber')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">

                                                                  <div class="form-label">Account Name </div>
                                                                  <input type="hidden"
                                                                        class="form-control text-muted-fg bg-muted"
                                                                        name="accountName" id="showName" value="">
                                                                  <input class="form-control " id="showName2"
                                                                        disabled=""
                                                                        value="{{Auth::user()->account_name}}">

                                                                  @error('accountName')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <!-- send button here -->
                                                            <div class="card-footer bg-transparent mt-auto">
                                                                  <div class="btn-list justify-content-end">
                                                                        <button type="submit" name="submit"
                                                                              id="saveBankDetails" style="display: none"
                                                                              class="btn btn-ghost-danger active ms-auto">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-device-floppy"
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
                                                                                          d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                                    <path
                                                                                          d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                                              </svg>
                                                                              Save
                                                                        </button>


                                                                        <button type="button" name="submit"
                                                                              id="hideBankButton" disabled=""
                                                                              class="btn btn-danger ms-auto">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-device-floppy"
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
                                                                                          d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                                    <path
                                                                                          d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                                              </svg>
                                                                              Save
                                                                        </button>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!--row-->
                                                </form>
                                          </div>
                                          <!----bank tab end ---->

                                          <!----Loan settings tab start ---->
                                          <div class="tab-pane" id="tabs-loan-settings">
                                                <h4> </h4>
                                                <div class="pb-3">

                                                </div>
                                                <form method="post" action="loan-settings" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <!-- <div class="row ">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <div class="form-label">Loan Processing Fee
                                                                        </div>
                                                                        <p>
                                                                              <small class="text-muted">Amount paid by
                                                                                    members
                                                                                    for processing the loan</small>
                                                                        </p>
                                                                        <div class="value-button" id="decrease"
                                                                              onclick="decreaseFee()"
                                                                              value="decrease Value">-</div>
                                                                        @if(empty($cooperativeProessFee))
                                                                        <input type="number" name="processing_fee"
                                                                              value="0" id="fee">
                                                                        @else
                                                                        <input type="number" name="processing_fee"
                                                                              value="{{$cooperativeProessFee}}"
                                                                              id="fee">
                                                                        @endif
                                                                        <div class="value-button" id="increase"
                                                                              onclick="increaseFee()"
                                                                              value="Increase Value">+</div>
                                                                  </div>

                                                            </div>

                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <div class="form-label">Maximum Loan Requestable
                                                                        </div>
                                                                        <p> <small class="text-muted">Example: 50 means
                                                                                    50%
                                                                                    of member total saving
                                                                                    balance</small></p>

                                                                        <div class="value-button" id="decrease"
                                                                              onclick="decreaseMax()"
                                                                              value="decrease Value">-</div>
                                                                        @if(empty($cooperativeMaxLoan))
                                                                        <input type="number" name="maximum_loan"
                                                                              value="0" id="max">
                                                                        @else
                                                                        <input type="number" name="maximum_loan"
                                                                              value="{{ $cooperativeMaxLoan}}" id="max">
                                                                        @endif
                                                                        <div class="value-button" id="increase"
                                                                              onclick="increaseMax()"
                                                                              value="Increase Value">+</div>
                                                                  </div>
                                                            </div>
                                                      </div> -->
                                                      <p></p>

                                                      <!--loan row-->
                                                      <p></p>
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="form-label required">
                                                                        Loan Duration (in months)</div>
                                                                  <div class="value-button" id="decrease"
                                                                        onclick="decreaseMax()" value="decrease Value">-
                                                                  </div>
                                                                  <input type="number" name="max_duration"
                                                                        value="{{$maximumDuration}}" id="max"
                                                                        style="width:60%;">
                                                                  @error('maximum_duration')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                                  <div class="value-button" id="increase"
                                                                        onclick="increaseMax()" value="Increase Value">+
                                                                  </div>
                                                            </div>
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <div class="form-label required">
                                                                              Interest Rate
                                                                              %
                                                                        </div>

                                                                        <div class="value-button" id="decrease"
                                                                              onclick="decreaseRate()"
                                                                              value="decrease Value">-
                                                                        </div>
                                                                        <input type="number" name="interest"
                                                                              value="{{$interest}}" id="rate"
                                                                              style="width:60%;">
                                                                        <div class="value-button" id="increase"
                                                                              onclick="increaseRate()"
                                                                              value="Increase Value">+
                                                                        </div>

                                                                        @error('interest')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>
                                                            </div>



                                                      </div>

                                                      <br>
                                                      <div class="row ">
                                                      <div class="col-md">
                                                                  <div class="form-label required">Rate type
                                                                  </div>
                                                                <p>&nbsp;</p>
                                                                  <select name="rate_type" id=""
                                                                        class="form-control text-capitalize">
                                                                        @if(empty($rateType))
                                                                        <option value="">Choose</option>
                                                                        @else
                                                                        <option value="{{$rateType}}">{{$rateType}}
                                                                        </option>
                                                                        @endif
                                                                        <option value="flat rate">Flat /
                                                                              Fixed Rate</option>
                                                                        <option value="simple interest">
                                                                        Reducing balance</option>
                                                                  </select>
                                                                  @error('rate_type')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>


                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <div class="form-label required">Start Repayment
                                                                        </div>
                                                                        <p> <small class="text-muted">How many month (s)
                                                                                    later should repayment
                                                                                    start.</small></p>

                                                                        <div class="value-button" id="decrease"
                                                                              onclick="decreaseValue()"
                                                                              value="decrease Value">-</div>
                                                                        @if(empty($cooperativeLoanRepayment))
                                                                        <input type="number" name="repayment" value=""
                                                                              id="number">
                                                                        @else
                                                                        <input type="number" name="repayment"
                                                                              value="{{$cooperativeLoanRepayment }}"
                                                                              id="number">
                                                                        @endif
                                                                        <div class="value-button" id="increase"
                                                                              onclick="increaseValue()"
                                                                              value="Increase Value">+</div>
                                                                  </div>
                                                                  @error('repayment')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="row ">
                                                                  <p></p>
                                                                  <div class="col-md">
                                                                        <!-- <h4 class="text-danger">LascocoMart Service
                                                                              Charge</h4> -->
                                                                        <!-- <span>This will be added to each member loan and
                                                                              will be charge when disbured</span> -->
                                                                        <div>
                                                                              <div class="row">
                                                                                    <div class="col-auto">
                                                                                          <!-- <input class="form-control " disabled=""
                                                                                                value="₦{{$appServiceCharge}}"> -->

                                                                                    </div>
                                                                              </div>
                                                                        </div>

                                                                  </div>
                                                            </div>
                                                            <!--row-->
                                                            <p></p>
                                                            <!-- send button here -->
                                                            <div class="card-footer bg-transparent mt-auto">
                                                                  <div class="btn-list justify-content-end">
                                                                        <button type="submit" name="submit"
                                                                              class="btn btn-danger ms-auto">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-device-floppy"
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
                                                                                          d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                                    <path
                                                                                          d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                                              </svg>
                                                                              Save
                                                                        </button>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!--row-->
                                                </form>

                                          </div>
                                          <!----loan settings tab end ---->
                                    </div>
                                    <!--tab-content-->
                                    @endif
                                    @endauth
                                    <!-- end cooperative tab -->

                                    <!----Member tab --->
                                    @auth
                                    @if(Auth::user()->role_name == 'member')
                                    <div class="tab-content">
                                          <!-- get cooperative logo --->
                                          @php $image =
                                          App\Models\User::where('code',
                                          Auth::user()->code)
                                          ->where('coopname',
                                          Auth::user()->coopname)
                                          ->where('role_name', 'cooperative');

                                          $getLogo = $image->pluck('profile_img')->toArray();
                                          $cooperativeLogo = implode(" ", $getLogo);
                                          @endphp
                                          <div class="tab-pane active show" id="tabs-home-5">
                                                <form method="post" action="/member-update-profile" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <h2 class="mb-4">{!! Str::limit("$companyName", 21, '...') !!}
                                                      </h2>
                                                      <h3 class="card-title">Coperative logo</h3>
                                                      <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                  <span class="avatar avatar-xl"
                                                                        style="background-image: url({{$cooperativeLogo}} )">
                                                                        <img id="logo" src="">
                                                                  </span>
                                                            </div>
                                                            <!-- <div class="col-auto">
                                                                  <input type="file" id="myFileInput"
                                                                        style="display:none;" name="image"
                                                                        accept=".jpg,.jpeg,.png" />
                                                                  <input type="button"
                                                                        onclick="document.getElementById('myFileInput').click()"
                                                                        value="Change Image" class="btn" />
                                                            </div> -->
                                                            <!-- <span class="text-danger small"> Image format: <span
                                                                        class="text-secondary">.jpg, .png,
                                                                        .jpeg.</span> Max size: <span
                                                                        class="text-secondary">300kb.</span></span> -->
                                                      </div>
                                                      <h3 class="card-title mt-4">My Profile</h3>
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="form-label">Full Name </div>
                                                                  <input type="text" class="form-control"
                                                                        name="fullname" value="{{Auth::user()->fname}}"
                                                                        disabled>
                                                                  @error('fullname')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <div class="col-md">
                                                                  <div class="form-label required">Phone</div>
                                                                  <input type="text" class="form-control" name="phone"
                                                                        value="{{Auth::user()->phone}}">
                                                                  @error('phone')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                      </div>

                                                      <div class="row ">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <p></p>
                                                                        <div class="form-label required">Residential
                                                                              Address
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                              name="address"
                                                                              placeholder="Residential Address"
                                                                              value="{{Auth::user()->address}}">
                                                                        @error('address')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <h3 class="card-title mt-4">Email</h3>
                                                      <div>
                                                            <div class="row">
                                                                  <div class="col-auto">
                                                                        <span class=" text-muted" disabled=""
                                                                              value="">{{Auth::user()->email}}
                                                                        </span>
                                                                  </div>

                                                            </div>
                                                      </div>

                                                      <h3 class="card-title mt-4">SMS</h3>
                                                      <p class="card-subtitle">Activating SMS means we will charge ₦4
                                                            per SMS
                                                      </p>
                                                      <div>
                                                            @if(Auth::user()->sms == 'on')
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms" checked>
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                            </label>
                                                            @else
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms">
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                                  <span class="form-check-label form-check-label-off">SMS
                                                                        disabled</span>
                                                            </label>
                                                            @endif
                                                      </div>
                                                      <p></p>
                                                      <div class="card-footer bg-transparent mt-auto">
                                                            <div class="btn-list justify-content-end">
                                                                  <!-- <a href="#" class="btn">
                                                                  Cancel
                                                            </a> -->
                                                                  <button type="submit" name="submit"
                                                                        class="btn btn-danger ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-device-floppy"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                              <path
                                                                                    d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                              <path d="M14 4l0 4l-6 0l0 -4" />
                                                                        </svg>
                                                                        Save
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                          <!----account tab end ---->

                                          <!----bank tab start ---->
                                          <div class="tab-pane" id="tabs-bank">
                                                <h4>Bank </h4>

                                                <form method="post" action="/update-bank-details" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <div class="form-label required">Bank Name
                                                                        </div>
                                                                        @if(!empty(Auth::user()->bank))

                                                                        <select type="text" class="form-select"
                                                                              id="select-bank-name" name="bankName">
                                                                              <option value="{{Auth::user()->bank}}">
                                                                                    {{Auth::user()->bank}}
                                                                              </option>
                                                                              @foreach($selectBankName as $bank)
                                                                              <option value="{{$bank->code}}">
                                                                                    {{$bank->name}}</option>
                                                                              @endforeach
                                                                        </select>

                                                                        @else
                                                                        <select type="text" class="form-select"
                                                                              id="select-bank-name" name="bankName">
                                                                              <option value="0">Search your bank
                                                                              </option>
                                                                              @foreach($selectBankName as $bank)
                                                                              <option value="{{$bank->code}}">
                                                                                    {{$bank->name}}</option>
                                                                              @endforeach
                                                                        </select>
                                                                        @endif
                                                                  </div>

                                                                  @error('bankName')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">
                                                                  <div class="form-label required">Account Number</div>
                                                                  <input type="text" class="form-control"
                                                                        name="accountNumber"
                                                                        placeholder="Valid account number only "
                                                                        value="{{Auth::user()->account_number}}"
                                                                        id="accountNumber" maxlength="10"
                                                                        onkeyup="check_account_number()">
                                                                  <!---account number validation error --->
                                                                  <span id="check_account"></span>
                                                                  <span class="text-danger" id="accountError"></span>
                                                                  <div class="progress" id="show-progress"
                                                                        style="display:none;">
                                                                        <div
                                                                              class="progress-bar progress-bar-indeterminate bg-green">
                                                                        </div>
                                                                  </div>
                                                                  <!--- end validation error --->
                                                                  @error('accountNumber')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">

                                                                  <div class="form-label">Account Name </div>
                                                                  <input type="hidden"
                                                                        class="form-control text-muted-fg bg-muted"
                                                                        name="accountName" id="showName" value="">
                                                                  <input class="form-control " id="showName2"
                                                                        disabled=""
                                                                        value="{{Auth::user()->account_name}}">
                                                                  @error('accountName')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <!-- send button here -->
                                                            <div class="card-footer bg-transparent mt-auto">
                                                                  <div class="btn-list justify-content-end">
                                                                        <button type="submit" name="submit"
                                                                              id="saveBankDetails" style="display: none"
                                                                              class="btn btn-ghost-danger active ms-auto">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-device-floppy"
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
                                                                                          d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                                    <path
                                                                                          d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                                              </svg>
                                                                              Save
                                                                        </button>

                                                                        <button type="button" name="submit"
                                                                              id="hideBankButton" disabled=""
                                                                              class="btn btn-danger ms-auto">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-device-floppy"
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
                                                                                          d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                                    <path
                                                                                          d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                                              </svg>
                                                                              Save
                                                                        </button>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!--row-->
                                                </form>
                                          </div>
                                          <!----bank tab end ---->
                                          <!----Loan settings tab start ---->
                                          <!----loan settings tab end ---->

                                    </div>
                                    <!--tab-content-->
                                    @endif
                                    @endauth
                                    <!---end member tab --->

                                    <!--- Merchant tab start --->
                                    @auth
                                    @if(Auth::user()->role_name == 'merchant')
                                    <div class="tab-content">
                                          @php $image = Auth::user()->profile_img;
                                          @endphp
                                          <div class="tab-pane active show" id="tabs-home-5">
                                                <form method="post" action="/seller-update-profile" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <h2 class="mb-4">{!! Str::limit("$companyName", 21, '...') !!}
                                                      </h2>
                                                      <h3 class="card-title">Company Logo</h3>
                                                      <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                  <span class="avatar avatar-xl"
                                                                        style="background-image: url({{$image}} )">
                                                                        <img id="logo" src="">
                                                                  </span>
                                                            </div>
                                                            <div class="col-auto">
                                                                  <input type="file" id="myFileInput"
                                                                        style="display:none;" name="image"
                                                                        accept=".jpg,.jpeg,.png" />
                                                                  <input type="button"
                                                                        onclick="document.getElementById('myFileInput').click()"
                                                                        value="Change Logo" class="btn" />
                                                            </div>

                                                            <span class="text-danger small"> Image format: <span
                                                                        class="text-secondary">.jpg, .png,
                                                                        .jpeg.</span> Max size: <span
                                                                        class="text-secondary">300kb.</span></span>
                                                      </div>
                                                      <h3 class="card-title mt-4">Business Profile</h3>
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="form-label">Full Name </div>
                                                                  <input type="text" class="form-control"
                                                                        name="fullname" value="{{Auth::user()->fname}}"
                                                                        disabled>
                                                                  @error('fullname')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <div class="col-md">
                                                                  <div class="form-label required">Company Name
                                                                  </div>
                                                                  <input type="text" class="form-control"
                                                                        name="company_name"
                                                                        value="{{Auth::user()->coopname}}" disabled>
                                                                  @error('company_name')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">
                                                                  <div class="form-label required">Phone</div>
                                                                  <input type="text" class="form-control" name="phone"
                                                                        value="{{Auth::user()->phone}}">
                                                                  @error('phone')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                      </div>

                                                      <div class="row ">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <p></p>
                                                                        <div class="form-label required">Office Address
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                              name="address"
                                                                              placeholder="Business Address"
                                                                              value="{{Auth::user()->address}}">
                                                                        @error('address')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>
                                                            </div>


                                                      </div>
                                                      <h3 class="card-title mt-4">Email</h3>
                                                      <!-- <p class="card-subtitle">This will be your login email. 
                                                      Also all
                                                      notifications will be sent to this email.
                                                      So choose it
                                                      carefully.</p> -->
                                                      <div>
                                                            <div class="row g-2">
                                                                  <div class="col-auto">
                                                                        <span class=" text-muted" disabled=""
                                                                              value="">{{Auth::user()->email}}
                                                                        </span>
                                                                  </div>
                                                            </div>
                                                      </div>

                                                      <h3 class="card-title mt-4">SMS</h3>
                                                      <p class="card-subtitle">Activating SMS means we will charge ₦4
                                                            per SMS
                                                      </p>
                                                      <div>
                                                            @if(Auth::user()->sms == 'on')
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms" checked>
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                            </label>
                                                            @else
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms">
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                                  <span class="form-check-label form-check-label-off">SMS
                                                                        disabled</span>
                                                            </label>
                                                            @endif
                                                      </div>
                                                      <div class="card-footer bg-transparent mt-auto">
                                                            <div class="btn-list justify-content-end">

                                                                  <button type="submit" name="submit"
                                                                        class="btn btn-danger ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-device-floppy"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                              <path
                                                                                    d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                              <path d="M14 4l0 4l-6 0l0 -4" />
                                                                        </svg>
                                                                        Save
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                          <!----account tab end ---->

                                          <!----bank tab start ---->
                                          <div class="tab-pane" id="tabs-bank">
                                                <h4>Bank </h4>

                                                <form method="post" action="/update-bank-details" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <div class="form-label required">Bank Name
                                                                        </div>
                                                                        @if(!empty(Auth::user()->bank))

                                                                        <select type="text" class="form-select"
                                                                              id="select-bank-name" name="bankName">
                                                                              <option value="{{Auth::user()->bank}}">
                                                                                    {{Auth::user()->bank}}
                                                                              </option>
                                                                              @foreach($selectBankName as $bank)
                                                                              <option value="{{$bank->code}}">
                                                                                    {{$bank->name}}</option>
                                                                              @endforeach
                                                                        </select>

                                                                        @else
                                                                        <select type="text" class="form-select"
                                                                              id="select-bank-name" name="bankName">
                                                                              <option value="0">Search your bank
                                                                              </option>
                                                                              @foreach($selectBankName as $bank)
                                                                              <option value="{{$bank->code}}">
                                                                                    {{$bank->name}}</option>
                                                                              @endforeach
                                                                        </select>
                                                                        @endif
                                                                  </div>

                                                                  @error('bankName')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">
                                                                  <div class="form-label required">Account Number</div>
                                                                  <input type="text" class="form-control"
                                                                        name="accountNumber"
                                                                        placeholder="Valid account number only "
                                                                        value="{{Auth::user()->account_number}}"
                                                                        id="accountNumber" maxlength="10"
                                                                        onkeyup="check_account_number()">
                                                                  <!---account number validation error --->
                                                                  <span id="check_account"></span>
                                                                  <span class="text-danger" id="accountError"></span>
                                                                  <div class="progress" id="show-progress"
                                                                        style="display:none;">
                                                                        <div
                                                                              class="progress-bar progress-bar-indeterminate bg-green">
                                                                        </div>
                                                                  </div>
                                                                  <!--- end validation error --->
                                                                  @error('accountNumber')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">

                                                                  <div class="form-label">Account Name </div>
                                                                  <input type="hidden"
                                                                        class="form-control text-muted-fg bg-muted"
                                                                        name="accountName" id="showName" value="">
                                                                  <input class="form-control " id="showName2"
                                                                        disabled=""
                                                                        value="{{Auth::user()->account_name}}">

                                                                  @error('accountName')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <!-- send button here -->
                                                            <div class="card-footer bg-transparent mt-auto">
                                                                  <div class="btn-list justify-content-end">
                                                                        <button type="submit" name="submit"
                                                                              id="saveBankDetails" style="display: none"
                                                                              class="btn btn-ghost-danger active ms-auto">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-device-floppy"
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
                                                                                          d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                                    <path
                                                                                          d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                                              </svg>
                                                                              Save
                                                                        </button>

                                                                        <button type="button" name="submit"
                                                                              id="hideBankButton" disabled=""
                                                                              class="btn btn-danger ms-auto">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-device-floppy"
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
                                                                                          d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                                    <path
                                                                                          d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                                              </svg>
                                                                              Save
                                                                        </button>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!--row-->
                                                </form>
                                          </div>
                                          <!----bank tab end ---->
                                          <!----Loan settings tab start ---->
                                          <!----loan settings tab end ---->
                                    </div>
                                    <!--tab-content-->
                                    @endif
                                    @endauth
                                    <!--- end merchant tab --->

                                    <!--FMCG tab start --->
                                    @auth
                                    @if(Auth::user()->role_name == 'fmcg')
                                    <div class="tab-content">
                                          @php $image = Auth::user()->profile_img;
                                          @endphp
                                          <div class="tab-pane active show" id="tabs-home-5">
                                                <form method="post" action="/fmcg-update-profile" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <h2 class="mb-4">{!! Str::limit("$companyName", 21, '...') !!}
                                                      </h2>
                                                      <h3 class="card-title">Company Logo</h3>
                                                      <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                  <span class="avatar avatar-xl"
                                                                        style="background-image: url({{$image}} )">
                                                                        <img id="logo" src="">
                                                                  </span>
                                                            </div>
                                                            <div class="col-auto">
                                                                  <input type="file" id="myFileInput"
                                                                        style="display:none;" name="image"
                                                                        accept=".jpg,.jpeg,.png" />
                                                                  <input type="button"
                                                                        onclick="document.getElementById('myFileInput').click()"
                                                                        value="Change Logo" class="btn" />
                                                            </div>

                                                            <span class="text-danger small"> Image format: <span
                                                                        class="text-secondary">.jpg, .png,
                                                                        .jpeg.</span> Max size: <span
                                                                        class="text-secondary">300kb.</span></span>
                                                      </div>
                                                      <h3 class="card-title mt-4">Business Profile</h3>
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="form-label">Full Name </div>
                                                                  <input type="text" class="form-control"
                                                                        name="fullname" value="{{Auth::user()->fname}}"
                                                                        disabled>
                                                                  @error('fullname')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <div class="col-md">
                                                                  <div class="form-label required">Company Name
                                                                  </div>
                                                                  <input type="text" class="form-control"
                                                                        name="company_name"
                                                                        value="{{Auth::user()->coopname}}" disabled>
                                                                  @error('company_name')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">
                                                                  <div class="form-label required">Phone</div>
                                                                  <input type="text" class="form-control" name="phone"
                                                                        value="{{Auth::user()->phone}}">
                                                                  @error('phone')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                      </div>

                                                      <div class="row ">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <p></p>
                                                                        <div class="form-label required">Office Address
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                              name="address"
                                                                              placeholder="Business Address"
                                                                              value="{{Auth::user()->address}}">
                                                                        @error('address')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>
                                                            </div>


                                                      </div>
                                                      <h3 class="card-title mt-4">Email</h3>
                                                      <!-- <p class="card-subtitle">This will be your login email. 
                                                      Also all
                                                      notifications will be sent to this email.
                                                      So choose it
                                                      carefully.</p> -->
                                                      <div>
                                                            <div class="row g-2">
                                                                  <div class="col-auto">
                                                                        <span class=" text-muted" disabled=""
                                                                              value="">{{Auth::user()->email}}
                                                                        </span>
                                                                  </div>
                                                            </div>
                                                      </div>

                                                      <h3 class="card-title mt-4">SMS</h3>
                                                      <p class="card-subtitle">Activating SMS means we will charge ₦4
                                                            per SMS
                                                      </p>
                                                      <div>
                                                            @if(Auth::user()->sms == 'on')
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms" checked>
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                            </label>
                                                            @else
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms">
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                                  <span class="form-check-label form-check-label-off">SMS
                                                                        disabled</span>
                                                            </label>
                                                            @endif
                                                      </div>
                                                      <div class="card-footer bg-transparent mt-auto">
                                                            <div class="btn-list justify-content-end">

                                                                  <button type="submit" name="submit"
                                                                        class="btn btn-danger ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-device-floppy"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                              <path
                                                                                    d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                              <path d="M14 4l0 4l-6 0l0 -4" />
                                                                        </svg>
                                                                        Save
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                          <!----account tab end ---->

                                          <!----bank tab start ---->
                                          <div class="tab-pane" id="tabs-bank">
                                                <h4>Bank </h4>

                                                <form method="post" action="/update-bank-details" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <div class="form-label required">Bank Name
                                                                        </div>
                                                                        @if(!empty(Auth::user()->bank))

                                                                        <select type="text" class="form-select"
                                                                              id="select-bank-name" name="bankName">
                                                                              <option value="{{Auth::user()->bank}}">
                                                                                    {{Auth::user()->bank}}
                                                                              </option>
                                                                              @foreach($selectBankName as $bank)
                                                                              <option value="{{$bank->code}}">
                                                                                    {{$bank->name}}</option>
                                                                              @endforeach
                                                                        </select>

                                                                        @else
                                                                        <select type="text" class="form-select"
                                                                              id="select-bank-name" name="bankName">
                                                                              <option value="0">Search your bank
                                                                              </option>
                                                                              @foreach($selectBankName as $bank)
                                                                              <option value="{{$bank->code}}">
                                                                                    {{$bank->name}}</option>
                                                                              @endforeach
                                                                        </select>
                                                                        @endif
                                                                  </div>

                                                                  @error('bankName')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">
                                                                  <div class="form-label required">Account Number</div>
                                                                  <input type="text" class="form-control"
                                                                        name="accountNumber"
                                                                        placeholder="Valid account number only "
                                                                        value="{{Auth::user()->account_number}}"
                                                                        id="accountNumber" maxlength="10"
                                                                        onkeyup="check_account_number()">
                                                                  <!---account number validation error --->
                                                                  <span id="check_account"></span>
                                                                  <span class="text-danger" id="accountError"></span>
                                                                  <div class="progress" id="show-progress"
                                                                        style="display:none;">
                                                                        <div
                                                                              class="progress-bar progress-bar-indeterminate bg-green">
                                                                        </div>
                                                                  </div>
                                                                  <!--- end validation error --->
                                                                  @error('accountNumber')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">

                                                                  <div class="form-label">Account Name </div>
                                                                  <input type="hidden"
                                                                        class="form-control text-muted-fg bg-muted"
                                                                        name="accountName" id="showName" value="">
                                                                  <input class="form-control " id="showName2"
                                                                        disabled=""
                                                                        value="{{Auth::user()->account_name}}">

                                                                  @error('accountName')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <!-- send button here -->
                                                            <div class="card-footer bg-transparent mt-auto">
                                                                  <div class="btn-list justify-content-end">
                                                                        <button type="submit" name="submit"
                                                                              id="saveBankDetails" style="display: none"
                                                                              class="btn btn-ghost-danger active ms-auto">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-device-floppy"
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
                                                                                          d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                                    <path
                                                                                          d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                                              </svg>
                                                                              Save
                                                                        </button>

                                                                        <button type="button" name="submit"
                                                                              id="hideBankButton" disabled=""
                                                                              class="btn btn-danger ms-auto">
                                                                              <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="icon icon-tabler icon-tabler-device-floppy"
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
                                                                                          d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                                    <path
                                                                                          d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                                    <path d="M14 4l0 4l-6 0l0 -4" />
                                                                              </svg>
                                                                              Save
                                                                        </button>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <!--row-->
                                                </form>
                                          </div>
                                          <!----bank tab end ---->
                                          <!----Loan settings tab start ---->
                                          <!----loan settings tab end ---->
                                    </div>
                                    <!--tab-content-->
                                    @endif
                                    @endauth
                                    <!--- end FMCG tab --->

                                    <!--Super admin tab start --->
                                    @auth
                                    @if(Auth::user()->role_name == 'superadmin')
                                    <div class="tab-content">
                                          @php $image = Auth::user()->profile_img;
                                          @endphp
                                          <div class="tab-pane active show" id="tabs-home-5">
                                                <form method="post" action="/update-profile" name="submit"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <h2 class="mb-4">{!! Str::limit("$companyName", 21, '...') !!}
                                                      </h2>
                                                      <h3 class="card-title">Company Logo</h3>
                                                      <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                  <span class="avatar avatar-xl"
                                                                        style="background-image: url({{$image}} )">
                                                                        <img id="logo" src="">
                                                                  </span>
                                                            </div>
                                                            <div class="col-auto">
                                                                  <input type="file" id="myFileInput"
                                                                        style="display:none;" name="image"
                                                                        accept=".jpg,.jpeg,.png" />
                                                                  <input type="button"
                                                                        onclick="document.getElementById('myFileInput').click()"
                                                                        value="Change Logo" class="btn" />
                                                            </div>

                                                            <span class="text-danger small"> Image format: <span
                                                                        class="text-secondary">.jpg, .png,
                                                                        .jpeg.</span> Max size: <span
                                                                        class="text-secondary">300kb.</span></span>
                                                      </div>
                                                      <h3 class="card-title mt-4">Business Profile</h3>
                                                      <div class="row g-3">
                                                            <div class="col-md">
                                                                  <div class="form-label">Full Name </div>
                                                                  <input type="text" class="form-control"
                                                                        name="fullname" value="{{Auth::user()->fname}}"
                                                                        disabled>
                                                                  @error('fullname')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>
                                                            <div class="col-md">
                                                                  <div class="form-label required">Company Name
                                                                  </div>
                                                                  <input type="text" class="form-control"
                                                                        name="company_name"
                                                                        value="{{Auth::user()->coopname}}">
                                                                  @error('company_name')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                            <div class="col-md">
                                                                  <div class="form-label required">Phone</div>
                                                                  <input type="text" class="form-control" name="phone"
                                                                        value="{{Auth::user()->phone}}">
                                                                  @error('phone')
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $message }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @enderror
                                                            </div>

                                                      </div>

                                                      <div class="row ">
                                                            <div class="col-md">
                                                                  <div class="mb-3">
                                                                        <p></p>
                                                                        <div class="form-label required">Office Address
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                              name="address"
                                                                              placeholder="Business Address"
                                                                              value="{{Auth::user()->address}}">
                                                                        @error('address')
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $message }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @enderror
                                                                  </div>
                                                            </div>


                                                      </div>
                                                      <h3 class="card-title mt-4">Email</h3>
                                                      <!-- <p class="card-subtitle">This will be your login email. 
                                                      Also all
                                                      notifications will be sent to this email.
                                                      So choose it
                                                      carefully.</p> -->
                                                      <div>
                                                            <div class="row g-2">
                                                                  <div class="col-auto">
                                                                        <span class=" text-muted" disabled=""
                                                                              value="">{{Auth::user()->email}}
                                                                        </span>
                                                                  </div>
                                                            </div>
                                                      </div>

                                                      <h3 class="card-title mt-4">SMS</h3>
                                                      <p class="card-subtitle">Activating SMS means we will charge ₦4
                                                            per SMS
                                                      </p>
                                                      <div>
                                                            @if(Auth::user()->sms == 'on')
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms" checked>
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                            </label>
                                                            @else
                                                            <label class="form-check form-switch form-switch-lg">
                                                                  <input class="form-check-input" type="checkbox"
                                                                        name="sms">
                                                                  <span class="form-check-label form-check-label-on">SMS
                                                                        activated</span>
                                                                  <span class="form-check-label form-check-label-off">SMS
                                                                        disabled</span>
                                                            </label>
                                                            @endif
                                                      </div>
                                                      <div class="card-footer bg-transparent mt-auto">
                                                            <div class="btn-list justify-content-end">

                                                                  <button type="submit" name="submit"
                                                                        class="btn btn-danger ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-device-floppy"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                              <path
                                                                                    d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                              <path d="M14 4l0 4l-6 0l0 -4" />
                                                                        </svg>
                                                                        Save
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                          <!----account tab end ---->

                                          <!----bank tab start ---->
                                          <!----bank tab end ---->
                                          <!----Loan settings tab start ---->
                                          <!----loan settings tab end ---->
                                    </div>
                                    <!--tab-content-->
                                    @endif
                                    @endauth
                                    <!--- end superadmin tab --->

                                    <!----change password tab start ---->
                                    <div class="tab-content">
                                          <div class="tab-pane" id="tabs-change-password">
                                                <h4>Change password</h4>
                                                <form class="form-horizontal" method="POST"
                                                      action="{{ route('change-password') }}">
                                                      {{ csrf_field() }}
                                                      <div class="row">
                                                            <div class="col-md">

                                                                  <div class="form-label required">Old Password</div>
                                                                  <div class="input-group input-group-flat"
                                                                        id="show_hide_password">
                                                                        <input type="password" class="form-control"
                                                                              value="" autocomplete="off"
                                                                              name="old-password">
                                                                        <span class="input-group-text">
                                                                              <a href="" class="text-secondary">
                                                                                    <i class="fa fa-eye-slash"></i>
                                                                              </a>
                                                                        </span>
                                                                  </div>
                                                                  @if ($errors->has('old-password'))
                                                                  <div class="alert alert-danger alert-dismissible"
                                                                        role="alert">
                                                                        <div class="d-flex">
                                                                              <div>
                                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                          class="icon alert-icon"
                                                                                          width="24" height="24"
                                                                                          viewBox="0 0 24 24"
                                                                                          stroke-width="2"
                                                                                          stroke="currentColor"
                                                                                          fill="none"
                                                                                          stroke-linecap="round"
                                                                                          stroke-linejoin="round">
                                                                                          <path stroke="none"
                                                                                                d="M0 0h24v24H0z"
                                                                                                fill="none" />
                                                                                          <path
                                                                                                d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                          <path d="M12 8v4" />
                                                                                          <path d="M12 16h.01" />
                                                                                    </svg>
                                                                              </div>
                                                                              <div>
                                                                                    {{ $errors->first('old-password') }}
                                                                              </div>
                                                                        </div>
                                                                        <a class="btn-close" data-bs-dismiss="alert"
                                                                              aria-label="close"></a>
                                                                  </div>
                                                                  @endif
                                                            </div>


                                                            <div class="col-md">
                                                                  <div class="form-label required">New Password</div>
                                                                  <div class="input-group input-group-flat"
                                                                        id="show_hide_password">
                                                                        <input type="password" class="form-control"
                                                                              value="" autocomplete="off"
                                                                              name="new-password" id="pass"
                                                                              onkeyup="check_password()">

                                                                        <span class="input-group-text">
                                                                              <a href="" class="text-secondary">
                                                                                    <i class="fa fa-eye-slash"></i>
                                                                              </a>
                                                                        </span>


                                                                  </div>
                                                                  <span class="" id="check_password">

                                                                        @if ($errors->has('new-password'))
                                                                        <div class="alert alert-danger alert-dismissible"
                                                                              role="alert">
                                                                              <div class="d-flex">
                                                                                    <div>
                                                                                          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                                                          <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                class="icon alert-icon"
                                                                                                width="24" height="24"
                                                                                                viewBox="0 0 24 24"
                                                                                                stroke-width="2"
                                                                                                stroke="currentColor"
                                                                                                fill="none"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                                <path stroke="none"
                                                                                                      d="M0 0h24v24H0z"
                                                                                                      fill="none" />
                                                                                                <path
                                                                                                      d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                                                <path d="M12 8v4" />
                                                                                                <path d="M12 16h.01" />
                                                                                          </svg>
                                                                                    </div>
                                                                                    <div>
                                                                                          {{ $errors->first('new-password') }}
                                                                                    </div>
                                                                              </div>
                                                                              <a class="btn-close"
                                                                                    data-bs-dismiss="alert"
                                                                                    aria-label="close"></a>
                                                                        </div>
                                                                        @endif
                                                            </div>

                                                            <div class="col-md">
                                                                  <div class="form-label required">Confirm Password
                                                                  </div>
                                                                  <div class="input-group input-group-flat">
                                                                        <input type="password" class="form-control"
                                                                              value="" autocomplete="off"
                                                                              name="new-password_confirmation"
                                                                              id="confirm_pass"
                                                                              onkeyup="validate_password()">
                                                                        <span class="input-group-text"
                                                                              id="wrong_pass_alert">
                                                                        </span>

                                                                  </div>
                                                            </div>
                                                            <!--col-md--->

                                                      </div>
                                                      <!--change password row --->
                                                      <!-- send button here -->
                                                      <div class="card-footer bg-transparent mt-auto">
                                                            <div class="btn-list justify-content-end">
                                                                  <button type="submit" name="submit"
                                                                        class="btn btn-danger ms-auto">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                              class="icon icon-tabler icon-tabler-device-floppy"
                                                                              width="24" height="24" viewBox="0 0 24 24"
                                                                              stroke-width="1.5" stroke="currentColor"
                                                                              fill="none" stroke-linecap="round"
                                                                              stroke-linejoin="round">
                                                                              <path stroke="none" d="M0 0h24v24H0z"
                                                                                    fill="none" />
                                                                              <path
                                                                                    d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                                                              <path
                                                                                    d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                                              <path d="M14 4l0 4l-6 0l0 -4" />
                                                                        </svg>
                                                                        Save
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    <!----change password tab end ---->
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(e) {
      $('#myFileInput').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                  $('#logo').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
      });

      $('#cert').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                  $('#cert-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
      });
});
</script>
<script>
// @formatter:off
document.addEventListener("DOMContentLoaded", function() {
      var el;
      window.TomSelect && (new TomSelect(el = document.getElementById('select-bank-name'), {
            copyClassesToDropdown: false,
            dropdownParent: 'body',
            controlInput: '<input>',
            render: {
                  item: function(data, escape) {
                        if (data.customProperties) {
                              return '<div><span class="dropdown-item-indicator">' +
                                    data.customProperties + '</span>' + escape(data
                                          .text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                  },
                  option: function(data, escape) {
                        if (data.customProperties) {
                              return '<div><span class="dropdown-item-indicator">' +
                                    data.customProperties + '</span>' + escape(data
                                          .text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                  },
            },
      }));
});
// @formatter:on 
</script>
<script>
$(document).ready(function() {
      $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                  $('#show_hide_password input').attr('type', 'password');
                  $('#show_hide_password i').addClass("fa-eye-slash");
                  $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                  $('#show_hide_password input').attr('type', 'text');
                  $('#show_hide_password i').removeClass("fa-eye-slash");
                  $('#show_hide_password i').addClass("fa-eye");
            }
      });
});
</script>

<script>
function validate_password() {

      let pass = document.getElementById('pass').value;
      let confirm_pass = document.getElementById('confirm_pass').value;
      if (confirm_pass != pass) {
            document.getElementById('wrong_pass_alert').style.color = 'red';
            document.getElementById('confirm_pass').style.border = '1px solid red';
            document.getElementById('wrong_pass_alert').innerHTML =
                  '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>';

      } else if (confirm_pass = pass) {
            document.getElementById('wrong_pass_alert').style.color = 'green';
            document.getElementById('confirm_pass').style.border = '1px solid green';
            document.getElementById('wrong_pass_alert').innerHTML =
                  '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>';

      } else {
            document.getElementById('wrong_pass_alert').innerHTML = ' ';
      }
}

function check_password() {
      let pass = document.getElementById('pass').value;
      let confirm_pass = document.getElementById('confirm_pass').value;

      if (pass.length < 8) {
            document.getElementById('check_password').style.color = 'red';
            document.getElementById('check_password').innerHTML = '☒ password  must be atleast 8 ';

      } else {
            document.getElementById('check_password').innerHTML = ' ';
      }
}



function check_account_number() {
      let account = document.getElementById('accountNumber').value;
      let bankCode = document.getElementById('select-bank-name').value;
      let accountNumber = document.getElementById('accountNumber').value;
      document.getElementById('show-progress').style.display = 'none';
      document.getElementById('hideBankButton').style.display = '';
      document.getElementById('saveBankDetails').style.display = 'none';


      if (account.length < 10) {
            document.getElementById('hideBankButton').style.display = '';
            document.getElementById('saveBankDetails').style.display = 'none';
            document.getElementById('show-progress').style.display = 'none';
            document.getElementById('check_account').style.color = 'red';
            document.getElementById('check_account').innerHTML = '☒ account number must be 10 digits ';


      } else {
            document.getElementById('hideBankButton').style.display = '';
            document.getElementById('saveBankDetails').style.display = 'none';
            document.getElementById('check_account').innerHTML = ' ';
            document.getElementById('show-progress').style.display = '';


            // Make the fetch request with the variables
            //Test secret key: sk_test_b665e0b51fe5f6df4ea0f29a56d8d84b74eca251
            //live secret key : sk_live_883a3c48aa5da65d6793526046220d82ea0f1c16
            const fetchPromise =
                  fetch("https://api.paystack.co/bank/resolve?account_number=" + accountNumber + "&bank_code=" +
                        bankCode, {
                              headers: {
                                    Authorization: 'Bearer sk_live_883a3c48aa5da65d6793526046220d82ea0f1c16'
                              }
                        });
            // Timeout after 120 seconds//  2 min
            const timeoutId = setTimeout(() => {
                  controller.abort(); // Abort the fetch request
                  console.log('Timed out');
            }, 120000);

            // Handle the fetch request
            fetchPromise
                  .then(response => {
                        // Check if the request was successful
                        if (!response.ok) {
                              throw new Error('Slow network!');
                        }
                        // Parse the response as JSON
                        return response.json();
                  })
                  .then(data => {
                        // Handle the JSON data
                        console.log(data.data.account_name);
                        document.getElementById('hideBankButton').style.display = 'none';
                        document.getElementById('saveBankDetails').style.display = '';
                        document.getElementById('show-progress').style.display = 'none';
                        document.getElementById('check_account').style.color = 'green';
                        document.getElementById('check_account').innerHTML = '☒ validated ';

                        document.getElementById('showName').value = data.data.account_name;
                        document.getElementById('showName2').value = data.data.account_name;


                  })
                  .catch(error => {
                        // Handle any errors that occurred during the fetch
                        console.error('Fetch error:', error);
                        document.getElementById('accountError').innerHTML = error;
                  })
                  .finally(() => {
                        clearTimeout(timeoutId); // Clear the timeout
                  });
      }



}
</script>


@endsection