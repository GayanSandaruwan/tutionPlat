<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tuition extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'subject', 'grade', 'description','standard_charge','per_additional_hour','teacher_id',];

    public function tuition_places(){
        return $this->hasMany('App\TuitionPlace');
    }

}
