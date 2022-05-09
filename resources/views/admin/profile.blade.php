@extends('layouts.admin.dashboard')


@section('content')
    <div class="container my-4">
        <div class="container justify-content-center">
            <h3 class="text-center mb-4">View or Update your profile details</h3>


            <div class="col-md-6 mx-auto mb-5">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ url('/admin/update') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="Name">Name</label>
                        <input class="form-control  @error('name') is-invalid @enderror" name="name" type="text"
                            value="{{ $user->name }}">
                        @error('name')
                            <em class="invalid-feedback">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="Email">Email</label>
                        <input class="form-control" type="text" value="{{ $user->email }}" name="email" disabled>
                    </div>
                    <div class="form-group my-3">
                        <input class="btn btn-success" type="submit" value="Update Details">
                    </div>
                </form>
            </div>
            <div class="col-md-6 mx-auto">
                <h3 class="text-center mb-4">View or Update your security details</h3>
                <form action="{{ url('/admin/updatePassword') }}" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="oldPassword">Old Password</label>
                        <input class="form-control @error('old_password') is-invalid @enderror" type="password"
                            name="old_password" placeholder="Enter your old password">
                        @error('old_password')
                            <em class="invalid-feedback">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">New Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                            placeholder="Enter your new password">
                        @error('password')
                            <em class="invalid-feedback">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="confirmPassword">Confirm Password</label>
                        <input class="form-control @error('confirm_password') is-invalid @enderror" type="password"
                            name="confirm_password" placeholder="Confirm your new password">
                        @error('confirm_password')
                            <em class="invalid-feedback">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <input class="btn btn-success" type="submit" value="Update Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
