<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Professor;
use App\Department;
use App\Semester;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.list', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semester = Semester::all();
        $department = Department::all();
        return view('admin.course.create', compact('semester', 'department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'coursename' => ['required', 'string', 'unique:courses'],
            'department_id' => ['required'],
            'semester_id' => ['required']
        ]);
        Course::create($data);

        return back()->withSucess('Course added successfully!');
    }

    // other methods
    public function linkForm()
    {
        $webdevs = Course::where('department_id', 1)->get();
        $sysadmins = Course::where('department_id', 2)->get();
        $professors = Professor::all();
        return view('admin.course.connect', compact('sysadmins', 'webdevs', 'professors'));
    }

    public function link(Request $request)
    {
        $request->validate([
            'professor_id' => ['required'],
            'course_id' => ['required']
        ]);
        $professor = Professor::findorfail($request->professor_id);
        $course = Course::findorfail($request->course_id);
        if (!$course->professor->contains($professor->id)) {
            $course->professor()->attach($professor);
        } else {
            return back()->withError('Professor "'.$professor->firstname.' '.$professor->lastname.'" already is connected with "'.$course->coursename.'"');
        }
        
        return back()->withSucess('You have successfully linked "'.$professor->firstname.' '.$professor->lastname.'" with "'.$course->coursename.'"');
    }
}
