<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Professor;
use Illuminate\Support\Facades\Hash;
use App\Department;
use App\Student;

class AdminController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('admin.dashboard', compact('professors'));
    }

    public function showAddProfessorForm()
    {
        return view('admin.professor.create');
    }

    public function listProfessors()
    {
        $professors = Professor::all();
        return view('admin.professor.list', compact('professors'));
    }

    protected function createProfessor(Request $request, Professor $professor)
    {
        $data = $request->validate([
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:professors'],
            'password' => ['required', 'confirmed']
        ]);
        $data['password'] = Hash::make($request->password);
        $professor->create($data);
        return back()->withSucess('Account created successfully!');
    }

    public function showProfessor(Professor $professor)
    {
        return view('admin.professor.show', compact('professor'));
    }

    public function showAddStudentForm()
    {
        $departments = Department::all();
        return view('admin.student.create', compact('departments'));
    }

    public function storeStudent(Request $request, Student $student)
    {
        $data = $request->validate([
            'email' => ['required', 'unique:students', 'email'],
            'password' => ['required', 'confirmed'],
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'department_id' => ['required']
        ]);
        $data['password'] = Hash::make($request->password);
        $student->create($data);
        return back()->withSucess('Student Account created successfully!');
    }

    public function listStudents()
    {
        $students = Student::all();
        return view('admin.student.list', compact('students'));
    }
}
