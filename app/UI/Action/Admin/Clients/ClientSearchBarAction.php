<?php


namespace App\UI\Action\Admin\Clients;


use App\Domain\Repository\ClientRepository;

class ClientSearchBarAction
{
    private $clientRepository;

    /**
     * ClientSearchBarAction constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }


    public function __invoke()
    {
        $clients = $this->clientRepository->search(request('client-name'));

        return view('admin.clients.show_all_client', [
            'clients' => $clients
        ]);

    }
}
