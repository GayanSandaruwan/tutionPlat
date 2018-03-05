<?php

namespace App\Http\Controllers;

use App\Tuition;
use App\TuitionPlace;
use App\TuitionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TuitionRequestController extends Controller
{
    //

    /*
     * Creating a new Tuition Request Class
     */
    public function create_tuition(Request $request){

        if($request->submitbutton == 'cancel'){
            return view('student.home');
        }
        $tuitionReq = new TuitionRequest();

        $tuitionReq->student = Auth::guard('student')-user()->id;
        $tuitionReq->tuition_id = $request['tuition_id'];
        $tuitionReq->teacher_id = Tuition::where('id',$request['tuition_id'])->first()->teacher_id;
        $tuitionReq->teacher_responded = false;
        $tuitionReq->response = false;
        $tuitionReq->description= $request['description'];

        $success = $tuitionReq->save();
        if($success) {
            return view('student.tuition_request.success');
        }
        else{
            return view('student.tuition_request.failed');
        }
    }

    public function searach_by_place(array $data){

        $place = $data['search'];
        $tuitions = DB::table('tuitions')->leftJoin('tuition_places','tuitions.id','=','tuition_places.tuition_id')
            ->leftJoin('teachers','tuitions.teacher_id','=','teachers.id')
            ->select('tuitions.*','tuition_places.place','teachers.*')->where('tuition_places.place','like',"%" . $place . "%")->latest('tuitions.created_at')->get();

        return $tuitions;
    }


    public function searach_by_subject(array $data){

        $subject = $data['search'];
        $tuitions = DB::table('tuitions')->leftJoin('tuition_places','tuitions.id','=','tuition_places.tuition_id')
            ->leftJoin('teachers','tuitions.teacher_id','=','teachers.id')
            ->select('tuitions.*','tuition_places.place','teachers.*')->where('tuitions.subject','like',"%" . $subject . "%")->latest('tuitions.created_at')->get();

        return $tuitions;
    }


    public function searach_by_teacher(array $data){

        $teacher =  $data['search'];
        $tuitions = DB::table('tuitions')->leftJoin('tuition_places','tuitions.id','=','tuition_places.tuition_id')
            ->leftJoin('teachers','tuitions.teacher_id','=','teachers.id')
            ->select('tuitions.*','tuition_places.place','teachers.*')->where('teachers.name','like',"%" . $teacher . "%")->latest('tuitions.created_at')->get();

        return $tuitions;
    }

    public function search(Request $request){

        $this->validate_search($request->all())->validate();

        if($request->submitbutton=='place'){
            $tutions = $this->searach_by_place($request->all());
            return view('student.search_results',['tuitions'=>$tutions]);
        }
        else if($request->submitbutton=='subject'){
            $tutions = $this->searach_by_subject($request->all());
            return view('student.search_results',['tuitions'=>$tutions]);
        }
        else if($request->submitbutton=='teacher'){
            $tutions = $this->searach_by_place($request->all());
            return view('student.search_results',['tuitions'=>$tutions]);
        }
    }

    protected function validate_search(array $data)
    {
        return Validator::make($data, [
            'search' => 'required|max:100',
        ]);
    }





}
