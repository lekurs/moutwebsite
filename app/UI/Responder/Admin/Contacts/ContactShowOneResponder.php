<?php


namespace App\UI\Responder\Admin\Contacts;


use App\Domain\Entity\Contact;
use Illuminate\Contracts\View\View;

class ContactShowOneResponder
{
    public function __invoke(Contact $contact): View
    {
        return view('admin.contacts.show_contact', [
            'contact' => $contact
        ]);
    }

}
