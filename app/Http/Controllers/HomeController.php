<?php

namespace App\Http\Controllers;

use App\Model\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Ixudra\Curl\Facades\Curl;
use Hash;
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
    public function curl(Request $request)
    {
        

        $data = json_encode($request->all());
        // dd($data);
        $response = Curl::to('http://sudeepmishra.com.np/new_student')
        ->withData($data )
        ->withContentType('application/json')
        ->returnResponseObject()
        ->asJson( true )
        ->get();

        // $client = new \GuzzleHttp\Client();
        // $url = "http://localhost/api/public/new_student";
        // $data = $request->all();
        // $data = json_encode($data);
        // $request = $client->get($url,  ['body'=>$data]);
        // $response = $request->sendAsync();

        dd($response);

       // curl_init();
    //    $data = $request->all();
    //    $data = json_encode($data);
    //    // dd($output);
    //    $url = "http://localhost/api/public/new_student";  // url where the data should be posted to
    //     $headers=array("Accept: application/json","Content-Type: application/json");

    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_HEADER, $headers);
    //     curl_setopt($curl, CURLOPT_POST, 0);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS,$data);
    //     $myResponse = curl_exec ($curl);
    //     curl_close ($curl);
        //dd($myResponse);
    }


}
