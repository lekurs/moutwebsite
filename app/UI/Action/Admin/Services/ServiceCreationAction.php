<?php


namespace App\UI\Action\Admin\Services;


use App\Domain\Repository\ServiceRepository;
use App\Http\Requests\StoreService;
use App\UI\Responder\Admin\Services\ServiceCreationResponder;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ServiceCreationAction
{
    private ServiceRepository $serviceRepository;

    /**
     * ServiceCreationAction constructor.
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function __invoke(StoreService $storeService, ServiceCreationResponder $responder): RedirectResponse
    {
        $this->serviceRepository->store($storeService->all());

        return $responder();
    }
}
