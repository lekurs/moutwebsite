<?php


namespace App\UI\Responder\Admin\Taxes;


use Symfony\Component\HttpFoundation\RedirectResponse;

class TaxEditResponder
{
    public function __invoke(): RedirectResponse
    {
        return back()->with('success', 'Taxe modifiée');
    }
}
