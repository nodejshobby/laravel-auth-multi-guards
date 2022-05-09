@extends('layouts.user.dashboard')


@section('content')
    <div class="container bg-light p-5 text-center mt-4">
        <h5>Welcome to your dashboard - {{ Auth::user()->name }}</h5>
    </div>
@stop
