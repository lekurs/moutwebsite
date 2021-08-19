<?php


namespace App\Http\Controllers\Admin;


use App\Models\Device;
use App\Models\Page;
use App\Models\Project;
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


    public function index()
    {

    }

    public function show()
    {

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

    public function destroy()
    {

    }
}
