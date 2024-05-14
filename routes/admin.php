<?php

use Illuminate\Support\Facades\Route;

####  admin #######################
// Auth::routes();
 Route::get('admin-login', 'Auth\LoginController@LoginAdmin')->name('admin-login');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin','prefix' => 'admin'], function () {

   Route::resource('dashboard','DashBoardController');
   Route::resource('categories','CategoryController');
   Route::resource('courses','CourseController');
   Route::post('courses-update-status', 'CourseController@updateStatus')->name('courses-update-status');
    Route::get('courses/edit/{id}','CourseController@coursesEdit');
    Route::post('courses/update','CourseController@update')->name('courses-update');
    Route::post('courses/delete','CourseController@destroy')->name('courses-delete');
    Route::get('course-joined/{id}', 'CourseController@courseJoined');
    Route::get('course-joined-status', 'CourseController@updateStatus')->name('course-joined-status');



   Route::resource('sliders','SliderController');
   Route::resource('introductions','IntroductionController');
   Route::resource('videos','VideoController');
   Route::resource('socials','SocialController');
   Route::resource('roles','RoleController');
   Route::resource('users','UserController');
   Route::get('settings','SettingController@settings');
   Route::post('settings/update','SettingController@updateSettings');

   Route::get('instructor/update/status', 'InstructorController@updateStatus')->name('instructor.update.status');
   Route::resource('instructors','InstructorController');


    // Route::get('about', 'ProfileController@about');
    // Route::get('contact', 'ProfileController@contact');
    Route::get('contact', 'ProfileController@contact');
    Route::post('settings/contactdata','ProfileController@updateContactData');
    Route::get('profile', 'SettingController@index');
    Route::post('profile/update','SettingController@updateProfile');
    Route::post('user/changepassword', 'ProfileController@changePassword')->name('user.changepassword');
    //      Route::post('user/changepassword', 'ProfileController@instructorChangePassword')->name('instructor.changepassword');

});
