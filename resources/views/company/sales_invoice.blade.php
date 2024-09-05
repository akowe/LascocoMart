@extends('layouts.home')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <h2 class="page-title">
                              Invoice
                        </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list d-none  d-md-block ">
                              <button type="button" class="btn " onclick="javascript:window.print();">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path
                                                d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                          <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                          <path
                                                d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                                    </svg>
                                    Print
                              </button>
                              <span class="">
                                    <button class="btn btn-ghost-danger  active" onclick="getPDF()">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                <path d="M7 11l5 5l5 -5" />
                                                <path d="M12 4l0 12" />
                                          </svg> Download

                                    </button>
                              </span>
                        </div>


                        <div class="btn-list d-sm-block d-md-none ">
                              <a class="btn " onclick="javascript:window.print();">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                          stroke-linecap="round" stroke-linejoin="round">
                                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                          <path
                                                d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                          <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                          <path
                                                d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                                    </svg> Print
                              </a>
                              <span class="">
                                    <a class="btn btn-ghost-danger btn-icon active" onclick="getPDF()">
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                                <path d="M7 11l5 5l5 -5" />
                                                <path d="M12 4l0 12" />
                                          </svg>
                                    </a>
                              </span>
                        </div>


                  </div>
            </div>
      </div>
</div>
</div>
<!-- Page body -->
<div class="page-body">
      <div class="container-xl">
            <div class="card card-lg canvas_div_pdf" id="pdf">
                  <div class="card-body">
                        <div class="row">
                              <div class="col-6">
                                    <p class="h3">
                                          <a href="" class="logo" style="text-decoration: none;">
                                                <!-- <h1 class="text-danger">LascocoMart</h1> -->
                                                <img src="{{ asset('admin/img/lascoco-logo.png') }}" alt="LASCOCO"
                                                      title="LASCOCO" width="139" height="93">
                                          </a>
                                    </p>
                                    <address>
                                          Lagos State Cooperative College<br>
                                          Online Market Place <br>
                                          Agege Lagos
                                    </address>
                              </div>
                              <div class="col-6 text-end">
                                    <p class="h3">Customer Shipping Details</p>
                                    <address>
                                          @php $companyName =
                                          Auth::user()->coopname;
                                          @endphp
                                          <h4>
                                                {!! Str::limit("$companyName", 15, ' ') !!}
                                          </h4>
                                          {{ $item->fname }} {{ $item->lname }}<br>
                                          <!-- default address is empty -->
                                          @if(empty($item->address))
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-map-pin" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                      <path
                                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                                </svg>: </span> {{ $item->ship_address }}, <br>
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-pin" width="24" height="24"
                                                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                      fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M15 4.5l-4 4l-4 1.5l-1.5 1.5l7 7l1.5 -1.5l1.5 -4l4 -4" />
                                                      <path d="M9 15l-4.5 4.5" />
                                                      <path d="M14.5 4l5.5 5.5" />
                                                </svg>: </span> {{ $item->ship_city }}<br>
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-phone-call" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                                      <path d="M15 7a2 2 0 0 1 2 2" />
                                                      <path d="M15 3a6 6 0 0 1 6 6" />
                                                </svg>: </span> {{ $item->ship_phone }} <br>
                                          <strong>{{ $item->note }}</strong>

                                          @elseif(!empty($item->ship_addresss))
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-map-pin" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                      <path
                                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                                </svg>: </span>{{ $item->ship_address }}, <br>
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-pin" width="24" height="24"
                                                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                      fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M15 4.5l-4 4l-4 1.5l-1.5 1.5l7 7l1.5 -1.5l1.5 -4l4 -4" />
                                                      <path d="M9 15l-4.5 4.5" />
                                                      <path d="M14.5 4l5.5 5.5" />
                                                </svg>: </span>{{ $item->ship_city }} <br>
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-phone-call" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                                      <path d="M15 7a2 2 0 0 1 2 2" />
                                                      <path d="M15 3a6 6 0 0 1 6 6" />
                                                </svg>: </span> {{ $item->ship_phone }} <br>
                                          <strong>{{ $item->note }}</strong>

                                          @else
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-map-pin" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                      <path
                                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                                </svg>: </span>{{ $item->address }} <br>
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-pin" width="24" height="24"
                                                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                      fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M15 4.5l-4 4l-4 1.5l-1.5 1.5l7 7l1.5 -1.5l1.5 -4l4 -4" />
                                                      <path d="M9 15l-4.5 4.5" />
                                                      <path d="M14.5 4l5.5 5.5" />
                                                </svg>: </span>{{ $item->location }} <br>
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-phone-call" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path
                                                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                                      <path d="M15 7a2 2 0 0 1 2 2" />
                                                      <path d="M15 3a6 6 0 0 1 6 6" />
                                                </svg>: </span>{{ $item->phone }} <br>
                                          <strong>{{ $item->note }}</strong>
                                          @endif
                                          <p> <span class="text-muted">Payment Type:
                                                </span>{{ $item->pay_type }}</p>
                                    </address>
                              </div>
                              <div class="col-6 my-5">
                                    <h3>Order <sup><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-number" width="24" height="24"
                                                      viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                      fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M4 17v-10l7 10v-10" />
                                                      <path d="M15 17h5" />
                                                      <path d="M17.5 10m-2.5 0a2.5 3 0 1 0 5 0a2.5 3 0 1 0 -5 0" />
                                                </svg>:</sup> {{$item->order_number}}</h3>
                                    <p class="text-muted">Date:
                                          {{ date('d/m/Y', strtotime($item->date)) }}
                                    </p>

                              </div>
                              <div class="col-6 text-end">
                                    <h4>Status:</h4>

                                    <h4 class="text-uppercase text-primary">
                                          @if($item->status == 'paid')
                                          <span class="text-green"> {{$item->status}}</span>
                                          @elseif($item->status == 'cancel')
                                          <span class="text-danger"> {{$item->status}}</span>
                                          @elseif($item->status == 'pending')
                                          <span class="text-yellow"> {{$item->status}}</span>
                                          @else
                                          <span class="text-blue"> {{$item->status}}</span>
                                          @endif
                                    </h4>

                              </div>
                        </div>
                        <table class="table table-transparent table-responsive">
                              <thead>
                                    <tr>
                                          <th class="text-center" style="width: 1%">S/N</th>
                                          <th>Product</th>
                                          <th class="text-center" style="width: 1%">Quantity</th>
                                          <th class="text-end" style="width: 1%">Unit Cost ₦</th>
                                          <th class="text-end" style="width: 1%">Amount ₦</th>
                                    </tr>
                              </thead>

                              @foreach($orders as $id => $order)
                              <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>
                                          <span class="strong"> {!! Str::limit("$order->prod_name ", 25, ' ...') !!}
                                          </span>
                                          <div class="col-auto">
                                                <span class="avatar avatar-sm">
                                                      <img src="{{ $order->image }}" alt="">
                                                </span>
                                          </div>

                                          <div class="text-secondary">
                                                <!-- product description here -->
                                          </div>
                                    </td>
                                    <td class="text-center">
                                          {{ $order->order_quantity}}
                                    </td>
                                    <td class="text-end">{{ number_format($order->unit_cost) }}</td>
                                    <td class="text-end">{{ number_format($order->amount) }}</td>
                              </tr>

                              @endforeach
                              <!-- vat is 7.5% --->
                              @php
                              $finalTotal = 0;
                              $vat = 0;
                              $delivery = 0;
                              @endphp

                              @php
                              $vat += ($order['total'] / 100 ) * 7.5;
                              $delivery += $order['delivery_fee'];
                              $finalTotal += $order['total'] + $vat + $delivery;
                              @endphp
                              <tr>
                                    <td colspan="4" class="strong text-end">Subtotal</td>
                                    <td class="text-end"> {{number_format($order['total'])  }}</td>
                              </tr>

                              <tr>
                                    <td colspan="4" class="strong text-end">Vat Rate</td>
                                    <td class="text-end">0</td>
                              </tr>
                              <tr>
                                    <td colspan="4" class="strong text-end">Vat Due</td>
                                    <td class="text-end">0 </td>
                              </tr>
                              <tr>
                                    <td colspan="4" class="strong text-end">Delivery:</td>
                                    <td class="text-end">{{ $order->delivery_fee}}</td>
                              </tr>
                              <tr>
                                    <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                                    <td class="font-weight-bold text-end">
                                          ₦{{number_format($order->grandtotal)  }}
                                    </td>
                              </tr>

                        </table>
                        <p class="text-secondary text-center mt-5">Thank you very much for doing business with us. We
                              look forward to working with
                              you again!</p>
                  </div>
            </div>
      </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js">
</script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script>
//Create PDf from HTML...
function getPDF() {

      var HTML_Width = $(".canvas_div_pdf").width();
      var HTML_Height = $(".canvas_div_pdf").height();
      var top_left_margin = 15;
      var PDF_Width = HTML_Width + (top_left_margin * 2);
      var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
      var canvas_image_width = HTML_Width;
      var canvas_image_height = HTML_Height;

      var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;


      html2canvas($(".canvas_div_pdf")[0], {
            allowTaint: true
      }).then(function(canvas) {
            canvas.getContext('2d');

            console.log(canvas.height + "  " + canvas.width);


            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width,
                  canvas_image_height);


            for (var i = 1; i <= totalPDFPages; i++) {
                  pdf.addPage(PDF_Width, PDF_Height);
                  pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (
                        top_left_margin *
                        4), canvas_image_width, canvas_image_height);
            }

            pdf.save("invoice-{{$item['order_number']}}.pdf");
      });

}
</script>


@endsection