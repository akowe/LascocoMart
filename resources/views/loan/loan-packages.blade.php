@extends('layouts.home')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
      <div class="container-xl">
            <div class="row g-2 align-items-center">
                  <div class="col">
                        <h2 class="page-title">
                              Cooperative Loan Management
                        </h2>
                  </div>
            </div>
      </div>
</div>
<!-- Page body -->
<div class="page-body">
      <div class="container-xl">
            <div class="card">
                  <div class="card-header">
                        <h3 class="card-title">Curent Plan</h3>
                  </div>
                  <div class="card-body">
                        <div class="datagrid">
                              <div class="datagrid-item">
                                    <div class="datagrid-title">Package</div>
                                    <div class="datagrid-content">None</div>
                              </div>
                              <div class="datagrid-item">
                                    <div class="datagrid-title">Duration</div>
                                    <div class="datagrid-content">0</div>
                              </div>
                              <div class="datagrid-item">
                                    <div class="datagrid-title">Start Date</div>
                                    <div class="datagrid-content">None</div>
                              </div>
                              <div class="datagrid-item">
                                    <div class="datagrid-title">End Date</div>
                                    <div class="datagrid-content">None</div>
                              </div>

                        </div>
                  </div>
            </div>
      </div>

      <!-- Package header -->
      <div class="page-header d-print-none">
            <div class="container-xl">
                  <div class="row g-2 align-items-center">
                        <div class="col">
                              <h2 class="page-title">
                                    Prices
                              </h2>
                        </div>
                  </div>
            </div>
      </div>
      <!-- Prices -->
      <div class="page-body">
            <div class="container-xl">
                  <div class="row row-cards">
                        <div class="col-sm-6 col-lg-4">
                              <div class="card card-md">
                              <div class="ribbon ribbon-top ribbon-bookmark bg-azure">
                                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                      d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                          </svg>
                                    </div>
                                    <div class="card-body text-center">
                                          <div class="text-uppercase text-secondary font-weight-medium text-muted">
                                                Silver</div>
                                          <div class="display-5 fw-bold my-3">₦100</div>
                                          <div class="display-10  my-3">per / member</div>
                                          <ul class="list-unstyled lh-lg">
                                                <li><strong>100</strong> member</li>
                                                <li>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon me-1 text-success" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>
                                                      Unlimited Access
                                                </li>

             
                                                <li>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon me-1 text-success" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>
                                                      30 Days Period
                                                </li>
                                                <li>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon me-1 text-success" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>
                                                      24/7 Support
                                                </li>
                                          </ul>
                                          <div class="text-center mt-4 ">
                                                <a href="#" class="btn w-100 btn-outline-azure">Choose plan</a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                              <div class="card card-md">
                                    <div class="ribbon ribbon-top ribbon-bookmark bg-red">
                                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                      d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                          </svg>
                                    </div>
                                    <div class="card-body text-center">
                                          <div class="text-uppercase text-secondary font-weight-medium">Bronze</div>
                                          <div class="display-5 fw-bold my-3">₦70</div>
                                          <div class="display-10  my-3">per / member</div>
                                          <ul class="list-unstyled lh-lg">
                                                <li><strong>500</strong> member</li>
                                                <li>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon me-1 text-success" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>
                                                      Unlimited Access
                                                </li>

                                                <li>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon me-1 text-success" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>
                                                      30 Days Period
                                                </li>
                                                <li>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon me-1 text-success" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>
                                                      24/7 Support
                                                </li>
                                          </ul>
                                          <div class="text-center mt-4">
                                                <a href="#" class="btn btn-outline-red w-100">Choose plan</a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                              <div class="card card-md">
                              <div class="ribbon ribbon-top ribbon-bookmark bg-yellow">
                                          <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                      d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                          </svg>
                                    </div>
                                    <div class="card-body text-center">
                                          <div class="text-uppercase text-secondary font-weight-medium">Gold</div>
                                          <div class="display-5 fw-bold my-3">₦30</div>
                                          <div class="display-10  my-3">per / member</div>
                                          <ul class="list-unstyled lh-lg">
                                                <li><strong>1000</strong> member</li>
                                                <li>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon me-1 text-success" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>
                                                      Unlimited Access
                                                </li>

                                                <li>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon me-1 text-success" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>
                                                      30 Days Period
                                                </li>
                                                <li>
                                                      <!-- Download SVG icon from http://tabler-icons.io/i/x -->
                                                      <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon me-1 text-success" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M5 12l5 5l10 -10" />
                                                      </svg>
                                                      24/7 Support
                                                </li>
                                          </ul>
                                          <div class="text-center mt-4">
                                                <a href="#" class="btn btn-outline-yellow  w-100">Choose plan</a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                 
                  </div>
            </div>
      </div>
      @endsection