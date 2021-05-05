<?php


namespace App\Http\Controllers\Admin\Accounting;


use App\Domain\Entity\Client;
use App\Domain\Entity\Estimation;
use App\Domain\Repository\EstimationRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class EstimationController extends Controller
{
    private EstimationRepository $estimationRepository;

    /**
     * EstimationController constructor.
     * @param EstimationRepository $estimationRepository
     */
    public function __construct(EstimationRepository $estimationRepository)
    {
        $this->estimationRepository = $estimationRepository;
    }


    public function show(Client $client, Estimation $estimation): View
    {
        $oneEstimation = $this->estimationRepository->getOneWithAllRelationsById($estimation->id);

        return  \view('pages.admin.accounting.estimations.show', [
            'estimation' => $oneEstimation
        ]);
    }
}
