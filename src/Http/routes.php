<?php

Route::group(['middleware' => 'auth:api'], function()
{
    Route::group(['prefix' => 'kiosk/support'], function()
    {
        Route::get('all', 'TicketController@index');
    });
});
