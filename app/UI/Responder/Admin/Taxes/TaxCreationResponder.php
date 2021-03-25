<?php


namespace App\UI\Responder\Admin\Taxes;


use Illuminate\Http\RedirectResponse;

class TaxCreationResponder
{
    public function __invoke(): RedirectResponse
    {
        return back()->with('success', 'Taxe bien enregistrée');
    }
}
