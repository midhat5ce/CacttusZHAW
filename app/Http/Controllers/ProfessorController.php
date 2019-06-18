<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProfessorController extends Controller
{
    public function index()
    {
        $professor = auth()->user();
        return view('professor.index', compact('professor'));
    }

    public function addCriteria(Course $course)
    {
        if (is_null(auth()->user()->courses()->find($course->id))) {
            abort(401);
        } else {
            // dd($course->credentials()->where(['professor_id' => auth()->user()->id])->count() > 0);
            return view('professor.addCriteriaForm', compact('course'));
        }
    }

    public function storeCriteria(Course $course)
    {
        $criteria = request()->validate([
            'attendance' => ['required', 'integer'],
            'project' => ['required', 'integer'],
            'examination' => ['required', 'integer']
        ]);
        if (is_null(auth()->user()->courses()->find($course->id))) {
            abort(401);
        } else {
            if ($course->criteria()->where(['professor_id' => auth()->user()->id])->count() > 0) {
                $criteriaToUpdate = $course->criteria()->where(['professor_id' => auth()->user()->id])->get()->first();
                $criteria = $criteriaToUpdate->update($criteria);
                $course->professor()->updateExistingPivot(auth()->user()->id, ['criteria_id' => $criteriaToUpdate->id]);
                return redirect()->route('professor.profile')->withSucess('You have updated your criteria for course: '.$course->coursename);
            } else {
                $criteria = Criteria::create($criteria);
                $course->professor()->updateExistingPivot(auth()->user()->id, ['criteria_id' => $criteria->id]);
                return redirect()->route('professor.profile')->withSucess('You have set your criteria for course: '.$course->coursename);
            }
        }
    }

    public function listStudents(Course $course)
    {
        if (is_null(auth()->user()->courses()->find($course->id))) {
            abort(401);
        } else {
            $professor = auth()->user();
            $existsRow = DB::table('student_course_professor')
            ->whereCourseId($course->id)
            ->whereProfessorId($professor->id)->count() > 0;
            return view('professor.list-students', compact('professor', 'course', 'existsRow'));
        }
    }

}
