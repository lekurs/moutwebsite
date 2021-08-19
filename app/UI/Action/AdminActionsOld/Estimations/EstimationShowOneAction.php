<?php


namespace App\UI\Action\Admin\Estimations;


use App\Domain\Repository\EstimationRepository;
use App\UI\Responder\Admin\Estimations\EstimationShowOneResponder;

class EstimationShowOneAction
{
    private EstimationRepository $estimationRepository;

    /**
     * EstimationShowOneAction constructor.
     * @param EstimationRepository $estimationRepository
     */
    public function __construct(EstimationRepository $estimationRepository)
    {
        $this->estimationRepository = $estimationRepository;
    }

    public function __invoke(EstimationShowOneResponder $responder)
    {
        $estimation = $this->estimationRepository->getOneWithAllRelationsById(request('estimationId'));

        return $responder($estimation);
    }
}
