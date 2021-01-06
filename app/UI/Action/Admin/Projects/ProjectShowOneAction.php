<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ProjectRepository;
use App\UI\Responder\Pub\ProjectShowOneReponder;

class ProjectShowOneAction
{
    private ProjectRepository $projectRepository;

    /**
     * ProjectShowOneAction constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function __invoke(ProjectShowOneReponder $responder)
    {
        $project = $this->projectRepository->getOneBySlug(request('projectSlug'));

        return $responder($project);

    }
}
