<?php

namespace App\Http\Controllers;

use App\Course;
use App\Students;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function listStudents(){
        $id = null;
        $students = Students::all();
        $courses = Course::all();
        return view('students',compact('students','courses', 'id'));
    }

    public function ListStudentOnAge($age = null){
        $now = Carbon::now();
        $courses = Course::all();
        $students = Students::where('dob', '<',$now->subYears($age)->toDateTimeString())->get();
        return view('students',compact('students','courses'));
    }

    public function ShowCourseAndParents(Students $id){
        $caurse = $id->course;
        $parents = $id->parent;
        $courses = Course::all();
        return view('studentsOtherDetails',compact('caurse','parents', 'courses','id'));
    }

    public function store(Request $request){
        $this->validate(request(),
            [
                'name' => 'required|max:200',
                'course' => 'required',
                'dob' => 'required',
                'city' => 'required',
            ]
        );

        $student = new Students();
        $student->name = $request->name;
        $student->course_id = $request->course;
        $student->dob = $request->dob;
        $student->city = $request->city;
        $student->save();
        return back();
    }

    public function retrieve(Students $id){
        $students = Students::all();
        $courses = Course::all();
        return view('students',compact('students','courses', 'id'));
    }

    public function update(Request $request){
        $this->validate(request(),
            [
                'name' => 'required|max:200',
                'course' => 'required',
                'dob' => 'required',
                'city' => 'required',
            ]
        );

        $student = Students::find($request->id);
        $student->update(['name'=>$request->name, 'course_id'=>$request->course_id, 'dob'=>$request->dob, 'city'=>$request->city]);
        return back();
    }

    public function delete(Students $id){
        $id->forceDelete();
        return back();
    }
}
