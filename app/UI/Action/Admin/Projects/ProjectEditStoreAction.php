<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ProjectRepository;
use App\Http\Requests\EditProject;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Support\Str;

class ProjectEditStoreAction
{
    private $projectRepository;

    private $uploadeFilesService;

    /**
     * ProjectEditStoreAction constructor.
     * @param ProjectRepository $projectRepository
     * @param UploadedFilesService $uploadeFilesService
     */
    public function __construct(ProjectRepository $projectRepository, UploadedFilesService $uploadeFilesService)
    {
        $this->projectRepository = $projectRepository;
        $this->uploadeFilesService = $uploadeFilesService;
    }

    public function __invoke(EditProject $data)
    {
        $this->projectRepository->editStore($data->all());

        $project = $this->projectRepository->getOneBySlug(Str::slug($data['project-title']));

        if(isset($data['img-project-portfolio'])) {
            $this->uploadeFilesService->moveFile($data['img-project-portfolio'], '/public/images/uploads/' . $project->client->slug . '/projets/portfolio');
        }

        if (isset($data['project-background-img'])) {
            $this->uploadeFilesService->moveFile($data['project-background-img'], '/public/images/uploads/' . $project->client->slug . '/projets/portfolio');
        }

        return back()->with('success', 'Projet mis à jour');
    }
}
