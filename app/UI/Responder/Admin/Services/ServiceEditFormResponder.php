<?php


namespace App\UI\Responder\Admin\Services;


use App\Domain\Entity\Service;
use Illuminate\Contracts\View\View;

class ServiceEditFormResponder
{
    public function __invoke(Service $service): View
    {
        return view('admin.services.edit_service', [
            'service' => $service
        ]);
    }
}
