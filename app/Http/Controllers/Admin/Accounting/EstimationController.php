<?php


namespace App\Http\Controllers\Admin\Accounting;


use App\Domain\Entity\Client;
use App\Domain\Entity\Estimation;
use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ContactRepository;
use App\Domain\Repository\EstimationRepository;
use App\Domain\Repository\ServiceRepository;
use App\Domain\Repository\TaxRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEstimation;
use Illuminate\Contracts\View\View;

class EstimationController extends Controller
{
    private EstimationRepository $estimationRepository;

    private ClientRepository $clientRepository;

    private ServiceRepository $serviceRepository;

    private TaxRepository $taxRepository;

    private ContactRepository $contactRepository;

    /**
     * EstimationController constructor.
     * @param EstimationRepository $estimationRepository
     * @param ClientRepository $clientRepository
     * @param ServiceRepository $serviceRepository
     * @param TaxRepository $taxRepository
     * @param ContactRepository $contactRepository
     */
    public function __construct(
        EstimationRepository $estimationRepository,
        ClientRepository $clientRepository,
        ServiceRepository $serviceRepository,
        TaxRepository $taxRepository,
        ContactRepository $contactRepository
    ) {
        $this->estimationRepository = $estimationRepository;
        $this->clientRepository = $clientRepository;
        $this->serviceRepository = $serviceRepository;
        $this->taxRepository = $taxRepository;
        $this->contactRepository = $contactRepository;
    }


    public function show(Client $client, Estimation $estimation): View
    {
        $oneEstimation = $this->estimationRepository->getOneWithAllRelationsById($estimation->id);

        return  \view('pages.admin.accounting.estimations.show', [
            'estimation' => $oneEstimation
        ]);
    }

    public function create(Client $client)
    {
        $oneClient = $this->clientRepository->getOneBySlug($client->slug);

        $services = $this->serviceRepository->getAll();

        $taxes = $this->taxRepository->getAll();

        if(!is_null($this->estimationRepository->getLatest())) {
            $number = intval($this->estimationRepository->getLatest()->reference)+1;
        } else {
            $number = date('Ym') . '001';
        }

        return view('pages.admin.accounting.estimations.create', [
            'client' => $oneClient,
            'services' => $services,
            'taxes' => $taxes,
            'number' => $number
        ]);
    }

    public function store(StoreEstimation $storeEstimation)
    {
        $estimation = $storeEstimation->all();

        $client = $this->clientRepository->getOneBySlug($estimation['client-slug']);
        $contact = $this->contactRepository->getOneBySlug($estimation['estimation-contact']);

        $this->estimationRepository->store($estimation, $client, $contact);

        return back()->with('success', 'Devis créé');
    }

    public function destroy(Client $client, Estimation $estimation)
    {
        $this->estimationRepository->destroy($estimation);

        return back()->with('success', 'Votre devis à bien été supprimé');
    }
}
