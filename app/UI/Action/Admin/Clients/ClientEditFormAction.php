<?php


namespace App\UI\Action\Admin\Clients;


use App\Domain\Repository\ClientRepository;
use App\UI\Responder\Admin\Clients\ClientEditFormResponder;
use Illuminate\Contracts\View\View;

class ClientEditFormAction
{
    private ClientRepository $clientRepository;

    /**
     * ClientEditFormAction constructor.
     *
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function __invoke(ClientEditFormResponder $responder): View
    {
        $client = $this->clientRepository->getOneBySlug(request('clientSlug'));

        return $responder($client);
    }
}
