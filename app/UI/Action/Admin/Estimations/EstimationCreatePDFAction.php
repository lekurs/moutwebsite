<?php


namespace App\UI\Action\Admin\Estimations;


use App\Domain\Repository\ClientRepository;
use App\Domain\Repository\EstimationRepository;
use Fpdf\Fpdf;

class EstimationCreatePDFAction extends Fpdf
{
    private EstimationRepository $estimationRepository;

    private ClientRepository $clientRepository;

    /**
     * EstimationCreatePDFAction constructor.
     *
     * @param EstimationRepository $estimationRepository
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository, EstimationRepository $estimationRepository)
    {
        parent::__construct('P', 'cm', 'A4');
        $this->estimationRepository = $estimationRepository;
        $this->clientRepository = $clientRepository;
    }

    public function entete()
    {
        $lineHeight = .6;
        $estimation = $this->estimationRepository->getOneWithAllRelationsById(request('estimationId'));
        $client = $this->clientRepository->getOneBySlugWithAllRelations(request('clientSlug'));

        $this->AddFont('aristalight', '', 'aristalight.php');
        $this->AddFont('aristaregular', '', 'aristaregular.php');
        $this->AddPage();
        $this->SetFont('aristalight','',14);
        $this->Image(base_path('public/images/logo-mout-factures.png'), 0, 0, 21, 3.7);
        $this->SetY(4.3);
        $this->Cell(4,1, utf8_decode('Devis référence : ' . $estimation->reference));
        $this->SetX(12);
        $this->Cell(4, 1, utf8_decode('Fait à le Chesnay le ' . $estimation->created_at->format('d/m/Y')), 0, 2);
        $y = $this->GetY();
        $this->SetXY(1, $y);
        $this->SetDrawColor(255, 254,0);
        $this->SetLineWidth(.07);
        $this->Line(1.1, $y, 6.8, $y);
        $this->SetDrawColor(0, 0, 0);
        $y = $this->getY();
        $this->SetY(5.7);
        $this->SetFont('aristaregular', '', 14);
        $this->Cell(4, 1, utf8_decode($client->name));
        $this->SetFont('aristalight');
        $y = $this->GetY();
        $this->SetXY(1, $y+$lineHeight);
        $this->Cell(4, 1, utf8_decode($client->address));
        $this->SetXY(1, 6.9);
        $this->Cell(10, 1, utf8_decode($client->zip . ' ' . $client->city));
        $y = $this->GetY();
        $this->SetXY(1, $y+$lineHeight);
        $this->Cell(10, 1, utf8_decode('N° SIRET : ' . $client->siret));
        $y = $this->GetY();
        $this->SetXY(1, $y+$lineHeight);
        $this->Cell(14, 1, utf8_decode('N° TVA Intra-communautaire : ' . $client->tvaintracommunautaire));
        $y = $this->GetY();
        $this->SetXY(1, $y+$lineHeight);
        $this->Cell(10, 1, $estimation->contact->email);

        $this->Cell(40,10,'Hello World !');
    }

    public function __invoke()
    {
        $this->entete();

        $response = response($this->Output('I'));
        $response->header('Content-Type', 'application/pdf');

        return $response;

    }
}
