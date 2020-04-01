<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = ['student_id','program_id','semester_id','bio','fb','gh','li','contact_number'];

}
