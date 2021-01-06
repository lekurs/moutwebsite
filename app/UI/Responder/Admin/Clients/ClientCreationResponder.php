<?php


namespace App\UI\Responder\Admin\Clients;


class ClientCreationResponder
{
    public function __invoke()
    {
        return back()->with('success', 'Client ajouté');
    }
}
