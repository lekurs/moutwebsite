<?php


namespace App\UI\Responder\Admin\Clients;


use App\Domain\Entity\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ClientShowOneResponder
{
    public function __invoke(Client $client, Collection $skills): View
    {
        return view('admin.clients.show_client', [
            'client' => $client,
            'skills' => $skills
        ]);
    }
}
