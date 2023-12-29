@extends('layouts.navbar')

@section('title', 'Register Here')

@section('content')
    <h5>Register Here</h5>
    <form action="{{route('user.store')}}" method="POST" data-parsley-validate enctype="multipart/form-data">
        <br>
        @csrf
        <div style="display: flex;flex-direction: column;max-width: 30%;align-items: flex-start;justify-content: center; margin: auto;">
            <input class="form-control input" type="text" placeholder="Enter name" name="name" id="name" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control input" type="text" placeholder="Enter Email" name="email" id="email" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control input" type="password" placeholder="Enter Password" name="password" id="password" required>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control input" type="password" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" required>
            <br>
            <input class="form-control input" type="number" placeholder="Enter Mobile" name="mobile" id="mobile">
            @error('mobile')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control input" type="file" name="profile_pic" id="profile_pic">
            @error('profile_pic')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <select class="form-select input" name="gender" id="gender" required>
                <option value="">Select Gender</option>
                <option value="m">Male</option>
                <option value="f">Female</option>
                <option value="o">Other</option>
            </select>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="btn btn-dark" type="submit" value="Register">
        </div>
    </form>
@endsection