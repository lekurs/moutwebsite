<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ClientRepository
{
    public function getAll(): Collection
    {
        return Client::all();
    }

    public function getAllWithPaginate()
    {
        return Client::paginate(12);
    }

    public function getOneBySlug(string $clientSlug): Client
    {
        return Client::whereSlug($clientSlug)->first();
    }

    public function getOneById(int $clientId): Client
    {
        return Client::whereId($clientId)->first();
    }

    public function getOneBySlugWithProjectsAndContacts(string $clientSlug): Client
    {
        return Client::with('projects', 'contacts')->whereSlug($clientSlug)->first();
    }

    public function store(array $clientData, UploadedFile $imagePath = null): void
    {
        if(isset($clientData['client-slug']) && !is_null($clientData['client-slug'])) {
            $client = $this->getOneBySlug($clientData['client-slug']);
        } else {
            $client = new Client();
        }

        $client->name = $clientData['client-name'];
        $client->phone = $clientData['client-phone'];
        $client->address = $clientData['client-address'];
        $client->zip = $clientData['client-zip'];
        $client->city = $clientData['client-city'];
        $client->siren = $clientData['client-siren'];
        $client->slug = Str::slug($clientData['client-name']);
        if (isset($clientData['client-logo']) && !is_null($clientData['client-logo'])) {
            $client->logo = $imagePath->getClientOriginalName();
        }

        $client->save();
    }

    public function edit(string $clientSlug, array $clientData, UploadedFile $imagePath = null) : void
    {
        $client = $this->getOneBySlug($clientSlug);
//        $client->name = $clientData['client-name'];
//        $client->phone = $clientData['client-phone'];
//        $client->address = $clientData['client-address'];
//        $client->zip = $clientData['client-zip'];
//        $client->city = $clientData['client-city'];
//        $client->siren = $clientData['client-siren'];
//        $client->slug = Str::slug($clientData['client-name']);
//        $client->logo = $imagePath->getClientOriginalName();

//        $client->save();
    }
}
