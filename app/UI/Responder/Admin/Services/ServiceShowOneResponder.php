<?php


namespace App\UI\Responder\Admin\Services;


use App\Domain\Entity\Service;
use Illuminate\Contracts\View\View;

class ServiceShowOneResponder
{
    public function __invoke(Service $service): View
    {
        return view('admin.services.show_service', [
            'service' => $service,
        ]);
    }
}
