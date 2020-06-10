<?php 
Route::group(['prefix'=>'staff'],function()
{
	Route::get('list_staff','Admin\StaffController@list')->name('list_staff');
	//tim kiem nhan vien
	Route::get('search_staf','Admin\StaffController@search')->name('search_staf');
	// sửa nhân viên
	Route::get('edit_staff/{Id_Staff}','Admin\StaffController@edit')->name('edit_staff');
	Route::post('edit_staff/{Id_Staff}','Admin\StaffController@edit_post')->name('edit_staff');

	// them nv
	Route::get('add_staff','Admin\StaffController@add')->name('add_staff');
	Route::post('add_staff','Admin\StaffController@create')->name('add_staff');
	//xoa 
	Route::get('delete_staff/{Id_Staff}','Admin\StaffController@delete')->name('delete_staff');




	Route::get('list_kpi','Admin\StaffController@list_kpi')->name('list_kpi');
	Route::get('do/{Id_Tar}','Admin\StaffController@do')->name('work');
	Route::post('do/{Id_Tar}','Admin\StaffController@post_do')->name('work');
	Route::post('doo','Admin\StaffController@post_process')->name('workk');

	Route::post('do_list','Admin\StaffController@post_list')->name('do_list');
});
 ?>
