<?php


namespace App\UI\Action\Admin\Estimations;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\EstimationRepository;
use App\Domain\Repository\ServiceRepository;
use App\Domain\Repository\TaxRepository;
use App\UI\Responder\Admin\Estimations\EstimationCreationActionResponder;

class EstimationCreationAction
{
    private ClientRepository $clientRepository;

    private EstimationRepository $estimationRepository;

    private ServiceRepository $serviceRepository;

    private TaxRepository $taxRepository;

    /**
     * EstimationCreationActionAction constructor.
     *
     * @param ClientRepository $clientRepository
     * @param EstimationRepository $estimationRepository
     * @param ServiceRepository $serviceRepository
     * @param TaxRepository $taxRepository
     */
    public function __construct(
        ClientRepository $clientRepository,
        EstimationRepository $estimationRepository,
        ServiceRepository $serviceRepository,
        TaxRepository $taxRepository
    ) {
        $this->clientRepository = $clientRepository;
        $this->estimationRepository = $estimationRepository;
        $this->serviceRepository = $serviceRepository;
        $this->taxRepository = $taxRepository;
    }

    public function __invoke(EstimationCreationActionResponder $responder)
    {
        $client = $this->clientRepository->getOneBySlug(request('clientSlug'));

        $services = $this->serviceRepository->getAll();

        $taxes = $this->taxRepository->getAll();

        if(!is_null($this->estimationRepository->getLatest())) {
            $number = intval($this->estimationRepository->getLatest()->reference)+1;
        } else {
            $number = date('Ym') . '001';
        }

        return $responder($client, $services, $taxes, $number);
    }

}
