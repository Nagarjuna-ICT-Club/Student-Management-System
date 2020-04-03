<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ApiController extends Controller
{
    //

    public function BuildCred(Request $request)
    {
       $user = new User();
       $user->uid = $request->uid;
       $user->full_name = $request->full_name;
       $user->password = $request->password;
       $user->email = $request->email;
       if ($user->save()) {
          return response()->json(['message'=>'Account Activated','email'=>$user->email]);
       } else {
          return response()->json(['message'=>'failed to activate account']);
       }

    }

    public function getUser()
    {
       $user = Auth::user();
       return response()->json(['user'=>$user->full_name,'user_id'=>$user->uid]);
    }
}
