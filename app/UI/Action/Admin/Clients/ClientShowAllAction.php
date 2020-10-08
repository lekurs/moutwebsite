<?php


namespace App\UI\Action\Admin\Clients;


use App\Domain\Repository\ClientRepository;
use App\UI\Responder\Admin\Clients\ClientShowAllResponder;
use Illuminate\Contracts\View\View;

class ClientShowAllAction
{
    private ClientRepository $clientRepository;

    /**
     * ClientsShowAction constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function __invoke(ClientShowAllResponder $responder): View
    {
        $clients = $this->clientRepository->getAllWithPaginate();

        return $responder($clients);
    }
}
