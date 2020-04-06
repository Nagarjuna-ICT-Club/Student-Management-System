<?php

namespace App\Http\Controllers;

use App\Model\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
class ChatsController extends Controller
{
    //



public function __construct()
{
  $this->middleware('auth');
}

/**
 * Show chats
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
  return view('chat');
}

/**
 * Fetch all messages
 *
 * @return Message
 */
public function fetchMessages()
{
  return Message::with('user')->get();
}

/**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */


public function sendMessage(Request $request)
{
  $user = Auth::user();
    $message['student_id'] = $user->uid;
    $message['message'] = $request->message;
    $message['from'] = 'admin';
    $message['status'] = 0;
    // dd($message);
    $messages = Message::create($message);

//   $message = $user->messages()->create([
//     'message' => $request->input('message')
//   ]);

  broadcast(new MessageSent($user, $messages))->toOthers();

  return ['status' => 'Message Sent!'];
}
}
