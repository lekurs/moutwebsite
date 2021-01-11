<?php


namespace App\UI\Action\Admin\Clients;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ProjectRepository;
use App\Domain\Repository\SkillRepository;
use App\Services\RandColor\RandColorService;
use App\UI\Responder\Admin\Clients\ClientShowOneResponder;

class ClientShowOneAction
{
    private $clientRepository;

    private $projectRepository;

    private $skillRepository;

    private $randColorService;

    /**
     * ClientShowOneAction constructor.
     * @param ClientRepository $clientRepository
     * @param ProjectRepository $projectRepository
     * @param SkillRepository $skillRepository
     * @param RandColorService $randColorService
     */
    public function __construct(
        ClientRepository $clientRepository,
        ProjectRepository $projectRepository,
        SkillRepository $skillRepository,
        RandColorService $randColorService
    )
    {
        $this->clientRepository = $clientRepository;
        $this->projectRepository = $projectRepository;
        $this->skillRepository = $skillRepository;
        $this->randColorService = $randColorService;
    }

    public function __invoke(ClientShowOneResponder $responder)
    {
        $client = $this->clientRepository->getOneBySlugWithProjectsAndContacts(request('clientSlug'));
        $skills = $this->skillRepository->getAll();

        $color = $this->randColorService->randomColor();

        return $responder($client, $color, $skills);
    }
}
