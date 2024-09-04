@extends('layouts.home')

@extends('layouts.sidebar')


@section('content')

<!-- ALL CART SECTION -->
<div class="adminx-content">
      <!-- <div class="adminx-aside">

        </div> -->

      <div class="adminx-main-content">
            <div class="container-fluid">
                  <!-- container -->
                  <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Funds</li>
                        </ol>
                  </nav>

                  <div class="pb-3">
                        <h4>Fund Request</h4>
                        <!-- <p class="text-danger"> To add credit to a member voucher, enter the amount and click "Alocate
                              fund"<br> To subtract from a member credit enter "-"" amount example: enter -100</p> -->
                  </div>
                  @if(Session::has('credit')== true)
                  <!--show alert-->
                  <p class="alert {{ Session::get('alert-class', 'alert-info') }} text-center">
                        {{ Session::get('credit') }}</p>
                  @endif

                  @if(Session::has('credit')== false)
                  <!--show alert-->
                  <p style="display: none;">{{ Session::get('credit') }}</p>
                  @endif

                  @if (session('success'))
                  <div class="alert alert-success" role="alert">
                        {!! session('success') !!}
                  </div>
                  @endif


                  <!-- row -->
                  <div class="row">
                        <div class="col-lg-12  table-responsive">
                              <table class="table table-striped " id="myTable">
                                    <thead>
                                          <tr>

                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Cooperative Details</th>
                                                <th>Amount requested</th>
                                                <th></th>
                                          </tr>
                                    </thead>
                                    <tbody>

                                          @foreach($fund as $details)
                                          <tr>
                                                <td>{{ $details->coopname }}</td>
                                                <td> {{ $details->email }}</td>
                                                <td>{{ $details->fname }}
                                                      <br>
                                                      {{ $details->lname }}

                                                      <br>
                                                      {{ $details->phone }}
                                                </td>

                                                <td>{{number_format($details->amount)  }}</td>

                                                <td>
                                                      <form action="{{ route('allocate_fund') }}" method="post"
                                                            name="submit">
                                                            @csrf
                                                            <input type="hidden" name="status" lass="col-sm-3"
                                                                  value="approve">
                                                            <input type="hidden" name="id" lass="col-sm-3"
                                                                  value="{{$details->id}}">
                                                            <input type="hidden" name="user_id" lass="col-sm-3"
                                                                  value="{{$details->user_id}}">
                                                            <input type="hidden" name="amount" lass="col-sm-3"
                                                                  value="{{$details->amount}}">


                                                            <button type="submit" name="submit"
                                                                  class="btn btn-outline-success btn-sm"><i
                                                                        class="fa fa-check"></i> Approve</button>

                                                            <!--   <a href="edit/{{ $details->id }}"> </a> -->
                                                      </form>

                                                </td>

                                                <td> <a href="edit-fund-request/{{ $details->id }}"
                                                            class="btn btn-outline-danger btn-sm"> <i
                                                                  class="fa fa-cancel"></i> Cancel</a>
                                                </td>
                                          </tr>

                                          @endforeach
                                    </tbody>
                              </table>

                        </div>
                        <!--col 12-->
                  </div>
                  <!--roww-->
            </div>
      </div> <!-- section -->

      <script type="text/javascript">
      $(document).ready(function() {
            $('#myTable').DataTable();
      });
      </script>

      @endsection