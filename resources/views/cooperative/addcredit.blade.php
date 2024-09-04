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
                              Your LascocoMart User ID is: &nbsp; {{Auth::user()->code}}. <br>
                        </h5>
                  </div>
            </div>
            <div class="container-fluid">
                  <div class="row">  
                        <div class="col-md-6">
                              <!-- <h5 class="" style="padding-left: 10px;">
                                    Please contact LascocoMart in order to get funded. Thanks
                              </h5> -->

                              <form class="my-5 pb-5 pr-5" method="post" action="{{ route('addcredit') }}">
                                    @csrf
                                    <div class="form-group">
                                          <label for="amount">Amount requesting</label>
                                          <input type="number" class="form-control" id="amount" name="amount" required
                                                value="{{ old('amount') }}">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-outline-danger btn-sm">
                                   Request Fund </button>
                              </form>
                              <!--
                            @if($amount > 0)
                                <div class="col-md-8 col-md-offset-2">
                                    <!--<div class=" bg-success p-3 text-white font-weight-bold mb-3">
                                        <p class="">
                                            You are about to load your voucher
                                            {{Auth::user()->code}} with, ₦ {{ $amount }}.
                                        </p>-->
                                  <!--<p>Click on "Pay Now" to be redirected to the payment platform</p>
                                    </div>
                            <form method="POST" action="{{ url('pay') }}" accept-charset="UTF-8" class="my-5 pb-5 pr-5" role="form">
                                    <input type="hidden"  name="email" value="{{Auth::user()->email}}" />
                                    <input type="hidden" name="amount" value="{{ $amount*100 }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="currency" value="NGN">
                                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => Auth::user()->id,]) }}" >
                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                                    
                                    
                                @csrf

                                    <p>
                                        <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                            <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                        </button>
                                    </p></form>
                                </div>
                        
                              @endif-->
                        </div>
                  </div>
            </div>
      </div>
</div>

@endsection