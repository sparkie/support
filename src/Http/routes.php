<?php

Route::group(['middleware' => 'auth:api'], function()
{
    Route::group(['prefix' => 'kiosk/support'], function()
    {
        Route::resource('ticket', 'TicketController');
    });
});
