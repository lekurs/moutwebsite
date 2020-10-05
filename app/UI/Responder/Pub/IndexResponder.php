<?php


namespace App\UI\Responder\Pub;


use Illuminate\Database\Eloquent\Collection;

class IndexResponder
{
    public function __invoke(Collection $services, Collection $projects)
    {
        return view('public.home', [
            'services' => $services,
            'projects' => $projects
        ]);
    }
}
