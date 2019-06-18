<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];
   
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function professor()
    {
        return $this->belongsToMany(Professor::class, 'professor_course');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_course_professor');
    }

    public function criteria()
    {
        return $this->belongsToMany(Criteria::class, 'professor_course');
    }
}