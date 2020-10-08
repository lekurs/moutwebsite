<?php


namespace App\UI\Action\Admin\Clients;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ProjectRepository;
use App\UI\Responder\Admin\Clients\ClientShowOneResponder;

class ClientShowOneAction
{
    private ClientRepository $clientRepository;

    private ProjectRepository $projectRepository;

    /**
     * ClientShowOneAction constructor.
     * @param ClientRepository $clientRepository
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ClientRepository $clientRepository, ProjectRepository $projectRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->projectRepository = $projectRepository;
    }

    public function __invoke(ClientShowOneResponder $responder)
    {
        $client = $this->clientRepository->getOneBySlugWithProjectsAndContacts(request('clientSlug'));

        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
//
//        dd($client);

        return $responder($client, $color);
    }
}
