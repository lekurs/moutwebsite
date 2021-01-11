<?php


namespace App\UI\Action\Admin\Services;


use App\Domain\Repository\ServiceRepository;
use App\UI\Responder\Admin\Services\ServiceShowAllResponder;

class ServiceShowAllAction
{
    private $servicesRepository;

    /**
     * ServiceShowAllAction constructor.
     * @param ServiceRepository $servicesRepository
     */
    public function __construct(ServiceRepository $servicesRepository)
    {
        $this->servicesRepository = $servicesRepository;
    }

    public function __invoke(ServiceShowAllResponder $responder)
    {
        $services = $this->servicesRepository->getAll();

        return $responder($services);
    }
}
