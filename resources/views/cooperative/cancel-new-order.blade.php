@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                              Cancel Order
                        </div>
                        <h2 class="page-title">
                              <span class=" d-none  d-md-block ">Order &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-number"
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M4 17v-10l7 10v-10" />
                                          <path d="M15 17h5" />
                                          <path d="M17.5 10m-2.5 0a2.5 3 0 1 0 5 0a2.5 3 0 1 0 -5 0" />
                                    </svg>
                              </span>
                              <span class=" d-sm-block d-md-none ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-number"
                                          width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                          stroke="currentColor" fill="none" stroke-linecap="round"
                                          stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M4 17v-10l7 10v-10" />
                                          <path d="M15 17h5" />
                                          <path d="M17.5 10m-2.5 0a2.5 3 0 1 0 5 0a2.5 3 0 1 0 -5 0" />
                                    </svg>
                              </span>: {{$order->order_number}}
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">

                              <a href="{{ url('admin-member-order') }}"
                                    class="btn btn-danger d-none d-sm-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                                    Back to order history

                              </a>
                              <a href="{{ url('admin-member-order') }}" class="btn btn-danger d-sm-none btn-icon"
                                    data-bs-toggle="modal" data-bs-target="#modal-fund" aria-label="Create new report">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path d="M12 5l0 14" />
                                          <path d="M5 12l14 0" />
                                    </svg>
                              </a>
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
                        @if (session('success'))
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
                                    <div>{{ session('success') }}</div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif
                        @if (session('status'))
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
                                          {{ session('status') }}
                                    </div>
                              </div>
                              <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                        @endif
                  </div>
            </div>
      </div>
      <!-- Alert stop --->

      <div class="container-xl">
            <form action="/order-cancel" method="post" name="submit">
                  @csrf
                  <div class="card">
                        <div class="card-header">
                              Enter current credit worth for &nbsp;<strong> {{$userName}}</strong>
                        </div>
                        <div class="card-body">
                              <div class="row">
                                    <div class="col-md-6">
                                          <input type="hidden" name="order_id" value="{{$order->id}}">

                                          <input type="text" name="amount" value="" placeholder="Enter Amount"
                                                class="form-control" pattern="^[0-9]*$" id="amount" onkeyup="myFunction()" data-mask="00000000,00" data-mask-visible="true" placeholder="00000000,00" data-mask-reverse="true" autocomplete="off" >
                                          <span class="" id="wrong_amount">
                                          </span>

                                          <h4> ₦ <span id="show"></span></h4>

                                    </div>


                                    <div class="col-md-6">


                                          <button type="submit" name="submit" class="btn btn-outline-danger btn-xs"
                                                title="Cancel">
                                                Cancel Now</button>
                                    </div>
                              </div>
                        </div>
                  </div>

            </form>
      </div>
</div>
<script>
function myFunction() {
      let regex = /^([0-9\s\-\+\(\)]*)$/;
      var credit = document.getElementById("amount").value;
      let nf = new Intl.NumberFormat('en-US');
      nf.format(credit); // "1,234,567,890"
    

     if (credit.length > 9) {
            document.getElementById('wrong_amount').style.color = 'red';
            document.getElementById('wrong_amount').innerHTML = '☒  maximum amount  must be atleast 900,000,000 ';

      } 
       else {
            document.getElementById('wrong_amount').innerHTML = ' ';
      }


      var show = document.getElementById('show');
      document.getElementById('show').innerHTML = nf.format(credit);

}



</script>
@endsection