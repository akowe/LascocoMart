@extends('layouts.home')

@extends('layouts.sidebar')

@section('content')
<div class="adminx-content">
      <div class="adminx-main-content">
            <div class="container-fluid">
                  <!-- BreadCrumb -->
                  <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">FundRequest</li>
                        </ol>
                  </nav>

                  <div class="pb-3">
                        <h4>Cancel <span class="text-primary">{{$userEmail}}</span> request of <strong>₦ {{number_format($fund->amount, 2)}}</strong></h4>
                        <h4><a href="{{ url('fundrequest') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </h4>
                  </div>
            </div>
            <div class="container-fluid">
                  <div class="row">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                              {!! session('success') !!}
                        </div>
                        @endif
                  </div>
            </div>

            <div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
              
                </div>
                <div class="card-body">

                <form action="/cancel-fund" method="post" name="submit">
                              @csrf
                          
                              <div class="form-group">
                                    <label for="">Give reason for canceling this request
                                    </label>
                                    <input type="text" name="remark" value="" placeholder="Leave a remark" required
                                          class="form-control" id="credit" >
                                    <input type="hidden" name="id" value="{{$fund->id}}" 
                                          class="form-control" id="credit" >
                                    <input type="hidden" name="amount" value="{{$fund->amount}}" 
                                          class="form-control" id="credit" >

                              </div>
                              <button type="submit" name="submit" class="btn btn-outline-danger btn-xs" title="Cancel">
                                    Cancel Now</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
function myFunction() {
      var credit = document.getElementById("credit").value;
      let nf = new Intl.NumberFormat('en-US');
      nf.format(credit); // "1,234,567,890"

      var show = document.getElementById('show');
      document.getElementById('show').innerHTML = nf.format(credit);

}
</script>
@endsection