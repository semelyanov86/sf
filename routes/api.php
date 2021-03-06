<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', \Domains\Users\Http\Controllers\Api\PermissionsApiController::class);

    // Roles
    Route::apiResource('roles', \Domains\Users\Http\Controllers\Api\RolesApiController::class);

    // Users
    Route::apiResource('users', \Domains\Users\Http\Controllers\Api\UsersApiController::class);
    Route::get('users/profile', [\Domains\Users\Http\Controllers\Api\UsersApiController::class, 'profile'])->name('user.profile');

    // Teams
    Route::apiResource('teams', \Domains\Teams\Http\Controllers\Api\TeamApiController::class);

    // Countries
    Route::apiResource('countries', \Domains\Countries\Http\Controllers\Api\CountriesApiController::class);

    // Currencies
    Route::apiResource('currencies', \Domains\Currencies\Http\Controllers\Api\CurrenciesApiController::class);

    // Banks
    Route::apiResource('banks', \Domains\Banks\Http\Controllers\Api\BanksApiController::class);

    // Categories
    Route::apiResource('categories', \Domains\Categories\Http\Controllers\Api\CategoriesApiController::class);

    // Target Categories
    Route::post('target-categories/media', [\Domains\Targets\Http\Controllers\Api\TargetCategoriesApiController::class, 'storeMedia'])->name('target-categories.storeMedia');
    Route::apiResource('target-categories', \Domains\Targets\Http\Controllers\Api\TargetCategoriesApiController::class);

    // Budgets
    Route::apiResource('budgets', \Domains\Budgets\Http\Controllers\Api\BudgetsApiController::class);

    // Targets
    Route::post('targets/media', [\Domains\Targets\Http\Controllers\Api\TargetsApiController::class, 'storeMedia'])->name('targets.storeMedia');
    Route::apiResource('targets', \Domains\Targets\Http\Controllers\Api\TargetsApiController::class);

    // Accounts
    Route::apiResource('accounts', \Domains\Accounts\Http\Controllers\Api\V1\Admin\AccountsApiController::class);

    // Account Types
    Route::apiResource('account-types', \Domains\Accounts\Http\Controllers\Api\V1\Admin\AccountTypesApiController::class);

    // Card Types
    Route::apiResource('card-types', \Domains\CardTypes\Http\Controllers\Api\CardTypesApiController::class);

    // Auto Brands
    Route::apiResource('auto-brands', \Domains\AutoBrands\Http\Controllers\Api\AutoBrandsApiController::class);

    // Accounts Extras
    Route::apiResource('accounts-extras', \Domains\Accounts\Http\Controllers\Api\V1\Admin\AccountsExtraApiController::class);

    // Operations
    Route::post('operations/media', [\Domains\Operations\Http\Controllers\Api\OperationsApiController::class, 'storeMedia'])->name('operations.storeMedia');
    Route::apiResource('operations', \Domains\Operations\Http\Controllers\Api\OperationsApiController::class);
});
