@extends('dashboard')

@section('content')

<h2 class="mb-4">Manage Employees & Projects</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            • {{ $error }}<br>
        @endforeach
    </div>
@endif


<div class="row mb-4">
    <div class="col-md-6">
        <h5>Add Employee</h5>
        <form method="POST" action="{{ route('employee.store') }}">
            @csrf
            <input name="name" placeholder="Name" class="form-control mb-2">
            <input name="email" placeholder="Email" class="form-control mb-2" type="email">
            <button class="btn btn-primary">Add Employee</button>
        </form>
    </div>

    <div class="col-md-6">
        <h5>Add Project</h5>
        <form method="POST" action="{{ route('project.store') }}">
            @csrf
            <input name="name" placeholder="Project Name" class="form-control mb-2">
            <input name="description" placeholder="Description" class="form-control mb-2">
            <button class="btn btn-success">Add Project</button>
        </form>
    </div>
</div>

<hr>

<h5>Assign Projects to Employee</h5>
<form method="POST" action="{{ route('assign.projects') }}">
    @csrf
    <div class="mb-2">
        <label>Employee:</label>
        <select name="employee_id" class="form-control">
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }} ({{ $employee->email }})</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Projects:</label>
        <select name="project_ids[]" multiple class="form-control">
            @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-warning">Assign Projects</button>
</form>


@endsection