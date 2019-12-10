<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Countries
    Route::post('countries/media', 'CountriesApiController@storeMedia')->name('countries.storeMedia');
    Route::apiResource('countries', 'CountriesApiController');

    // Industries
    Route::post('industries/media', 'IndustryApiController@storeMedia')->name('industries.storeMedia');
    Route::apiResource('industries', 'IndustryApiController');

    // Agents
    Route::post('agents/media', 'AgentApiController@storeMedia')->name('agents.storeMedia');
    Route::apiResource('agents', 'AgentApiController');

    // Employers
    Route::post('employers/media', 'EmployerApiController@storeMedia')->name('employers.storeMedia');
    Route::apiResource('employers', 'EmployerApiController');

    // Experiences
    Route::apiResource('experiences', 'ExperienceApiController');
});
