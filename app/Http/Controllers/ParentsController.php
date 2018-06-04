<?php

namespace App\Http\Controllers;

use App\Parents;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function ListStudentOnAgeAndParentAge($student = null,$parent = null){
        $now = Carbon::now();
        $parents = Parents::where('dob','<',$now->subYears($parent)->toDateTimeString())->get();
        return view('studentsAndParentsAge',compact('parents','student'));
    }

    public function store(Request $request){
        $this->validate(request(),
            [
                'name' => 'required|max:200',
                'dob' => 'required',
                'type' => 'required',
            ]
        );

        $parent = new Parents();
        $parent->name = $request->name;
        $parent->dob = $request->dob;
        $parent->type = $request->type;
        $parent->save();

        $parent->student()->sync([$request->student]);
        return back();
    }
}
