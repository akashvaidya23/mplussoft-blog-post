@extends('layouts.navbar')

@section('title', 'Add Blog')

@section('content')
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="max-width: 50%;margin: auto">
            <strong>{{ session("message") }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('alert'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="max-width: 50%;margin: auto">
            <strong>{{ session("alert") }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h5>All Blog</h5>
    <table class="table" style="max-width: 50%;margin: auto">
        <thead>
            <tr>
                <th scope="col" style="border: 1px solid black">Sr.No</th>
                <th scope="col" style="border: 1px solid black">Title</th>
                <th scope="col" style="border: 1px solid black">Category</th>
                <th scope="col" style="border: 1px solid black">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $key => $blog)
                <tr>
                    <td style="border: 1px solid black">{{ $key + $blogs->firstItem() }}</td>
                    <td style="border: 1px solid black">{{$blog->name}}</td>
                    <td style="border: 1px solid black">{{$blog->category->name}}</td>
                    <td style="border: 1px solid black">
                            <a class="btn btn-success" href="{{route('blog.show',$blog->id)}}">View</a>
                            @if($blog->added_by == Auth::user()->id)
                                <a class="btn btn-primary" href="{{route('blog.edit',$blog->id)}}">Edit</a>
                                <form method="post" action="{{route('blog.destroy',$blog->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $blogs->links() }}
@endsection