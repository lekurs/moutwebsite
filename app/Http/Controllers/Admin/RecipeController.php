<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\StoreRecipeAnswer;
use App\Models\Device;
use App\Models\Page;
use App\Models\Project;
use App\Models\Recipe;
use App\Repository\RecipeRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipe;
use App\Notifications\RecipeEmailNotification;
use Illuminate\Contracts\View\View;

class RecipeController extends Controller
{
    private RecipeRepository $recipeRepository;

    /**
     * RecipeController constructor.
     * @param RecipeRepository $recipeRepository
     */
    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }


    public function index(Project $project)
    {
        $recipes = $this->recipeRepository->getAllByProject($project);

        return \view('pages.admin.recipes.index', [
            'project' => $project,
            'recipes' => $recipes
        ]);
    }

    public function all()
    {
        $recipes = Recipe::all()->whereStatus(1);

        return \view('pages.admin.recipes.index', [
            'recipes' => $recipes
        ]);
    }

    public function show(Recipe $recipe)
    {
        $recipeOne = Recipe::with('recipeDetails')->whereId($recipe->id)->first();

        return \view('pages.admin.recipes.show', [
            'recipe' => $recipeOne
        ]);
    }

    public function create(Project $project)
    {
        $pages = Page::whereProjectId($project->id)->with('project')->get();
        $devices = Device::all();

        return view('pages.admin.recipes.create', [
            'project' => $project,
            'pages' => $pages,
            'devices' => $devices
        ]);
    }

    public function createRecipe(Project $project)
    {
        $pages = Page::whereProjectId($project->id)->with('project')->get();
        $devices = Device::all();

        return view('pages.admin.recipes.create_recipe', [
            'project' => $project,
            'pages' => $pages,
            'devices' => $devices
        ]);
    }

    public function store(StoreRecipe $storeRecipe, Project $project)
    {
        $data = $storeRecipe->validated();
        $this->recipeRepository->store($data, $project);

        return redirect()->route('clients.show', $project->client->slug);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function updateStatus(Recipe $recipe)
    {
        $status = $this->recipeRepository->updateStatus($recipe);

        if($status === true) {
            return back()->with('success', 'La recette est à présent terminée');
        } else {
            return back()->with('success', 'La recette est à présent en cours');
        }
    }

    public function destroy()
    {

    }
}
