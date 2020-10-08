<?php

use App\UI\Action\Admin\Clients\ClientCreationAction;
use App\UI\Action\Admin\Clients\ClientEditFormAction;
use App\UI\Action\Admin\Clients\ClientEditStoreAction;
use App\UI\Action\Admin\Clients\ClientShowAllAction;
use App\UI\Action\Admin\Clients\ClientShowOneAction;
use App\UI\Action\Admin\Contacts\ContactCreationAction;
use App\UI\Action\Admin\HomeAdminAction;
use App\UI\Action\Admin\Projects\ProjectsShowAction;
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
       Route::get('/', ProjectsShowAction::class)->name('showProjects');
    });

    Route::group(['prefix' => 'clients'], function () {
       Route::get('/', ClientShowAllAction::class)->name('clientShowAll');
       Route::get('/voir/{clientSlug}', ClientShowOneAction::class)->name('clientShowOne');
       Route::get('/edit/{clientSlug}', ClientEditFormAction::class)->name('clientEditForm');
       Route::post('/ajouter', ClientCreationAction::class)->name('clientAdd');
       Route::post('/edit/{clientSlug}/store', ClientEditStoreAction::class)->name('clientEditStore');

       Route::post('/{clientSlug}/contact/store', ContactCreationAction::class)->name('contactAdd');
    });
});

Auth::routes();
