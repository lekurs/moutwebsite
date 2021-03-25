<?php


namespace App\UI\Responder\Admin\Taxes;


class TaxDeleteResponder
{
    public function __invoke()
    {
        return back()->with('success', 'Taxe supprimée');
    }
}
