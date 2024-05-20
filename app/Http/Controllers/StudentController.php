<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Get students list and load view
    public function index()
    {
        $students = Student::paginate(2);

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

        // Validations
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:students,phone',
            'email' => 'required|email'
        ], [
            'name.required' => 'Student name is required.',
            'phone.required' => 'Student phone is required.',
            'email.required' => 'Student email is required.',
            'email.email' => 'Please enter a valid email.'
        ]);

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
        // Validations
        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:students,phone,' . $id,
            'email' => 'required|email'
        ], [
            'name.required' => 'Student name is required.',
            'phone.required' => 'Student phone is required.',
            'email.required' => 'Student email is required.',
            'email.email' => 'Please enter a valid email.'
        ]);

        // Get student to update
        $student = Student::find($id);

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;

        $student->save();

        // Redirect back to list
        return redirect('students')->with(['msg' => 'Student updated.']);
    }

    // Save updated record using student object
    public function delete($id)
    {
        // Delete student
        Student::find($id)->delete();

        // Redirect back to list
        return redirect('students')->with(['msg' => 'Student deleted.']);
    }

    // Get student record to view
    public function view($id)
    {
        // Get student to view
        $student = Student::find($id);

        // Redirect back to list
        return view('students', compact('student'));
    }
}
