<?php


namespace App\UI\Responder\Admin\Projects;


use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ProjectsShowResponder
{
    public function __invoke(Paginator $projects, Collection $clients, Collection $services, Collection $skills): View
    {
        return view('admin.project.show_projects', [
            'projects' => $projects,
            'clients' => $clients,
            'services' => $services,
            'skills' => $skills
        ]);
    }
}
