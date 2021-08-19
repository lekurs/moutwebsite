<?php


namespace App\UI\Action\Admin\Taxes;


use App\Domain\Repository\TaxRepository;
use App\UI\Responder\Admin\Taxes\TaxShowAllResponder;

class TaxShowAllAction
{
    private TaxRepository $taxRepository;

    /**
     * TaxeCreationAction constructor.
     * @param TaxRepository $taxRepository
     */
    public function __construct(TaxRepository $taxRepository)
    {
        $this->taxRepository = $taxRepository;
    }

    public function __invoke(TaxShowAllResponder $responder)
    {
        $taxes = $this->taxRepository->getAll();

        return $responder($taxes);
    }

}
