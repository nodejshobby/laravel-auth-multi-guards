@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="col-md-6 mx-auto">
            <h2 class="text-center mb-4">Enter your details to register</h2>
            <form class="form" method="post" action="{{ url('/register') }}">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="form-group mb-2">
                    <label for="name">Enter your name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                        placeholder="Enter your name" value="{{ old('name') }}">
                    @error('name')
                        <em class="invalid-feedback">{{ $message }}</em>
                    @enderror
                </div>
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
                <div class="form-group mb-2">
                    <label for="confirm_password">Re-enter your password</label>
                    <input class="form-control @error('confirm_password') is-invalid @enderror" type="password"
                        name="confirm_password" placeholder="Re-enter your password">
                    @error('confirm_password')
                        <em class="invalid-feedback">{{ $message }}</em>
                    @enderror
                </div>
                <div class="form-group mb-3 text-center">
                    <input class="btn btn-success" type="submit" value="Register">
                </div>
                <div class="form-group text-center">
                    <span>If you already have an account? <a class="text-decoration-none" href="{{ url('/login') }}">Login
                            here</a></span>
                </div>
            </form>
        </div>

    </div>
@stop
