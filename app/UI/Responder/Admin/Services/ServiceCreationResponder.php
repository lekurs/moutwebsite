<?php


namespace App\UI\Responder\Admin\Services;


use Symfony\Component\HttpFoundation\RedirectResponse;

class ServiceCreationResponder
{
    public function __invoke(): RedirectResponse
    {
        return redirect()->route('serviceShowAll')->with('success', 'La nouvelle prestation a été ajoutée');
    }
}
