<?php


namespace App\UI\Responder\Admin\Taxes;


use App\Domain\Entity\Taxe;

class TaxShowOneResponder
{
    public function __invoke(Taxe $tax)
    {
        return view('admin.taxes.show_tax', [
            'tax' => $tax
        ]);
    }
}
