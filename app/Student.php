<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;

    protected $guard = 'student';

    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'department_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department()
    {
       return $this->belongsTo(Department::class);
    }
}
