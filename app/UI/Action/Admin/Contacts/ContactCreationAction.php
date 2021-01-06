<?php


namespace App\UI\Action\Admin\Contacts;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ContactRepository;
use App\Http\Requests\StoreContact;
use App\Services\Uploads\UploadedFilesService;
use App\UI\Responder\Admin\Contacts\ContactCreationResponder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ContactCreationAction
{
    private ContactRepository $contactRepository;

    private ClientRepository $clientRepository;

    private UploadedFilesService $uploadedFilesService;

    /**
     * ContactCreationAction constructor.
     * @param ContactRepository $contactRepository
     * @param ClientRepository $clientRepository
     * @param UploadedFilesService $uploadedFilesService
     */
    public function __construct(
        ContactRepository $contactRepository,
        ClientRepository $clientRepository,
        UploadedFilesService $uploadedFilesService
    ) {
        $this->contactRepository = $contactRepository;
        $this->clientRepository = $clientRepository;
        $this->uploadedFilesService = $uploadedFilesService;
    }

    public function __invoke(StoreContact $storeContact, ContactCreationResponder $responder): RedirectResponse
    {
        $client = $this->clientRepository->getOneBySlug(request('clientSlug'));

        if(isset($storeContact['contact-picture']) && !is_null($storeContact['contact-picture'])) {
            $file = $storeContact['contact-picture'];

            $this->contactRepository->store($storeContact->all(), $client, $file);

            $this->uploadedFilesService->moveFile($file, '/public/images/uploads/' . $client->slug . '/' . Str::slug($storeContact['contact-firstname'] . '-' . $storeContact['contact-lastname']) . '/picture');
        } else {
            $this->contactRepository->store($storeContact->all(), $client, null);

        }

        return $responder($client);
    }
}
