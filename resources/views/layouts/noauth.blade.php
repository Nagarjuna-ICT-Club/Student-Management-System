<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <title>SMS | Login</title>
            <link rel="shortcut icon" href="{{ asset('asset/img/logo.png') }}" type="image/x-icon">
            <meta name="description" content="Student Managment System">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('asset/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('asset/css/login.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
            <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
            <link href="{{ asset('css/toastr.css') }}" rel="stylesheet" type="text/css" />
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
    <body class="container">
        <!-- header starts -->
        <header>
            <a href="#" onclick="javascript:history.go(-1)" class="backPage"><i class="fas fa-arrow-left"></i> Back to page</a>
        </header>
        <!-- header ends -->
        @yield('content')

        <footer>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    &copy; Nagarjuna College of IT. All Rights Reserved
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-xl-right text-lg-right text-md-right">
                    <ul>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('asset/js/form.js') }}"></script>
        <script src="{{ asset('asset/js/jquery.js') }}"></script>
        <script src="{{ asset('asset/js/toastr.js') }}"></script>
        <script src="{{ asset('asset/js/vendor.bundle.js') }}"></script>
        <script>
            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
            var secured = true
            const eyeOpen = "far fa-eye";
            const eyeClosed = "fas fa-eye-slash";
            const eyeContainer = document.getElementById("eyeContainer");
            const inputBox = document.getElementById("passwordInput");

            eyeContainer.addEventListener("click", function changeEye(e) {
                e.preventDefault();

                if (secured) {
                    eyeContainer.setAttribute("class", eyeOpen);
                    inputBox.setAttribute("type", "text");
                    secured = false
                } else {
                    eyeContainer.setAttribute("class", eyeClosed);
                    inputBox.setAttribute("type", "password");
                    secured = true
                }
            });
</script>
        @yield('js')
</body>
</html>


