@extends('layouts.navbar')

@section('title', 'Dashboard')

@section('content')
    @php
        $user = Auth::user();
    @endphp
    
    <h5>Welcome {{ $user->name }}</h5>
@endsection