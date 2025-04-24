@extends('dashboard')

@section('content')
<h2 class="mb-4">All Employees</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Assigned Projects</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as  $employee)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    @forelse($employee->projects as $project)
                        <span class="bg-primary">{{ $project->name }}</span>
                    @empty
                        <span class="text-muted">No Projects</span>
                    @endforelse
                </td>
                <td><a href="{{route('employees.delete',['id'=>$employee->id ])}}" onclick="return confirm('Are you sure delete this item...!')" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection