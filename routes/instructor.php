<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

// هن اللوجن مش شغاله عشان ملف الروت الجديد لا يعم مع اللوجن


		// Route::get('departments/{id}/edit', 'DocumentController@edit');
		// Route::get('departments', 'DocumentController@update');
		Route::get('files/create', 'DocumentController@create');
		Route::post('files', 'DocumentController@store');
		Route::get('files', 'DocumentController@index');

		Route::post('files/{id}', 'DocumentController@show');
		Route::post('file/download/{file}', 'DocumentController@download');





// start livewire route

	// Route::view('booksss','livewire.index');

// end livewire route


 ###################### user-status ##############################
        // Route::post('users/status/{id}', 'UsersController@updateStatus')->name('users/status/{id}');

        ###################### admin-profile ##############################
       

Route::post('savevideo', 'Instructor\LiveCourseController@addvideostore')->name('savevideo');

Route::get('removeVideoSessionItem/{id}', 'Instructor\CourseController@removeVideoSessionItem');





// start group hamada
// Route::group(['middleware' => 'vendor'], function () {
// });
// end group hamada 

//  $vendor_authtt= Auth::guard('vendor')->user();
//  if(!$vendor_authtt){
            
//      return redirect(url('vendor/login'));
//  }
Route::get('/said', function () {
    return view('front.home');
});
Route::group(['middleware' => 'checkInstructor','namespace' => 'Instructor','prefix' => 'instructor'], function () {
    
    Route::get('chats', 'ChatController@myChats');
    Route::get('chat/user/{id}', 'ChatController@chatUserId')->name('instructor-chat/user');
    Route::get('chat/{instructorId}/create', 'ChatController@createStudentCat');

    Route::get('/said', function () {
        return view('front.home');
    });
  
    Route::resource('students','StudentController');
    Route::resource('dashboard','DashBoardController');

   
    Route::get('video_views', 'VideoViewController@index');   
    Route::get('video_views_curriculums', 'VideoViewController@indexCurriculums');   
    
    Route::post('remove-acount','ProfileController@removeAcount')->name('remove-acount');

    
    Route::resource('courses','LiveCourseController');    
    Route::get('live-joined/{id}', 'LiveCourseController@liveJoined');
    Route::get('profile', 'InstructorController@index');
    Route::get('terms', 'InstructorController@termsConditions')->name('terms'); 
    Route::get('instructor-video', 'InstructorController@instructorVideo');	
    Route::post('profile/update','InstructorController@updateProfile');
    Route::post('changepassword', 'InstructorController@studentChangePassword')->name('instructor.changepassword');

    
    Route::get('print-certificates', 'ProfileController@printCertificates');   	
});	


