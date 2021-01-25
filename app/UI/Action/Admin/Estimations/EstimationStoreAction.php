<?php


namespace App\UI\Action\Admin\Estimations;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ContactRepository;
use App\Domain\Repository\EstimationRepository;
use App\Domain\Repository\ServiceRepository;
use App\Http\Requests\StoreEstimation;

class EstimationStoreAction
{
    private EstimationRepository $estimationRepository;

    private StoreEstimation $storeEstimation;

    private ClientRepository $clientRepository;

    private ContactRepository $contactRepository;

    private ServiceRepository $serviceRepository;

    /**
     * EstimationStoreAction constructor.
     * @param EstimationRepository $estimationRepository
     * @param StoreEstimation $storeEstimation
     * @param ClientRepository $clientRepository
     * @param ContactRepository $contactRepository
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(
        EstimationRepository $estimationRepository,
        StoreEstimation $storeEstimation,
        ClientRepository $clientRepository,
        ContactRepository $contactRepository,
        ServiceRepository $serviceRepository
    ) {
        $this->estimationRepository = $estimationRepository;
        $this->storeEstimation = $storeEstimation;
        $this->clientRepository = $clientRepository;
        $this->contactRepository = $contactRepository;
        $this->serviceRepository = $serviceRepository;
    }

    public function __invoke()
    {
        $estimation = $this->storeEstimation->all();

        $client = $this->clientRepository->getOneBySlug($estimation['client-slug']);
        $contact = $this->contactRepository->getOneBySlug($estimation['estimation-contact']);

        $this->estimationRepository->store($estimation, $client, $contact);

        dd('end');
    }
}
