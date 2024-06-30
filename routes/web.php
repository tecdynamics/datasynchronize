<?php

use Tec\Base\Facades\AdminHelper;
use Tec\Base\Http\Middleware\DisableInDemoModeMiddleware;
use Tec\DataSynchronize\Http\Controllers\DataSynchronizeController;
use Tec\DataSynchronize\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

AdminHelper::registerRoutes(function () {
    Route::group(['permission' => 'tools.datasynchronize'], function () {
        Route::get('tools/datasynchronize', [DataSynchronizeController::class, 'index'])
            ->name('tools.datasynchronize');

        Route::prefix('datasynchronize')->name('datasynchronize.')->group(function () {
            Route::post('upload', [UploadController::class, '__invoke'])
                ->middleware(DisableInDemoModeMiddleware::class)
                ->name('upload');
        });
    });
});
