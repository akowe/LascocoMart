@extends('layouts.home')

@extends('layouts.sidebar')


@section('content')

<!-- ALL SECTION -->
<div class="adminx-content">
      <!-- <div class="adminx-aside">

        </div> -->

      <div class="adminx-main-content">
            <div class="container-fluid">
                  <!-- container -->
                  <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">NewUsers</li>
                        </ol>
                  </nav>

                  <!-- row -->
                  @if (session('status'))
                  <div class="alert alert-success">
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


                  <form enctype="multipart/form-data" action="{{ url('add_admin') }}" method="POST">
                        <div class="row">
                              <div class="col-lg-6 ">
                                    @csrf
                                    <div class="form-group">
                                          <label>Fullname (contact person) <i class="text-danger">*</i></label>
                                          <input type="text" name="fname" class="form-control">
                                          @error('fname')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                          @enderror
                                    </div>

                                    <div class="form-group">
                                          <label>FMCG Name / Cooperative Name <i class="text-danger">*</i></label>
                                          <input type="text" name="coopname" class="form-control">
                                          @error('coopname')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                          @enderror
                                    </div>
                                    <div class="form-group">
                                          <label>Mobile (contact person)</label>
                                          <input type="number" name="phone" class="form-control">
                                          @error('phone')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                          @enderror
                                    </div>

                                    <div class="form-group">
                                          <label>Email <i class="text-danger">*</i></label>
                                          <input type="email" name="email" class="form-control">
                                          @error('email')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                          @enderror
                                    </div>

                                    <div class="form-group">
                                          <label>UserType <i class="text-danger">*</i></label>
                                          <select type="text" name="role_name" class="form-control">
                                                <option value="">Choose</option>
                                                <option value="fmcg">FMCG</option>
                                                <option value="cooperative">Cooperative</option>
                                          </select>
                                          @error('role_name')
                                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                          @enderror
                                    </div>


                              </div>
                              <div class="col-lg-6 ">
                                    <button type="submit" class="btn btn-outline-danger" id="submit">Add
                                         New User</button>
                              </div>
                        </div>
                        <!--row-->
                  </form>

            </div> <!-- section -->
      </div>
      @endsection