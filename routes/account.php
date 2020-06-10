<?php 
Route::group(['prefix'=>'account'], function()
{
	// đăng nhập
	Route::get('login','Admin\AdminController@login')->name('login');
	Route::post('login','Admin\AdminController@postlogin')->name('loginpost');
//đăng xuất
	Route::get('logout','Admin\AdminController@logout')->name('logout');

});

 ?>