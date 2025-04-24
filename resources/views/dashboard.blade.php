<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Admin Panel</a>
            <div class="d-flex">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <a href="{{route('assign.index')}}" class="btn btn-primary p-2">create project & employee</a>
        <h2 class="mb-4">Welcome, {{ auth()->user()->name }}</h2>

        @php
             $totalEmployees = App\Models\Employee::count();
             $totalProjects = App\Models\Project::count();
             $assignedProjects = DB::table('employee_project')->count();

        $employees = App\Models\Employee::with('projects')->get();
        @endphp
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5>Total Employees</h5>
                        <p>{{ $totalEmployees }}</p>
                        <p><a href="{{route('employees.all')}}" class="btn btn-info">View</a></p>

                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5>Projects</h5>
                        <p>{{ $totalProjects }}</p>
                        <p><a href="{{route('projects.all')}}" class="btn btn-info">View</a></p>

                    </div>
                </div>
            </div>
        
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5>Assigned Projects</h5>
                        <p>{{ $assignedProjects }}</p>
                        <p><a href="{{route('employees.projects')}}" class="btn btn-info">View</a></p>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="alert alert-info mt-4">
           @yield('content')
        </div>
    </div>
</body>
</html>
