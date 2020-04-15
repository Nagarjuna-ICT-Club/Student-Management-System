@extends('layouts.noauth')

@section('content')
<main class="mx-auto">
    <img src="{{ asset('asset/img/logo.png') }}" alt="Nagarjuna College of IT Logo" class="mx-auto">
    <form method="POST" id="sms_login"  action="{{ route('password.email') }}">

                        @csrf
                        <div class="">
                            <label for="email"><i class="far fa-user-circle"></i></label>
                            <input type="email" placeholder="Email" name="email" id="email" class=" @error('email') is-invalid @enderror" required autocomplete="email"  value="{{ old('email') }}"   autofocus/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            </div>
                            <button type="submit" class="btn submit"  id="sms_lg_sub">Send Verification Link</button>
                        </form>
                    </main>

@endsection
@section('js')
<script>
    
</script>
@endsection



