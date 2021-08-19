<?php


namespace App\UI\Action\Admin\Taxes;


use App\Domain\Repository\TaxRepository;
use App\Http\Requests\EditTax;
use App\UI\Responder\Admin\Taxes\TaxEditResponder;

class TaxEditAction
{
    private TaxRepository $taxRepository;

    private EditTax $editTax;

    /**
     * TaxEditAction constructor.
     * @param TaxRepository $taxRepository
     * @param EditTax $editTax
     */
    public function __construct(TaxRepository $taxRepository, EditTax $editTax)
    {
        $this->taxRepository = $taxRepository;
        $this->editTax = $editTax;
    }

    public function __invoke(TaxEditResponder $responder)
    {
        $data = $this->editTax->all();

        $this->taxRepository->edit(request('taxId'), $data);

        return $responder();
    }
}
