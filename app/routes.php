<?php

Route::group(['prefix' => 'api'], function () {
  Route::controller('/{species}/{mood}/{type}/{input}', 'ApiController');
  
  Route::get('/', function () {
    return '{
      "status" : "fail"
    }';
  });

});

Route::get('/', function() {
	return View::make('home');
});

