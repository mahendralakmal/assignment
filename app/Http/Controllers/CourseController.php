<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function ListCauses(){
        $courses = Course::all();
        $id = null;
        return view('course',compact('courses', 'id'));
    }

    public function ListStudentOnCauseAndYear($course, $year){
        $cName = $course;

        $courses = Course::where([['name',$course],['year',$year]])->get();
        return view('studentsInCourses',compact('courses','cName','year'));
    }

    public function store(Request $request){
        $this->validate(request(),
            [
                'name' => 'required|max:200',
                'year' => 'required',
            ]
        );

        $courses = new Course();
        $courses->create($request->all());
        return back();
    }

    public function retrieve(Course $id){
        $courses = Course::all();
        return view('course',compact('courses', 'id'));
    }

    public function update(Request $request){
        $this->validate(request(),
            [
                'name' => 'required|max:200',
                'year' => 'required',
            ]
        );

        $course = Course::find($request->id);
        $course->update(['name'=>$request->name, 'year'=>$request->year]);
        return back();
    }

    public function delete(Course $id){
        $id->forceDelete();
        return back();
    }
}
