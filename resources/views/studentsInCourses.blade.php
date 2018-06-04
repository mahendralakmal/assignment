@extends('layouts.layout')

@section('body')
    <h4>Courses: {{$cName}} & Year: {{$year}}</h4>
    <table class="table table-responsive">
        <tr>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>City</th>
        </tr>

        @foreach($courses as $course)
            @if($course->students->first() != null)
                <tr>
                    <td>{{ $course->students->first()->name }}</td>
                    <td>{{ $course->students->first()->dob }}</td>
                    <td>{{ $course->students->first()->city }}</td>
                </tr>
            @endif
        @endforeach
    </table>
@stop