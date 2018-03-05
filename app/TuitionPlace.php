<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuitionPlace extends Model
{
    protected $fillable = [
        'tuition_id', 'place',];

    public function tuition(){
        return $this->belongsTo('App\Tuition');
    }
}

