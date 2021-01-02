<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrenciesApiController');

    // Banks
    Route::apiResource('banks', 'BanksApiController');

    // Categories
    Route::apiResource('categories', 'CategoriesApiController');

    // Target Categories
    Route::post('target-categories/media', 'TargetCategoriesApiController@storeMedia')->name('target-categories.storeMedia');
    Route::apiResource('target-categories', 'TargetCategoriesApiController');

    // Budgets
    Route::apiResource('budgets', 'BudgetsApiController');

    // Targets
    Route::post('targets/media', 'TargetsApiController@storeMedia')->name('targets.storeMedia');
    Route::apiResource('targets', 'TargetsApiController');

    // Accounts
    Route::apiResource('accounts', 'AccountsApiController');

    // Account Types
    Route::apiResource('account-types', 'AccountTypesApiController');

    // Card Types
    Route::apiResource('card-types', 'CardTypesApiController');

    // Auto Brands
    Route::apiResource('auto-brands', 'AutoBrandsApiController');

    // Accounts Extras
    Route::apiResource('accounts-extras', 'AccountsExtraApiController');

    // Operations
    Route::post('operations/media', 'OperationsApiController@storeMedia')->name('operations.storeMedia');
    Route::apiResource('operations', 'OperationsApiController');
});
