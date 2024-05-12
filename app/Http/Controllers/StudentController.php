<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Get students list and load view
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    // Load stdent create form
    public function create()
    {
        return view('students.create');
    }

    // Save new student record by getting student object
    public function save(Request $request)
    {
        // dd($request->all());

        $student = new Student();
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;

        $student->save();

        // Redirect back to list
        return redirect('students')->with(['msg' => 'New student record added.']);
    }

    // Load student view
    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }

    // Save updated record using student object
    public function update(Request $request, $id)
    {
        // Get student to update
        $student = Student::find($id);

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;

        $student->save();

        // Redirect back to list
        return redirect('students')->with(['msg' => 'Student updated.']);
    }
}
