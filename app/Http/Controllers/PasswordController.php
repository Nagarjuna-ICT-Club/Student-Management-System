<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Hash;
use Auth;
class PasswordController extends Controller
{
    //
    use ConfirmsPasswords;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(ChangePasswordRequest $request)
    {
        if($this->confirm($request)){
            $pass = Hash::make($request->new_password);
            $user = User::where('id', Auth::user()->id)->first();
            $user->password = $pass;
            $user->save();
            return response()->json(['message'=>'Password Changed','status'=>200]);
        }

    }
}
