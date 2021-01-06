<?php


namespace App\UI\Responder\Admin\Projects;


use App\Domain\Entity\Client;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProjectCreationResponder
{
    public function __invoke(Client $client): RedirectResponse
    {
        return redirect()->route('clientShowOne', $client->slug)->with('success', 'Projet ajouté');
    }
}
