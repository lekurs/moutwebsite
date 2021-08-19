<?php


namespace App\UI\Action\Admin\Contacts;


use App\Domain\Repository\ContactRepository;
use Illuminate\Support\Facades\Storage;

class ContactDeleteAction
{
    private $contactRepository;

    /**
     * ContactDeleteAction constructor.
     * @param ContactRepository $contactRepository
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function __invoke()
    {
        $contact = $this->contactRepository->getOneBySlug(request('contactSlug'));

        $this->contactRepository->delete($contact);

        Storage::delete('public/images/uploads/' . $contact->client->slug . '/' . $contact->slug . '/picture');

        return redirect()->route('clientShowOne', $contact->client->slug)->with('success', 'Contact supprimé');
    }
}
