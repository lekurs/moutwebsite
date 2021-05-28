<?php

use App\Http\Controllers\Admin\Accounting\EstimationController;
use App\Http\Controllers\Admin\Accounting\EstimationCreatePDF;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TaxesController;
use App\Http\Controllers\User\ProfileController;

use App\UI\Action\Admin\HomeAdminAction;
use App\UI\Action\Admin\Profile\ProfileEditStoreAction;
use App\UI\Action\Admin\Profile\ProfileShowOneAction;
use App\UI\Action\Admin\Projects\ProjectShowOneAction;
use App\UI\Action\Pub\IndexAction;
use App\UI\Action\Pub\ProjectsAction;
use App\UI\Action\Pub\SendContactMailAction;
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
Route::get('/realisations', ProjectsAction::class)->name('projets');
Route::get('/realisation/{projectSlug}', ProjectShowOneAction::class)->name('project');
Route::post('/contact-mail', SendContactMailAction::class)->middleware('throttle:1,60')->name('contactMail');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'authorization']], function () {
    Route::get('/', HomeAdminAction::class)->name('homeAdmin');

    Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
       Route::get('/', [ProfileController::class, 'show'])->name('profiles.show');
       Route::post('/edit', [ProfileController::class, 'update'])->name('profiles.update');
    });

    Route::group(['prefix' => 'projets'], function () {
       Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
       Route::post('/ajouter', [ProjectController::class, 'store'])->name('projects.store');
       Route::get('/edit/{project:slug}', [ProjectController::class, 'edit'])->name('projects.edit');
       Route::post('/update', [ProjectController::class, 'update'])->name('projects.update');
        //TODO => Problème sur displayOrder : vérfier le JS
       Route::post('/store/projectmediafile', [ProjectController::class, 'updateMedia'])->name('projects.update.media');
       //TODO => Revoir la search bar !
       Route::post('/find', [ProjectController::class, 'search'])->name('projects.search');
       Route::post('/store/deleteimg', [ProjectController::class, 'destroyMedia'])->name('projects.destroy.media');
       Route::get('/delete/{project:slug}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });

    Route::group(['prefix' => 'competences'], function () {
        Route::get('/', [SkillController::class, 'index'])->name('skills.index');
        Route::get('/voir/{skill:id}', [SkillController::class, 'show'])->name('skills.show');
        Route::get('/delete/{skill:id}', [SkillController::class, 'destroy'])->name('skills.destroy');
        Route::get('/status/{skill:id}', [SkillController::class, 'status'])->name('skills.status');
        Route::post('/ajouter', [SkillController::class, 'store'])->name('skills.store');
        Route::post('/edit', [SkillController::class, 'update'])->name('skills.update');
    });

    Route::group(['prefix' => 'clients'], function () {
       Route::get('/', [ClientController::class, 'index'])->name('clients.index');
       Route::post('/ajouter', [ClientController::class, 'store'])->name('clients.store');
       Route::get('/voir/{client:slug}', [ClientController::class, 'show'])->name('clients.show');
       Route::get('/edit/{client:slug}', [ClientController::class, 'edit'])->name('clients.edit');
       Route::post('/edit/{client:slug}/store', [ClientController::class, 'update'])->name('client.update');
       Route::post('/search', [ClientController::class, 'search'])->name('clients.search');


       Route::group(['prefix' => 'contact'], function () {
          Route::get('/{contact:slug}', [ContactController::class, 'show'])->name('contacts.show');
          Route::post('/contact/edit', [ContactController::class, 'update'])->name('contacts.update');
          Route::get('/contact/{contactSlug}/delete', [ContactController::class, 'destroy'])->name('contacts.destroy');
          Route::post('/{client:slug}/store', [ContactController::class, 'store'])->name('contacts.store');
       });
    });

    Route::group(['prefix' => 'devis'], function () {
        Route::get('/{client:slug}/creer', [EstimationController::class, 'create'])->name('estimations.create');
        Route::post('/{client:slug}/store', [EstimationController::class, 'store'])->name('estimations.store');
        Route::get('{client:slug}/voir/{estimation:id}/pdf', [EstimationCreatePDF::class, 'create'])->name('estimations.create.pdf');
        Route::get('{client:slug}/voir/{estimation:id}', [EstimationController::class, 'show'])->name('estimations.show');
        Route::get('{client:slug}/destroy/{estimation:id}', [EstimationController::class, 'destroy'])->name('estimations.destroy');
    });

    Route::group(['prefix' => 'services'], function() {
        Route::get('/', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/voir/{service:id}', [ServiceController::class, 'show'])->name('services.show');
        Route::get('/edit/{service:id}', [ServiceController::class, 'edit'])->name('services.edit');
        Route::get('/status/{service:id}', [ServiceController::class, 'status'])->name('services.status');
        Route::post('/ajouter', [ServiceController::class, 'store'])->name('services.store');
        Route::post('/edit/{service:id}/store', [ServiceController::class, 'update'])->name('services.update');
        Route::get('/destroy/{service:id}', [ServiceController::class, 'destroy'])->name('services.destroy');
    });

    Route::group(['prefix' => 'taxes'], function () {
       Route::get('/', [TaxesController::class, 'index'])->name('taxes.index');
       Route::get('/{taxe:id}', [TaxesController::class, 'show'])->name('taxes.show');
       Route::post('/store', [TaxesController::class, 'store'])->name('taxes.store');
       Route::post('/edit/{taxe:id}', [TaxesController::class, 'update'])->name('taxes.update');
       Route::get('/trash/{taxe:id}', [TaxesController::class, 'destroy'])->name('taxes.delete');
       Route::get('/status/{taxe:id}', [TaxesController::class, 'status'])->name('taxes.status');
    });
});

Route::get('logout', '\App\Http\Controllers\Auth\LogoutController@logout')->name('logout');

Auth::routes();
