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

    /**
     * ClientShowOneAction constructor.
     * @param ClientRepository $clientRepository
     * @param ProjectRepository $projectRepository
     * @param SkillRepository $skillRepository
     */
    public function __construct(
        ClientRepository $clientRepository,
        ProjectRepository $projectRepository,
        SkillRepository $skillRepository
    )
    {
        $this->clientRepository = $clientRepository;
        $this->projectRepository = $projectRepository;
        $this->skillRepository = $skillRepository;
    }

    public function __invoke(ClientShowOneResponder $responder)
    {
        $client = $this->clientRepository->getOneBySlugWithAllRelations(request('clientSlug'));
        $skills = $this->skillRepository->getAll();

//        dd($client);

        return $responder($client, $skills);
    }
}
