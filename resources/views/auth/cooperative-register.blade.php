<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/adminx.css') }}" media="screen" />
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Lascocomart') }}</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script async src="https://www.google.com/recaptcha/api.js"></script>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Fonts -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

      <div class="adminx-container">
            <!--content-->
            <div class="container">
                  <div class="row justify-content-center">
                        <div class="col-md-8">
                              <div class="header-logo text-center ">
                                    <a href="{{ url('/') }}" class="logo">
                                          <img src="./images/lascoco-logo.png" alt="LASCOCO" title="LASCOCO" width="139"
                                                height="93">
                                    </a>
                              </div>
                              <div class="card">
                                    <div class="card-header text-center ">Cooperative Organization</div>
                                    @if (session('error'))
                                          <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                          </div>
                                          @endif
                                          
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                          <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                          </ul>
                                    </div><br />
                                    @endif
                                    <div class="card-body">
                                          <form method="POST" action="{{ route('coop_insert') }}"
                                                enctype="multipart/form-data" name="submit">
                                                @csrf
                                                {{csrf_field()}}

                                                <div class="row mb-3">
                                                      <label for="name"
                                                            class="col-md-4 col-form-label text-md-end">Cooperative
                                                            Name<i class="text-danger">*</i></label>
                                                      <div class="col-md-6 form-group">
                                                            <input id="coopname" type="text" name="cooperative" required
                                                                  class="form-control">

                                                      </div>
                                                </div>

                                                <div class="row mb-3">
                                                      <label for="name" class="col-md-4 col-form-label text-md-end">
                                                            Address <i class="text-danger">*</i></label>

                                                      <div class="col-md-6 form-group ">
                                                            <input id="address" type="text" name="address" value=""
                                                                  required class="form-control">

                                                            @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                      </div>
                                                </div>


                                                <div class="row mb-3">
                                                      <label for="type" class="col-md-4 col-form-label text-md-end">
                                                            Cooperative Type <i class="text-danger">*</i></label>

                                                      <div class="col-md-6 form-group">
                                                            <input id="type" list="browsers" name="cooptype" required
                                                                  class="form-control">
                                                            <datalist id="browsers">

                                                                  <option value="Coperate">
                                                                  <option value="Industrial">
                                                                  <option value="Community">
                                                                  <option value="NGO">
                                                                  <option value="Others">
                                                            </datalist>
                                                      </div>
                                                </div>

                                                <div class="row mb-3">
                                                      <label for="name"
                                                            class="col-md-4 col-form-label text-md-end">Admin Fullname
                                                            <i class="text-danger">*</i></label>

                                                      <div class="col-md-6 form-group">
                                                            <input id="fname" type="text" name="fullname" value=""
                                                                  required class="form-control">

                                                            @error('fullname')
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                      </div>
                                                </div>

                                                <div class="row mb-3">
                                                      <label for="name"
                                                            class="col-md-4 col-form-label text-md-end">Upload
                                                            Certificate <i class="text-danger">*</i>
                                                      </label>

                                                      <div class="col-md-6 form-group ">
                                                            <span class="small text-primary">image type: jpeg or jpg or
                                                                  png</span>

                                                            <input type="file" id="file-upload" name="file"
                                                                  accept=".jpg,.jpeg,.png" class="form-control" multiple
                                                                  required />
                                                            <span class="small text-primary">image size max: 300
                                                                  kb</span>

                                                            @error('file')
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                      </div>
                                                </div>


                                                <div class="row mb-3">
                                                      <label for="email"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}
                                                            <i class="text-danger">*</i></label>

                                                      <div class="col-md-6 form-group ">
                                                            <input id="email" type="email"
                                                                  class="form-control @error('email') is-invalid @enderror"
                                                                  name="email" value="{{ old('email') }}" required
                                                                  autocomplete="email">

                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                      </div>
                                                </div>

                                                <div class="row mb-3">
                                                      <label for="password"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}
                                                            <i class="text-danger">*</i></label>

                                                      <div class="col-md-6 ">
                                                            <span class="small text-primary">minimum length: 6</span>
                                                            <div class="form-group">
                                                                  <div class="input-group input-group-flat"
                                                                        id="show_hide_password">
                                                                        <input id="password" type="password"
                                                                              class="@error('password') is-invalid @enderror input-field form-control "
                                                                              name="password" required
                                                                              autocomplete="new-password"
                                                                              onkeyup="check_password()">

                                                                        <span class="input-group-text">
                                                                              <a href="" class="text-secondary">
                                                                                    <i class="fa fa-eye-slash"></i>
                                                                              </a>
                                                                        </span>
                                                                  </div>
                                                            </div>

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                      </div>
                                                </div>


                                                <div class="row mb-3">
                                                      <label for="password-confirm"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}
                                                            <i class="text-danger">*</i></label>

                                                      <div class="col-md-6 ">
                                                            <div class="form-group">
                                                                  <div class="input-group input-group-flat">
                                                                        <input id="password-confirm" type="password"
                                                                              class="form-control"
                                                                              name="password_confirmation" required
                                                                              autocomplete="new-password"
                                                                              onkeyup="validate_password()">
                                                                        <span class="input-group-text"
                                                                              id="wrong_pass_alert">
                                                                        </span>
                                                                  </div>
                                                            </div>

                                                      </div>
                                                </div>
                                                <div class="row mb-3">
                                                      <p></p>
                                                      <label for="" class="col-md-4 col-form-label text-md-end"></label>
                                                      <div class="col-md-6 " style="font-size:14px;">

                                                            <input type="checkbox" required> I have read and agree to
                                                            LascocoMart <a href="https://lascocomart.com/terms"
                                                                  class="text-danger" title="Click here to read">terms &
                                                                  condition</a>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                    <label for="password" class="col-md-4 control-label"></label>
                                    <div class="col-md-6">
                                          <div class="">
                                                <h2> <?php echo $builder->getPhrase(); ?></h2>
                                          </div>
                                          <!-- &#x21bb; -->
                                    </div>
                              </div>


                              <div class="form-group row">
                                    <label for="captcha" class="col-md-4 col-form-label text-md-right">I'm
                                          not a robot</label>
                                    <div class="col-md-6">
                                          <input id="captcha" type="text" class="form-control"
                                                placeholder="Enter the above code here" name="captcha">
                                                @error('captcha')
                                          <div class="alert alert-danger alert-dismissible" role="alert">
                                                <div class="d-flex">
                                                      <div>
                                                            <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                  class="icon alert-icon" width="24" height="24"
                                                                  viewBox="0 0 24 24" stroke-width="2"
                                                                  stroke="currentColor" fill="none"
                                                                  stroke-linecap="round" stroke-linejoin="round">
                                                                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                  <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                                                  <path d="M12 8v4" />
                                                                  <path d="M12 16h.01" />
                                                            </svg>
                                                      </div>
                                                      <div>
                                                            {{ $message }}
                                                      </div>
                                                </div>
                                                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                                          </div>
                                          @enderror
                                    </div>

                              </div>

                                                <!-- Google Recaptcha Widget-->
                                                <div class="row mb-3">

                                                </div>
                                    </div>
                                    <div class="form-group text-center">
                                          <br>
                                          <button type="submit" class="btn btn-danger btn-block" name="submit">Create
                                                Account</button>
                                    </div>
                                    </form>

                              </div>


                        </div>
                  </div>
                  <!--card-->
                  <div class="text-center">

                        @if (Route::has('login'))

                        Already have an account? <a class="" href="{{ route('login') }}">{{ __('Login') }}
                              &nbsp;</a>

                        @endif
                        <br><br>
                  </div>

            </div>
      </div>
      </div>


      </div>
      <!--adminx-container-->
      <div class="container">
            <p></p>
      </div>



      <!-- footer-->
      <!--script-->
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
      <script src="admin/js/vendor.js"></script>
      <script src="admin/js/adminx.js"></script>
      <script src="admin/js/custom.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <script type="text/javascript">
      $('#reload').click(function() {
            $.ajax({
                  type: 'GET',
                  url: 'reload-captcha',
                  success: function(data) {
                        $(".captcha span").html(data.captcha);
                  }
            });
      });
      </script>


      <script>
      $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                  event.preventDefault();
                  if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("fa-eye-slash");
                        $('#show_hide_password i').removeClass("fa-eye");
                  } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("fa-eye-slash");
                        $('#show_hide_password i').addClass("fa-eye");
                  }
            });
      });
      </script>

      <script>
      function validate_password() {

            let pass = document.getElementById('password').value;
            let confirm_pass = document.getElementById('password-confirm').value;
            if (confirm_pass != pass) {
                  document.getElementById('wrong_pass_alert').style.color = 'red';
                  document.getElementById('password-confirm').style.border = '1px solid red';
                  document.getElementById('wrong_pass_alert').innerHTML =
                        '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>';

            } else if (confirm_pass = pass) {
                  document.getElementById('wrong_pass_alert').style.color = 'green';
                  document.getElementById('password-confirm').style.border = '1px solid green';
                  document.getElementById('wrong_pass_alert').innerHTML =
                        '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>';

            } else {
                  document.getElementById('wrong_pass_alert').innerHTML = ' ';
            }
      }

      function check_password() {
            let pass = document.getElementById('password').value;
            let confirm_pass = document.getElementById('password-confirm').value;

            if (pass.length < 8) {
                  document.getElementById('check_password').style.color = 'red';
                  document.getElementById('check_password').innerHTML = '☒ password  must be atleast 8 ';

            } else {
                  document.getElementById('check_password').innerHTML = ' ';
            }
      }
      </script>
</body>

</html>