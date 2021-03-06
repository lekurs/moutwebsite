<?php

use App\UI\Action\Admin\Clients\ClientCreationAction;
use App\UI\Action\Admin\Clients\ClientEditFormAction;
use App\UI\Action\Admin\Clients\ClientEditStoreAction;
use App\UI\Action\Admin\Clients\ClientSearchBarAction;
use App\UI\Action\Admin\Clients\ClientShowAllAction;
use App\UI\Action\Admin\Clients\ClientShowOneAction;
use App\UI\Action\Admin\Contacts\ContactCreationAction;
use App\UI\Action\Admin\Contacts\ContactDeleteAction;
use App\UI\Action\Admin\Contacts\ContactEditStoreAction;
use App\UI\Action\Admin\Contacts\ContactShowOneAction;
use App\UI\Action\Admin\Estimations\EstimationCreatePDFAction;
use App\UI\Action\Admin\Estimations\EstimationCreationAction;
use App\UI\Action\Admin\Estimations\EstimationShowOneAction;
use App\UI\Action\Admin\Estimations\EstimationStoreAction;
use App\UI\Action\Admin\HomeAdminAction;
use App\UI\Action\Admin\Profile\ProfileEditStoreAction;
use App\UI\Action\Admin\Profile\ProfileShowOneAction;
use App\UI\Action\Admin\Projects\ProjectCreationAction;
use App\UI\Action\Admin\Projects\ProjectDeleteAction;
use App\UI\Action\Admin\Projects\ProjectDeleteMediaAction;
use App\UI\Action\Admin\Projects\ProjectEditFormAction;
use App\UI\Action\Admin\Projects\ProjectEditStoreAction;
use App\UI\Action\Admin\Projects\ProjectMediaFileStore;
use App\UI\Action\Admin\Projects\ProjectSearchBarAction;
use App\UI\Action\Admin\Projects\ProjectShowOneAction;
use App\UI\Action\Admin\Projects\ProjectsShowAction;
use App\UI\Action\Admin\Services\ServiceCreationAction;
use App\UI\Action\Admin\Services\ServiceEditFormAction;
use App\UI\Action\Admin\Services\ServiceEditStoreAction;
use App\UI\Action\Admin\Services\ServiceShowAllAction;
use App\UI\Action\Admin\Services\ServiceShowOneAction;
use App\UI\Action\Admin\Services\ServiceStatusAction;
use App\UI\Action\Admin\Skills\SkillCreationAction;
use App\UI\Action\Admin\Skills\SkillDeleteAction;
use App\UI\Action\Admin\Skills\SkillEditStoreAction;
use App\UI\Action\Admin\Skills\SkillShowAllAction;
use App\UI\Action\Admin\Skills\SkillShowOneAction;
use App\UI\Action\Admin\Skills\SkillStatusAction;
use App\UI\Action\Admin\Taxes\TaxCreationAction;
use App\UI\Action\Admin\Taxes\TaxDeleteAction;
use App\UI\Action\Admin\Taxes\TaxEditAction;
use App\UI\Action\Admin\Taxes\TaxShowAllAction;
use App\UI\Action\Admin\Taxes\TaxShowOneAction;
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
       Route::get('/', ProfileShowOneAction::class)->name('profile');
       Route::post('/edit', ProfileEditStoreAction::class)->name('profileEdit');
    });

    Route::group(['prefix' => 'projets'], function () {
       Route::get('/', ProjectsShowAction::class)->name('showProjects');
       Route::post('/ajouter', ProjectCreationAction::class)->name('projectAdd');
       Route::get('/edit/{projectSlug}', ProjectEditFormAction::class)->name('projectEditForm');
       Route::post('/store', ProjectEditStoreAction::class)->name('projectEditStore');
       Route::post('/store/projectmediafile', ProjectMediaFileStore::class)->name('addProjectMediaFile');
       Route::post('/find', ProjectSearchBarAction::class)->name('searchProject');
       Route::post('/store/deleteimg', ProjectDeleteMediaAction::class)->name('deleteProjectMedia');
       Route::get('/delete/{projectSlug}', ProjectDeleteAction::class)->name('deleteProject');

       Route::group(['prefix' => 'competences'], function () {
           Route::get('/', SkillShowAllAction::class)->name('skillShowAll');
           Route::get('/voir/{skillId}', SkillShowOneAction::class)->name('skillShowOne');
           Route::get('/delete/{skillId}', SkillDeleteAction::class)->name('skillDelete');
           Route::get('/status/{skillId}', SkillStatusAction::class)->name('skillStatus');
           Route::post('/ajouter', SkillCreationAction::class)->name('skillAdd');
           Route::post('/edit/{skillId)', SkillEditStoreAction::class)->name('skillEditStore');
       });
    });

    Route::group(['prefix' => 'clients'], function () {
       Route::get('/', ClientShowAllAction::class)->name('clientShowAll');
       Route::get('/voir/{clientSlug}', ClientShowOneAction::class)->name('clientShowOne');
       Route::get('/edit/{clientSlug}', ClientEditFormAction::class)->name('clientEditForm');
       Route::post('/ajouter', ClientCreationAction::class)->name('clientAdd');
       Route::post('/edit/{clientSlug}/store', ClientEditStoreAction::class)->name('clientEditStore');
       Route::post('/search', ClientSearchBarAction::class)->name('clientSearch');


       Route::group(['prefix' => 'contact'], function () {
          Route::get('/{contactSlug}', ContactShowOneAction::class)->name('contactShowOne');
          Route::post('/contact/edit', ContactEditStoreAction::class)->name('contactEditStore');
          Route::get('/contact/{contactSlug}/delete', ContactDeleteAction::class)->name('contactDelete');
          Route::post('/{clientSlug}/store', ContactCreationAction::class)->name('contactAdd');
       });
    });

    Route::group(['prefix' => 'devis'], function () {
        Route::get('/{clientSlug}/creer', EstimationCreationAction::class)->name('estimationCreation');
        Route::post('/{clientSlug}/store', EstimationStoreAction::class)->name('estimationStore');
        Route::get('{clientSlug}/voir/{estimationId}/pdf', EstimationCreatePDFAction::class)->name('estimationCreationPDF');
        Route::get('{clientSlug}/voir/{estimationId}', EstimationShowOneAction::class)->name('estimationShowOne');
    });

    Route::group(['prefix' => 'services'], function() {
        Route::get('/', ServiceShowAllAction::class)->name('serviceShowAll');
        Route::get('/voir/{serviceId}', ServiceShowOneAction::class)->name('serviceShowOne');
        Route::get('/edit/{serviceId}', ServiceEditFormAction::class)->name('serviceEditForm');
        Route::get('/status/{serviceId}', ServiceStatusAction::class)->name('serviceStatus');
        Route::post('/ajouter', ServiceCreationAction::class)->name('serviceAdd');
        Route::post('/edit/{serviceId}/store', ServiceEditStoreAction::class)->name('serviceEditStore');
    });

    Route::group(['prefix' => 'taxes'], function () {
       Route::get('/', TaxShowAllAction::class)->name('taxesShowAll');
       Route::get('/{taxId}', TaxShowOneAction::class)->name('taxesShowOne');
       Route::post('/store', TaxCreationAction::class)->name('taxAdd');
       Route::post('/edit/{taxId}', TaxEditAction::class)->name('taxEdit');
       Route::get('/trash/{taxId}', TaxDeleteAction::class)->name('taxDelete');
    });
});

Route::get('logout', '\App\Http\Controllers\Auth\LogoutController@logout')->name('logout');

Auth::routes();
