<?php


namespace App\Repository;


use App\Models\Page;
use App\Models\Project;
use Illuminate\Support\Str;

class PageRepository
{

    public function store(array $data, Project $project)
    {
//        dd($data['contact_id']);
        $page = new Page();
        $page->label = $data['page_label'];
        $page->url_path = $data['page_url_path'];
        $page->slug = Str::slug($data['page_label']);
        $page->project_id = $project->id;
        $page->save();

//        if(isset($data['contact_id']) && count($data['contact_id'])>1) {
//            foreach ($data['contact_id'] as $contact) {
//                $page->contacts()->sync($contact, false);
//            }
//        } else {
            $page->contacts()->sync($data['contact_id']);
//        }

    }
}
