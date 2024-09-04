@extends('layouts.home')
@section('content')
<div class="adminx-content">
      <div class="adminx-main-content">
            <div class="container-fluid">
                  <!-- BreadCrumb -->
                  <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Cooperative</li>
                        </ol>
                  </nav>

                  <div class="pb-3">
                        <h1>Request Fund</h1>

                        <h5 class="navbar bg-dark text-white" style="padding-left: 10px;">
                        @auth
                        @if(Auth::user()->role_name == 'cooperative')
                              Your CoopMart User ID is: &nbsp; {{Auth::user()->code}}.
                        @endif
                        @endauth

                        @auth
                        @if(Auth::user()->role_name == 'member')
                             Request fund from  {{Auth::user()->coopname}} admin.
                        @endif
                        @endauth
                        <br>
                        </h5>
                  </div>
            </div>
            <div class="container-fluid">
                  <div class="row">
                  @if (session('success'))
      <div class="alert alert-success" role="alert">
            {!! session('success') !!}

      </div>
      @endif
                        <div class="col-md-6">
                              <!-- <h5 class="" style="padding-left: 10px;">
                                    Please contact Coopmart in order to get funded. Thanks
                              </h5> -->
                              @auth
                              @if(Auth::user()->role_name == 'cooperative')
                              <form class="my-5 pb-5 pr-5" method="post" action="{{ route('send-fund-request') }}">
                                    @csrf
                                    <div class="form-group">
                                          <label for="amount">Amount requesting</label>
                                          <input type="number" class="form-control" id="amount" name="amount" required
                                                value="{{ old('amount') }}">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-outline-danger btn-sm">
                                          Request Fund </button>
                              </form>
                              @endif
                              @endauth
                              
                              @auth
                              @if(Auth::user()->role_name == 'member')
                              <form class="my-5 pb-5 pr-5" method="post" action="{{ route('member_request_fund_wallet') }}">
                                    @csrf
                                    <div class="form-group">
                                          <label for="amount">Amount requesting</label>
                                          <input type="number" class="form-control" id="amount" name="amount" required
                                                value="{{ old('amount') }}">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-outline-danger btn-sm">
                                          Request Fund </button>
                              </form>
                              @endif
                              @endauth
                        </div>
                  </div>
            </div>
      </div>
</div>

@endsection