<?php

// Authentication Routes...
Route::get('login', [\Units\Auth\Http\Controllers\Web\LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('login', [\Units\Auth\Http\Controllers\Web\LoginController::class, 'login'])->name('login');
Route::get('logout', [\Units\Auth\Http\Controllers\Web\LoginController::class, 'logout'])->name('logout');
// Registration Routes...
Route::get('register', [\Units\Auth\Http\Controllers\Web\RegisterController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('register', [\Units\Auth\Http\Controllers\Web\RegisterController::class, 'register'])->name('register');

// Password Reset Routes...
Route::get('password/reset/{token?}', [\Units\Auth\Http\Controllers\Web\ResetPasswordController::class, 'showResetForm']);
Route::post('password/email', [\Units\Auth\Http\Controllers\Web\ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [\Units\Auth\Http\Controllers\Web\ResetPasswordController::class, 'reset']);

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
