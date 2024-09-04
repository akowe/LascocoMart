@extends('layouts.home')
@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <h2 class="page-title">
                              Loan Statement
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
                                    @php $companyName =
                                    Auth::user()->coopname;
                                    @endphp
                                    <p class="h3"> {!! Str::limit("$companyName", 15, ' ') !!}</p>
                                    <address>
                                          <h4>{{ $item->fname }}
                                          </h4>
                                          <span><svg xmlns="http://www.w3.org/2000/svg"
                                                      class="icon icon-tabler icon-tabler-map-pin" width="24"
                                                      height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                      stroke="currentColor" fill="none" stroke-linecap="round"
                                                      stroke-linejoin="round">
                                                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                      <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                      <path
                                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                                </svg>: </span> {{ $item->address }}, <br>
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
                                                </svg>: </span> {{ $item->phone }} <br>
                                          <strong>{{ $item->email }}</strong>
                                    </address>
                              </div>
                              <div class="col-6 my-5">
                                    <h3>Laon Type: {{$item->name}}</h3>
                              </div>
                              <div class="col-6 text-end">
                                    <h4>Status:</h4>

                                    <h4 class="text-uppercase text-primary">
                                          @if($item->loan_status == 'payout')
                                          <span class="text-green"> {{$item->loan_status}}</span>
                                          @elseif($item->loan_status == 'cancel')
                                          <span class="text-danger"> {{$item->loan_status}}</span>
                                          @elseif($item->loan_status == 'request')
                                          <span class="text-yellow"> {{$item->loan_status}}</span>
                                          @else
                                          <span class="text-blue"> {{$item->loan_status}}</span>
                                          @endif
                                    </h4>

                              </div>
                        </div>
                        <div class="loan-datagrid">
                              <div class="datagrid-item">
                                    <div class="datagrid-title">Loan</div>
                                    <div class="ms-auto lh-1" id="principal"> <strong>₦{{number_format($item->principal) }}</strong>
                                    </div>
                              </div>
                              <div class="datagrid-item">
                                    <div class="datagrid-title">Interest</div>
                                    <div class="ms-auto lh-1" id="interest">₦{{number_format($item->interest) }}
                                    </div>
                              </div>
                              <div class="datagrid-item">
                                    <div class="datagrid-title">Total</div>
                                    <div class="ms-auto lh-1" id="interest">₦{{number_format($item->total) }}
                                    </div>
                              </div>
                              <div class="datagrid-item">
                                    <div class="datagrid-title">Duration</div>
                                    <div class="ms-auto lh-1" id="interest"> {{$item->duration }} month (s)
                                    </div>
                              </div>

                              <div class="datagrid-item">
                                    <div class="datagrid-title">Start Date </div>
                                    <div class="ms-auto lh-1" id="interest"> {{$item->start_date }}
                                    </div>
                              </div>

                              <div class="datagrid-item">
                                    <div class="datagrid-title">End Date</div>
                                    <div class="ms-auto lh-1" id="interest"> {{$item->end_date }}
                                    </div>
                              </div>
                        </div>
                        <p></p>
                        <hr>
                        <h3>Monthly Repayment</h3>
                        <table class="table table-transparent table-responsive">
                              <thead>
                                    <tr>
                                    <th class="text-left" style="width: 1%">S/N</th>
                                    <th class="text-left" style="width: 1%">Payment</th>
                                    <th class="text-left" style="width: 1%">Due Date</th>      
                                    <th class="text-left" style="width: 1%">Principal ₦</th>
                                    <th class="text-left" style="width: 1%">Interest ₦</th>
                                    <th class="text-left" style="width: 1%">Monthly Due ₦</th>
                                     @auth
                                    @if(Auth::user()->role_name == 'member')
                                    <th class=""  style="width: 1%"></th>
                                    @endif 
                                    @endauth
                                    </tr>
                              </thead>

                              @foreach($loan as $id => $data)
                              <tr>
                              <td class="text-left">{{$loop->iteration }}</td>
                              <td>
                                    @if($data->payment_status == 'paid')
                                    <span  class="badge bg-success-lt text-capitalize">{{$data->payment_status}}</span>
                                    @else
                                    <span   class="badge bg-yellow-lt text-capitalize">{{$data->payment_status}}</span>
                                    @endif 
                                    </td>
                              <td class="text-left">{{$data->due_date }}</td>
                                    <td>
                                          <span class="strong">{{round($data->monthly_principal, 2)}}
                                          </span>
                                    </td>
                                    <td class="text-left">
                                          {{round($data->monthly_interest, 2)}}
                                    </td>
                                    <td class="text-left"> {{ round($data->monthly_due, 2) }}</td>
                                    @auth
                                    @if(Auth::user()->role_name == 'member')
                                    @if($data->payment_status == 'paid')
                                    @else
                                    <td class=""> <a href="" class="btn btn-sm btn-outline-danger">Pay Now</a></td>
                                    @endif 
                                    @endif 
                                    @endauth
                                  
                                   
                              </tr>

                              @endforeach

                              <tr>
                                    <td colspan="5" class="strong text-left"></td>
                                    <td class="text-left"> </td>
                              </tr>

                              <tr>
                                    <td colspan="5" class="strong text-left"></td>
                                    <td class="text-left"></td>
                              </tr>

                              <tr>
                                    <td colspan="5" class="font-weight-bold text-uppercase text-end">Total Due</td>
                                    <td class="font-weight-bold text-left">
                                          ₦{{number_format($item->total, 2)  }}
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

            pdf.save("loan-statement-{{$item['id']}}.pdf");
      });

}
</script>


@endsection