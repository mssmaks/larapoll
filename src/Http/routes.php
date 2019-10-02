<?php

$prefix = config('larapoll_config.prefix');
Route::group(['namespace' => 'Inani\Larapoll\Http\Controllers', 'prefix' => $prefix, 'middleware' => 'web'], function(){
    $middleware = config('larapoll_config.middleware');

    Route::middleware([$middleware])->group(function () {
        Route::get('/home', ['uses' => 'PollManagerController@home', 'as' => 'poll.home']);
        Route::get('/', ['uses' => 'PollManagerController@index', 'as' => 'poll.index']);
        Route::get('/create', ['uses' => 'PollManagerController@create', 'as' => 'poll.create']);
        Route::get('/{poll}', ['uses' => 'PollManagerController@edit', 'as' => 'poll.edit']);
        Route::patch('/{poll}', ['uses' => 'PollManagerController@update', 'as' => 'poll.update']);
        Route::delete('/{poll}', ['uses' => 'PollManagerController@remove', 'as' => 'poll.remove']);
        Route::patch('/{poll}/lock', ['uses' => 'PollManagerController@lock', 'as' => 'poll.lock']);
        Route::patch('/{poll}/unlock', ['uses' => 'PollManagerController@unlock', 'as' => 'poll.unlock']);
        Route::post('/', ['uses' => 'PollManagerController@store', 'as' => 'poll.store']);
        Route::get('/{poll}/options/add', ['uses' => 'OptionManagerController@push', 'as' => 'poll.options.push']);
        Route::post('/{poll}/options/add', ['uses' => 'OptionManagerController@add', 'as' => 'poll.options.add']);
        Route::get('/{poll}/options/remove', ['uses' => 'OptionManagerController@delete', 'as' => 'poll.options.remove']);
        Route::delete('/{poll}/options/remove', ['uses' => 'OptionManagerController@remove', 'as' => 'poll.options.remove']);
    });

    Route::post('/vote/{poll}', 'VoteManagerController@vote')->name('poll.vote');
});
