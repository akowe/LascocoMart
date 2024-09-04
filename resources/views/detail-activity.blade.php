@extends('layouts.user-activity')

@extends('layouts.sidebar')
@section('content')
<div class="adminx-content">
      <div class="adminx-main-content">
            <div class="container-fluid">
                  <!-- BreadCrumb -->
                  <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb adminx-page-breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Superadmin</li>
                        </ol>
                  </nav>

                  <div class="pb-3">
                        <h4>Details</h4>
                        <h4><a href="{{ url('user-activity') }}" class="btn btn-danger">Back to activity monitoring</a>
                        </h4>
                  </div>
            </div>
            <div class="container py-5">
                  <div class="row">
                        <div class="col-md-12">
                              <div class="table-responsive">

                                    <table class="table table-bordered table-striped table-hover">
                                          @if ($viewActivity)
                                          <thead>

                                          </thead>
                                          <tbody>
                                                <tr>
                                                      <th style="width: 20%">Name</th>
                                                      <th>{{ $viewActivity->fname }}</th>
                                                </tr>

                                                <tr>
                                                      <th>Email</th>
                                                      <th>{{ $viewActivity->email }}</th>
                                                </tr>
                                                <tr>
                                                      <td scope="row">IP</td>
                                                      <td>{{ $viewActivity->ip_address }}</td>
                                                </tr>
                                                <tr>
                                                      <td scope="row">User Agent</td>
                                                      <td style="color: #030303">{{ $viewActivity->user_agent }}
                                                      </td>
                                                </tr>
                                                <tr>
                                                      <td scope="row">Event Table</td>
                                                      <td>{{ $viewActivity->table }}</td>
                                                </tr>
                                                <tr>
                                                      <td scope="row">Event</td>
                                                      <td>{{ $viewActivity->event }}</td>
                                                </tr>
                                                <tr>
                                                      <td scope="row">Event Time</td>
                                                      <td>{{ $viewActivity->created_at }}
                                                            ({{ $viewActivity->created_at->diffForHumans() }})
                                                      </td>
                                                </tr>
                                          </tbody>
                                          @endif
                                    </table>
                              </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="table-responsive">
                         
                      
                        </div>
                  </div>
            </div>
      </div>
</div>
@endsection