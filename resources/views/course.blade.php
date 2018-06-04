@extends('layouts.layout')

@section('body')

    <table class="table table-responsive">
        <tr>
            <th>Name</th>
            <th>Year</th>
            <th></th>
        </tr>

@foreach($courses as $course)
    <tr>
        <td>{{ $course->name }}</td>
        <td>{{ $course->year }}</td>
        <td>
            @if(Auth::user()->admin)
                <a href="/courses/edit/{{$course->id}}" class="btn btn-primary btn-outline">Edit</a>
                <a href="/courses/delete/{{$course->id}}" class="btn btn-danger btn-outline">Delete</a>
                <a href="/courses/{{$course->id}}" class="btn btn-primary btn-outline">View Details</a>
            @endif
        </td>
    </tr>
@endforeach
    </table>
@stop
@section('right')
    <h4>Create Course</h4>
    <form class="form-horizontal" id="categories" enctype="multipart/form-data" role="form" method="POST"
          action=@if(!$id == null)"/courses/edit"@else"/courses"@endif>
        {{ csrf_field() }}
        <input type="hidden" id="id" name="id" value="@if(!$id == null) {{$id->id}} @endif">
        <div class="form-group row">
            <label for="">Name</label>
            <input type="text" id="name" name="name" placeholder="name" value="@if(!$id == null) {{$id->name}} @endif" class="form-control">
        </div>

        <div class="form-group row">
            <label for="">Year</label>
            <input type="text" id="year" name="year" placeholder="City" value="@if(!$id == null) {{$id->year}} @endif" class="form-control">
        </div>
        <div class="form-group row">
            <button class="btn btn-primary" name="submit" id="submit">@if(!$id == null) Update @else Submit @endif</button>
        </div>
    </form>
@stop