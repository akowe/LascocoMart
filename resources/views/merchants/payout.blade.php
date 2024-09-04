@extends('layouts.home')

@extends('layouts.sidebar')


@section('content')

     <!-- adminx-content-aside -->
      <div class="adminx-content">
        <!-- <div class="adminx-aside">

        </div> -->

        <div class="adminx-main-content">
          <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Seller</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h1>Dashboard</h1>  
<!-- 
              <h5 class="navbar bg-dark text-white" style="padding-left: 10px;" >
               
                </h5> -->
                <div class="pb-3">
              <h1>Merchants</h1>  

              <h5 class="navbar bg-dark text-white" style="padding-left: 10px;" >
                Your LascocoMart User ID is:  &nbsp; {{Auth::user()->code}}. <br>
               Your Credit Balance is: ₦{{ number_format($credit) }}
                </h5>
                </div>
                 <div class="card-body text-center">

                   @if (session('profile'))
                        <div class="alert alert-danger" role="alert">
                             <a href="{{url('profile') }}" class="cursor"> {!! session('profile') !!}</a>
                        </div>
                    @endif
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="wrapper d-flex align-items-stretch">
			
        <!-- Page Content  -->
      <section class="p-5">
        <div class="row">
            <section class="col-md-12">
                <form class="my-5 pb-5 pr-5" method="post" action="{{ route('payout') }}">
                    @csrf
                    <div class="form-group">
                        <label for="amount">Amount to Load</label>
                        <input type="number" class="form-control" id="amount" name="amount" required value="{{ old('amount') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Withdraw</button>
                </form>
                @if($amount > 0)
                    <form method="POST" action="{{ route('payoutfff/verify_identity.php') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                        <div class="row" style="margin-bottom:40px;">
                            <div class="col-md-8 col-md-offset-2">
                                <div class=" bg-success p-3 text-white font-weight-bold mb-3">
                                    <p class="">
                                        You are about to withdraw ₦ {{ $amount }} from your wallet
                                    </p>
                                    <p>Click on "Withdraw". <br/>You will be redirected to the withdrawal platform</p>
                                </div>
                                @csrf

                                <p>
                                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                    </button>
                                </p>
                            </div>
                        </div>
                    </form>
                @endif
            </section>
        </div>

    </section>
            </div></div>
</div>
</div>
</div>
</div>
@endsection