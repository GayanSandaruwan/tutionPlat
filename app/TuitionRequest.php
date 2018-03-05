<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuitionRequest extends Model
{
    protected $fillable = [
        'student_id', 'teacher_id', 'tuition_id','teacher_responded','response','description',];

}
