@extends('layouts.noauth')
@section('content')

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
@endsection

        <!-- footer starts -->

{{-- <div class="modal fade bd-example-modal-lg" id="activate_modal" tabindex="-1" role="dialog" aria-hidden="true">
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
    </div> --}}
    @section('js')
 <script>
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
    @endsection
   
