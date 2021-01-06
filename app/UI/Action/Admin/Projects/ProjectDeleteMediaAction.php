<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\MediaProjectRepository;
use App\Domain\Repository\ProjectRepository;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ProjectDeleteMediaAction
{
    private MediaProjectRepository $mediaProjectRepository;

    private ProjectRepository $projectRepository;

    private UploadedFilesService $uploadedFilesService;

    /**
     * ProjectDeleteMediaAction constructor.
     * @param MediaProjectRepository $mediaProjectRepository
     * @param ProjectRepository $projectRepository
     * @param UploadedFilesService $uploadedFilesService
     */
    public function __construct(MediaProjectRepository $mediaProjectRepository, ProjectRepository $projectRepository, UploadedFilesService $uploadedFilesService)
    {
        $this->mediaProjectRepository = $mediaProjectRepository;
        $this->projectRepository = $projectRepository;
        $this->uploadedFilesService = $uploadedFilesService;
    }

    public function __invoke()
    {
        $projectMedia = $this->mediaProjectRepository->getOneWithProjectById(request('id'));
        $this->uploadedFilesService->removeFile('/public/images/uploads/' . $projectMedia->project->client->slug . '/projets/' . Str::slug($projectMedia->project->title) . '/' . $projectMedia->mediaProjectPath);
        return response()->json('success');
    }
}
