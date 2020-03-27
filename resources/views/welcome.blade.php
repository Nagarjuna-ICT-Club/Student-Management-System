<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <title>SMS | Login</title>
            <link rel="shortcut icon" href="{{ asset('assets/media/fav.ico') }}">
            <meta name="description" content="Latest updates and statistic charts">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('asset/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
            <script src="{{ asset('asset/js/webfont.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light clr-white">
            <div class="container">
                <p><i class="la la-arrow-left"></i> Back to page</p>
            </div>
          </nav>
        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif--}}

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 m-auto">
                        <div class="login-box mt-5 mb-5">
                            <div class="col-md-8 col-sm-12 m-auto">
                                <div class="login-wrapper">
                                    <div class="login-form">
                                        <div class="col-6 m-auto text-center img-container">
                                            <img src="{{ asset('asset/img/logo.png') }}" alt="logo">
                                        </div>
                                    <form method="POST" id="sms_login">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="email" class="col-2 px-0 text-md-right"><i class="la la-2x la-user"></i></label>
                                            <div class="col-10">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">
                                                {{-- error handling with laravel --}}
                                                {{-- @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror --}}
                                                <span class="invalid-feedback" role="alert">
                                                    <strong class="error-email"></strong>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-2 px-0 mx-0 text-md-right"><i class="la la-2x la-key"></i></label>
                                            <div class="col-10 d-flex">
                                                <div class="w-100">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror  login-input" name="password" required autocomplete="current-password" placeholder="Password">
                                                </div>
                                                <div class="eye">
                                                        <button class="btn sh" id="hide_show" data-ac="0"><i class="la la-2x la-eye"></i></button>
                                                </div>
                                                        {{-- @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror --}}
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong class="error-password"></strong>
                                                        </span>

                                            </div>
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-md-right offset-2">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-10 offset-2">
                                                <button type="submit" class="btn btn-primary btn-block" id="sms_lg_sub">
                                                    {{ __('Login') }}
                                                </button>
                                            </div>
                                        </div>

                                        {{-- <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}



                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="mt-5 text-white">
            <div class="container">
                <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="text-left">
              <p class="text-white"><i class="la la-copyright"></i>  All Right Reserved</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="other_link">
                        <a href="#" class="text-white px-1" >About</a>
                        <a href="#" class="text-white px-1">Contact</a>
                    </div>
                </div>
            </div>
            </div>
            </footer>
            </div>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('asset/js/form.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.js') }}"></script>
    <script src="{{ asset('asset/js/vendor.bundle.js') }}"></script>
    <script>
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $("#hide_show").on('click', function(e){
            e.preventDefault();
            var data = $(this).data('ac');
            if(data==0){
                $("#password").attr("type","text");
                $(this).html("<i class='la la-2x la-eye-slash'></i>")
                $(this).data('ac',1);
            }else{
                $("#password").attr("type","password");
                $(this).html("<i class='la la-2x la-eye'></i>")
                $(this).data('ac',0);

            }
        })

        $("#sms_login").on('submit', function(e){
            e.preventDefault()
            var data = {
                email : $("#email").val(),
                password : $("#password").val()
            }
           $.ajax({
               method:"POST",
               url:"{{ route('login') }}",
               data: data,
               beforeSend: function(){
                    $("#sms_lg_sub").html("Signing in ....")
               }
           }).fail(function(response){
               getErrors(response);
               $("#sms_lg_sub").html("Login")
           }).done(function(){
               window.location = "{{ route('home') }}"
           })



        })
    </script>
    </body>
</html>
