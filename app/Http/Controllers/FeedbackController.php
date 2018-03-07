<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Tuition;
use App\TuitionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    //


    public function feedback_form(Request $request){

        $tuition_request = TuitionRequest::find($request->request_id)->get();


        return view('student.feedback.add_feedback',['tuition_id'=>$tuition_request[0]->tuition_id]);
    }

    protected function add_feedback_validator(array $data)
    {
        return Validator::make($data, [
            'tuition_id' => 'required|numeric',
            'feedback' => 'required|max:1000',
            'rating' => 'required|numeric',

        ]);
    }
    public function add_feedback(Request $request){

        if(!$request->submitbutton){
            return view('student.home');
        }
        else{
            $this->add_feedback_validator($request->all())->validate();
            $tuition_id = $request->tuition_id;

            $tuition = Tuition::find($tuition_id)->get()[0];
            $feedback = new Feedback();
            $feedback->student_id = Auth::guard('student')->user()->id;
            $feedback->teacher_id = $tuition->teacher_id;
            $feedback->tuition_id = $tuition_id;
            $feedback->rating = $request->rating;
            $feedback->feedback = $request->feedback;
            try{
                $feedback->save();
                return view('student.feedback.success');
            }
            catch (\PDOException $exception){
                return view('student.feedback.failed');

            }
        }

    }
}
