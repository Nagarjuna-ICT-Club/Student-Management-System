<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppRequest;
use App\Model\Application;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ApplicationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        $apps = Application::where('student_id',Auth::user()->uid)->orderBy('updated_at')->get();
        return $apps;

    }
    public function create(AppRequest $request)
    {
       $data =  $request->all();
       $data['student_id'] = Auth::user()->uid;
       $data['status']=0;
       $from = Carbon::parse($data['from']);
       $data['duration'] = $from->diffInDays($data['to']);
        if($apps= Application::create($data)){
            return response()->json(['message'=>'Application sumitted','status'=>200,'admin'=>$apps]);
        }else {
            return response()->json(['message'=>'failed to submit application','status'=>422]);
        }
    }
}
