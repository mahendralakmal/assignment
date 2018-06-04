@extends('layouts.layout')

@section('body')
    <table class="table table-responsive">
        <tr>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>City</th>
            <th></th>
        </tr>
        @foreach($parents as $parent)
            @foreach($parent->student as $std)
                @if(\Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($std->dob)) > $student)
                    <tr>
                        <td>{{ $std->name }}</td>
                        <td>{{ $std->dob }}</td>
                        <td>{{ $std->city }}</td>
                        <td>{{ $parent->name }}</td>
                        @if($parent->type === 'M')
                            <td>Father</td>
                        @else
                            <td>Mother</td>
                        @endif
                        <td><a href="/students/{{$std->id}}"
                               class="btn btn-primary btn-outline">View Details</a></td>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </table>
@stop