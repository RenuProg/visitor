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

//
// Route::get('admin/login','admin\CustomLogin@login')->name('adminlogin'); 

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/dashboard', 'admin\DashboardController@index')->name('dashboard');
	Route::resource('department', 'admin\DepartmentController')->name('*','department');
	Route::resource('users', 'admin\UserController')->name('*','users');
	Route::resource('visitor_type', 'admin\VisitorTypeController')->name('*','visitor_type');
	Route::resource('visit_purpose', 'admin\VisitPurposeController')->name('*','visit_purpose');
	Route::resource('visit_management', 'admin\VisitManagementControllerr')->name('*','visit_management');
	Route::post('getupdatedata', 'admin\VisitManagementControllerr@getupdatedata')->name('getupdatedata');

	Route::resource('visitors', 'admin\VisitorController')->name('*','visitors');
	Route::post('visitors/search', 'admin\VisitorController@searchVisitor')->name('visitors.search');
	Route::post('visitors/getuser', 'admin\VisitorController@getUser')->name('visitors.getuser');
	Route::post('visitors/addVisit', 'admin\VisitorController@addVisit')->name('visitors.addVisit');
	Route::delete('visitors/delete_visit/{id}','admin\VisitorController@delete_visit')->name('visitors.delete_visit');
	Route::post('visitors/editVisit','admin\VisitorController@editVisit')->name('visitors.editVisit');
	

});
