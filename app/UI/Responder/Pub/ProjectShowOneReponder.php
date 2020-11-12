<?php


namespace App\UI\Responder\Pub;


use App\Domain\Entity\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectShowOneReponder
{
    public function __invoke(Project $project)
    {
        return view('public.project', [
            'project' => $project,
        ]);
    }
}
