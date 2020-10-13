<?php


namespace App\Domain\Repository;


use App\Domain\Entity\MediaProject;
use App\Domain\Entity\Project;
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
        return Project::whereSlug($slug);
    }

    public function getAllWithMediasOrderByNewer(): Collection
    {
        return Project::with('client', 'mediaProjects')
            ->orderBy('endProject')
            ->get();
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
