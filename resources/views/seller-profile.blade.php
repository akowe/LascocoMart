@extends('layouts.home')

@extends('layouts.sidebar')


@section('content')
<style>
input[type="file"] {
      z-index: -1;
      position: absolute;
      opacity: 0;
}

input:focus+label {
      outline: 2px solid;
}
</style>

<!-- adminx-content-aside -->
<div class="adminx-content">
     
      <div class="adminx-main-content">

            <div class="container-fluid">

                  <!-- BreadCrumb -->
                  <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>

                  </nav>

            </div>
            <div class="container">
                  <div class="pb-3 ">

                        <h4 class="text-center">Update Profile</h4>
                        <div class="card-body">
                              <p>All filed mark <i class="text-danger">*</i> are compulsory </p>
                              @if (!session('status'))
                              <div class="alert alert-danger" role="alert">
                                  Kindly Complete Your Profile 
                              </div>
                              @endif
                              @if (session('status'))
                              <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                              </div>
                              @endif
                            
                              @if ($errors->any())
                              <div class="alert alert-danger">
                                    <ul>
                                          @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                          @endforeach
                                    </ul>
                              </div>
                              @endif


                              @auth
                              @if(Auth::user()->role_name == 'merchant')
                              <div class="row">
                                    @foreach($users as $user)
                                    <div class="col-md-6">
                                          <form method="post" action="/update_profile" name="submit"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="card">
                                                      <div
                                                            class="card-header d-flex justify-content-between align-items-center">
                                                            <div class="card-header-title"></div>

                                                      </div>
                                                      <div class="card-body collapse show tabel-resposive text-left"
                                                            id="card">
                                                            <h4 class="card-title"></h4>


                                                            <!-- {{ csrf_field() }} -->
                                                            <div class="form-group">
                                                                  <input class="form-control" type="email"
                                                                        id="email-address" value="{{$user['email']}}"
                                                                        readonly />
                                                            </div>

                                                            <div class="form-group">
                                                                  <label>Full Name</label>

                                                                  <input class="form-control" type="text" name="fname"
                                                                        value="{{$user['fname']}}" />
                                                                  @error('fname')
                                                                  <div class="alert alert-danger mt-1 mb-1">
                                                                        {{ $message }}</div>
                                                                  @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                  <label>Mobile Number <i class="text-danger">*</i> </label>
                                                                  <input class="form-control" name="phone" type="number"
                                                                        value="{{$user['phone']}}" id="first-name" />
                                                                  @error('phone')
                                                                  <div class="alert alert-danger mt-1 mb-1">
                                                                        {{ $message }}</div>
                                                                  @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                  <label>Store / Office Address <i class="text-danger">*</i> </label>
                                                                  <input class="form-control" name="address" type="text"
                                                                        value="{{$user['address']}}" />
                                                                  @error('address')
                                                                  <div class="alert alert-danger mt-1 mb-1">
                                                                        {{ $message }}</div>
                                                                  @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                  <label>Bank Name <i class="text-danger">*</i> </label>
                                                                  <input class="form-control" name="bank" type="text"
                                                                        value="{{$user['bank']}}" />
                                                                  @error('bank')
                                                                  <div class="alert alert-danger mt-1 mb-1">
                                                                        {{ $message }}</div>
                                                                  @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                  <label>Account Name <i class="text-danger">*</i> </label>
                                                                  <input class="form-control" name="account_name"
                                                                        type="text" value="{{$user['account_name']}}" />
                                                                  @error('account_name')
                                                                  <div class="alert alert-danger mt-1 mb-1">
                                                                        {{ $message }}</div>
                                                                  @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                  <label>Account Number <i class="text-danger">*</i> </label>
                                                                  <input class="form-control" name="account_number"
                                                                        type="number"
                                                                        value="{{$user['account_number']}}" />
                                                                  @error('account_number')
                                                                  <div class="alert alert-danger mt-1 mb-1">
                                                                        {{ $message }}</div>
                                                                  @enderror
                                                            </div>


                                                            <div class="form-group">
                                                                  <label>State</label>
                                                                  <input class="form-control" name="location"
                                                                        type="text" value="{{$user['location']}}"  readonly/>
                                                                
                                                            </div>

                                                            <div class="form-submit">
                                                                  <button type="submit" name="submit"
                                                                        class="btn btn-outline-danger">
                                                                        Update Profile </button>
                                                            </div>

                                                      </div>
                                                </div><!-- card-6-->
                                          </form>
                                    </div>
                                    @endforeach
                                    @endif
                                    @endauth

                              </div> <!-- row--->
                              <!-- END Merchant Users profile-->

                        </div>
                  </div>
                  <!--pb-3-->
            </div>
      </div>
</div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function(e) {


      $('#profile').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                  $('#profile-preview').attr('src', e.target.result);
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

      $('#img2').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                  $('#img2-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

      });

      $('#img3').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                  $('#img3-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

      });

      $('#img4').change(function() {

            let reader = new FileReader();

            reader.onload = (e) => {

                  $('#img4-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

      });

});
</script>


@endsection