<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Entity\Client;
use App\Domain\Entity\Contact;
use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ContactRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditContact;
use App\Http\Requests\StoreContact;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    private ContactRepository $contactRepository;

    private UploadedFilesService $uploadedFilesService;

    private ClientRepository $clientRepository;

    /**
     * ContactController constructor.
     * @param ContactRepository $contactRepository
     * @param UploadedFilesService $uploadedFilesService
     * @param ClientRepository $clientRepository
     */
    public function __construct(
        ContactRepository $contactRepository,
        UploadedFilesService $uploadedFilesService,
        ClientRepository $clientRepository
    ) {
        $this->contactRepository = $contactRepository;
        $this->uploadedFilesService = $uploadedFilesService;
        $this->clientRepository = $clientRepository;
    }

    public function show(Contact $contact): View
    {
        $oneContact = $this->contactRepository->getOneBySlug($contact->slug);

        return \view('pages.admin.contacts.show', [
           'contact' => $oneContact
        ]);
    }

    public function create(Client $client)
    {
        return \view('pages.admin.contacts.create', [
            'client' => $client
        ]);
    }

    public function update(EditContact $data): RedirectResponse
    {
        $contact = $this->contactRepository->edit($data->all());

        if (isset($data['contact-picture'])) {
            $this->uploadedFilesService->moveFile($data['contact-picture'], 'public/images/uploads/' . $contact->client->slug . '/' . $contact->slug . '/picture');
        }

        return redirect()->route('clients.show', $contact->client->slug);
    }

    public function store(StoreContact $storeContact, Client $client): RedirectResponse
    {
        $oneClient = $this->clientRepository->getOneBySlug($client->slug);

        if(isset($storeContact['contact-picture']) && !is_null($storeContact['contact-picture'])) {
            $file = $storeContact['contact-picture'];

            $this->contactRepository->store($storeContact->all(), $oneClient, $file);

            $this->uploadedFilesService->moveFile($file, '/public/images/uploads/' . $oneClient->slug . '/' . Str::slug($storeContact['contact-firstname'] . '-' . $storeContact['contact-lastname']) . '/picture');
        } else {
            $this->contactRepository->store($storeContact->all(), $oneClient, null);

        }

        return redirect()->route('clients.show', $oneClient->slug)->with('success', 'Le contact a été ajouté');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $oneClient = $this->contactRepository->getOneBySlug($contact->slug);

        $this->contactRepository->delete($oneClient);

        Storage::delete('public/images/uploads/' . $oneClient->client->slug . '/' . $oneClient->slug . '/picture');

        return redirect()->route('clients.show', $oneClient->client->slug)->with('success', 'Contact supprimé');
    }
}
