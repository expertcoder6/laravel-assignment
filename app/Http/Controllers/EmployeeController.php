<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

use Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees.list', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $copanies = Company::select('name','id')->get();
        return view('employees.add', ['copanies' => $copanies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
  
        $input = $request->all();

        Employee::create($input);

        return Redirect::to('employees');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get the Employee
        $employee = Employee::find($id);
        return view('employees.show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Get the employee
        $employee = Employee::find($id);

        //GET all Companies
        $copanies = Company::select('name','id')->get();
    
        return view(
            'employees.edit', [
            'employee' => $employee,
            'copanies' => $copanies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
        ]);

        // get the company
        $employee = Employee::find($id);

        $employee->first_name = $request->first_name;
        $employee->last_name  = $request->last_name;
        $employee->company    = $request->company;
        $employee->email      = $request->email;
        $employee->phone      = $request->phone;

        $employee->save();

        return Redirect::to('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        $msg = "Employee Deleted successful! ";
        return redirect('employees')->with('msg', $msg);
    }
}
