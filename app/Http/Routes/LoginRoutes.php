<?php
Route::group(['middleware' => 'guest'], function()
{
	// LOGIN
	Route::post('login/authenticate','LoginController@authenticate');
	Route::resource('login','LoginController');
	
});
?>