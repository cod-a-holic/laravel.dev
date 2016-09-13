<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $employees = Employee::all();

        return view('employee.index', ['employees' => Employee::paginate(20)]);
    }

    public function edit(Employee $employee)
    {

        $directors = Employee::where('position', 'senior developer')
            ->select('id', \DB::raw("CONCAT(first_name,' ',last_name)  AS fullname"))
            ->get();

        return view('employee.edit', compact('employee', 'directors'));
    }

    public function update()
    {

        return null;
    }
}
