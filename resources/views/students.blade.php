@extends('layouts.layout')

@section('body')
    <div class="col-md-4 form-group">
        <input type="number" id="age" name="age" class="form-control" placeholder="student age">
    </div>
    <div class="col-md-4 form-group">
        <a href="/students/age/" class="btn btn-primary btn-outline">Filter</a>
    </div>
    <div class="form-group">
        <table class="table table-responsive">
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>City</th>
                <th></th>
            </tr>

            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>{{ $student->city }}</td>
                    <td>
                        @if(Auth::user()->admin)
                            <a href="/students/edit/{{$student->id}}" class="btn btn-primary btn-outline">Edit</a>
                            <a href="/students/delete/{{$student->id}}" class="btn btn-danger btn-outline">Delete</a>
                            <a href="/students/{{$student->id}}" class="btn btn-primary btn-outline">View Details</a>
                        @endif
                    </td>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@stop
@section('right')
    <h4>Create Student</h4>
    <form class="form-horizontal" id="categories" enctype="multipart/form-data" role="form" method="POST"
          action=@if(!$id == null)"/students/edit"@else"/students"@endif>
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="">Name</label>
            <input type="text" id="name" name="name" placeholder="name" value="@if(!$id == null) {{$id->name}} @endif" class="form-control">
        </div>
        <div class="form-group row">
            <label for="">Course</label>
            <select name="course" id="course" class="form-control">
                @foreach($courses as $course)
                    <option @if(!$id == null)@if($course->id==$id->course_id) selected @endif @endif value="{{$course->id}}">{{$course->name}} - {{$course->year}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <label for="">Date of Birth</label>
            <input type="date" id="dob" name="dob" placeholder="Date of Birth" class="form-control"  value="@if(!$id == null) {{ $id->dob}} @endif">
        </div>
        <div class="form-group row">
            <label for="">City</label>
            <input type="text" id="city" name="city" placeholder="City" class="form-control" value="@if(!$id == null) {{$id->city}} @endif">
        </div>
        <div class="form-group row">
            <button class="btn btn-primary" name="submit" id="submit">@if(!$id == null)Update @else Submit @endif</button>
        </div>
    </form>
@stop
@section('scripts')
    <script>
        $("#age").on('change', function () {
            $.ajax(
                {
                    type: 'get',
                    url: '/students/age/' + this.value,
                    success: function (response) {
                        console.log(response);

                    }
                }
            );
        });
    </script>
@stop