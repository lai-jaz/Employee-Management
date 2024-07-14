<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a list of employees from the database
     */
    public function index()
    {
        $employees = Employee::orderBy('empID', 'desc')->paginate(10);
        return view('employee.data', compact('employees'));
    }

    /**
     * Show the form for adding a new employee.
     */
    public function create()
    {
        return view('employee.addnew');
    }

    /**
     * Store the newly created record in database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fName' => 'required|string|max:255',
            'lName' => 'required|string|max:255',
            'DOB' => 'required|date',
            'salary' => 'required|numeric',
            'Department' => 'required|string',
            'email' => 'required|email',
            'phoneNo' => 'required|regex:/\d{3}[\-]\d{3}[\-]\d{4}/',
            'address' => 'required|string|max:255',
        ]);

        $result = Employee::create([
            'fName' => $request->input('fName'),
            'lName' => $request->input('lName'),
            'email' => $request->input('email'),
            'phoneNo' => $request->input('phoneNo'),
            'address' => $request->input('address'),
            'DOB' => $request->input('DOB'),
            'salary' => $request->input('salary'),
            'Department' => $request->input('Department'),
        ]);

        if($result)
        {
            return redirect()->route('employees.create')->with('success-add', 'Added successfully');
        }
        else
        {
            return redirect()->back()->withInput()->with('error-add', 'Failed to add record');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the employee details.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the employee details in database.
     */
    public function update(Request $request, Employee $employee)
    {
        $result = $employee->update([
            'fName' => $request->input('fName'),
            'lName' => $request->input('lName'),
            'email' => $request->input('email'),
            'phoneNo' => $request->input('phoneNo'),
            'address' => $request->input('address'),
            'DOB' => $request->input('DOB'),
            'salary' => $request->input('salary'),
            'Department' => $request->input('Department'),
        ]);

        if($result)
        {
            return redirect()->route('employees.index')->with('success-update', 'Updated successfully'); 
        }
        else 
        {
            return redirect()->back()->withInput()->with('error-update', 'Failed to update employee');
        }
    }

    /**
     * Remove the specified employee record from database.
     */
    public function destroy(Employee $employee)
    {
        $result = $employee->delete();
        if($result)
        {
            return redirect()->route('employees.index')->with('success-delete', 'Deleted successfully');
        }
        else
        {
            return redirect()->back()->withInput()->with('error-delete', 'Failed to delete employee');
        }
    }

    /**
     * Returns records that match the search results
     */
    public function search(Request $request)
    {
        $searchKeyword = $request->input('search');

        $departments = array_map('strtolower', config('departments.departments'));
        $searchKeywordLower = strtolower($searchKeyword);

        $searchResults = Employee::where(function ($query) use ($searchKeyword, $searchKeywordLower, $departments) {
            if (is_numeric($searchKeyword)) {
                $query->where('empID', $searchKeyword)
                      ->orWhere('phoneNo', $searchKeyword);
            } 
            else if(in_array($searchKeywordLower, $departments))
            {
                $query->whereRaw('LOWER(Department) = ?', [$searchKeywordLower]);
            }
            else
            {
                $query->where('fName', 'like', '%' . $searchKeyword . '%')
                  ->orWhere('lName', 'like', '%' . $searchKeyword . '%')
                  ->orWhere('email', 'like', '%' . $searchKeyword . '%')
                  ->orWhere('address', 'like', '%' . $searchKeyword . '%');
            }
        })->get();

        return view('employee.searchres', compact('searchResults', 'searchKeyword'));
    }
}
