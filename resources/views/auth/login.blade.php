<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <title>VMS | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>
    <link href="{{ asset('backend-assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend-assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{asset('backend-assets/plugins/jvectormap-next/jquery-jvectormap.css')}}" rel="stylesheet">
</head>

<body class="pace-top">
    <div id="app" class="app app-full-height app-without-header">
        <div class="login">
            <div class="login-content">
                @include('alerts.alerts')
                <form action="{{ url('/login') }}" method="POST" name="login_form">
                    @csrf
                    <h1 class="text-center">Sign In</h1>
                    <div class="text-inverse text-opacity-50 text-center mb-4"> For your protection, please verify your
                        identity. </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-lg bg-inverse bg-opacity-5"
                            name="username" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <label class="form-label">Password <span class="text-danger">*</span>
                            </label>
                            @if (Route::has('password.request'))
                              <a href="{{ route('password.request') }}" class="ms-auto text-inverse text-decoration-none text-opacity-50">Forgot password?</a>
                            @endif
                            
                        </div>
                        <input type="password" class="form-control form-control-lg bg-inverse bg-opacity-5"
                            name="password" required>
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value id="customCheck1">
                            <label class="form-check-label" for="customCheck1">Remember me</label>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-outline-theme w-100 fw-500 mb-3">Sign In</button>
                    {{-- <button type="button" data-toggle="modal" data-target="#visitorRegistration" class="btn btn-outline-theme w-45 fw-500 mb-3">Visitor Registration</button> --}}

                </form>


                {{-- Visitor registration modal --}}
                <div id="visitorRegistration" class="modal fade" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header py-5">
                                <h5 class="modal-title">Add New Visitor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="fas fa-close"></i>
                                </button>
                            </div>
                            <form class="form" action="{{route('visitorRegistration')}}" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="name_bn">Name (Bangla):</label>
                                                <input type="text" class="form-control" id="name_bn" name="name_bn" placeholder="Enter Visitor Name in Bangla" value="{{ old('name_bn') }}" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="name_en">Name (English):<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="name_en" name="name_en" placeholder="Enter Visitor Name in English" value="{{ old('name_en') }}" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="mobile">Mobile:<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Valid Mobile Number" value="{{ old('mobile') }}" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="email">Email:<span style="color:red;">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Valid Email Address" value="{{ old('email') }}" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password:<span style="color:red;">*</span></label>
                                                <a onmousedown="passwordShow()" onmouseup="passwordHide()">
                                                    <i class="fa-solid fa-eye" style="font-size: 1.4em;"></i>
                                                </a>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Minimum 8 Characters" minlength="8" @error('password')@enderror required/>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label for="confirm_password" class="form-label">Confirm Password<span style="color:red;">*</span></label>
                                                <a onmousedown="confirmPasswordShow()" onmouseup="confirmPasswordHide()">
                                                    <i class="fa-solid fa-eye" style="font-size: 1.4em;"></i>
                                                </a>
                                                <input id="confirm_password" type="password" class="form-control" name="password_confirmation" placeholder=" Confirm your password" @error('password')@enderror required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="form-label" for="image">Profile Picture:</span></label>
                                                <input type="file" class="form-control" id="image" name="image"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                    
            </div>
        </div>

        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade">
            <i class="fa fa-arrow-up"></i>
        </a>
    </div>

    <script src="{{asset('backend-assets/js/jquery_3_70.js')}}"></script>
    <script src="{{asset('backend-assets/js/popper.min.js')}}"></script>
    <script src="{{asset('backend-assets/js/bootstrap.min.js')}}"></script>


    <script src="{{asset('backend-assets/js/vendor.min.js')}}"></script>
    <script src="{{asset('backend-assets/js/app.min.js')}}"></script>

    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'G-Y3Q0VGQKY3');
    </script>

    <script src={{ asset('backend-assets/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}
        data-cf-settings="d95b7560273e567d7f930d6e-|49" defer></script>

        <script>
            function passwordShow(){
                var password = document.getElementById('password');
                password.setAttribute('TYPE', 'TEXT');
            }
    
            function passwordHide(){
                var password = document.getElementById('password');
                password.setAttribute('TYPE', 'PASSWORD');
            }
    
            function confirmPasswordShow(){
                var password = document.getElementById('confirm_password');
                password.setAttribute('TYPE', 'TEXT');
            }
    
            function confirmPasswordHide(){
                var password = document.getElementById('confirm_password');
                password.setAttribute('TYPE', 'PASSWORD');
            }
        </script>

</body>


</html>
