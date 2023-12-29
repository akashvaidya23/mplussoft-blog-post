@extends('layouts.navbar')

@section('title', 'View Blog')

@section('content')
<div style="margin: 20px">
    <h5>{{ $blog->name }}</h5>
    <p style="text-align: justify;">{{ $blog->description }}</p>
    <br>
    <b style="float:right;">-- {{ $blog->user->name }}</b>
</div>
@endsection