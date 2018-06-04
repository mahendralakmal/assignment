@extends('layouts.layout')

@section('body')
    <h3> Course Details</h3>
    {{ $caurse->name }} - {{ $caurse->year }}
    <hr>
    <h3> Parent Details</h3>
    @foreach($parents as $parent)
        @if($parent->type === 'M')
            <h5>Father : </h5>{{$parent->name}}
        @else
            <h5>Mother : </h5>{{$parent->name}}
        @endif
    @endforeach
@stop

@section('right')
    <h4>Add Parent</h4>
    <form action="/students/parent" class="form-horizontal" id="parent" enctype="multipart/form-data" role="form" method="POST">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="">Name</label>
            <input type="text" id="name" name="name" class="form-control">
            <input type="hidden" id="student" name="student" value="{{$id->id}}">
        </div>
        <div class="form-group row">
            <label for="">Gender</label>
            <select name="type" id="type" class="form-control">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>
        <div class="form-group row">
            <label for="">Date of Birth</label>
            <input type="date" id="dob" name="dob" placeholder="Date of Birth" class="form-control">
        </div>
        <div class="form-group row">
            <button class="btn btn-primary" name="submit" id="submit">Submit</button>
        </div>
    </form>
@stop