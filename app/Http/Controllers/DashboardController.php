<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    //---------------- TOTAL EMPLOYEE QUERY---------------------//
    public function emp(){
        $employees = Employee::with('projects')->get();
        return view('employees.all', compact('employees'));
    }

    public function delete($id){
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->back()->with('success','employee dalated successfully...!');
    }

    //---------------- PROJECT QUERY---------------------//

    public function index(){
        $projects = Project::all();
        return view('projects.all', compact('projects'));
    }

    public function deleteproject($id){
        $project = Project::find($id);
        $project->delete();
        return redirect()->back()->with('success','Project deleted...!');
    } 

    //---------------- ASSIGN PROJECT QUERY---------------------//
    public function employeesProjects(){
        $employees = Employee::with('projects')->get();
        return view('employees-projects', compact('employees'));
    }

    public function employeedelete($id){
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->back()->with('success','eployee deleted ...!');
    }
}
