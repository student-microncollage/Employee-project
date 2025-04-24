@extends('dashboard')

@section('content')
<h2 class="mb-4">Employee Project Assignments</h2>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Employee Name</th>
            <th>Email</th>
            <th>Assigned Projects</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as  $employee)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    @forelse($employee->projects as $project)
                        <span class="bg-warning">{{ $project->name }}</span>
                    @empty
                        <span class="text-muted">No Projects Assigned</span>
                    @endforelse
                </td>
                <td><a href="{{route('employees.delete',['id'=>$employee->id])}}" onclick="return confirm('Are you sure delete this item...!')" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection