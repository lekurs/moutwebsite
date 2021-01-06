<?php


namespace App\UI\Action\Admin\Contacts;


use App\Domain\Repository\ContactRepository;
use App\UI\Responder\Admin\Contacts\ContactShowOneResponder;

class ContactShowOneAction
{
    private ContactRepository $contactRepository;

    /**
     * ContactShowOneAction constructor.
     * @param ContactRepository $contactRepository
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function __invoke(ContactShowOneResponder $responder)
    {
        $contact = $this->contactRepository->getOneBySlug(request('contactSlug'));

        return $responder($contact);
    }
}
