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
        return Project::with('client', 'imagesProjects')
            ->orderBy('endProject')
            ->get();
    }

    public function store(array $datas): void
    {
        $project = new Project();
        $project->title = $datas['project-title'];
        $project->mission = $datas['project-mission'];
        $project->result = $datas['project-result'];
        $project->imagePortfolioProjectPath = $datas['imagePortfolio']->getClientOriginalName();
        $project->colorProject = $datas['project-color'];
        $project->endProjectDate = $datas['project-end'];
        $project->slug = Str::slug($datas['project-title']);
        $project->client_id = $datas['service-client'];

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
                $mediaProject->imageProjectPath = $file->getClientOriginalName();
                $mediaProject->project_id = $lastId;

                $mediaProject->save();
            }
        }
    }
}
