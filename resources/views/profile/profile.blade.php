@extends('layouts.app')

@section('content')
<div id="application"></div>
{{-- jk--}}
@endsection
@section('js')
<script>
    $(document).ready(function(){
        setTimeout(function(){
            $('.pre_loader').hide()
        },1000)
    })
</script>
    {{-- <script>
        {{--
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

        $('#edit_profile').click(function(){
            $("#edit_modal").modal({
                focus: true
            });
            var fac = localStorage.getItem('faculties');
            fac = JSON.parse(fac);
            $("#fac_opt").empty();
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





    </script> --}}
@endsection
