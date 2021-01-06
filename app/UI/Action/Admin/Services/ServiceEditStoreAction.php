<?php


namespace App\UI\Action\Admin\Services;


use App\Domain\Repository\ServiceRepository;
use App\Http\Requests\StoreService;
use App\UI\Responder\Admin\Services\ServiceEditStoreResponder;
use Illuminate\Http\RedirectResponse;

class ServiceEditStoreAction
{
    private ServiceRepository $serviceRepository;

    /**
     * ServiceEditStoreAction constructor.
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function __invoke(StoreService $storeService, ServiceEditStoreResponder $responder): RedirectResponse
    {
        $this->serviceRepository->store($storeService->all());

        return $responder();
    }

}
