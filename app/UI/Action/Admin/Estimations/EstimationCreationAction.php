<?php


namespace App\UI\Action\Admin\Estimations;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\EstimationRepository;
use App\Domain\Repository\ServiceRepository;
use App\UI\Responder\Admin\Estimations\EstimationCreationActionResponder;

class EstimationCreationAction
{
    private $clientRepository;

    private $estimationRepository;

    private $serviceRepository;

    /**
     * EstimationCreationActionAction constructor.
     *
     * @param ClientRepository $clientRepository
     * @param EstimationRepository $estimationRepository
     * @param $serviceRepository
     */
    public function __construct(ClientRepository $clientRepository, EstimationRepository $estimationRepository, ServiceRepository $serviceRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->estimationRepository = $estimationRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function __invoke(EstimationCreationActionResponder $responder)
    {
        $client = $this->clientRepository->getOneBySlug(request('clientSlug'));

        $services = $this->serviceRepository->getAll();

        $number = $this->estimationRepository->getLatest();

        return $responder($client, $services);
    }

}
