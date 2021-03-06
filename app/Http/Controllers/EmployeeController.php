<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $employees = Employee::where('director_id', null)->get();

        return view('employee.index', compact('employees'));
    }


    public function subordinates(Employee $employee)
    {
        $employees = $employee->subordinates;
        $returnHTML = view('employee.partial.subordinates')->with('employees', $employees)->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }


    public function edit(Employee $employee)
    {
        $director = Employee::find($employee->director_id);
        $directors = null;

        if($director){
            $directors = Employee::where('position', $director->position)->get();
        }

        return view('employee.edit', compact('employee', 'directors'));
    }


    public function view(Employee $employee)
    {
        return view('employee.view', compact('employee'));
    }


    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());

        if(null !== $request->file('avatar')){
            $file = $request->file('avatar');
            $avatar = md5($file->getClientOriginalName()) .'.'. $file->clientExtension();
            $file->move(public_path('avatars'), $avatar);
            $employee->update(['avatar' => $avatar]);
        }

        return back();
    }


    public function search($search)
    {
        $employees = Employee::search($search)->get('all');
        if(count($employees)){
            $returnHTML = view('employee.partial.subordinates')->with('employees', $employees)->render();

            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }

        return $this->index();

    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return new JsonResponse(true);
    }
}
