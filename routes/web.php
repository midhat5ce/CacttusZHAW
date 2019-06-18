<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Auth\AdminLoginController@showAdminLoginForm')->name('admin.login.form');
    Route::post('/login', 'Auth\AdminLoginController@adminLogin')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        // Professor Routes
        Route::get('/add-professor', 'AdminController@showAddProfessorForm')->name('admin.addProfessor.form');
        Route::post('/add-professor', 'AdminController@createProfessor')->name('admin.addProfessor.submit');
        Route::get('/list-professors', 'AdminController@listProfessors')->name('admin.list.professors');
        Route::get('/show-professor/{professor}', 'AdminController@showProfessor')->name('admin.professor.show');
        Route::get('/link-professor-student/{department}', 'AdminController@linkProfessorWithStudent')->name('admin.link.profstudent');
        Route::post('/link-professor-student', 'AdminController@storeStudentProfessorCourse')->name('admin.link_student_professor.submit');

        // Course routes
        Route::get('add-course', 'CourseController@create')->name('admin.course.create');
        Route::post('add-course', 'CourseController@store')->name('admin.course.store');
        Route::get('list-courses', 'CourseController@index')->name('admin.courses');
        Route::get('link-course-professor', 'CourseController@linkForm')->name('admin.course.linkForm');
        Route::post('link-course-professor', 'CourseController@link')->name('admin.course.link');

        // Student routes
        Route::get('add-student', 'AdminController@showAddStudentForm')->name('admin.student.create');
        Route::post('add-student', 'AdminController@storeStudent')->name('admin.addStudent.submit');
        Route::get('list-students', 'AdminController@listStudents')->name('admin.student.list');
    });
});

Route::group(['prefix' => 'professor'], function () {
    Route::get('/login', 'Auth\ProfessorLoginController@showProfessorLoginForm')->name('professor.login.form');
    Route::post('/login', 'Auth\ProfessorLoginController@professorLogin')->name('professor.login.submit');
    Route::post('/logout', 'Auth\ProfessorLoginController@logout')->name('professor.logout');
    Route::group(['middleware' => 'auth:professor'], function () {
        Route::get('/', 'ProfessorController@index')->name('professor.profile');
        Route::get('/add-criteria/{course}', 'ProfessorController@addCriteria')->name('professor.add.criteria');
        Route::post('/add-criteria/{course}', 'ProfessorController@storeCriteria')->name('professor.store.criteria');
    });
});


// Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
// Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
// Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
// Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

// Route::post('/login/admin', 'Auth\LoginController@adminLogin');
// Route::post('/login/writer', 'Auth\LoginController@writerLogin');
// Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
// Route::post('/register/writer', 'Auth\RegisterController@createWriter');

// Route::view('/home', 'home')->middleware('auth');
// Route::view('/admin', 'admin')->middleware('auth:admin');
// Route::view('/writer', 'writer')->middleware('auth:writer');