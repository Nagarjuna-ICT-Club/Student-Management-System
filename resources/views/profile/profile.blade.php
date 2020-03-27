@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header row">
                 <div class="col-8">Profile</div>
                 <div class="col-4 text-right">Edit</div>
                </div>
                <div class="card-body">
                    @if($user->profile==null)
                       <p> Your profile is not ready yet</p>
                        <a class="btn btn-outline-secondary" href="#" id="edit_profile">Click Here to Setup your profile</a>
                    @else
                    <div class="col-md-6">
                        {{ $user->profile || 'Dispaly Name'}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">Edit Profile</div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control form-input"  id="email" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="form-group">
                            <input type="Username" class="form-control form-input"  id="username" value="{{ $user->profile->username ?? "" }}" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <select name="" id="fac_opt" class="form-control form-input">
                                <div id="fac_opt"></div>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="" id="" class="form-control form-input" placeholder="+9779808989898">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select name="" id="fac_opt" class="form-control form-input">
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}" @if($user->semester==$i) selected @endif>Semester {{$i}} </option>
                                @endfor
                             </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-sm">Save</button>
          </div>
      </div>

    </div>
  </div>
@endsection
@section('js')
    <script>
         $.ajax({
                method: "GET",
                url: "{{ route('api.faculties') }}"
            }).done(function(res){
               localStorage.setItem('faculties',res);
            })

        $('#edit_profile').click(function(){
            $("#edit_modal").modal();
            var fac = localStorage.getItem('faculties');
            fac = JSON.parse(fac);

            for (let index = 0; index < fac[0].length; index++) {
                const element = fac[0][index];
                $("#fac_opt").append("<option value='"+element+"'>"+element+"</option>");
            }
        })


    </script>
@endsection
