<?php


namespace App\UI\Responder\Pub;


use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ProjectsResponder
{
    public function __invoke(Paginator $projects, Collection $services): View
    {
        return view('public.projects', [
            'projects' => $projects,
            'services' => $services,
        ]);
    }
}
