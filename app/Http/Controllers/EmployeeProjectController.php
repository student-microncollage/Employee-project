<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeProjectController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $projects = Project::all();
        return view('assign', compact('employees', 'projects'));
    }

    public function storeEmployee(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees'
        ]);

        Employee::create([
            'name' =>$request->name,
            'email' =>$request->email,
        ]);
        return back()->with('success', 'Employee added successfully.');
    }

    public function storeProject(Request $request) {
        $request->validate([
            'name' => 'required|unique:projects',
            'description' => 'required'
        ]);

        Project::create($request->only('name','description'));
        return back()->with('success', 'Project added successfully.');
    }

    public function assign(Request $request)
    {
        // dd($request);
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'project_ids' => 'required|array',
            'project_ids.*' => 'exists:projects,id',
        ]);

        $projectIds = $request->project_ids;
        foreach($projectIds as $projectId){
            $exists = DB::table('employee_project')
                ->where('employee_id', $request->employee_id)
                ->where('project_id', $projectId)
                ->exists();
        
            if (!$exists) {
                DB::table('employee_project')->insert([
                    'employee_id' => $request->employee_id,
                    'project_id' => $projectId,
                ]);
            }
        }

        return back()->with('success', 'Projects assigned to employee.');
    }
}
