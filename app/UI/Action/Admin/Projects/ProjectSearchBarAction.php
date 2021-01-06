<?php


namespace App\UI\Action\Admin\Projects;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ProjectRepository;
use App\Domain\Repository\ServiceRepository;
use App\Domain\Repository\SkillRepository;
use App\UI\Responder\Admin\Projects\ProjectSearchBarResponder;
use Illuminate\Support\Str;

class ProjectSearchBarAction
{
    private ProjectRepository $projectRepository;

    private ServiceRepository $serviceRepository;

    private ClientRepository $clientRepository;

    private SkillRepository $skillRepository;

    /**
     * ProjectSearchBarAction constructor.
     * @param ProjectRepository $projectRepository
     * @param ServiceRepository $serviceRepository
     * @param ClientRepository $clientRepository
     * @param SkillRepository $skillRepository
     */
    public function __construct(
        ProjectRepository $projectRepository,
        ServiceRepository $serviceRepository,
        ClientRepository $clientRepository,
        SkillRepository $skillRepository
    ) {
        $this->projectRepository = $projectRepository;
        $this->serviceRepository = $serviceRepository;
        $this->clientRepository = $clientRepository;
        $this->skillRepository = $skillRepository;
    }


    public function __invoke(ProjectSearchBarResponder $responder)
    {
//        dd(request('project-name'), request('skill'));
        $projects = $this->projectRepository->getAllWithSearchBar(request('project-name'), request('skill'));

//        dd($projects);
        $clients = $this->clientRepository->getAll();
        $services = $this->serviceRepository->getAll();
        $skills = $this->skillRepository->getAll();

        return $responder($projects, $clients, $services, $skills);
    }
}
