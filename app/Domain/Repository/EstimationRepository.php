<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Client;
use App\Domain\Entity\Contact;
use App\Domain\Entity\Estimation;
use Illuminate\Database\Eloquent\Collection;

class EstimationRepository
{
    public function getAll(): Collection
    {
        return Estimation::all();
    }

    public function getAllByClient(Client $client): Collection
    {
        return Estimation::with('clients')->whereClientId($client->id)->get();
    }

    public function getLatest(): ?Estimation
    {
        return Estimation::latest()->first();
    }

    public function store(array $data, Client $client, Contact $contact)
    {
        $estimation = new Estimation();
        $estimation->title = $data['estimation-title'];
        $estimation->year = date('Y');
        $estimation->month = date('m');
        $estimation->validation_duration = $data['estimation-validation-duration'];
        $estimation->reference = 122;
        $estimation->client_id = $client->id;
        $estimation->contact_id = $contact->id;
        $estimation->total = $data['estimation-total-input'];
        $estimation->contact_validator_id = $contact->id;

        dd("ii");

        $estimation->save();

        foreach($data['estimation-service'] as $service) {
            $estimation->EstimationsServices()->sync($service, false);
        }


        dd($data);
    }
}
