<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\ProjectRepository;
use App\Domain\Repository\ServiceRepository;
use App\UI\Responder\Pub\ProjectsResponder;

class ProjectsAction
{
    private ProjectRepository $projectRepository;

    private ServiceRepository $serviceRepository;

    /**
     * ProjectsAction constructor.
     * @param ProjectRepository $projectRepository
     * @param ServiceRepository $serviceRepository
     * @param SkillRepository $skillRepository
     */
    public function __construct(
        ProjectRepository $projectRepository,
        ServiceRepository $serviceRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function __invoke(ProjectsResponder $responder)
    {
        $services = $this->serviceRepository->getAll();
        $projects = $this->projectRepository->getAllBy12();

        return $responder($projects, $services);
    }
}
