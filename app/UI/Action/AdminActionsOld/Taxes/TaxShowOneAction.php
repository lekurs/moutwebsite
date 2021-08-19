<?php


namespace App\UI\Action\Admin\Taxes;


use App\Domain\Repository\TaxRepository;
use App\UI\Responder\Admin\Taxes\TaxShowOneResponder;

class TaxShowOneAction
{
    private TaxRepository $taxRepository;

    /**
     * TaxShowOneAction constructor.
     * @param TaxRepository $taxRepository
     */
    public function __construct(TaxRepository $taxRepository)
    {
        $this->taxRepository = $taxRepository;
    }

    public function __invoke(TaxShowOneResponder $responder)
    {
        $tax = $this->taxRepository->getOneById(request('taxId'));

        return $responder($tax);
    }
}
