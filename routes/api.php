<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::grouping('geo', function () {
        Route::get('getCity', 'API\v1\GeoController@getCity')->name('city');
        Route::get('getCountry', 'API\v1\GeoController@getCountry')->name('country');
    });

    // Franchises
    Route::grouping('franchises', function () {

        // Requirements
        Route::delete('deleteRequirementById', 'API\v1\Franchise\RequirementController@deleteRequirementById')->name('requirement.delete');
    });
});

