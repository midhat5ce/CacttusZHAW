<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Professor;
use Illuminate\Support\Facades\Hash;
use App\Department;
use App\Student;
use App\Course;
use Illuminate\Support\Facades\DB;
use App\Criteria;
use App\Grade;

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

    public function linkProfessorWithStudent(Department $department)
    {
        $courses = Course::where('department_id', $department->id)->get();
        $professors = Professor::all();
        $students = Student::all();
        $stds = [];
        return view('admin.link_student_professor_course', compact('courses', 'professors', 'students', 'stds', 'department'));
    }

    public function storeStudentProfessorCourse()
    {
        request()->validate([
            'professor_id' => ['required'],
            'course_id' => ['required'],
            'students_id' => ['required']
        ]);
        $student_id = json_decode(request()->students_id);
        $student_id = array_unique($student_id);
        $professor = Professor::findorfail(request()->professor_id);
        $course = Course::findorfail(request()->course_id);

        $existsRow = DB::table('student_course_professor')
        ->whereCourseId($course->id)
        ->whereProfessorId($professor->id)
        ->whereStudentId($student_id)
        ->count() > 0;
       
        $existsCourseStudent = DB::table('student_course_professor')
        ->whereCourseId($course->id)
        ->whereStudentId($student_id)
        ->count() > 0;

        if (!$existsRow && !$existsCourseStudent) {
            foreach ($student_id as $student) {
                $professor->students()->attach($student, ['course_id' => $course->id]);
                Grade::create([
                    'professor_id' => $professor->id,
                    'student_id' => $student,
                    'course_id' => $course->id,
                ]);
            }
            return back()->withSuccess($professor->firstname.' '.$professor->lastname.' has been asigned to teach '.$course->coursename.' to the students of department: '.$course->department->departmentname);
        } else {
            return back()->withError('Students of this department are already connected with '.$course->coursename.'!');
        }
    }
}