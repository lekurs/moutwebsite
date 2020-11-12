<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ProjectRepository;
use App\Domain\Repository\ServiceRepository;
use App\Domain\Repository\SkillRepository;
use App\UI\Responder\Admin\Projects\ProjectsShowResponder;
use Illuminate\Contracts\View\View;

class ProjectsShowAction
{
    private ProjectRepository $projectRepository;

    private ClientRepository $clientRepository;

    private ServiceRepository $serviceRepository;

    private SkillRepository $skillRepository;

    /**
     * ProjectsShowAction constructor.
     * @param ProjectRepository $projectRepository
     * @param ClientRepository $clientRepository
     * @param ServiceRepository $serviceRepository
     * @param SkillRepository $skillRepository
     */
    public function __construct(
        ProjectRepository $projectRepository,
        ClientRepository $clientRepository,
        ServiceRepository $serviceRepository,
        SkillRepository $skillRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->clientRepository = $clientRepository;
        $this->serviceRepository = $serviceRepository;
        $this->skillRepository = $skillRepository;
    }


    public function __invoke(ProjectsShowResponder $responder): View
    {
        $projects = $this->projectRepository->getAll();
        $clients = $this->clientRepository->getAll();
        $services = $this->serviceRepository->getAll();
        $skills = $this->skillRepository->getAll();

        return $responder($projects, $clients, $services, $skills);
    }
}
