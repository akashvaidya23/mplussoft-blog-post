@extends('layouts.navbar')

@section('title', 'Add Users')

@section('content')
    <h5>All Users</h5>
    <table class="table" style="max-width: 50%;margin: auto">
        <thead>
            <tr>
                <th scope="col" style="border: 1px solid black">Sr.No</th>
                <th scope="col" style="border: 1px solid black">Name</th>
                <th scope="col" style="border: 1px solid black">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key=>$user)
                <tr>
                    <td style="border: 1px solid black">{{ $key + $users->firstItem() }}</td>
                    <td style="border: 1px solid black">{{$user->name}}</td>
                    <td style="border: 1px solid black">
                        <a class="btn btn-success" href="#">View</a>
                        <a class="btn btn-primary" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection