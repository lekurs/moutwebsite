<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\ProjectRepository;
use App\Domain\Repository\ServiceRepository;
use App\UI\Responder\Pub\IndexResponder;

class IndexAction
{
    private ServiceRepository $serviceRepository;

    private ProjectRepository $projectRepository;

    /**
     * IndexAction constructor.
     *
     * @param ServiceRepository $serviceRepository
     * @param ProjectRepository $ProjectRepository
     */
    public function __construct(ServiceRepository $serviceRepository, ProjectRepository $ProjectRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->projectRepository = $ProjectRepository;
    }

    public function __invoke(IndexResponder $responder)
    {
        $services = $this->serviceRepository->getAllWithProjectsLimitBy3();

        $projects = $this->projectRepository->getAllWithMediasOrderByNewer();

        return $responder($services, $projects);
    }
}
