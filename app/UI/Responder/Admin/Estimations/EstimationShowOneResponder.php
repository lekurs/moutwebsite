<?php


namespace App\UI\Responder\Admin\Estimations;


use App\Domain\Entity\Client;
use App\Domain\Entity\Estimation;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class EstimationShowOneResponder
{
    public function __invoke(Estimation $estimation): View
    {
        return view('admin.estimations.estimation_show_one', [
            'estimation' => $estimation
        ]);
    }
}
