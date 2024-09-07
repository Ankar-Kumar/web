<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
 
    public function index()
    {
        $employs=Employee::paginate(10);
       return View('index')->with('employs',$employs);
    }

  
    public function create()
    {
        return View('create');
    }

 
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'joining_date' => 'required|date',
            'job_title' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'email' => 'required|email|unique:employees,email',
            'mobile_no' => 'required|string|max:20',
            'address' => 'required|string|max:255'
        ]);
        $employ= Employee::create($request->all());
        // dd($employ);
        $employ->save();
        return redirect()->route('employees.show',$employ->id);
    }

  
    public function show(Employee $employee,$id)
    {
        //
        $employs=Employee::find($id);
       return View('show')->with('employs',$employs);
    }

    public function destroy(Request $request, $id){
        $Employee= Employee::find($id);
        $Employee->delete();
        return redirect()->route('employees.index');
    }

      public function edit(Employee $employee,$id)
    {
        $employs = Employee::find($id);
        return View('edit')->with('employs', $employs);
    }

}
