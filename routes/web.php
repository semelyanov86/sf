<?php

Route::view('/', 'welcome');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Currencies
    Route::delete('currencies/destroy', 'CurrenciesController@massDestroy')->name('currencies.massDestroy');
    Route::post('currencies/parse-csv-import', 'CurrenciesController@parseCsvImport')->name('currencies.parseCsvImport');
    Route::post('currencies/process-csv-import', 'CurrenciesController@processCsvImport')->name('currencies.processCsvImport');
    Route::resource('currencies', 'CurrenciesController');

    // Banks
    Route::delete('banks/destroy', 'BanksController@massDestroy')->name('banks.massDestroy');
    Route::resource('banks', 'BanksController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Target Categories
    Route::delete('target-categories/destroy', 'TargetCategoriesController@massDestroy')->name('target-categories.massDestroy');
    Route::post('target-categories/media', 'TargetCategoriesController@storeMedia')->name('target-categories.storeMedia');
    Route::post('target-categories/ckmedia', 'TargetCategoriesController@storeCKEditorImages')->name('target-categories.storeCKEditorImages');
    Route::resource('target-categories', 'TargetCategoriesController');

    // Budgets
    Route::delete('budgets/destroy', 'BudgetsController@massDestroy')->name('budgets.massDestroy');
    Route::resource('budgets', 'BudgetsController');

    // Targets
    Route::delete('targets/destroy', 'TargetsController@massDestroy')->name('targets.massDestroy');
    Route::post('targets/media', 'TargetsController@storeMedia')->name('targets.storeMedia');
    Route::post('targets/ckmedia', 'TargetsController@storeCKEditorImages')->name('targets.storeCKEditorImages');
    Route::resource('targets', 'TargetsController');

    // Accounts
    Route::delete('accounts/destroy', 'AccountsController@massDestroy')->name('accounts.massDestroy');
    Route::post('accounts/parse-csv-import', 'AccountsController@parseCsvImport')->name('accounts.parseCsvImport');
    Route::post('accounts/process-csv-import', 'AccountsController@processCsvImport')->name('accounts.processCsvImport');
    Route::resource('accounts', 'AccountsController');

    // Account Types
    Route::delete('account-types/destroy', 'AccountTypesController@massDestroy')->name('account-types.massDestroy');
    Route::post('account-types/parse-csv-import', 'AccountTypesController@parseCsvImport')->name('account-types.parseCsvImport');
    Route::post('account-types/process-csv-import', 'AccountTypesController@processCsvImport')->name('account-types.processCsvImport');
    Route::resource('account-types', 'AccountTypesController');

    // Card Types
    Route::delete('card-types/destroy', 'CardTypesController@massDestroy')->name('card-types.massDestroy');
    Route::post('card-types/parse-csv-import', 'CardTypesController@parseCsvImport')->name('card-types.parseCsvImport');
    Route::post('card-types/process-csv-import', 'CardTypesController@processCsvImport')->name('card-types.processCsvImport');
    Route::resource('card-types', 'CardTypesController');

    // Auto Brands
    Route::delete('auto-brands/destroy', 'AutoBrandsController@massDestroy')->name('auto-brands.massDestroy');
    Route::post('auto-brands/parse-csv-import', 'AutoBrandsController@parseCsvImport')->name('auto-brands.parseCsvImport');
    Route::post('auto-brands/process-csv-import', 'AutoBrandsController@processCsvImport')->name('auto-brands.processCsvImport');
    Route::resource('auto-brands', 'AutoBrandsController');

    // Accounts Extras
    Route::delete('accounts-extras/destroy', 'AccountsExtraController@massDestroy')->name('accounts-extras.massDestroy');
    Route::post('accounts-extras/parse-csv-import', 'AccountsExtraController@parseCsvImport')->name('accounts-extras.parseCsvImport');
    Route::post('accounts-extras/process-csv-import', 'AccountsExtraController@processCsvImport')->name('accounts-extras.processCsvImport');
    Route::resource('accounts-extras', 'AccountsExtraController');

    // Operations
    Route::delete('operations/destroy', 'OperationsController@massDestroy')->name('operations.massDestroy');
    Route::post('operations/media', 'OperationsController@storeMedia')->name('operations.storeMedia');
    Route::post('operations/ckmedia', 'OperationsController@storeCKEditorImages')->name('operations.storeCKEditorImages');
    Route::post('operations/parse-csv-import', 'OperationsController@parseCsvImport')->name('operations.parseCsvImport');
    Route::post('operations/process-csv-import', 'OperationsController@processCsvImport')->name('operations.processCsvImport');
    Route::resource('operations', 'OperationsController');

    // Hidden Categories
    Route::delete('hidden-categories/destroy', 'HiddenCategoriesController@massDestroy')->name('hidden-categories.massDestroy');
    Route::resource('hidden-categories', 'HiddenCategoriesController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Teams
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Currencies
    Route::delete('currencies/destroy', 'CurrenciesController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrenciesController');

    // Banks
    Route::delete('banks/destroy', 'BanksController@massDestroy')->name('banks.massDestroy');
    Route::resource('banks', 'BanksController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Target Categories
    Route::delete('target-categories/destroy', 'TargetCategoriesController@massDestroy')->name('target-categories.massDestroy');
    Route::post('target-categories/media', 'TargetCategoriesController@storeMedia')->name('target-categories.storeMedia');
    Route::post('target-categories/ckmedia', 'TargetCategoriesController@storeCKEditorImages')->name('target-categories.storeCKEditorImages');
    Route::resource('target-categories', 'TargetCategoriesController');

    // Budgets
    Route::delete('budgets/destroy', 'BudgetsController@massDestroy')->name('budgets.massDestroy');
    Route::resource('budgets', 'BudgetsController');

    // Targets
    Route::delete('targets/destroy', 'TargetsController@massDestroy')->name('targets.massDestroy');
    Route::post('targets/media', 'TargetsController@storeMedia')->name('targets.storeMedia');
    Route::post('targets/ckmedia', 'TargetsController@storeCKEditorImages')->name('targets.storeCKEditorImages');
    Route::resource('targets', 'TargetsController');

    // Accounts
    Route::delete('accounts/destroy', 'AccountsController@massDestroy')->name('accounts.massDestroy');
    Route::resource('accounts', 'AccountsController');

    // Account Types
    Route::delete('account-types/destroy', 'AccountTypesController@massDestroy')->name('account-types.massDestroy');
    Route::resource('account-types', 'AccountTypesController');

    // Card Types
    Route::delete('card-types/destroy', 'CardTypesController@massDestroy')->name('card-types.massDestroy');
    Route::resource('card-types', 'CardTypesController');

    // Auto Brands
    Route::delete('auto-brands/destroy', 'AutoBrandsController@massDestroy')->name('auto-brands.massDestroy');
    Route::resource('auto-brands', 'AutoBrandsController');

    // Accounts Extras
    Route::delete('accounts-extras/destroy', 'AccountsExtraController@massDestroy')->name('accounts-extras.massDestroy');
    Route::resource('accounts-extras', 'AccountsExtraController');

    // Operations
    Route::delete('operations/destroy', 'OperationsController@massDestroy')->name('operations.massDestroy');
    Route::post('operations/media', 'OperationsController@storeMedia')->name('operations.storeMedia');
    Route::post('operations/ckmedia', 'OperationsController@storeCKEditorImages')->name('operations.storeCKEditorImages');
    Route::resource('operations', 'OperationsController');

    // Hidden Categories
    Route::delete('hidden-categories/destroy', 'HiddenCategoriesController@massDestroy')->name('hidden-categories.massDestroy');
    Route::resource('hidden-categories', 'HiddenCategoriesController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
