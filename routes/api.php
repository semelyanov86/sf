<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', \Domains\Users\Http\Controllers\Api\PermissionsApiController::class);

    // Roles
    Route::apiResource('roles', \Domains\Users\Http\Controllers\Api\RolesApiController::class);

    // Users
    Route::apiResource('users', \Domains\Users\Http\Controllers\Api\UsersApiController::class);

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
    Route::post('target-categories/media', [\App\Http\Controllers\Api\V1\Admin\TargetCategoriesApiController::class, 'storeMedia'])->name('target-categories.storeMedia');
    Route::apiResource('target-categories', \App\Http\Controllers\Api\V1\Admin\TargetCategoriesApiController::class);

    // Budgets
    Route::apiResource('budgets', \App\Http\Controllers\Api\V1\Admin\BudgetsApiController::class);

    // Targets
    Route::post('targets/media', [\App\Http\Controllers\Api\V1\Admin\TargetsApiController::class, 'storeMedia'])->name('targets.storeMedia');
    Route::apiResource('targets', \App\Http\Controllers\Api\V1\Admin\TargetsApiController::class);

    // Accounts
    Route::apiResource('accounts', \App\Http\Controllers\Api\V1\Admin\AccountsApiController::class);

    // Account Types
    Route::apiResource('account-types', \App\Http\Controllers\Api\V1\Admin\AccountTypesApiController::class);

    // Card Types
    Route::apiResource('card-types', \App\Http\Controllers\Api\V1\Admin\CardTypesApiController::class);

    // Auto Brands
    Route::apiResource('auto-brands', \Domains\AutoBrands\Http\Controllers\Admin\AutoBrandsController::class);

    // Accounts Extras
    Route::apiResource('accounts-extras', \App\Http\Controllers\Api\V1\Admin\AccountsExtraApiController::class);

    // Operations
    Route::post('operations/media', [\App\Http\Controllers\Api\V1\Admin\OperationsApiController::class, 'storeMedia'])->name('operations.storeMedia');
    Route::apiResource('operations', \App\Http\Controllers\Api\V1\Admin\OperationsApiController::class);
});
