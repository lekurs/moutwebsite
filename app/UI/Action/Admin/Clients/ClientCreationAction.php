<?php


namespace App\UI\Action\Admin\Clients;


use App\Domain\Handlers\Client\ClientCreationHandler;
use App\Domain\Repository\ClientRepository;
use App\Http\Requests\StoreClient;
use App\Services\Uploads\UploadedFilesService;
use App\UI\Responder\Admin\Clients\ClientCreationResponder;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Request;

class ClientCreationAction
{
    private ClientRepository $clientRepository;
    private StoreClient $storeClient;
    private UploadedFilesService $uploadedFilesService;

    /**
     * ClientCreationAction constructor.
     * @param ClientRepository $clientRepository
     * @param StoreClient $storeClient
     * @param UploadedFilesService $uploadedFilesService
     */
    public function __construct(
        ClientRepository $clientRepository,
        StoreClient $storeClient,
        UploadedFilesService $uploadedFilesService
    ) {
        $this->clientRepository = $clientRepository;
        $this->storeClient = $storeClient;
        $this->uploadedFilesService = $uploadedFilesService;
    }


    public function __invoke(ClientCreationResponder $responder)
    {
        $datasClient = $this->storeClient->all();

        $file = null;

        if (!is_null(request()->file('client-logo'))) {
            $file = request()->file('client-logo');
        }

        $this->clientRepository->store($datasClient, $file);

        $this->uploadedFilesService->moveFile($file, '/public/images/uploads/' . Str::slug($datasClient['client-name']) . '/logo');

        return $responder();

    }
}
