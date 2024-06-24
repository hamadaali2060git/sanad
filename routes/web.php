<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/home', function () {
//     return view('front.home');
// });

Auth::routes();


// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('home', 'Admin/DashBoardController@index');

  Route::get('lang/{locale}', 'LocalizationController@index');

  Route::get('/', 'FrontController@index');
  Route::get('/home', 'FrontController@index');
  Route::get('/course/{sluge}', 'FrontController@index');
  Route::get('category/{sluge}', 'FrontController@coursesBycategory');
  Route::get('course/{slug}/{id}', 'FrontController@coursesDetails');

  Route::get('my-profile', 'FrontController@myProfile');
  Route::post('updateprofile', 'FrontController@updateProfile')->name('updateprofile');
  Route::get('my-courses', 'FrontController@myCourses');

  Route::get('about', 'FrontController@about');

  Route::get('privacy-policy', 'FrontController@policy');
  Route::get('contact', 'FrontController@contact');
  Route::get('instructors', 'FrontController@instructors');


  ## start captcha
  Route::get('contact-form', 'FrontController@contactForm');
  Route::post('/captcha-validation', 'FrontController@capthcaFormValidate');
  Route::get('/reload-captcha', 'FrontController@reloadCaptcha');
  ## end



  // Route::get('instructor-login', 'Auth\InstructorLoginController@UserLogin')->name('instructor-login');
## start login student , instructor
  Route::get('user-login', 'Auth\InstructorLoginController@UserLogin')->name('user-login');
  Route::post('instructorlogin', 'Auth\InstructorLoginController@LoginUser')->name('instructorlogin');
  # end

  ## start signup student , instructor
  Route::get('instructor-signup', 'Auth\InstructorLoginController@instructorSignup')->name('instructor-signup');
  Route::post('instructor-signup-post', 'Auth\InstructorLoginController@instructorSignupPost')->name('instructor-signup-post');

  Route::get('student-signup', 'Auth\InstructorLoginController@studentSignup')->name('student-signup');
  Route::post('student-signup-post', 'Auth\InstructorLoginController@registerNewUser')->name('student-signup-post');
  ## end

  ## activation
  Route::get('/activation/users/{token}', 'Auth\InstructorLoginController@instructorActivation');
  #end

  ## start forgot password
  Route::get('forgot/password', 'Auth\InstructorLoginController@forgotPassword');
  Route::post('forgot/password', 'Auth\InstructorLoginController@submitForgot')->name('forgot.password.post');
  ## end

  ## start reset password student , instructor 
  Route::get('reset-user-password/{token}', 'Auth\InstructorLoginController@resetUserPasswordGet')->name('reset-user-password');
  Route::post('reset-user-password', 'Auth\InstructorLoginController@resetUserPasswordPost')->name('reset-user-password.post');
  ## end

  ## start change
    Route::get('student-password', 'FrontController@studentPassword');
    Route::post('student-change-password', 'FrontController@studentChangePassword')->name('student-change-password');
  ## end

  ## start reset password api
  Route::get('reset-password-api/{token}', 'Auth\InstructorLoginController@resetPasswordGetApi')->name('reset-password-api');
  Route::post('reset-password-api', 'Auth\InstructorLoginController@resetPasswordPostApi')->name('reset-password-post-api');
  ## end

  ## signout student , instructor
  Route::post('signoutinstructors', 'Auth\InstructorLoginController@signOutInstructors')->name('signoutinstructors');
  ## end




  // Route::post('signoutotudent', 'Auth\UserLoginController@signOutStudent')->name('signoutotudent');
  // Route::post('register-new-instructor', 'Auth\InstructorLoginController@registerNewInstructor')->name('register-new-instructor');
