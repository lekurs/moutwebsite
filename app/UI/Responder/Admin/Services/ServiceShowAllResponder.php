<?php


namespace App\UI\Responder\Admin\Services;


use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class ServiceShowAllResponder
{
    public function __invoke(Collection $services): View
    {
        return view('admin.services.show_all_services', [
            'services' => $services
        ]);
    }
}
