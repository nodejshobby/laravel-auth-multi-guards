@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="col-md-6 mx-auto">
            <h2 class="text-center mb-4">Enter your login details</h2>
            <form class="form" method="post" action="{{ url('/admin/login') }}">
                @csrf
                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group mb-2">
                    <label for="email">Enter your email</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="emai" name="email"
                        placeholder="Enter your email" value="{{ old('email') }}">
                    @error('email')
                        <em class="invalid-feedback">{{ $message }}</em>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="password">Enter your password</label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                        placeholder="Enter your password">
                    @error('password')
                        <em class="invalid-feedback">{{ $message }}</em>
                    @enderror
                </div>
                <div class="form-group my-3 clearfix">
                    <div class="float-start"><input class="btn btn-success" type="submit" value="Login"></div>
                    <div class="float-end">
                        <span>Remember me? </span>
                        <input type="checkbox" name="remember_me">
                    </div>

                </div>
            </form>
        </div>

    </div>
@stop
