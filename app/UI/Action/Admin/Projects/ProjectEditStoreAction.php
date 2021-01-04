<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ProjectRepository;
use App\Http\Requests\EditProject;
use App\Services\Uploads\UploadedFilesService;

class ProjectEditStoreAction
{
    private ProjectRepository $projectRepository;

    private UploadedFilesService $uploadeFilesService;

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
        dd('end');
    }
}
