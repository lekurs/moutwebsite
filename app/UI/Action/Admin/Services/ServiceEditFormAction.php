<?php


namespace App\UI\Action\Admin\Services;


use App\Domain\Repository\ServiceRepository;
use App\Http\Requests\StoreService;
use App\UI\Responder\Admin\Services\ServiceEditFormResponder;

class ServiceEditFormAction
{
    private ServiceRepository $serviceRepository;

    /**
     * ServiceEditFormAction constructor.
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function __invoke(string $serviceId, ServiceEditFormResponder $responder)
    {
        $service = $this->serviceRepository->getone($serviceId);

        return $responder($service);
    }
}
