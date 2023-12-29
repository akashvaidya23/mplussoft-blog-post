@extends('layouts.navbar')

@section('title', 'Add Blog')

@section('content')
    <h5>Create Blog</h5>
    <form action="{{route('blog.store')}}" method="POST" data-parsley-validate enctype="multipart/form-data">
        <br>
        @csrf
        <div style="display: flex;flex-direction: column;max-width: 30%;align-items: flex-start;justify-content: center; margin: auto;">
            <input class="form-control input" type="text" placeholder="Enter name" name="name" id="name" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control input" type="file" name="blog_image" id="blog_image" required>
            @error('blog_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <select class="form-select input" name="category" id="category" required>
                <option value="">Please Select Category</option>
                @foreach($categories as $key=>$cat)
                    <option value="{{ $key }}">{{ $cat }}</option>
                @endforeach
            </select>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <textarea class="form-control input" placeholder="Add description" name="description" id="description" required></textarea>
            @error('blog_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control input" type="date" name="date" id="date" required>
            <br>
            <input class="btn btn-dark" type="submit" value="Save">
        </div>
    </form>
@endsection