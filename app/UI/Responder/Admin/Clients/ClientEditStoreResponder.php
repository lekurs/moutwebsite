<?php


namespace App\UI\Responder\Admin\Clients;


class ClientEditStoreResponder
{
    public function __invoke()
    {
        return redirect()->route('clientShowAll')->with('success', 'Client mis à jour');
    }
}
