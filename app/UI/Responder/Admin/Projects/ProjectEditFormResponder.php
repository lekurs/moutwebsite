<?php


namespace App\UI\Responder\Admin\Projects;


use App\Domain\Entity\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectEditFormResponder
{
    public function __invoke(Project $project, Collection $skills, array $projectSkills)
    {
        return view('admin.project.show_project', [
            'project' => $project,
            'skills' => $skills,
            'projectSkills' => $projectSkills
        ]);
    }
}
