<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //

    protected $fillable = ['student_id','notification','status'];

    // public function user()
    // {
    //      return $this->belongsTo('App\User','student_id','uid');
    // }
}
