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
                      <h4>About-Us</h4>
				    <p class="text-justify"> {{$details->about}}</p>
                </div>

                    <div class="col-md-12">
                  <h4>Our Story</h4>
                    <p class="text-justify">{!! nl2br($details->our_story) !!}</p>
                </div>
                 @endforeach

                </div> <!-- /row -->
            </div> <!-- /container -->
        </div> <!-- /CART SECTION -->


@endsection