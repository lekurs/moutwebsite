<?php


namespace App\UI\Action\Admin\Clients;


use App\Domain\Repository\ClientRepository;
use App\Http\Requests\StoreClient;
use App\Services\Uploads\UploadedFilesService;
use App\UI\Responder\Admin\Clients\ClientEditStoreResponder;
use Illuminate\Support\Str;

class ClientEditStoreAction
{
    private ClientRepository $clientRepository;

    private UploadedFilesService $uploadedFilesService;

    /**
     * ClientEditStoreAction constructor.
     * @param ClientRepository $clientRepository
     * @param UploadedFilesService $uploadedFilesService
     */
    public function __construct(ClientRepository $clientRepository, UploadedFilesService $uploadedFilesService)
    {
        $this->clientRepository = $clientRepository;
        $this->uploadedFilesService = $uploadedFilesService;
    }

    public function __invoke(string $clientSlug, StoreClient $storeClient, ClientEditStoreResponder $responder)
    {
        if (isset($storeClient['client-logo'])) {
            $file = $storeClient['client-logo'];

            $this->clientRepository->store($storeClient->all(), $file);

            $this->uploadedFilesService->moveFile($file, '/public/images/uploads/' . Str::slug($storeClient['client-name']) . '/logo');
        } else {
            $this->clientRepository->store($storeClient->all(), null);
        }


        return $responder();
    }
}
