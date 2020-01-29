<?php


// Route For Frontend

Route::get('/', 'HomePageController@index')->name('homepage');

Route::get('/what-we-do',function(){
    return view('frontend.what-we-do');
})->name('what-we-do');

Route::get('/our-business-partners','HomePageController@businessPartner')->name('business-partner');

Route::get('/about-us','HomePageController@aboutUs')->name('about-us');

Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    //
});
Route::get('results/{type?}/{country?}', 'HomePageController@navigation')->name('navigation');
Route::post('results/{type?}/{country?}', 'HomePageController@search')->name('search');
Route::get('categories/{category}', 'HomePageController@category')->name('category');
Route::get('companies/{company}', 'HomePageController@company')->name('company');
Route::get('agents/{agent}', 'HomePageController@agent')->name('agent');
Route::get('employers/{employer}', 'HomePageController@employer')->name('employer');
Route::get('industries/{industry}', 'HomePageController@industry')->name('industry');

Route::get('login2',function(){
    return view('auth.login2');
});



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

    // Partners
    Route::delete('partners/destroy', 'PartnerController@massDestroy')->name('partners.massDestroy');
    Route::post('partners/media', 'PartnerController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnerController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnerController');

    // Members
    Route::delete('members/destroy', 'MemberController@massDestroy')->name('members.massDestroy');
    Route::post('members/media', 'MemberController@storeMedia')->name('members.storeMedia');
    Route::post('members/ckmedia', 'MemberController@storeCKEditorImages')->name('members.storeCKEditorImages');
    Route::resource('members', 'MemberController');
});

//User Profile routes


Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User','middleware'=>['auth']], function () {

    Route::get('profile','UserProfileController@showProfile')->name('my-profile');
    Route::get('profile/{user_id}','UserProfileController@userProfile')->name('user-profile');
    Route::put('profile/basic-information','UserProfileController@updateBasicInformation')->name('update-basic-information');
    Route::put('profile/work-preference','UserProfileController@updateWorkPreference')->name('update-work-preference');
    Route::get('your-experience','UserProfileController@userExperienceForm')->name('experience-form');
    Route::post('share-experience','UserProfileController@shareExperience')->name('share-experience');
    Route::get('work-preference','UserProfileController@workPreferenceForm')->name('work-preference-form');
    Route::post('work-preference','UserProfileController@workPreference')->name('work-preference');
    Route::post('update-profile-picture/{user}','UserProfileController@updateProfilePicture')->name('update-profile-picture');


});
