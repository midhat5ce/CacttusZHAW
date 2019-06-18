<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Professor extends Authenticatable
{
    use Notifiable;
    protected $guard = 'professor';

    protected $fillable = [
            'firstname', 'lastname', 'email', 'password',
        ];

    protected $hidden = [
            'password', 'remember_token',
        ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'professor_course');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_course_professor');
    }
    public function criteria(){
        return $this->belongsToMany(Criteria::class, "professor_course");
    }
}
