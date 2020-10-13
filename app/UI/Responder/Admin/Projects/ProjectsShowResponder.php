<?php


namespace App\UI\Responder\Admin\Projects;


use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ProjectsShowResponder
{
    public function __invoke(Collection $projects, Collection $clients, Collection $services): View
    {
        return view('admin.project.show_projects', [
            'projects' => $projects,
            'clients' => $clients,
            'services' => $services
        ]);
    }
}
