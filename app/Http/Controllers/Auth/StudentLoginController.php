<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;
use App\Student;
use App\Grade;

class StudentLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('live')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('live')->stateless()->user();
        $student = Student::where(['email' => $user->email])->first();

        if ($student->count() > 0) {
            return view('student.index', compact('student'));
        } else {
            return 'student is not registered!';
        }

        // $user->token;
    }
}