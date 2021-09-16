<?php


namespace App\Repository;


use App\Models\Page;
use App\Models\Project;
use Illuminate\Support\Str;

class PageRepository
{

    public function store(array $data, Project $project)
    {
        $page = new Page();
        $page->label = $data['page_label'];
        $page->url_path = $data['page_url_path'];
        $page->slug = Str::slug($data['page_label']);
        $page->project_id = $project->id;
        $page->save();

            $page->users()->sync($data['contact_id']);

    }
}
