<?php


namespace App\UI\Action\Admin\Clients;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\SkillRepository;
use App\UI\Responder\Admin\Clients\ClientShowAllResponder;
use Illuminate\Contracts\View\View;

class ClientShowAllAction
{
    private $clientRepository;

    private $skillRepository;

    /**
     * ClientsShowAction constructor.
     * @param ClientRepository $clientRepository
     * @param SkillRepository $skillRepository
     */
    public function __construct(ClientRepository $clientRepository, SkillRepository $skillRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->skillRepository = $skillRepository;
    }

    public function __invoke(ClientShowAllResponder $responder): View
    {
        $clients = $this->clientRepository->getAllWithPaginate();
        $skills = $this->skillRepository->getAll();

        return $responder($clients, $skills);
    }
}
