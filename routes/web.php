<?php

use App\UI\Action\Admin\HomeAdminAction;
use App\UI\Action\Admin\Projects\ShowProjectsAction;
use App\UI\Action\Pub\IndexAction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', IndexAction::class)->name('index');

//, 'middleware' => 'auth'
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', HomeAdminAction::class)->name('homeAdmin');

    Route::group(['prefix' => 'projets'], function () {
       Route::get('/', ShowProjectsAction::class)->name('showProjects');
    });
});

Auth::routes();
