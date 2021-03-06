<?php


namespace App\UI\Responder\Admin\Estimations;


use App\Domain\Entity\Client;
use Illuminate\Database\Eloquent\Collection;

class EstimationCreationActionResponder
{
    public function __invoke(Client $client, Collection $services, Collection $taxes, $number)
    {
        return view('admin.estimations.estimation_creation', [
            'client' => $client,
            'services' => $services,
            'taxes' => $taxes,
            'number' => $number
        ]);
    }
}
