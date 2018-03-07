<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Profile extends Controller
{


    protected function student_validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:students',
            'password' => 'required|min:6|confirmed',
            'address' => 'required|max:500',
            'birthday'=> 'required|date',
            'gender'=> 'required|max:6|min:4',
            'grade'=> 'required|numeric',
        ]);
    }
    public function update_student_profile(Request $request){

        if($request->updatebutton){
            $this->student_validator($request->all())->validate();

            $student = Auth::guard('student')->user();

            $student->name = $request->name;
            $student->password = bcrypt($request->password);
            $student->address = $request->address;
            $student->birthday = $request->birthday;
            $student->gender= $request->gender;
            $student->grade = $request->grade;

            $student->save();

            return view('student.auth.profile_updated');

        }

        else{
            return view('student.home');
        }

    }

    protected function teacher_validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:teachers',
            'password' => 'required|min:6|confirmed',
            'description'=> 'required | min:10|max:1000',
            'phone'=> 'required |numeric | min:700000000|max:94790000000',
            'address'=> 'required|max:500|min:10',
            'nic'=> 'required|min:10|max:12',
        ]);
    }
    public function update_teacher_profile(Request $request){

        if($request->updatebutton){
            $this->teacher_validator($request->all())->validate();

            $teacher = Auth::guard('teacher')->user();

            $teacher->name = $request->name;
            $teacher->password = bcrypt($request->password);
            $teacher->address = $request->address;
            $teacher->description = $request->description;
            $teacher->phone= $request->phone;
            $teacher->nic = $request->nic;

            $teacher->save();

            return view('teacher.auth.profile_updated');

        }

        else{
            return view('teacher.home');
        }

    }
}
