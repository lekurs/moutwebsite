<?php


namespace App\UI\Action\Admin\Services;


use App\Domain\Repository\ServiceRepository;

class ServiceStatusAction
{
    private ServiceRepository $serviceRepository;

    /**
     * ServiceStatusAction constructor.
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function __invoke()
    {
        $this->serviceRepository->updateStatus(request('serviceId'));

        return back()->with('success', 'Status mis à jour');
    }
}
