<?php


namespace App\UI\Responder\Admin\Taxes;


use Illuminate\Database\Eloquent\Collection;

class TaxShowAllResponder
{
    public function __invoke(Collection $taxes)
    {
        return view('admin.taxes.show_all_taxes', [
            'taxes' => $taxes
        ]);
    }
}
