<?php


namespace App\UI\Responder\Admin\Clients;


use App\Domain\Entity\Client;
use Illuminate\Contracts\View\View;

class ClientEditFormResponder
{
    public function __invoke(Client $client): View
    {
        return view('admin.clients.edit_client', [
            'client' => $client
        ]);
    }
}
