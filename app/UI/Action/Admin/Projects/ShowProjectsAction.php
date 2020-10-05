<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ProjectRepository;
use App\UI\Responder\Admin\Projects\ShowProjectsResponder;
use Illuminate\Contracts\View\View;

class ShowProjectsAction
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

    public function __invoke(ShowProjectsResponder $responder): View
    {
        $projects = $this->projectRepository->getAll();

        return $responder($projects);
    }
}
