<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class StudentController extends Controller
{
    public function AddStudent()
    {
        return view('students.add_student');
    }

    public function SaveStudent(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student-> save();
        session()->flash('success', 'Post Inserted Successfully!');
        return Redirect()->back();
    }

    public function AllStudent()
    {
        $student=Student::all();
        return view('students.all_students', compact('student'));
    }

    public function ViewStudent($id)
    {
        $student=Student::findorfail($id);
        return view('students.view_student', compact('student'));
    }

    public function DeleteStudent($id)
    {
        $student=Student::findorfail($id);
        $student->delete();
        return Redirect()->back();
    }
    public function EditStudent($id)
    {
        $student=Student::findorfail($id);
        return view('students.edit_student', compact('student'));
    }

    public function UpdateStudent(Request $request, $id)
    {
        $student=Student::findorfail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student-> save();
        session()->flash('success', 'Post Inserted Successfully!');
        return Redirect()->route('student.all');
    }
}
