<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController')->name('main');

// Пользователи
Route::resource('/users', 'UsersController')->except(['show'])->names('users');

// Франшизы
Route::grouping('/franchises', function () {
    Route::middleware(can('franchise.create', 'franchise.update'))->group(function () {
        Route::get('/', 'FranchiseController@index')->name('index');
        Route::get('/create', 'FranchiseController@form')->name('create');
        Route::match(['post', 'put'], '/save', 'FranchiseController@save')->name('save');
        Route::get('/{franchise}/edit', 'FranchiseController@form')->name('edit');
        Route::delete('/{franchise}', 'FranchiseController@destroy')->middleware(can('franchise.delete'))->name('destroy');
    });

    // Преимущества
    Route::grouping('/advantages', function () {
        Route::middleware(can('franchise.create', 'franchise.update'))->group(function () {
            Route::get('/', 'Franchise\AdvantageController@index')->name('index');
            Route::get('/create', 'Franchise\AdvantageController@form')->name('create');
            Route::match(['post', 'put'], '/save', 'Franchise\AdvantageController@save')->name('save');
            Route::get('/{advantage}/edit', 'Franchise\AdvantageController@form')->name('edit');
            Route::delete('/{advantage}', 'Franchise\AdvantageController@destroy')->middleware(can('franchise.delete'))->name('destroy');
        });
    });

    // Шильдики
    Route::grouping('/badges', function () {
        Route::middleware(can('franchise.create', 'franchise.update'))->group(function () {
            Route::get('/', 'Franchise\BadgeController@index')->name('index');
            Route::get('/create', 'Franchise\BadgeController@form')->name('create');
            Route::match(['post', 'put'], '/save', 'Franchise\BadgeController@save')->name('save');
            Route::get('/{badge}/edit', 'Franchise\BadgeController@form')->name('edit');
            Route::delete('/{badge}', 'Franchise\BadgeController@destroy')->middleware(can('franchise.delete'))->name('destroy');
        });
    });

    // Категории
    Route::grouping('/categories', function () {
        Route::middleware(can('franchise.create', 'franchise.update'))->group(function () {
            Route::get('/', 'Franchise\CategoryController@index')->name('index');
            Route::get('/create', 'Franchise\CategoryController@form')->name('create');
            Route::match(['post', 'put'], '/save', 'Franchise\CategoryController@save')->name('save');
            Route::get('/{category}/edit', 'Franchise\CategoryController@form')->name('edit');
            Route::delete('/{category}', 'Franchise\CategoryController@destroy')->middleware(can('franchise.delete'))->name('destroy');
        });
    });

    // Поддержка партнера
    Route::grouping('/supports', function () {
        Route::middleware(can('franchise.create', 'franchise.update'))->group(function () {
            Route::get('/', 'Franchise\SupportController@index')->name('index');
            Route::get('/create', 'Franchise\SupportController@form')->name('create');
            Route::match(['post', 'put'], '/save', 'Franchise\SupportController@save')->name('save');
            Route::get('/{support}/edit', 'Franchise\SupportController@form')->name('edit');
            Route::delete('/{support}', 'Franchise\SupportController@destroy')->middleware(can('franchise.delete'))->name('destroy');
        });
    });

    // Типы франшиз
    Route::grouping('/types', function () {
        Route::middleware(can('franchise.create', 'franchise.update'))->group(function () {
            Route::get('/', 'Franchise\TypeController@index')->name('index');
            Route::get('/create', 'Franchise\TypeController@form')->name('create');
            Route::match(['post', 'put'], '/save', 'Franchise\TypeController@save')->name('save');
            Route::get('/{type}/edit', 'Franchise\TypeController@form')->name('edit');
            Route::delete('/{type}', 'Franchise\TypeController@destroy')->middleware(can('franchise.delete'))->name('destroy');
        });
    });
});

// Медиа
Route::grouping('/media', function () {
    Route::middleware(can('media.create', 'media.update'))->group(function () {
        Route::get('/', 'MediaController@index')->name('index');
        Route::get('/create', 'MediaController@form')->name('create');
        Route::match(['post', 'put'], '/save', 'MediaController@save')->name('save');
        Route::get('/{media}/edit', 'MediaController@form')->name('edit');
        Route::delete('/{media}', 'MediaController@destroy')->middleware(can('media.delete'))->name('destroy');
    });
});

// Пресеты
Route::grouping('/presets', function () {
    Route::middleware(can('preset.create', 'preset.update'))->group(function () {
        Route::get('/', 'PresetController@index')->name('index');
        Route::get('/create', 'PresetController@form')->name('create');
        Route::match(['post', 'put'], '/save', 'PresetController@save')->name('save');
        Route::get('/{preset}/edit', 'PresetController@form')->name('edit');
        Route::delete('/{preset}', 'PresetController@destroy')->middleware(can('preset.delete'))->name('destroy');
    });
});

// Персоны
Route::grouping('/persons', function () {
    Route::middleware(can('person.create', 'person.update'))->group(function () {
        Route::get('/', 'PersonController@index')->name('index');
        Route::get('/create', 'PersonController@form')->name('create');
        Route::match(['post', 'put'], '/save', 'PersonController@save')->name('save');
        Route::get('/{preset}/edit', 'PersonController@form')->name('edit');
        Route::delete('/{preset}', 'PersonController@destroy')->middleware(can('person.delete'))->name('destroy');
    });
});

// CKEditor
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.upload');

// Templates
Route::get('templates', 'TemplateController')->name('template');

Route::get('kontur', 'KonturController@kontur')->name('kontur');
