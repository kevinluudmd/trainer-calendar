<?php

Route::group([
	'namespace' => 'Trainer\Calendar\Controllers',
	'prefix' => 'calendar',
], function() {
	Route::group(['prefix' => 'availability'], function() {
		Route::get('/{user_id}', 'AvailabilityController@show')->where(['user_id' => '\d+']);
	});
});
