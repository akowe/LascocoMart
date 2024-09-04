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
                              <span class=" d-none  d-md-block">Edit</span>

                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                        <div class="form-group">
                              <input type="hidden" name="" id="user_id" value="{{$users->id}}">
                              <a onclick="resetPassword();" class="btn btn-primary btn-block text-white"><i
                                          class="fa fa-refresh"></i>  &nbsp; Reset Password
                              </a>

                        </div>
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
                        @if (session('status'))
                        <div class="alert  alert-success alert-dismissible" role="alert">
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
                                    <div>{{ session('status') }}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif

                        @if (session('users-status'))
                        <div class="alert  alert-danger alert-dismissible" role="alert">
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


      <div class="page-header d-print-none">
            <div class="container-xl">
                  <div class="row row-cards">
                        <div class="col-12">
                              <form action="{{ url('user_update/'.$users->id) }}" method="POST">

                                    @csrf
                                    <div class="card">
                                          <div class="card-body p-4">
                                                <div class="row">
                                                      <div class="col-md-6 ">
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                  <h6>User ID</h6>
                                                                  <input type="text" value="{{$users->code}}"
                                                                        name="code" class="form-control" readonly>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                  <h6> Email</h6>
                                                                  <input type="text" value="{{$users->email}}"
                                                                        name="email" class="form-control">
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                  <h6> Phone</h6>
                                                                  <input type="text" value="{{$users->phone}}"
                                                                        name="phone" class="form-control">
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                  <h6>Cooperative</h6>
                                                                  <input type="text" value="{{$users->coopname}}"
                                                                        name="coopname" class="form-control">
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                  <h6>First Name</h6>
                                                                  <input type="text" value="{{$users->fname}}"
                                                                        name="fname" class="form-control">
                                                            </div>
                                                            <br>

                                                      </div>

                                                      <div class="col-lg-6">
                                                            <div class="form-group">
                                                                  <h6> Address</h6>
                                                                  <textarea type="text" value="{{$users->address}}"
                                                                        name="address" row="1" col="3"
                                                                        class="form-control">{{$users->address}}</textarea>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                  <h6>Location</h6>
                                                                  <input type="text" value="{{$users->location}}"
                                                                        name="location" class="form-control">
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                  <h6>Bank Name</h6>
                                                                  <input type="text" value="{{$users->bank}}"
                                                                        name="bank" class="form-control">
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                  <h6>Account Name</h6>
                                                                  <input type="text" value="{{$users->account_name}}"
                                                                        name="account_name" class="form-control">
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                  <h6>Account Number</h6>
                                                                  <input type="text" value="{{$users->account_number}}"
                                                                        name="account_number" class="form-control">
                                                            </div>
                                                          
                                                      </div>

                                                      <div class="form-group">
                                                                  <button type="submit"
                                                                        class="btn btn-outline-danger btn-block"><i
                                                                              class="fa fa-arrow-up"></i> Save
                                                                        Changes</button>
                                                            </div>
                                                </div>
                                          </div>
                                    </div>
                                    <!-- card end -->
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
      $('#myTable').DataTable();
});
</script>

<script>
function resetPassword() {

      var answer = window.confirm("Do you want to reset this user password?");

      if (answer) {
            var id = document.getElementById('user_id').value;
            var showRoute = "{{ route('reset-user-password', ':id') }}";
            url = showRoute.replace(':id', id);

            window.location = url;

      } else {
            // window.location.reload();
      }
}
</script>

@endsection