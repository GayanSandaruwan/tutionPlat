<?php

namespace App\Http\Controllers;

use App\Tuition;
use App\TuitionPlace;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TutionController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'subject' => 'required|max:30',
            'grade' => 'required|numeric|max:13',
            'description' => 'required|min:10',
            'standard_charge' => 'required|numeric|max:10000|min:500',
            'per_additional_hour'=> 'required|numeric|max:5000|min:100',
        ]);
    }
    /*
     * Creating a new tuition Class
     */
    public function create_tuition(Request $request){
        if($request->submitbutton=='cancel'){
            return view('teacher.home');
        }
        $this->validator($request->all())->validate();

        $tuition = new Tuition();

        $tuition->subject = $request['subject'];
        $tuition->grade = $request['grade'];
        $tuition->description = $request['description'];
        $tuition->standard_charge = $request['standard_charge'];
        $tuition->per_additional_hour = $request['per_additional_hour'];
        $tuition->teacher_id = Auth::guard('teacher')->user()->id;

        $success = $tuition->save();

        $placesArr = explode(',',$request['places']);
        for ($i=0;$i<sizeof($placesArr); $i++){

            $tuition_place = new TuitionPlace();
            $tuition_place->tuition_id = $tuition->id;
            $tuition_place->place = trim($placesArr[$i]);
            $tuition_place->save();
        }

        return view('teacher.tuition.success');
    }
}
