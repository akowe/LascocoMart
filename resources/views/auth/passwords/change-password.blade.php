@extends('layouts.home')
@section('content')
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

                  <div class="pb-3">
                  <h2>Change password</h2>
                  </div>
            </div>
            <div class="container">
                  <div class="row">

                        <div class="col-md-10 offset-2">
                              <div class="panel panel-default">
                             

                                    <div class="panel-body">
                                          @if (session('error'))
                                          <div class="alert alert-danger">
                                                {{ session('error') }}
                                          </div>
                                          @endif
                                          @if (session('success'))
                                          <div class="alert alert-success">
                                                {{ session('success') }}
                                          </div>
                                          @endif
                                          @if (session('status'))
                                          <div class="alert alert-danger">
                                                {{ session('status') }}
                                          </div>
                                          @endif
                                          @if($errors)
                                          @foreach ($errors->all() as $error)
                                          <div class="alert alert-danger">{{ $error }}</div>
                                          @endforeach
                                          @endif
                                          <form class="form-horizontal" method="POST"
                                                action="{{ route('change-password') }}">
                                                {{ csrf_field() }}

                                                <div
                                                      class="form-group{{ $errors->has('old-password') ? ' has-error' : '' }}">
                                                      <label for="old-password" class="col-md-4 control-label">Old
                                                            Password</label>

                                                      <div class="col-md-6">
                                                            <input id="old-password" type="password"
                                                                  class="form-control" name="old-password" required>

                                                            @if ($errors->has('old-password'))
                                                            <span class="help-block text-danger">
                                                                  <strong>{{ $errors->first('old-password') }}</strong>
                                                            </span>
                                                            @endif
                                                      </div>
                                                </div>

                                                <div
                                                      class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                      <label for="new-password" class="col-md-4 control-label">New
                                                            Password</label>

                                                      <div class="col-md-6">
                                                            <input id="new-password" type="password"
                                                                  class="form-control" name="new-password" required>

                                                            @if ($errors->has('new-password'))
                                                            <span class="help-block text-danger">
                                                                  <strong>{{ $errors->first('new-password') }}</strong>
                                                            </span>
                                                            @endif
                                                      </div>
                                                </div>

                                                <div class="form-group">
                                                      <label for="new-password-confirm"
                                                            class="col-md-4 control-label">Confirm New Password</label>

                                                      <div class="col-md-6">
                                                            <input id="new-password-confirm" type="password"
                                                                  class="form-control" name="new-password_confirmation"
                                                                  required>
                                                                  
                                                      </div>
                                                </div>

                                                <div class="form-group">
                                                <br>
                                                      <div class="col-md-6 col-md-offset-4">
                                                            <button type="submit" class="btn btn-outline-danger btn-block">
                                                                  <i class="fa fa-arrow-up"></i> Save New Password
                                                            </button>
                                                      </div>
                                                </div>
                                          </form>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection