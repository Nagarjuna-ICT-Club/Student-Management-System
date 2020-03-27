<?php

namespace App\Http\Controllers;

use App\Model\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile(){

    $id = Auth::id();
    //    dd($user);
    $user = User::where('id',$id)->with('profile')->first();
    // dd($user);
    return view('profile.profile',compact('user'));

    }

    public function EditProfile(Request $request,$id)
    {
       $data = $this->getArray($request);
       $data['student_id'] = $id;
       $st = Profile::where('student_id',$id)->first();
        if($st!=null){
            if(Profile::where('student_id',$id)->update($data)){
                return response()->json($data);
            }else{
                return response()->json(['type'=>'error','message'=>'failed to update profile']);
            }
        }else{
            if(Profile::create($data)){
                return response()->json($data);
            }else{
                return response()->json(['type'=>'error','message'=>'failed to build profile']);
            }
        }

    }
}
