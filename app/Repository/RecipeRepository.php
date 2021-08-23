<?php


namespace App\Repository;


use App\Models\Project;
use App\Models\Recipe;
use Illuminate\Support\Str;

class RecipeRepository
{
    public function getAllByProject(Project $project)
    {
        return Recipe::whereProjectId($project->id)->orderBy('page_id')->whereNotNull('user_id')->get();
    }

    public function getOneWithPages(Project $project)
    {
        return Recipe::with('pages')->whereProjectId($project->id)->get();
    }

//    public function getOne(int $id): Recipe
//    {
//        return Recipe::find($id)->whereNotNull('parent')->get();
//    }

    public function store(array $data, Project $project, $parent = null)
    {
        $recipe = new Recipe();
        if (isset($data['recipe_image'])) {
            $recipe->picture_path = $data['recipe_image']->getClientOriginalName();
        }

        $recipe->label = $data['recipe_label'];
        $recipe->description = $data['recipe_description'];
        $recipe->slug = Str::slug($data['recipe_label']);
        $recipe->page_id = $data['recipe_page_id'];
        $recipe->user_id = auth()->user()->id;
        $recipe->client_id = $project->client_id;
        $recipe->project_id = $project->id;

        $recipe->save();

        $recipe->devices()->attach([$data['device_id']]);
        $recipe->contacts()->attach([auth()->user()->id]);
    }
}
