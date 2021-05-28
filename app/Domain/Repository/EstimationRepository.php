<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Client;
use App\Domain\Entity\Contact;
use App\Domain\Entity\Estimation;
use App\Domain\Entity\EstimationDetail;
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

    public function getOneWithAllRelationsById(string $id): ?Estimation
    {
        return Estimation::with(['client', 'contact', 'estimationDetails'])->whereId($id)->first();
    }

    public function store(array $data, Client $client, Contact $contact)
    {
        $estimation = new Estimation();
        $estimation->reference = $data['estimation-reference'];
        $estimation->validation_duration = $data['estimation-validation-duration'];
        $estimation->contact_id = $contact->id;
        $estimation->title = $data['estimation-title'];
        $estimation->year = date('Y');
        $estimation->month = date('m');
        $estimation->client_id = $client->id;
        $estimation->contact_validator_id = $contact->id;
        $estimation->totalnotax = $data['estimation-total-input'];
        $estimation->totaltax = $data['estimation-total-tax'];
        $estimation->total = $data['estimation-total-with-taxes'];

        $estimation->save();

        $id = $estimation->id;

        foreach($data['estimation-service'] as $service) {
            $estimation->EstimationsServices()->sync($service, false);
        }

        foreach($data['product-detail'] as $products) {
            foreach ($products as $key => $product) {
                $detail = new EstimationDetail();
                $detail->estimation_id = $id;
                $detail->product = $product;
                $detail->description = $data['product-detail']['description'][$key];
                $detail->quantity = $data['product-detail']['quantity'][$key];
                $detail->unit_price = $data['product-detail']['price'][$key];
                $detail->total_row_notax = $data['product-detail']['total-no-tax'][$key];
                $detail->total_row_tax = $data['product-detail']['total-tax'][$key];
                $detail->total_row = $data['product-detail']['total'][$key];
                $detail->taxe_id = $data['product-detail']['taxe'][$key];
                $detail->display_order = $key;
                $detail->save();
            }
        }
    }

    public function destroy(Estimation $estimation)
    {
        //TODO => Tester le cascade après fresh DB
        $estimation->load('estimationDetails');
        $estimation->estimationDetails()->delete();
        $estimation->delete();
    }
}
