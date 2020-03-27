@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex">
                 <div class="col-8">Profile</div>
                 <div class="col-4 text-right">
                    <button id="edit_profile" class="btn"><i class="fas fa-user-edit"></i></button>
                   </div>
                </div>
                <div class="card-body profile_body">
                    <div class="pre_loader col-md-8 m-auto">
                        <img src="{{ asset('asset/img/gloader.gif') }}" alt="">
                    </div>
                    <div class="row">
                        @if($user->profile==null)
                        <p> Your profile is not ready yet</p>
                            <a class="btn btn-outline-secondary" href="#" id="edit_profile">Click Here to Setup your profile</a>
                        @else
                        <div class="col-md-6 profile_info">
                            {{ $user->profile ?? 'Dispaly Name'}}
                            <a class="btn btn-outline-secondary" href="#" id="edit_profile">Edit your profile</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">Edit Profile</div>
        <form method="post" id="profile_ed_form">
        <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control form-input" name="email"  id="email" value="{{ $user->email }}" disabled readonly>
                        </div>
                        <div class="form-group">
                            <input type="Username" class="form-control form-input"  id="username" value="{{ $user->name ?? "" }}" placeholder="Username" disabled readonly>
                        </div>
                        <div class="form-group">
                            <select name="faculty" id="fac_opt" class="form-control form-input">
                                <div id="fac_opt"></div>
                            </select>
                        </div>
                        <div class="form-group">
                        <input type="text" name="phone" id="" class="form-control form-input" placeholder="+9779808989898" value="{{ $user->profile->phone }}">
                        </div>
                        <div class="form-group">
                            <textarea name="bio" id="" cols="30" rows="5" name="bio" class="form-input" placeholder="Your bio here !!!">{{ $user->profile->bio }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="sem" id="fac_opt" class="form-control form-input">
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" @if($user->sem==$i) selected @endif>Semester {{$i}} </option>
                                @endfor
                             </select>
                        </div>
                        <div class="label profile_edit social mb-3 g-btn">
                            <span>Social</span>
                        </div>
                        <div class="form-group">
                        <input class="form-control form-input" type="url" value="{{ $user->profile->fb }}" name="fb" id="" placeholder="facebook profile">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-input" type="url" value="{{ $user->profile->gh }}" name="gh" id="" placeholder="github profile">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-input" type="url" value="{{ $user->profile->li }}" name="li" id="" placeholder="linkedin profile">
                        </div>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm g-btn" id="edit_sub">Save</button>
          </div>
      </div>
    </form>
    </div>
  </div>
@endsection
@section('js')
    <script>
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         $.ajax({
                method: "GET",
                url: "{{ route('api.faculties') }}"
            }).done(function(res){
               localStorage.setItem('faculties',res);
            })
        $(document).ready(function(){
            setTimeout(function(){
                $('.pre_loader').hide()
            },3000)
        })
        $('#edit_profile').click(function(){
            $("#edit_modal").modal({
                focus: true
            });
            var fac = localStorage.getItem('faculties');
            fac = JSON.parse(fac);
            for (let index = 0; index < fac[0].length; index++) {
                const element = fac[0][index];
                $("#fac_opt").append("<option value='"+element+"'>"+element+"</option>");
            }
        })
         $("#profile_ed_form").submit(function(e){
            e.preventDefault()
            var data = getData($(this));
            console.log(data);
            $.ajax({
                method: "POST",
                data: {data: data },
                url:'{{ route("edit_profile", Auth::user()->id ) }}',
                beforeSend: function() {
                    $('#edit_sub').html('updating..');
                }
            }).done(function(res){
                toastr.options = {
                "newestOnTop": true,
                "progressBar": true,
                }
                toastr["success"]("Profile updated!!");
                $("#edit_modal").modal('hide');
                $('.pre_loader').show()
                setTimeout(function(){
                    $('.pre_loader').hide()
                },3000)
                $('.profile_info').text(res);

            }).fail(function(res){
                toastr.options = {
                "newestOnTop": true,
                "progressBar": true,
                }
                toastr["error"]("Failed to update");
                getErrors(response);
                $("#edit_sub").html("save")
                })
         })



    </script>
@endsection
