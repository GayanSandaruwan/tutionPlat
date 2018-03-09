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
        /*
         * If using pgsql use ilike instead of the like to have better search
         */
        $place = $data['search'];
        $tuitions = DB::table('tuitions')->leftJoin('tuition_places','tuitions.id','=','tuition_places.tuition_id')
            ->leftJoin('teachers','tuitions.teacher_id','=','teachers.id')
            ->select('tuitions.*','tuition_places.*','teachers.*')
            ->where('tuition_places.place','like',"%" . $place . "%")
            ->latest('tuitions.created_at')->get();

        return $tuitions;
    }


    public function searach_by_subject(array $data){
        /*
         * If using pgsql use ilike instead of the like to have better search
         */
        $subject = $data['search'];
        $tuitions = DB::table('tuitions')->leftJoin('tuition_places','tuitions.id','=','tuition_places.tuition_id')
            ->leftJoin('teachers','tuitions.teacher_id','=','teachers.id')
            ->select('tuitions.*','tuition_places.*','teachers.*')
            ->where('tuitions.subject','like',"%" . $subject . "%")
            ->latest('tuitions.created_at')->get();

        return $tuitions;
    }


    public function searach_by_teacher(array $data){

        /*
         * If using pgsql use ilike instead of the like to have better search
         */
        $teacher =  $data['search'];
        $tuitions = DB::table('tuitions')->leftJoin('tuition_places','tuitions.id','=','tuition_places.tuition_id')
            ->leftJoin('teachers','tuitions.teacher_id','=','teachers.id')
            ->select('tuitions.*','tuition_places.*','teachers.*')
            ->where('teachers.name','like',"%" . $teacher . "%")
            ->latest('tuitions.created_at')->get();

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
            $tutions = $this->searach_by_teacher($request->all());
            return view('student.search_results',['tuitions'=>$tutions]);
        }
    }

    protected function validate_search(array $data)
    {
        return Validator::make($data, [
            'search' => 'required|max:100',
        ]);
    }

    public function viewTuition(Request $request){

        $tuition_id = $request->requestbutton;
        $tuition = DB::table('tuitions')->leftJoin('teachers','teachers.id','=','tuitions.teacher_id')
            ->select('tuitions.*','teachers.name','teachers.email','teachers.address','teachers.description as teacher_desc','teachers.phone')
            ->where('tuitions.id',$tuition_id)->get();
        $tuition_places = DB::table('tuition_places')
            ->where('tuition_id',$tuition_id)->select('*')->get();

        return view('student.tuition_request.tuition',['tuition'=>$tuition[0],'tuition_places'=>$tuition_places]);
    }

    protected function validate_request(array $data){
        return Validator::make($data, [
            'description' => 'required|max:1000',
        ]);

    }
    public function requestTuition(Request $request){

//            $this->validate_request($request->all())->validate();


           $tuition_id = $request->requestbutton;
           $tuition = DB::table('tuitions')->leftJoin('teachers','teachers.id','=','tuitions.teacher_id')
               ->select('tuitions.*','teachers.name','teachers.email','teachers.address','teachers.description as teacher_desc','teachers.id as teacher_id')
               ->where('tuitions.id',$tuition_id)->get();
           $tuition_places = DB::table('tuition_places')
               ->where('tuition_id',$tuition_id)->select('*')->get();

           $tuition_request = new TuitionRequest();
           $tuition_request->student_id = Auth::guard('student')->user()->id;
           $tuition_request->teacher_id = $tuition[0]->teacher_id;
           $tuition_request->tuition_id = $tuition[0]->id;
           $tuition_request->teacher_responded = 'not_responded';
           $tuition_request->response = 'pending';
           $tuition_request->description = $request->description;
           try{
           $success = $tuition_request->save();
           }
           catch (\PDOException $exception){
               $success=false;
           }
           if($success){
               return view('student.tuition_request.requested',['tuition'=>$tuition[0],'tuition_places'=>$tuition_places]);

           }
           else{
               return view('student.tuition_request.failed',['tuition'=>$tuition[0],'tuition_places'=>$tuition_places]);
           }
    }

    public function view_requests(Request $request){

        $requests = DB::table('tuition_requests')
            ->leftJoin('students','students.id','=','tuition_requests.student_id')
            ->leftJoin('tuitions','tuitions.id','=','tuition_requests.tuition_id')
            ->where('tuition_requests.teacher_responded','not_responded')
            ->where('tuition_requests.teacher_id',Auth::guard('teacher')->user()->id)
            ->select('tuitions.*','students.*','tuition_requests.tuition_id',
                'tuition_requests.description as stu_desc','tuition_requests.response','tuition_requests.id as request_id','tuition_requests.teacher_responded')
            ->orderBy('tuition_requests.teacher_responded')
            ->get();

        return view('teacher.tuition_request.all_requests',['requests'=>$requests]);
    }

    public function process_tuition_request(Request $request){
        $tuition_request_id = $request->request_id;
        $request_button = $request->requestbutton;
        if($request_button=='confirm'){
            $tuition_request = TuitionRequest::where('id',$tuition_request_id)
                ->update(['response'=>'accepted','teacher_responded'=>'responded']);
            return redirect('/teacher/requests');
        }
        else if($request_button == 'discard'){
            $tuition_request = TuitionRequest::find($tuition_request_id);
            $tuition_request->response = 'rejected';
            $tuition_request->teacher_responded = 'responded';
            $tuition_request->save();
            return redirect('/teacher/requests');
        }
    }

    public function student_tuitions(Request $request){

        $requests = DB::table('tuition_requests')
            ->leftJoin('students','students.id','=','tuition_requests.student_id')
            ->leftJoin('tuitions','tuitions.id','=','tuition_requests.tuition_id')
//            ->where('tuition_requests.teacher_responded',false)
            ->where('tuition_requests.student_id',Auth::guard('student')->user()->id)
            ->select('tuitions.*','students.*','tuition_requests.tuition_id',
                'tuition_requests.description as stu_desc','tuition_requests.response','tuition_requests.id as request_id')
            ->orderBy('tuition_requests.teacher_responded')
            ->get();

        return view('student.tuition_request.my_tuitions',['requests'=>$requests]);

    }
}
