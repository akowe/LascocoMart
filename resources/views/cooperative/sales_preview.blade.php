@extends('layouts.home')
@section('content')
 <div class="adminx-content">
        <!-- <div class="adminx-aside">

        </div> -->

   <div class="adminx-main-content">
       <div class="container-fluid">
       	  <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb adminx-page-breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('merchant') }}">Seller</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Sales</li>
              </ol>
            </nav>
       	<div class="row">
       		<div class="col-md-6 col-lg-6 d-flex">
                <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
                  <div class="d-flex flex-row align-items-center h-100">
                    <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                      <i data-feather="shopping-cart"></i>
                    </div>
                    <a href="{{url('sales_preview') }}" class="card-body text-white">
                      <div class="card-info-title">Sales</div>
                      <h3 class="card-title mb-0">

                       @php
                         $company_percentage = 0
                         @endphp

                            @php
                        $company_percentage +=  $sales->sum('seller_price') * 7/ 100;
                         @endphp

                        @php
                        $total_sales = 0
                           @endphp

                        
                        @php
                        $total_sales += $sales->sum('seller_price') - $company_percentage;
                        @endphp



                       ₦{{ number_format($sales->sum('seller_price')) }}

                      </h3>
                    </a>
                  </div>
                </div>
              </div>
       	</div>
       	 <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title">Sales</div>

                    <nav class="card-header-actions">
                      <a class="card-header-action" data-toggle="collapse" href="#card1" aria-expanded="false" aria-controls="card1">
                        <i data-feather="minus-circle"></i>
                      </a>
                      
                      <div class="dropdown">
                        <a class="card-header-action" href="#" role="button" id="card1Settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i data-feather="settings"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="card1Settings">
                        
                        </div>
                      </div>

                      <a href="#" class="card-header-action">
                        <i data-feather="x-circle"></i>
                      </a>
                    </nav>
                  </div>
                  <div class="card-body collapse show tabel-resposive" id="card">
                    <h4 class="card-title"></h4>
                    <p class="card-text">See your products that was sold.</p>
                    
                    <table class="table-striped table">
                        <thead>
                          <tr class="small">
                            <th>Date</th>
                            <th>Product</th>
                            <th>Qty. Sold</th>
                             <th>Price</th>
                             <th>Status</th>
                           
                          
                          </tr>
                        </thead>
                        <tbody>
                        	

                          @foreach($sales as $product)
                          

                          <tr class="small">
                            <td> {{ date('d/m/y', strtotime($product->created_at))}}</td>
                             <td>{{$product->prod_name }}</td>
                             <td>{{$product->order_quantity }}</td>
                             <td>{{number_format($product->seller_price ) }}</td>
                                  <td>
                                   {{ $product->status}}</td>
                            
                              
                          </tr> 
                          @endforeach

                        </tbody>
                    </table>
                     <div class="store-filter clearfix">
                          {{$sales->links()}}
                        </div>
                  </div>
                </div>
              </div><!-- col-12-->
          </div>
       </div>
    </div>
 </div>         	
@endsection