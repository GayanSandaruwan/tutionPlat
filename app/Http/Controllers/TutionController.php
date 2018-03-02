<?php

namespace App\Http\Controllers;

use App\tuition;
use Illuminate\Http\Request;

class TuitionController extends Controller
{
    //
    /*
     * Creating a new tuition Class
     */
    public function createtuition(Request $request){

        $tuition = new Tuition();

        $tuition->subject = $request['subject'];
        $tuition->grade = $request['grade'];
        $tuition->description = $request['description'];
        $tuition->standard_charge = $request['standard_charge'];
        $tuition->per_additional_hour = $request['per_additional_hour'];
        $tuition->teacher_id = Auth::guard('teacher')->user()->id;

        $success = $tuition->save();

        return view('teacher.tuition.success');
    }
}
