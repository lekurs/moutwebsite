<?php


namespace App\Domain\Repository;


use App\Domain\Entity\Client;
use App\Domain\Entity\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ContactRepository
{
    public function getOneBySlug(string $contactSlug): Contact
    {
        return Contact::whereSlug($contactSlug)->first();
    }

    public function getAllByClient(Client $client): Collection
    {
        return Contact::whereClientId($client->id)->get();
    }

    public function store(array $dataContacts, Client $client, UploadedFile $file = null): void
    {
        if(isset($dataContacts['contact-slug']) && !is_null($dataContacts['contact-slug'])) {
            $contact = $this->getOneBySlug($dataContacts['contactSlug']);
        } else {
            $contact = new Contact();
        }

        $contact->name = $dataContacts['contact-firstname'];
        $contact->lastname = $dataContacts['contact-lastname'];
        $contact->email = $dataContacts['contact-email'];
        $contact->phone = $dataContacts['contact-phone'];
        $contact->contact_function = $dataContacts['contact-function'];
        if(!is_null($file)) {
            $contact->picture_path = $file->getClientOriginalName();
        }
        $contact->slug = Str::slug($dataContacts['contact-firstname'] . '-' . $dataContacts['contact-lastname']);
        $contact->client_id = $client->id;

        $contact->save();
    }
}
