<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class AdminFunctions extends Controller
{
    //



    public function students(Request $request){

        $students = Student::all();

        return view('admin.accounts.students',['students'=>$students]);
    }

    public function toggleStateStudents(Request $request){

        $student_id = $request->student_id;
        echo $student_id;
        $student = Student::where('id',$student_id)->get()[0];

        if($student->status=='active'){
            $student->status = 'deactive';
        }
        else if($student->status=='deactive'){
            $student->status = 'active';
        }

        $student->save();
//        var_dump($student);
        return redirect('admin/students');
    }

    public function teachers(Request $request){

        $teachers= Teacher::all();

        return view('admin.accounts.teachers',['teachers'=>$teachers]);
    }


    public function toggleStateTeachers(Request $request){

        $teacher_id = $request->teacher_id;
        echo $teacher_id;
        $teacher = Teacher::where('id',$teacher_id)->get()[0];

        if($teacher->status=='active'){
            $teacher->status = 'deactive';
        }
        else if($teacher->status=='deactive'){
            $teacher->status = 'active';
        }
        else if($teacher->status=='pending'){
            $teacher->status = 'active';
        }
        $teacher->save();
//        var_dump($student);
        return redirect('admin/teachers');
    }
}
