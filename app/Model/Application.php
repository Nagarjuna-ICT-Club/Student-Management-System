<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $fillable = ['app_id','student_id','title','description','duration','from','to','status'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . $characters[rand(0, strlen($characters) - 1)];

            // shuffle the result
            $string = str_shuffle($pin);
            $model->app_id = $model->student_id.'_'.$string;
        });
    }
}
