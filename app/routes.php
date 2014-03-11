<?php

Route::group(['prefix' => 'netanoids'], function () {
  Route::controller('/{species}/{mood}/{type}/{input}', 'ApiController');
  
  Route::get('/', function () {
    return '{
      "status": "fail",
      "message": "Invalid API formatting -- Use api.greg-considine.com/netanoids/<species>/<mood>/<type>/<input>"
    }';
  });

});

Route::get('/', function() {
	return View::make('home');
});

