<?php


namespace App\UI\Action\Admin\Contacts;


use App\Domain\Repository\ContactRepository;
use App\Http\Requests\EditContact;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Support\Str;

class ContactEditStoreAction
{
    private ContactRepository $contactRepository;

    private UploadedFilesService $uploadedFilesService;

    /**
     * ContactEditStoreAction constructor.
     * @param ContactRepository $contactRepository
     * @param UploadedFilesService $uploadedFilesService
     */
    public function __construct(ContactRepository $contactRepository, UploadedFilesService $uploadedFilesService)
    {
        $this->contactRepository = $contactRepository;
        $this->uploadedFilesService = $uploadedFilesService;
    }


    public function __invoke(EditContact $data)
    {
        $contact = $this->contactRepository->edit($data->all());

        if (isset($data['contact-picture'])) {
            $this->uploadedFilesService->moveFile($data['contact-picture'], 'public/images/uploads/' . $contact->client->slug . '/' . $contact->slug . '/picture');
        }

        return redirect()->route('clientShowOne', $contact->client->slug);
    }
}
