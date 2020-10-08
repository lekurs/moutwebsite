<?php


namespace App\UI\Responder\Admin\Clients;


use App\Domain\Entity\Client;
use Illuminate\Contracts\View\View;

class ClientShowOneResponder
{
    public function __invoke(Client $client, string $color): View
    {
        return view('admin.clients.show_client', [
            'client' => $client,
            'color' => $color,
        ]);
    }
}
