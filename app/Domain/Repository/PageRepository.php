<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Page;
use App\Domain\Entity\Project;
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
    }
}
