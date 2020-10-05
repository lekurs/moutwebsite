<?php


namespace App\UI\Responder\Admin\Projects;


use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ShowProjectsResponder
{
    public function __invoke(Collection $projects): View
    {
        return view('admin.project.show_projects', [
            'projects' => $projects
        ]);
    }
}
