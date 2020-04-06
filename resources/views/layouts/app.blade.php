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
            <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />
            <script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
            <link rel="stylesheet" href="{{ asset("asset/css/style.css") }}">
                <script>
                    WebFont.load({
                        google: {"families":["Poppins:300,400,500,600,700"]},
                        active: function() {
                            sessionStorage.fonts = true;
                        }
                    });
                </script>
                <style>
                    .chat {
                      list-style: none;
                      margin: 0;
                      padding: 0;
                    }

                    .chat li {
                      margin-bottom: 10px;
                      padding-bottom: 5px;
                      border-bottom: 1px dotted #B3A9A9;
                    }

                    .chat li .chat-body p {
                      margin: 0;
                      color: #777777;
                    }

                    .panel-body {
                      overflow-y: scroll;
                      height: 350px;
                    }

                    ::-webkit-scrollbar-track {
                      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                      background-color: #F5F5F5;
                    }

                    ::-webkit-scrollbar {
                      width: 12px;
                      background-color: #F5F5F5;
                    }

                    ::-webkit-scrollbar-thumb {
                      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
                      background-color: #555;
                    }
                  </style>

    </head>
<body id="">
    <div id="app">
          <!-- header starts -->
          <nav-com user="{{ Auth::user()->full_name }}"></nav-com>
    <!-- header ends -->

    <!-- main starts -->
    <main>
        <div class="wrapper">
            <!-- Sidebar  -->
            <!-- here the class active is used to hide the sidebar -->
            <side-bar id={{ Auth::user()->uid }}></side-bar>
            <div class="container">
                <!-- page title starts -->
                <div class="pageTitle">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <i class="fas fa-home"></i> @yield('bread')
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-right">
                        Today: <span class="date">{{ date('d M') }}</span>
                        </div>
                    </div>
                </div>
                <!-- page title ends -->
                <hr />
            @yield('content')
        </main>
    </div>

    <!-- footer starts -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    &copy; Nagarjuna College of IT. All Rights Reserved
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 text-right">
                    <ul>
                        <li>
                            <a href="">About</a>
                        </li>
                        <li>
                            <a href="">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
<script src="{{ asset("asset/js/script.js") }}"></script>
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
