<?php


namespace App\UI\Action\Admin\Taxes;


use App\Domain\Repository\TaxRepository;
use App\UI\Responder\Admin\Taxes\TaxDeleteResponder;

class TaxDeleteAction
{
    private TaxRepository $taxRepository;

    /**
     * TaxDeleteAction constructor.
     * @param TaxRepository $taxRepository
     */
    public function __construct(TaxRepository $taxRepository)
    {
        $this->taxRepository = $taxRepository;
    }

    public function __invoke(TaxDeleteResponder $responder)
    {
        $this->taxRepository->delete(request('taxId'));

        return $responder();
    }
}
