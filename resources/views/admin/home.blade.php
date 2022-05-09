@extends('layouts.admin.dashboard')


@section('content')
    <div class="container bg-light p-5 text-center mt-4">
        <h5>Welcome to your admin dashboard - {{ Auth::guard('admin')->user()->name }}</h5>
    </div>
@stop
