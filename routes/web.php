<?php


// Route For Frontend

Route::get('/', 'HomePageController@index')->name('homepage');
Route::get('search', 'HomePageController@table')->name('search');
Route::get('categories/{category}', 'HomePageController@category')->name('category');
Route::get('companies/{company}', 'HomePageController@company')->name('company');



//Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();


//Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::resource('users', 'UsersController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::post('countries/media', 'CountriesController@storeMedia')->name('countries.storeMedia');
    Route::resource('countries', 'CountriesController');

    // Industries
    Route::delete('industries/destroy', 'IndustryController@massDestroy')->name('industries.massDestroy');
    Route::post('industries/media', 'IndustryController@storeMedia')->name('industries.storeMedia');
    Route::resource('industries', 'IndustryController');

    // Agents
    Route::delete('agents/destroy', 'AgentController@massDestroy')->name('agents.massDestroy');
    Route::post('agents/media', 'AgentController@storeMedia')->name('agents.storeMedia');
    Route::resource('agents', 'AgentController');

    // Employers
    Route::delete('employers/destroy', 'EmployerController@massDestroy')->name('employers.massDestroy');
    Route::post('employers/media', 'EmployerController@storeMedia')->name('employers.storeMedia');
    Route::resource('employers', 'EmployerController');

    // Experiences
    Route::delete('experiences/destroy', 'ExperienceController@massDestroy')->name('experiences.massDestroy');
    Route::resource('experiences', 'ExperienceController');

    // Comments
    Route::delete('comments/destroy', 'CommentController@massDestroy')->name('comments.massDestroy');
    Route::resource('comments', 'CommentController');

    // Settings
    Route::delete('settings/destroy', 'SettingController@massDestroy')->name('settings.massDestroy');
    Route::post('settings/media', 'SettingController@storeMedia')->name('settings.storeMedia');
    Route::resource('settings', 'SettingController');
    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');
    // Companies
    Route::delete('companies/destroy', 'CompaniesController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompaniesController@storeMedia')->name('companies.storeMedia');
    Route::resource('companies', 'CompaniesController');

    // Destinations
    Route::delete('destinations/destroy', 'DestinationController@massDestroy')->name('destinations.massDestroy');
    Route::post('destinations/media', 'DestinationController@storeMedia')->name('destinations.storeMedia');
    Route::resource('destinations', 'DestinationController');

    // Visas
    Route::delete('visas/destroy', 'VisaController@massDestroy')->name('visas.massDestroy');
    Route::resource('visas', 'VisaController');
});

//User Profile routes

Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User','middleware'=>['auth']], function () {

    Route::get('profile','UserProfileController@showProfile')->name('my-profile');
    Route::get('profile/basic-information','UserProfileController@showProfile')->name('basic-information');
});
