<?php 
Route::group(['prefix'=>'rate'], function()
{
	// đánh giá việc làm nhân viên
	 Route::get('rate/{Id_Tar}','Admin\RateController@rate')->name('rate');
	// Route::post('rate/{Id_Tar}','Admin\RateController@post_rate')->name('rate');
	 Route::post('rate/{Id_Tar}','Admin\RateController@update_rate')->name('rate');
	 // hiển thị bảng lương
	 Route::get('rate_show','Admin\RateController@showrate')->name('rate_show');
	 // tính hiệu suất của toàn bộ công ty
	 Route::get('total_rate','Admin\RateController@total_rate')->name('total_rate');
	 //hiển thị tông hiệu suất của nhân viên
	  Route::get('salary','Admin\RateController@post_salary')->name('salary');
	  // hiển thị đếm
	  Route::get('error','Admin\RateController@error')->name('error');
});



 ?>