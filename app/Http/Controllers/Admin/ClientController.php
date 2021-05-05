<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Entity\Client;
use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\SkillRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClient;
use App\Services\Uploads\UploadedFilesService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    private ClientRepository $clientRepository;
    private SkillRepository $skillRepository;
    private UploadedFilesService $uploadedFilesService;

    public function __construct(
        ClientRepository $clientRepository,
        SkillRepository $skillRepository,
        UploadedFilesService $uploadedFilesService
    )
    {
        $this->clientRepository = $clientRepository;
        $this->skillRepository = $skillRepository;
        $this->uploadedFilesService = $uploadedFilesService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $clients = $this->clientRepository->getAllWithPaginate();
        $skills = $this->skillRepository->getAll();

        return \view('pages.admin.clients.index', [
            'clients' => $clients,
            'skills' => $skills,
        ]);
    }

    public function create()
    {

    }

    /**
     * @param StoreClient $storeClient
     * @return RedirectResponse
     */
    public function store(StoreClient $storeClient): RedirectResponse
    {
        $dataClient = $storeClient->validated();

        $file = null;

        if (isset($storeClient['client-logo']) && !is_null($storeClient['client-logo'])) {
            $file = request()->file('client-logo');
        }

        $this->clientRepository->store($dataClient, $file);

        $this->uploadedFilesService->moveFile($file, '/public/images/uploads/' . Str::slug($dataClient['client-name']) . '/logo');

        return back()->with('success', 'Client ajouté');
    }

    public function show(Client $client)
    {
        $oneClient = $this->clientRepository->getOneBySlugWithAllRelations($client->slug);
        $skills = $this->skillRepository->getAll();

        return view('pages.admin.clients.show', [
            'client' => $oneClient,
            'skills' => $skills
        ]);

    }

    public function edit(Client $client)
    {
        $data = $this->clientRepository->getOneBySlug($client->slug);

        return \view('pages.admin.clients.edit', [
            'client' => $data
        ]);
    }

    public function update(StoreClient $storeClient, Client $client)
    {
        if (isset($storeClient['client-logo'])) {
            $file = $storeClient['client-logo'];

            $this->clientRepository->store($storeClient->all(), $file);

            $this->uploadedFilesService->moveFile($file, '/public/images/uploads/' . Str::slug($storeClient['client-name']) . '/logo');
        } else {
            $this->clientRepository->store($storeClient->all(), null);
        }

        return redirect()->route('clients.index`')->with('success', 'Client mis à jour');
    }

    public function destroy()
    {

    }

    public function search(Client $client)
    {
        $clients = $this->clientRepository->search($client->name);

        return view('admin.clients.show_all_client', [
            'clients' => $clients
        ]);
    }

}
