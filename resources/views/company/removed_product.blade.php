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
              	 <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('superadmin') }}">dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Trashed product_list</li>
              </ol>
            </nav>

            <div class="pb-3">
              <h3>Trashed Products</h3>  
                <div class="card-body">

                    @if (session('approve'))
                        <div class="alert alert-success" role="alert">
                            {{ session('approve') }}
                        </div>
                    @endif

                     @if(Session::has('remove')== true)
                                        <!--show alert-->
                                        <p class="alert {{ Session::get('alert-class', 'alert-info') }} text-center">{{ Session::get('remove') }}</p>
                                        @endif

                @if(Session::has('remove')== false)
                                        <!--show alert-->
                    <p style="display: none;">{{ Session::get('remove') }}</p>
                 @endif

                    <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title">All</div>

                  </div>
                  <div class="card-body collapse show tabel-resposive" id="card">
                    <h4 class="card-title"></h4>
                    <p class="card-text">Only "Approved" products will be visible on CoopMart landing page.</p>

                    <p class="card-text text-danger">Click "Approve" if you want products to be visible  again on CoopMart landing page.</p>
                    <table class="table-striped table" id="table">
                        <thead>
                          <tr class="small" >
                            <th class="small">Date</th>
                            <th>Seller</th>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Price</th>
                             <th>Images</th>
                            <th>Status</th>
                            <th>Approve</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($products as $product)
                          <tr class="small">
                            <td class="small">
                            {{ date('d/m/y', strtotime($product->created_at))}}</td>
                             <td>{{$product['fname']}} {{$product['lname']}}</td>
                         
                             <td>{{$product['prod_name']}}</td>
                             <td>{{$product['quantity'] }}</td>
                              <td>₦{{number_format($product['price']) }}</td>
                               <td>
                               <img src="{{asset( $product['image'] )}}" width="45" height="45">
                               	<br>
                               	 <img src="{{asset( $product['img1'] )}}" width="45" height="45">
                               		<br>
                                <img src="{{asset( $product['img2'] )}}" width="45" height="45">
                               	 	<br>
                              	<img src="{{asset( $product['img3'] )}}" width="45" height="45">

                               	 	<br>
                               	 <img src="{{asset( $product['img4'] )}}" width="45" height="45">
                               </td>
                              <td>{{$product['prod_status']}}</td>
                             
                              <td>
                               @if($product->prod_status == 'approve')
                                  <i class="fa fa-check"></i>

                                  @else
                                  <form method="POST" action="/approved" accept-charset="UTF-8" class="form-horizontal" role="form" style="display:block;">
    
                                    @csrf
                                    <div class="form-group" >
                                        <input type="hidden" name="id" value="{{$product->id }}">

                                    </div>

                                    <input type="submit" name="submit" value="Approve" class="btn btn-outline-primary btn-sm">

                                </form>
                                @endif

                          </td>
                     
                              
                          </tr>
                          @endforeach

                        </tbody>

                    </table>
                     <div class="store-filter clearfix">
                        
                        </div>
                  </div>
                </div>
              </div><!-- col-12-->
             
             
            </div>


            </div><!--pb-3-->

        </div>
    </div>
</div>
</div>

  <!-- remove Modal -->
<div class="modal fade" id="pModal" tabindex="-1" role="dialog" aria-labelledby="pModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="pModalLabel">Are you sure want to remove this product?</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      
        <p></p>
       
      </div>
      <form action="/remove_product" method="post" name="submit">
            @csrf
      <div class="modal-body">
       <div class="row mb-3">
          
           <input type="text" name="id"   value="">

            <input type="hidden" name="prod_status"  value="remove"  >
        </div>
    

      </div>
      <div class="modal-footer">
       <button type="submit" name="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i> Yes. Remove</button>
                            
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
        
        </div>
         </form>
      </div>
    </div>
  </div>
</div><!--remove modal end-->

@endsection