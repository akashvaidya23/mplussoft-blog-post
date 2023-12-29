@extends('layouts.navbar')

@section('title', 'Login')

@section('content')
    <h5>Login Here</h5>
    <br>
    <form action="login" method="POST" data-parsley-validate>
        @csrf
        <div style="display: flex;flex-direction: column;max-width: 30%;align-items: flex-start;justify-content: center; margin:auto;">
            <input class="form-control input" type="text" placeholder="Enter Email" name="email" id="email" value="{{old('email')}}" required>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control input" type="password" placeholder="Enter Password" name="password" id="password" required>
            <br>
            <input class="btn btn-dark" type="submit" value="Login">
        </div>
    </form>
@endsection