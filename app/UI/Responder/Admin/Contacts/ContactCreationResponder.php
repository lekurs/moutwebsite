<?php


namespace App\UI\Responder\Admin\Contacts;


use App\Domain\Entity\Client;

class ContactCreationResponder
{
    public function __invoke(Client $client)
    {
        return redirect()->route('clientShowOne', $client->slug)->with('success', 'Le contact a été ajouté');
    }
}
