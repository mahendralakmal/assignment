@extends('layouts.app')


@section('content')
    <div class="col-md-12 row">
        <div class="col-md-8">@yield('body')</div>
        <div class="col-md-4">
            @if(Auth::user()->admin)
                @yield('right')
            @endif
        </div>
    </div>
@stop
