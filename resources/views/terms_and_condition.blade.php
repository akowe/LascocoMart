@extends('layouts.header')

@section('content')

        <!-- ALL CART SECTION -->
        <div  class="section">
            <!-- container -->
            <div class="container">

                <!-- row -->
                <div class="row">
                     @foreach($about as $details)
                    <div class="col-md-12">
                      <h4>Terms & Condition</h4>
				    <p class="text-justify">{!! nl2br($details->terms_c) !!}</p>
                </div>
                 @endforeach

                </div> <!-- /row -->
            </div> <!-- /container -->
        </div> <!-- /CART SECTION -->


@endsection