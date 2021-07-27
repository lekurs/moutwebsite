<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Entity\Page;
use App\Domain\Entity\Project;
use App\Domain\Repository\RecipeRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipe;

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

        return view('pages.admin.recipes.create', [
            'project' => $project,
            'pages' => $pages
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
