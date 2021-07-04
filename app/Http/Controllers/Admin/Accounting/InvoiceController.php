<?php


namespace App\Http\Controllers\Admin\Accounting;


use App\Domain\Entity\Client;
use App\Domain\Entity\Estimation;
use App\Domain\Entity\Invoice;
use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\ContactRepository;
use App\Domain\Repository\EstimationDetailRepository;
use App\Domain\Repository\EstimationRepository;
use App\Domain\Repository\InvoiceRepository;
use App\Domain\Repository\ServiceRepository;
use App\Domain\Repository\SkillRepository;
use App\Domain\Repository\TaxRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoice;

class InvoiceController extends Controller
{
    private EstimationRepository $estimationRepository;

    private ClientRepository $clientRepository;

    private ServiceRepository $serviceRepository;

    private TaxRepository $taxRepository;

    private ContactRepository $contactRepository;

    private SkillRepository $skillRepository;

    private EstimationDetailRepository $estimationDetailRepository;

    private InvoiceRepository $invoiceRepository;

    /**
     * InvoiceController constructor.
     * @param EstimationRepository $estimationRepository
     * @param ClientRepository $clientRepository
     * @param ServiceRepository $serviceRepository
     * @param TaxRepository $taxRepository
     * @param ContactRepository $contactRepository
     * @param SkillRepository $skillRepository
     * @param EstimationDetailRepository $estimationDetailRepository
     * @param InvoiceRepository $invoiceRepository
     */
    public function __construct(EstimationRepository $estimationRepository, ClientRepository $clientRepository, ServiceRepository $serviceRepository, TaxRepository $taxRepository, ContactRepository $contactRepository, SkillRepository $skillRepository, EstimationDetailRepository $estimationDetailRepository, \App\Domain\Repository\InvoiceRepository $invoiceRepository)
    {
        $this->estimationRepository = $estimationRepository;
        $this->clientRepository = $clientRepository;
        $this->serviceRepository = $serviceRepository;
        $this->taxRepository = $taxRepository;
        $this->contactRepository = $contactRepository;
        $this->skillRepository = $skillRepository;
        $this->estimationDetailRepository = $estimationDetailRepository;
        $this->invoiceRepository = $invoiceRepository;
    }


    public function index()
    {

    }

    public function show(Invoice $invoice)
    {

    }

    public function create(Estimation $estimation)
    {
        $total = $this->estimationDetailRepository->getTotal($estimation);
        $taxes = $this->taxRepository->getAll();
        if(!is_null($this->invoiceRepository->getLatest())) {
            $number = intval($this->invoiceRepository->getLatest()->reference)+1;
        } else {
            $number = date('Ym') . '001';
        }

        $advances = $this->invoiceRepository->getAdvances($estimation);

        return view('pages.admin.accounting.invoices.create', [
            'estimation' => $estimation,
            'taxes' => $taxes,
            'number' => $number,
            'total' => $total,
            'advances' => $advances,
        ]);
    }

    public function store(StoreInvoice $data, Estimation $estimation)
    {
        $this->invoiceRepository->store($data->validated(), $estimation);

        return redirect()->route('clients.index')->with('sucess', 'Facture enregistrée');
    }

    public function edit()
    {

    }

    public function destroy()
    {

    }
}
