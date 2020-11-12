<?php


namespace App\Domain\Repository;


use App\Domain\Entity\MediaProject;
use App\Domain\Entity\Project;
use App\Domain\Entity\Skill;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ProjectRepository
{
    public function getAll(): Collection
    {
        return Project::with('client')->get();
    }

    public function getOneBySlug(string $slug): Project
    {
        return Project::whereSlug($slug)->first();
    }

    public function getAllWithMediasOrderByNewer(): Collection
    {
        return Project::with('client', 'mediaProjects')
            ->orderBy('endProject')
            ->get();
    }

    public function getAllBy4(): Paginator
    {
        return Project::with('client', 'mediaProjects')
            ->orderBy('endProject')
            ->paginate(4);
    }

    public function getAllBy12(): Paginator
    {
        return Project::with('client', 'mediaProjects')
            ->orderBy('endProject')
            ->paginate(12);
    }

    public function store(array $datas): void
    {
        $project = new Project();
        $project->title = $datas['project-title'];
        $project->endProject = date('Y-m-d', strtotime($datas['project-end']));
        $project->mission = $datas['project-description-mission'];
        $project->result = $datas['project-result-mission'];
        $project->mediaPortfolioProjectPath = $datas['project-img-portfolio']->getClientOriginalName();
        $project->colorProject = $datas['project_color'];
        $project->slug = Str::slug($datas['project-title']);
        $project->client_id = $datas['client-id'];

        $project->save();

        if (isset($datas['project-service'])) {
            foreach ($datas['project-service'] as $service) {
                $project->services()->sync($service, false);
            }
        }

        if (isset($datas['skills']) && !is_null($datas['skills'])) {
            foreach ($datas['skills'] as $skill) {
                $project->skills()->sync($skill, false);
            }
        }

        $lastId = $project->id;

        if (isset($datas['image']) && !is_null($datas['image'])) {
            foreach ($datas['image'] as $key => $file) {
                $mediaProject = new MediaProject();
                $mediaProject->mediaProjectPath = $file->getClientOriginalName();
                $mediaProject->project_id = $lastId;

                $mediaProject->save();
            }
        }
    }
}
