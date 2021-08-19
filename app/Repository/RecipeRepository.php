<?php


namespace App\Repository;


use App\Models\Project;
use App\Models\Recipe;
use Illuminate\Support\Str;

class RecipeRepository
{
    public function getAll()
    {

    }

    public function getOneWithPages(Project $project)
    {
        return Recipe::with('pages')->whereProjectId($project->id)->get();
    }

    public function store(array $data, Project $project)
    {
        $recipe = new Recipe();
        $recipe->label = $data['recipe_label'];
        if (isset($data['recipe_image'])) {
            $recipe->picture_path = $data['recipe_image']->getClientOriginalName();
        }
        $recipe->page_id = $data['recipe_page_id'];
        $recipe->slug = Str::slug($data['recipe_label']);
        $recipe->project_id = $project->id;
        $recipe->client_id = $project->client_id;
        $recipe->author = auth()->user()->id;
        $recipe->save();
    }
}
