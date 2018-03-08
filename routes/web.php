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

Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');

  Route::post('/search','TuitionRequestController@search');

  Route::group(['prefix'=>'/profile','middleware'=>['web','student','validstudent',]],function(){

        Route::get('/view',function (){
            return view('student.auth.profile');
        });
        Route::post('/view','Profile@update_student_profile');
    });


  Route::group(['prefix'=>'tuition','middleware'=>['web','student','validstudent',]],function (){

        Route::post('/view','TuitionRequestController@viewTuition');
        Route::post('/request','TuitionRequestController@requestTuition');
        Route::get('/my','TuitionRequestController@student_tuitions');
        Route::get('/feedback','FeedbackController@feedback_form');
        Route::post('/feedback','FeedbackController@add_feedback');

  });
  Route::get('/teacher/feedback','FeedbackController@teacher_feedback_form');

  Route::get('/blocked',function (){
        return view('student.blocked');
    });
});

Route::group(['prefix' => 'teacher'], function () {
  Route::get('/login', 'TeacherAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'TeacherAuth\LoginController@login');
  Route::post('/logout', 'TeacherAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'TeacherAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'TeacherAuth\RegisterController@register');

  Route::post('/password/email', 'TeacherAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'TeacherAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'TeacherAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'TeacherAuth\ResetPasswordController@showResetForm');

  Route::group(['middleware'=>['web','teacher','validteacher',]],function (){
      Route::get('/profile',function(){

          return view('teacher.auth.profile');
      });
      Route::get('/tuition',function(){

          return view('teacher.tuition.add_tuition');
      });
      Route::post('/tuition/new','TutionController@create_tuition');

      Route::get('/requests','TuitionRequestController@view_requests');
      Route::post('/requests/process','TuitionRequestController@process_tuition_request');
      Route::post('/profile','Profile@update_teacher_profile');
  });

  Route::get('/blocked',function (){
        return view('teacher.blocked');
    });
});



Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');


  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

    Route::group(['middleware'=>['web','admin',]],function() {
        Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
        Route::post('/register', 'AdminAuth\RegisterController@register');

        Route::get('/students', 'AdminFunctions@students');
        Route::post('/students{student_id}', 'AdminFunctions@toggleStateStudents');

        Route::get('/teachers', 'AdminFunctions@teachers');
        Route::post('/teachers{teacher_id}', 'AdminFunctions@toggleStateTeachers');
    });
});
