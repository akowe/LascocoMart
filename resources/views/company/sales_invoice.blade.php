@extends('layouts.home')

@extends('layouts.sidebar')


@section('content')
<div class="adminx-content">
      <!-- <div class="adminx-aside">

        </div> -->

      <div class="adminx-main-content">
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-1">
                        </div>
                        <div class="col-10 ">
                              <button class="btn btn-primary" onclick="getPDF()">Download Invoice</button>
                              <div class="card  canvas_div_pdf">
                                    <div class="card-body p-0 ">
                                          <div class="row p-4">
                                                <div class="col-md-6">
                                                      <a href="" class="logo" style="text-decoration: none;">
                                                            <!-- <h1 class="text-danger">LascocoMart</h1> -->
                                                            <img src="{{ asset('admin/img/lascoco-logo.png') }}" alt="LASCOCO" 
                                                      title="LASCOCO" width="139" height="93" >
                                                      </a>
                                                </div>

                                                <div class="col-md-6 text-right">
                                                      <p class="font-weight-bold mb-1">Order Number:
                                                            {{$item['order_number']}}</p>
                                                      <p class="text-muted">Date:
                                                            {{ date('d/m/Y', strtotime($item['created_at'])) }}
                                                      </p>
                                                      <br>
                                                      <p class="font-weight-bold mb-1">Status:<br>
                                                      <h4 class="text-uppercase text-primary"> {{$item['status']}}</h4>
                                                      </p>

                                                </div>


                                          </div>

                                          <hr class="my-1">

                                          <div class="row pb-5 p-4">
                                                <div class="col-md-6 small">
                                                      <p class="font-weight-bold mb-4">Client Information</p>
                                                      <p class="mb-1">{{ $item['fname'] }} {{ $item['lname'] }} <br>of
                                                            {{ $item['coopname']}}</p>
                                                      <p class=""><br>House Address:</p>
                                                      <p class="mb-1">{{ $item['address']}}</p>
                                                      <p class="mb-1">{{ $item['location'] }}</p>
                                                      <p class="mb-1">Mobile: {{ $item['phone'] }} </p>
                                                </div>

                                                <div class="col-md-6 text-right small">
                                                      <p class="font-weight-bold mb-4">Shipping Details</p>
                                                      <p class="mb-1"><span class="text-muted">Delivery: </span>
                                                            {{ $item['ship_address'] }}, {{ $item['ship_city'] }}</p>
                                                      <p class="mb-1"><span class="text-muted">Phone: </span>
                                                            {{ $item['ship_phone']}}</p>
                                                      <p class="mb-1  mb-4"><span class="text-muted">Note: </span>
                                                            {{ $item['note'] }}</p>

                                                      <p class="font-weight-bold">Payment Details</p>
                                                      <p class="mb-1"><span class="text-muted">Payment Type:
                                                            </span>{{ $item['pay_type'] }}</p>
                                                      <p class="mb-1"><span class="text-muted">Voucher Number:
                                                            </span>{{ $item['voucher'] }}</p>
                                                </div>
                                          </div>

                                          <div class="row ">
                                                <div class="col-md-12">

                                                      <table class="table">
                                                            <thead>
                                                                  <tr class="small">
                                                                        <th
                                                                              class="border-0 text-uppercase small font-weight-bold">
                                                                        </th>
                                                                        <th
                                                                              class="border-0 text-uppercase small font-weight-bold">
                                                                              Item</th>
                                                                        <th
                                                                              class="border-0 text-uppercase small font-weight-bold">
                                                                              Description</th>
                                                                        <th
                                                                              class="border-0 text-uppercase small font-weight-bold">
                                                                              Quantity</th>
                                                                        <th
                                                                              class="border-0 text-uppercase small font-weight-bold">
                                                                        </th>
                                                                        <th
                                                                              class="border-0 text-uppercase small font-weight-bold">
                                                                              Unit Cost</th>

                                                                  </tr>
                                                            </thead>
                                                            <tbody>

                                                                  @foreach($orders as $order)

                                                                  <tr class="small">
                                                                        <td><img src="{{ $order['image'] }}"
                                                                                    width="100"></td>
                                                                        <td>{{ $order['prod_name'] }}</td>
                                                                        <td>{{ $order['description'] }}
                                                                              <p> {{ $order['prod_brand'] }}</p>
                                                                        </td>
                                                                        <td>{{ $order['order_quantity'] }}</td>
                                                                        <td>
                                                                              X
                                                                        </td>
                                                                        <td>{{ number_format($order['amount']) }} </td>


                                                                  </tr>

                                                                  @endforeach
                                                                  <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td>Delivery fee</td>
                                                                        <td>{{ number_format($item['delivery_fee']) }}
                                                                        </td>
                                                                  </tr>
                                                            </tbody>
                                                      </table>


                                                </div>
                                          </div>

                                          <div class="d-flex flex-row-reverse bg-danger text-white ">
                                                <div class="py-3 px-5 text-right">
                                                      <div class="mb-2">Grand Total</div>

                                                      <div class="h2 font-weight-light">
                                                            ₦{{number_format($item['grandtotal'])  }}</div>
                                                </div>

                                                <!--   <div class="py-3 px-5 text-right">
                            <div class="mb-2">Discount</div>
                            <div class="h2 font-weight-light">10%</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Sub - Total amount</div>
                            <div class="h2 font-weight-light">$32,432</div>
                        </div> -->
                                          </div>
                                    </div>

                              </div>
                        </div>
                        <div class="col-1">
                        </div>
                  </div>

                  <p></p>
                  <p></p>

            </div>
            <!--container-->


            <div class="container">

                  <div class="row">
                        <div class="col-md-12 text-center">

                              <span class="copyright">
                                    <a href="" style="color:#a8a8a8;"> &copy; {{ date('Y')}} LascocoMart</a>
                              </span>
                        </div>
                  </div>
                  <!-- /row -->
            </div>
            <!-- /container -->
            <!--footer-->
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