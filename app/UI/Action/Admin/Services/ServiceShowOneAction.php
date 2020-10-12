<?php


namespace App\UI\Action\Admin\Services;


use App\Domain\Repository\ServiceRepository;
use App\UI\Responder\Admin\Services\ServiceShowOneResponder;

class ServiceShowOneAction
{
    private ServiceRepository $serviceRepository;

    /**
     * ServiceShowOneAction constructor.
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function __invoke(int $serviceId, ServiceShowOneResponder $responder)
    {
        $service = $this->serviceRepository->getone($serviceId);

        return $responder($service);
    }
}
