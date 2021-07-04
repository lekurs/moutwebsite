<?php


namespace App\Http\Controllers\Admin\Accounting;


use App\Domain\Entity\Client;
use App\Domain\Entity\Estimation;
use App\Domain\Entity\EstimationDetail;
use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ContactRepository;
use App\Domain\Repository\EstimationDetailRepository;
use App\Domain\Repository\EstimationRepository;
use App\Domain\Repository\ServiceRepository;
use App\Domain\Repository\SkillRepository;
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

    private SkillRepository $skillRepository;

    private EstimationDetailRepository $estimationDetailRepository;


    /**
     * EstimationController constructor.
     * @param EstimationRepository $estimationRepository
     * @param ClientRepository $clientRepository
     * @param ServiceRepository $serviceRepository
     * @param TaxRepository $taxRepository
     * @param ContactRepository $contactRepository
     * @param SkillRepository $skillRepository
     * @param EstimationDetailRepository $estimationDetailRepository
     */
    public function __construct(
        EstimationRepository $estimationRepository,
        ClientRepository $clientRepository,
        ServiceRepository $serviceRepository,
        TaxRepository $taxRepository,
        ContactRepository $contactRepository,
        SkillRepository $skillRepository,
        EstimationDetailRepository $estimationDetailRepository
    ) {
        $this->estimationRepository = $estimationRepository;
        $this->clientRepository = $clientRepository;
        $this->serviceRepository = $serviceRepository;
        $this->taxRepository = $taxRepository;
        $this->contactRepository = $contactRepository;
        $this->skillRepository = $skillRepository;
        $this->estimationDetailRepository = $estimationDetailRepository;
    }


    public function show(Client $client, Estimation $estimation): View
    {
        $oneEstimation = $this->estimationRepository->getOneWithAllRelationsById($estimation->id);
        $taxes = $this->taxRepository->getAll();
        $total = $this->estimationDetailRepository->getTotal($estimation);

        return  \view('pages.admin.accounting.estimations.show', [
            'estimation' => $oneEstimation,
            'taxes' => $taxes,
            'total' => $total
        ]);
    }

    public function create(Client $client)
    {
        $skills = $this->skillRepository->getAll();

        $taxes = $this->taxRepository->getAll();

        if(!is_null($this->estimationRepository->getLatest())) {
            $number = intval($this->estimationRepository->getLatest()->reference)+1;
        } else {
            $number = date('Ym') . '001';
        }

        return view('pages.admin.accounting.estimations.create', [
            'client' => $client,
            'skills' => $skills,
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

        return redirect()->route('clients.show', $client->slug)->with('success', 'Devis créé');
    }

    public function destroy(Client $client, Estimation $estimation)
    {
        $this->estimationRepository->destroy($estimation);

        return redirect()->route('clients.show', $client->slug)->with('success', 'Votre devis à bien été supprimé');
    }

    public function editDetail()
    {
        $data = request()->all();

        $this->estimationDetailRepository->update($data);

        return back()->with('success', 'Devis mis à jour');
    }

    public function editTitle(Estimation $estimation)
    {
        $this->estimationRepository->editTitle(request()->all(), $estimation);

        return back()->with('success', 'Intitulé du devis mis à jour');
    }

    public function editContact(Estimation $estimation)
    {
        $this->estimationRepository->editContact(request()->all(), $estimation);

        return back()->with('success', 'Votre contact à été mis à jour');
    }
}
