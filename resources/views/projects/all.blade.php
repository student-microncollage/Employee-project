@extends('dashboard')

@section('content')

<h2 class="mb-4">All Projects</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Project Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as  $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description ?? 'no description'}}</td>
                <td><a href="{{route('projects.delete',['id'=>$project->id])}}" onclick="return confirm('Are you sure delete this item...!')" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection