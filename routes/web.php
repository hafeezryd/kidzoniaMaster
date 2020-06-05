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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('add-to-log', 'HomeController@myTestAddToLog');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function () {
	route::get('dashboard','DashboardController@index')->name('dashboard');	
	Route::resource('classwork', 'ClassworkController');
	Route::resource('homework', 'HomeworkController');

	//route::post('classwork','ClassworkController@save')->name('classwork.save');
	
	Route::get('notice', 'NoticeController@create');
	Route::get('getSection/{id}','ClassworkController@getSection');

	Route::resource('student','StudentController');
	Route::post('student/update', 'StudentController@update')->name('student.update');
	Route::get('student/destroy/{id}', 'StudentController@destroy');
	// Route::get('student','StudentController@index')->name('student.index');
	// Route::get('student/studentList','StudentController@studentList')->name('student.studentList');

	//month theme
	Route::resource('monththeme', 'MonththemeController');
	
	Route::resource('dayplan', 'DayplanController');

	Route::resource('fee', 'FeeController');
	
});

Route::group(['as'=>'parents.','prefix' => 'parents','namespace'=>'parents','middleware'=>['auth','parents']], function () {
	route::get('dashboard','DashboardController@index')->name('dashboard');	
	route::get('classwork/{subject}','ClassworkController@clickSubject');
	route::get('homework/{subject}','HomeworkController@clickSubject');
	
	route::get('homework.index','HomeworkController@index')->name('homework.index');
	route::post('homework/{subject}/{date}','HomeworkController@getHomework');

	Route::get('ccavenuePayment/{studentid}/{payvalue}','CcavenueController@ccavenuePayment');
															  
	Route::any('ccavenuePayment/response','CcavenueController@ccavenuePaymentResponse');

	// route::get('dayplan','DayplanController@getMonth')->name('dayplan');
	route::get('monththeme', function(){
		$thismonth = date('mY');
		$monththemes = \App\month_theme::whereRaw('month_theme = '.$thismonth )
		->get();
			 return view('parents.monththeme')->with(compact('monththemes'));
			// return $monththemes;
		})->name('monththeme');
	route::resource('fees','FeesController');	
	route::resource('studentinfo','StudentInfoController');

	route::get('dayplan',function(){
		$days = \App\Dayplan::whereRaw('Date(date) >= CURDATE()-7')
		->get();
		return view('parents.dayplan')->with(compact('days'));
		//return $day->file_path;
	})->name('dayplan');

	Route::resource('fee', 'FeeController');
	
        
});

route::get('enquire-n',function(){
	return view('Enquiry.enquire-n');
});