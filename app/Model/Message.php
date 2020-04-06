<?php

namespace App\Model;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['student_id','message','status','from'];

    public function user()
    {
         return $this->belongsTo('App\User','student_id','uid');
    }
}
