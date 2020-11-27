<?php


namespace App\UI\Responder\Admin\Clients;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ClientShowAllResponder
{
    public function __invoke(LengthAwarePaginator $clients, Collection $skills): View
    {
        return view('admin.clients.show_all_client', [
            'clients' => $clients,
            'skills' => $skills
        ]);
    }
}
