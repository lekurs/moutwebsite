<?php


namespace App\UI\Action\Admin\Taxes;


use App\Domain\Repository\TaxRepository;
use App\Http\Requests\StoreTax;
use App\UI\Responder\Admin\Taxes\TaxCreationResponder;

class TaxCreationAction
{
    private TaxRepository $taxRepository;

    private StoreTax $storeTax;

    /**
     * TaxCreaationAction constructor.
     * @param TaxRepository $taxRepository
     * @param StoreTax $storeTax
     */
    public function __construct(TaxRepository $taxRepository, StoreTax $storeTax)
    {
        $this->taxRepository = $taxRepository;
        $this->storeTax = $storeTax;
    }

    public function __invoke(TaxCreationResponder $responder)
    {
        $data = $this->storeTax->all();

        $this->taxRepository->store($data);

        return $responder();
    }
}
