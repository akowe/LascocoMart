@extends('layouts.home')

@extends('layouts.sidebar')

@section('content')

<!-- ALL CART SECTION -->
<div class="adminx-content">

      <div class="adminx-main-content">
            <div class="container-fluid">
                  <!-- container -->
                  <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                        </ol>
                  </nav>

                  <div class="pb-3">
                        <h4> @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                              </div>
                              @endif
                        </h4>
                        <p class="text-danger"></p>
                  </div>
                  <!-- row -->
                  <form action="{{ url('user_update/'.$users->id) }}" method="POST">

                        <div class="row">
                              <div class="col-md-5 ">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                          <h6>User ID</h6>
                                          <input type="text" value="{{$users->code}}" name="code" class="form-control"
                                                readonly>
                                    </div>
                                    <div class="form-group">
                                          <h6> Email</h6>
                                          <input type="text" value="{{$users->email}}" name="email"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                          <h6> Phone</h6>
                                          <input type="text" value="{{$users->phone}}" name="phone"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                          <h6>Cooperative</h6>
                                          <input type="text" value="{{$users->coopname}}" name="coopname"
                                                class="form-control">
                                    </div>

                                    <div class="form-group">
                                          <h6>First Name</h6>
                                          <input type="text" value="{{$users->fname}}" name="fname"
                                                class="form-control">
                                    </div>

                                    <div class="form-group">
                                          <h6>Last Name</h6>
                                          <input type="text" value="{{$users->lname}}" name="lname"
                                                class="form-control">
                                    </div>

                              </div>

                              <div class="col-lg-5">
                                    <div class="form-group">
                                          <h6> Address</h6>
                                          <textarea type="text" value="{{$users->address}}" name="address" row="3"
                                                col="3" class="form-control">{{$users->address}}</textarea>
                                    </div>
                                    <div class="form-group">
                                          <h6>Location</h6>
                                          <input type="text" value="{{$users->location}}" name="location"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                          <h6>Bank Name</h6>
                                          <input type="text" value="{{$users->bank}}" name="bank" class="form-control">
                                    </div>

                                    <div class="form-group">
                                          <h6>Account Name</h6>
                                          <input type="text" value="{{$users->account_name}}" name="account_name"
                                                class="form-control">
                                    </div>

                                    <div class="form-group">
                                          <h6>Account Number</h6>
                                          <input type="text" value="{{$users->account_number}}" name="account_number"
                                                class="form-control">
                                    </div>
                                    <div class="form-group">
                                          <button type="submit" class="btn btn-outline-danger btn-block"><i
                                                      class="fa fa-arrow-up"></i> Save Changes</button>
                                    </div>

                              </div>
                  </form>
                  <div class="col-lg-2">
                        <div class="form-group">
                              <input type="hidden" name="" id="user_id" value="{{$users->id}}">
                              <a onclick="resetPassword();" class="btn btn-primary btn-block text-white"><i class="fa fa-refresh"></i> Reset Password
                              </a>
                            
                        </div>

                  </div>
                  <!--col 4--->

            </div>
            <!--roww-->


      </div>
</div> <!-- section -->
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