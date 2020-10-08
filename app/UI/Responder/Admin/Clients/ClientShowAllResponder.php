<?php


namespace App\UI\Responder\Admin\Clients;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;

class ClientShowAllResponder
{
    public function __invoke(LengthAwarePaginator $clients): View
    {
        return view('admin.clients.show_all_client', [
            'clients' => $clients
        ]);
    }
}
