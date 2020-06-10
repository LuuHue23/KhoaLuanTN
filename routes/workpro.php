<?php 

Route::group(['prefix'=>'workpro'],function(){

	

// giao việc cho nhân viên
	Route::get('add_workpro','Admin\WorkproController@add_workpro')->name('add_workpro');
	Route::post('add_workpro','Admin\WorkproController@add_work_pro')->name('add_workpro');
// xem công việc thực hiện của nhân viên
	Route::get('view/{Id_Tar}','Admin\WorkproController@view')->name('view');
	// loc du lieu
	Route::get('filter','Admin\WorkproController@filter')->name('filterwork');
	// loc tien do cong viec
	Route::get('filter_workpro','Admin\WorkproController@filter_workpro')->name('filter_workpro');

	Route::get('list-workpro','Admin\WorkproController@list_workpro')->name('list_workpro');


});
 ?>