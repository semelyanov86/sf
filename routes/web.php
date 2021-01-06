<?php

Route::view('/', 'welcome');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    // Permissions
    Route::delete('permissions/destroy', [\Domains\Users\Http\Controllers\Admin\PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', \Domains\Users\Http\Controllers\Admin\PermissionsController::class);

    // Roles
    Route::delete('roles/destroy', [\Domains\Users\Http\Controllers\Admin\RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', \Domains\Users\Http\Controllers\Admin\RolesController::class);

    // Users
    Route::delete('users/destroy', [\Domains\Users\Http\Controllers\Admin\UsersController::class, 'massDestroy'])->name('users.massDestroy');
    Route::post('users/parse-csv-import', [\Domains\Users\Http\Controllers\Admin\UsersController::class, 'parseCsvImport'])->name('users.parseCsvImport');
    Route::post('users/process-csv-import', [\Domains\Users\Http\Controllers\Admin\UsersController::class, 'processCsvImport'])->name('users.processCsvImport');
    Route::resource('users', \Domains\Users\Http\Controllers\Admin\UsersController::class);

    // Teams
    Route::delete('teams/destroy', [\Domains\Teams\Http\Controllers\Admin\TeamController::class, 'massDestroy'])->name('teams.massDestroy');
    Route::resource('teams', \Domains\Teams\Http\Controllers\Admin\TeamController::class);

    // Countries
    Route::delete('countries/destroy', [\App\Http\Controllers\Admin\CountriesController::class, 'massDestroy'])->name('countries.massDestroy');
    Route::resource('countries', \App\Http\Controllers\Admin\CountriesController::class);

    // Currencies
    Route::delete('currencies/destroy', [\App\Http\Controllers\Admin\CurrenciesController::class, 'massDestroy'])->name('currencies.massDestroy');
    Route::post('currencies/parse-csv-import', [\App\Http\Controllers\Admin\CurrenciesController::class, 'parseCsvImport'])->name('currencies.parseCsvImport');
    Route::post('currencies/process-csv-import', [\App\Http\Controllers\Admin\CurrenciesController::class, 'processCsvImport'])->name('currencies.processCsvImport');
    Route::resource('currencies', \App\Http\Controllers\Admin\CurrenciesController::class);

    // Banks
    Route::delete('banks/destroy', [\App\Http\Controllers\Admin\BanksController::class, 'massDestroy'])->name('banks.massDestroy');
    Route::resource('banks', \App\Http\Controllers\Admin\BanksController::class);

    // Categories
    Route::delete('categories/destroy', [\App\Http\Controllers\Admin\CategoriesController::class, 'massDestroy'])->name('categories.massDestroy');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class);

    // Target Categories
    Route::delete('target-categories/destroy', [\App\Http\Controllers\Admin\TargetCategoriesController::class, 'massDestroy'])->name('target-categories.massDestroy');
    Route::post('target-categories/media', [\App\Http\Controllers\Admin\TargetCategoriesController::class, 'storeMedia'])->name('target-categories.storeMedia');
    Route::post('target-categories/ckmedia', [\App\Http\Controllers\Admin\TargetCategoriesController::class, 'storeCKEditorImages'])->name('target-categories.storeCKEditorImages');
    Route::resource('target-categories', \App\Http\Controllers\Admin\TargetCategoriesController::class);

    // Budgets
    Route::delete('budgets/destroy', [\App\Http\Controllers\Admin\BudgetsController::class, 'massDestroy'])->name('budgets.massDestroy');
    Route::resource('budgets', \App\Http\Controllers\Admin\BudgetsController::class);

    // Targets
    Route::delete('targets/destroy', [\App\Http\Controllers\Admin\TargetsController::class, 'massDestroy'])->name('targets.massDestroy');
    Route::post('targets/media', [\App\Http\Controllers\Admin\TargetsController::class, 'storeMedia'])->name('targets.storeMedia');
    Route::post('targets/ckmedia', [\App\Http\Controllers\Admin\TargetsController::class, 'storeCKEditorImages'])->name('targets.storeCKEditorImages');
    Route::resource('targets', \App\Http\Controllers\Admin\TargetsController::class);

    // Accounts
    Route::delete('accounts/destroy', [\App\Http\Controllers\Admin\AccountsController::class, 'massDestroy'])->name('accounts.massDestroy');
    Route::post('accounts/parse-csv-import', [\App\Http\Controllers\Admin\AccountsController::class, 'parseCsvImport'])->name('accounts.parseCsvImport');
    Route::post('accounts/process-csv-import', [\App\Http\Controllers\Admin\AccountsController::class, 'processCsvImport'])->name('accounts.processCsvImport');
    Route::resource('accounts', \App\Http\Controllers\Admin\AccountsController::class);

    // Account Types
    Route::delete('account-types/destroy', [\App\Http\Controllers\Admin\AccountTypesController::class, 'massDestroy'])->name('account-types.massDestroy');
    Route::post('account-types/parse-csv-import', [\App\Http\Controllers\Admin\AccountTypesController::class, 'parseCsvImport'])->name('account-types.parseCsvImport');
    Route::post('account-types/process-csv-import', [\App\Http\Controllers\Admin\AccountTypesController::class, 'processCsvImport'])->name('account-types.processCsvImport');
    Route::resource('account-types', \App\Http\Controllers\Admin\AccountTypesController::class);

    // Card Types
    Route::delete('card-types/destroy', [\App\Http\Controllers\Admin\CardTypesController::class, 'massDestroy'])->name('card-types.massDestroy');
    Route::post('card-types/parse-csv-import', [\App\Http\Controllers\Admin\CardTypesController::class, 'parseCsvImport'])->name('card-types.parseCsvImport');
    Route::post('card-types/process-csv-import', [\App\Http\Controllers\Admin\CardTypesController::class, 'processCsvImport'])->name('card-types.processCsvImport');
    Route::resource('card-types', \App\Http\Controllers\Admin\CardTypesController::class);

    // Auto Brands
    Route::delete('auto-brands/destroy', [\App\Http\Controllers\Admin\AutoBrandsController::class, 'massDestroy'])->name('auto-brands.massDestroy');
    Route::post('auto-brands/parse-csv-import', [\App\Http\Controllers\Admin\AutoBrandsController::class, 'parseCsvImport'])->name('auto-brands.parseCsvImport');
    Route::post('auto-brands/process-csv-import', [\App\Http\Controllers\Admin\AutoBrandsController::class, 'processCsvImport'])->name('auto-brands.processCsvImport');
    Route::resource('auto-brands', \App\Http\Controllers\Admin\AutoBrandsController::class);

    // Accounts Extras
    Route::delete('accounts-extras/destroy', [\App\Http\Controllers\Admin\AccountsExtraController::class, 'massDestroy'])->name('accounts-extras.massDestroy');
    Route::post('accounts-extras/parse-csv-import', [\App\Http\Controllers\Admin\AccountsExtraController::class, 'parseCsvImport'])->name('accounts-extras.parseCsvImport');
    Route::post('accounts-extras/process-csv-import', [\App\Http\Controllers\Admin\AccountsExtraController::class, 'processCsvImport'])->name('accounts-extras.processCsvImport');
    Route::resource('accounts-extras', \App\Http\Controllers\Admin\AccountsExtraController::class);

    // Operations
    Route::delete('operations/destroy', [\App\Http\Controllers\Admin\OperationsController::class, 'massDestroy'])->name('operations.massDestroy');
    Route::post('operations/media', [\App\Http\Controllers\Admin\OperationsController::class, 'storeMedia'])->name('operations.storeMedia');
    Route::post('operations/ckmedia', [\App\Http\Controllers\Admin\OperationsController::class, 'storeCKEditorImages'])->name('operations.storeCKEditorImages');
    Route::post('operations/parse-csv-import', [\App\Http\Controllers\Admin\OperationsController::class, 'parseCsvImport'])->name('operations.parseCsvImport');
    Route::post('operations/process-csv-import', [\App\Http\Controllers\Admin\OperationsController::class, 'processCsvImport'])->name('operations.processCsvImport');
    Route::resource('operations', \App\Http\Controllers\Admin\OperationsController::class);

    // Hidden Categories
    Route::delete('hidden-categories/destroy', [\App\Http\Controllers\Admin\HiddenCategoriesController::class, 'massDestroy'])->name('hidden-categories.massDestroy');
    Route::resource('hidden-categories', \App\Http\Controllers\Admin\HiddenCategoriesController::class);

    Route::get('system-calendar', [\App\Http\Controllers\Admin\SystemCalendarController::class, 'index'])->name('systemCalendar');
    Route::get('global-search', [\App\Http\Controllers\Admin\GlobalSearchController::class, 'index'])->name('globalSearch');
    Route::get('team-members', [\Domains\Teams\Http\Controllers\Admin\TeamMembersController::class, 'index'])->name('team-members.index');
    Route::post('team-members', [\Domains\Teams\Http\Controllers\Admin\TeamMembersController::class, 'invite'])->name('team-members.invite');
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

    Route::get('frontend/profile', [\Domains\Users\Http\Controllers\Frontend\ProfileController::class, 'index'])->name('profile.index');
    Route::post('frontend/profile', [\Domains\Users\Http\Controllers\Frontend\ProfileController::class, 'update'])->name('profile.update');
    Route::post('frontend/profile/destroy', [\Domains\Users\Http\Controllers\Frontend\ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('frontend/profile/password', [\Domains\Users\Http\Controllers\Frontend\ProfileController::class, 'password'])->name('profile.password');
});
