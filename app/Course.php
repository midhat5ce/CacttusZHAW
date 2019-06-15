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
}
