<?php


namespace App\UI\Responder\Pub;


use App\Domain\Entity\Project;

class ProjectShowOneReponder
{
    public function __invoke(Project $project)
    {
        return view('public.project', [
            'project' => $project,
        ]);
    }
}
