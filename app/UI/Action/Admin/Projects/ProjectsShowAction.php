<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ProjectRepository;
use App\Domain\Repository\ServiceRepository;
use App\UI\Responder\Admin\Projects\ProjectsShowResponder;
use Illuminate\Contracts\View\View;

class ProjectsShowAction
{
    private ProjectRepository $projectRepository;

    private ClientRepository $clientRepository;

    private ServiceRepository $serviceRepository;

    /**
     * ProjectsShowAction constructor.
     * @param ProjectRepository $projectRepository
     * @param ClientRepository $clientRepository
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(
        ProjectRepository $projectRepository,
        ClientRepository $clientRepository,
        ServiceRepository $serviceRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->clientRepository = $clientRepository;
        $this->serviceRepository = $serviceRepository;
    }


    public function __invoke(ProjectsShowResponder $responder): View
    {
        $projects = $this->projectRepository->getAll();
        $clients = $this->clientRepository->getAll();
        $services = $this->serviceRepository->getAll();

        return $responder($projects, $clients, $services);
    }
}
