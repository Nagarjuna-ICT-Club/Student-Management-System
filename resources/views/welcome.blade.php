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
            <a href="#" class="backPage"><i class="fas fa-arrow-left"></i> Back to page</a>
        </header>
        <!-- header ends -->

        <!-- main starts -->
        <main class="mx-auto">
            <img src="{{ asset('asset/img/logo.png') }}" alt="Nagarjuna College of IT Logo" class="mx-auto">
            <form method="POST" id="sms_login">
                @csrf
                <div class="">
                <label for="email"><i class="far fa-user-circle"></i></label>
                <input type="email" placeholder="Email" id="email" class=" @error('email') is-invalid @enderror" required autocomplete="email" autofocus/>
                <span class="invalid-feedback" role="alert">
                    <strong class="error-email"></strong>
                </span>
                </div>
                <div class="password-container ">
                    <label for="password"><i class="fas fa-key"></i></label>
                    <input placeholder="Password" id="passwordInput"  type="password" class="@error('password') is-invalid @enderror" name="password" required />
                    <button><i id="eyeContainer" class="fas fa-eye-slash"></i></button>
                    <span class="invalid-feedback" role="alert">
                        <strong class="error-password"></strong>
                    </span>
                </div>
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class=" forgot">Forgot Password?</a>
                @endif
                     <button type="submit" class="btn submit"  id="sms_lg_sub">Login</button>
            </form>
        </main>
        <!-- mains ends -->


        <!-- footer starts -->
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
<div class="modal fade bd-example-modal-lg" id="activate_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content g-modal">
            <div class="modal-header">Activate Your Account</div>
                <form method="post" id="profile_ac_form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 m-auto">
                                <div class="form-group">
                                    <input type="email" class="form-control form-input" name="email"  id="check_email" value=" " placeholder="Enter Email Provided">
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm g-btn" id="act_btn">Activate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

        $("#sms_login").on('submit', function(e){
            e.preventDefault()
            var data = {
                email : $("#email").val(),
                password : $("#passwordInput").val()
            }
           $.ajax({
               method:"POST",
               url:"login",
               data: data,
               beforeSend: function(){
                    $("#sms_lg_sub").html("Signing in ....")
               }
           }).fail(function(response){
            toastr.options = {
                "newestOnTop": true,
                "progressBar": true,
            }
            toastr["error"]("Failed to login");
            getErrors(response);
            $("#sms_lg_sub").html("Login")
           }).done(function(){
            toastr.options = {
                "newestOnTop": true,
                "progressBar": true,
                "showDuration": "200",
                "hideDuration": "1000",
                "timeOut": "2000",
                            }
            toastr["success"]("Redirecting to home","Login Success");
            setTimeout(function(){
                window.location = "{{ route('home') }}"
            },2000);
           })
        })
        $('#activate_profile').click(function(){
            $("#activate_modal").modal({
                focus: true
            });
        })
        $("#profile_ac_form").submit(function(e){
            e.preventDefault()
            var data = {email: $("#check_email").val()}
           axios.post('http://sudeepmishra.com.np/api/check_email/',data)
            .then(function(response){
                if(response.data==""){
                    toastr.options = {
                        "newestOnTop": true,
                        "progressBar": true,
                        "timeOut": "1000",
                        }
                    toastr["error"]("Email not found.");
                }else{
                   axios.post("{{ route('api.create_account') }}", response.data)
                   .then(function(res){
                       toastr.options = {
                        "newestOnTop": true,
                        "progressBar": true,
                        "timeOut": "1000",
                        }
                    toastr["success"](res.data.message);
                     $("#activate_modal").modal('hide');
                     $("#email").val(res.data.email);
                   }).catch(err => console.log(err));
                }
            })
            .catch(error => console.log(error));


         })
         //var updated =

        // var profile = axios.post('http://sudeepmishra.com.np/new_student/',updated);
        // console.log(profile);
    </script>
    </body>
</html>
