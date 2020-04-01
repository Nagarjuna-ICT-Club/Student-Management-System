<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <title>SMS | @yield('title')</title>
            <link rel="shortcut icon" href="{{ asset('asset/img/logo.png') }}">
            <meta name="description" content="Latest updates and statistic charts">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('asset/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('css/toastr.css') }}" rel="stylesheet" type="text/css" />
            <script src="{{ asset('asset/js/webfont.js')}}"></script>
             <!-- Scrollbar Custom CSS -->
            <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
            <!-- tailwind css -->
            <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
            <!-- main css -->
            <link rel="stylesheet" href="{{ asset("asset/css/style.css") }}">
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
    <div id="app">
          <!-- header starts -->
          <nav-com></nav-com>
    <!-- header ends -->

    <!-- main starts -->
    <main>
        <div class="wrapper">
            <!-- Sidebar  -->
            <!-- here the class active is used to hide the sidebar -->
            <nav id="sidebar" class="active">
                <ul>
                    <li>
                        <i class="fas fa-home"></i> Home
                    </li>
                    <li>
                        <i class="fas fa-newspaper"></i> Attendance
                    </li>
                    <li>
                        <i class="fas fa-dollar-sign"></i> Fees Details
                    </li>
                    <li>
                        <i class="fas fa-list-ul"></i> Assignments
                    </li>
                    <li>
                        <i class="far fa-question-circle"></i> Examination
                    </li>
                    <li>
                        <i class="fas fa-scroll"></i> Results
                    </li>
                    <li>
                        <i class="far fa-envelope"></i> Messages
                    </li>
                    <li>
                        <i class="fas fa-gift"></i> Opportunities
                    </li>
                    <li>
                        <i class="fas fa-code"></i> Practicals
                    </li>
                    <li>
                        <a href="{{ route('applications.home') }}"><i class="far fa-check-circle"></i> Approved Application</a>
                    </li>
                    <li>
                        <i class="far fa-user"></i> Faculty
                    </li>
                </ul>
            </nav>
            <div id="content">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-chevron-left"></i>
                </button>
            </div>


            @yield('content')
        </main>
    </div>

    <!-- footer starts -->
    <footer>
        footer
    </footer>
    <!-- footer ends -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="{{ asset('asset/js/jquery.js') }}"></script>
<script src="{{ asset('asset/js/vendor.bundle.js') }}"></script>
<script src="{{ asset('asset/js/form.js') }}"></script>
<script src="{{ asset('asset/js/toastr.js') }}"></script>
<!-- Popper.JS -->
<!-- chart js -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 <!-- custom js -->
<script src={{ asset("asset/js/script.js") }}></script>
<script>
     $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
</script>
@yield('js')
</body>
</html>
