<?php

use App\Http\Controllers\Admin\Accounting\EstimationController;
use App\Http\Controllers\Admin\Accounting\EstimationCreatePDF;
use App\Http\Controllers\Admin\Accounting\InvoiceController;
use App\Http\Controllers\Admin\Accounting\InvoiceCreatePDF;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\RecipeDetailsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TaxesController;
use App\Http\Controllers\User\ProfileController;

use App\Models\RecipeDetails;
use App\UI\Action\Admin\Projects\ProjectShowOneAction;
use App\UI\Action\Pub\IndexAction;
use App\UI\Action\Pub\ProjectsAction;
//use App\UI\Action\Pub\SendContactMailAction;
use Database\Seeders\CreateAdminUserSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RoleSeeder;
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
//Route::get('/realisations', ProjectsAction::class)->name('projets');
//Route::get('/realisation/{projectSlug}', ProjectShowOneAction::class)->name('project');
//Route::post('/contact-mail', SendContactMailAction::class)->middleware('throttle:1,60')->name('contactMail');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('homeAdmin');

    Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
       Route::get('/', [ProfileController::class, 'show'])->name('profiles.show');
       Route::post('/edit', [ProfileController::class, 'update'])->name('profiles.update');
    });

    Route::group(['prefix' => 'projets'], function () {
       Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
       Route::get('/creer/{client:slug}', [ProjectController::class, 'create'])->name('projects.create');
       Route::post('/ajouter', [ProjectController::class, 'store'])->name('projects.store');
       Route::get('/edit/{project:slug}', [ProjectController::class, 'edit'])->name('projects.edit');
       Route::post('/update', [ProjectController::class, 'update'])->name('projects.update');
        //TODO => Problème sur displayOrder : vérfier le JS
       Route::post('/store/projectmediafile', [ProjectController::class, 'updateMedia'])->name('projects.update.media');
       //TODO => Revoir la search bar !
       Route::post('/find', [ProjectController::class, 'search'])->name('projects.search');
       Route::post('/store/deleteimg', [ProjectController::class, 'destroyMedia'])->name('projects.destroy.media');
       Route::get('/delete/{project:slug}', [ProjectController::class, 'destroy'])->name('projects.destroy');
       Route::post('/progression', [ProjectController::class, 'updateActive'])->name('projects.update.active');
    });

    Route::group(['prefix' => 'recettes'], function () {
       Route::get('/{project:slug}/voir', [RecipeController::class, 'index'])->name('recipes.index');
       Route::get('/{recipe:slug}', [RecipeController::class, 'show'])->name('recipes.show');
       Route::get('/administrer/{project:slug}/creer', [RecipeController::class, 'create'])->name('recipes.create');
       Route::post('{project:slug}/ajouter', [RecipeController::class, 'store'])->name('recipes.store');
       Route::get('/creer/{project:slug}', [RecipeController::class, 'createRecipe'])->name('recipes.gerer.create');

       Route::group(['prefix' => 'retours'], function () {
           Route::get('/');
           Route::post('/{recipe:slug}/store', [RecipeDetailsController::class, 'store'])->name('recipedetails.store');
       });
//       Route::get('/', function () {
//           auth()->user()->notify(new RecipeEmailNotification(auth()->user()));
//       });

       Route::group(['prefix' => 'pages'], function () {
           Route::get('{project:slug}/creer', [PageController::class, 'create'])->name('pages.create');
           Route::post('{project:slug}/ajouter', [PageController::class, 'store'])->name('pages.store');
       });
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
       Route::get('/', [ClientController::class, 'index'])->middleware('can:clients.index')->name('clients.index');
       Route::get('/creer', [ClientController::class, 'create'])->name('clients.create');
       Route::post('/ajouter', [ClientController::class, 'store'])->name('clients.store');
       Route::get('/voir/{client:slug}', [ClientController::class, 'show'])->name('clients.show');
       Route::get('/edit/{client:slug}', [ClientController::class, 'edit'])->name('clients.edit');
       Route::post('/edit/{client:slug}/store', [ClientController::class, 'update'])->name('client.update');
       Route::post('/search', [ClientController::class, 'search'])->name('clients.search');


       Route::group(['prefix' => 'contact'], function () {
          Route::get('/{contact:slug}', [ContactController::class, 'show'])->name('contacts.show');
          Route::get('/creer/{client:slug}', [ContactController::class, 'create'])->name('contacts.create');
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
        Route::post('/edit', [EstimationController::class, 'editDetail'])->name('estimations.details.update');
        Route::post('/edit/{estimation:id}', [EstimationController::class, 'editTitle'])->name('estimations.title.update');
    });

    Route::group(['prefix' => 'factures'], function() {
        Route::get('/{estimation:id}/creer', [InvoiceController::class, 'create'])->name('invoices.create');
        //TODO revoir le facture soldée ????
        Route::get('/{estimation:id}/enregistrer', [InvoiceController::class, 'store'])->name('invoices.store');
        Route::get('/{invoice:id}/voir/pdf', [InvoiceCreatePDF::class, 'create'])->name('invoices.create.pdf');
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

    Route::group(['prefix' => 'roles'], function () {
        if(app()->environment('local')) {
            Route::get('/yolo', function () {
                Artisan::call('db:seed', ['--class' => PermissionSeeder::class]);
                Artisan::call('db:seed', ['--class' => RoleSeeder::class]);
                Artisan::call('db:seed', ['--class' => CreateAdminUserSeeder::class]);
            });
        }
        Route::get('/', [RoleController::class, 'index'])->middleware('can:roles.index')->name('roles.index');
    });
});

Route::get('logout', '\App\Http\Controllers\Auth\LogoutController@logout')->name('logout');

Auth::routes();
