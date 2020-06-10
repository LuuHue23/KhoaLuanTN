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

// Route::get('/', function () {
//     return view('welcome');
// });


//Route::get('/','Admin\AdminController@index')->name('index');
Route::get('/','Member\StaffController@index')->name('index');

Route::group(['prefix'=>'admin'], function(){
	Route::get('/','Admin\AdminController@index')->name('index');
// danh sách mục tiêu
	Route::get('list_kpi','Admin\KpiController@list_kpi')->name('listkpi');
// Thêm mục tiêu
	Route::get('add_kpi','Admin\KpiController@add')->name('add_kpi');
	Route::post('add_kpi','Admin\KpiController@create')->name('add_mt');
// Sửa mục tiêu
	Route::get('edit_kpi/{Id_Tar}','Admin\KpiController@edit')->name('edit_kpi');
	Route::post('edit_kpi/{Id_Tar}','Admin\KpiController@update')->name('edit_kpi');
	// lọc mục tiêu
	
	Route::get('filter','Admin\KpiController@filter')->name('filter');


// Xóa mục tiêu
	Route::get('delete_kpi/{Id_Tar}','Admin\KpiController@delete')->name('delete_kpi');
	include'staff.php';
	include'workpro.php';
	include'rate.php';
	include'account.php';
});

Route::group(['prefix'=>'member'],function()
{
	
	Route::get('/','Member\StaffController@index')->name('indexx');
	Route::get('search','Member\StaffController@search')->name('search');

	// hiện mục tiêu
	Route::get('list_kpii','Member\StaffController@list')->name('list_kpii');
	
	// thuc hien cong viecs
	Route::get('do/{Id_Tar}','Member\StaffController@do')->name('do');
	Route::post('do/{Id_Tar}','Member\StaffController@post_do')->name('do');
	Route::post('doo','Member\StaffController@post_process')->name('doo');

	Route::post('do_list','Member\StaffController@post_list')->name('do_list');

	//Thông tin tài khoản
	Route::get('account', 'Member\AccountController@account')->name('account');
	Route::post('edit_acc', 'Member\AccountController@edit_acc')->name('edit_acc');

	Route::post('update_pas', 'Member\AccountController@update_pas')->name('update_pas');
	Route::post('update_img','Member\AccountController@update_img')->name('update_img');
	// hoàn thành công việc

	Route::get('view_rate','Member\StaffController@view')->name('view_rate');

});
Route::get('laravel-send-email', 'Admin\EmailController@sendEmail')->name('laravel-send-email');


Route::get('index-excel','ExcelController@index')->name('index-excel');
Route::get('export','ExcelController@export')->name('export');
Route::get('export_view','ExcelController@export_view')->name('export_view');
