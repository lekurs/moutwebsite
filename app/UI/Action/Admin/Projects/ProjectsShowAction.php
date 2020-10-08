<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ProjectRepository;
use App\UI\Responder\Admin\Projects\ProjectsShowResponder;
use Illuminate\Contracts\View\View;

class ProjectsShowAction
{
    private ProjectRepository $projectRepository;

    /**
     * ShowProjectsAction constructor.
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function __invoke(ProjectsShowResponder $responder): View
    {
        $projects = $this->projectRepository->getAll();

        return $responder($projects);
    }
}
