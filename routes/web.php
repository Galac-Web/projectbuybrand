<?php

use App\Services\Manifest;
use App\Services\Multilanguage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Manifest::routes();
//Multilanguage::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::prefix('franchises')->group(function () {
    /**
     * Rating
     */
    Route::grouping('rating', function () {
        /** @link /franchises/rating */
        Route::get('/', 'RatingController@index')->name('index');
    });

    /**
     * Franchise Catalog
     */
    Route::grouping('catalog', function () {
        /** @link /franchises/catalog */
        Route::get('/', 'FranchiseCatalogController@index')->name('index');
        Route::get('/{preset}', 'FranchiseCatalogController@preset')->name('preset');
    }, 'franchise-catalog');

    Route::grouping('/', function () {
        /** @link /franchises → /franchises/catalog */
        Route::redirect('/', '/franchises/catalog', 301);

        Route::get('/{franchise}', 'FranchiseController@show')->name('show');
        Route::middleware(['auth', can('franchise.create')])->group(function () {
            /** @link /franchises/add */
            Route::get('add', 'FranchiseController@add')->name('add');
        });
    }, 'franchise');
});

/**
 * Services
 */
Route::grouping('services', function () {
    /** @link /services */
    Route::get('/', 'ServiceController@index')->name('index');
});

/**
 * Media
 */
Route::grouping('media', function () {
    /** @link /media */
    Route::get('/', 'MediaController@index')->name('index');
    /** @link /media/show/{media} */
    Route::get('/show/{media}', 'MediaController@show')->name('show');
    Route::get('/{filter}', 'MediaController@filter')->where('filter', '^[a-zA-Z0-9-_\/]+$')->name('filter');
});

/**
 * Help Center
 */
Route::grouping('help', function () {
    /** @link /help */
    Route::get('/', 'HelpController@index')->name('index');
});

Route::middleware('auth')->group(function () {
    Route::grouping('account', function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::post('/avatar', 'UserController@avatar')->name('avatar');
    });
});

/**
 * Subscriptions
 */
Route::namespace('Subscription')->group(function () {
    Route::post('/mail', 'MailController@subscribe')->name('mail.subscribe');
});

/**
 * Search
 *
 * @link /search
 */
Route::get('/search', 'SearchController')->name('search');

/**
 * Authorization
 */

// Laravel Socialite
Route::prefix('auth')->group(function () {
    Route::get('{driver}', 'Auth\LoginController@redirectToProvider')->name('auth.social');
    Route::get('{driver}/redirect', 'Auth\LoginController@handleProviderCallback');
});
// Laravel Authentication
Auth::routes([
    'verify' => true
]);

Route::get('logout', 'Auth\LoginController@logout')->name('sign-out');
