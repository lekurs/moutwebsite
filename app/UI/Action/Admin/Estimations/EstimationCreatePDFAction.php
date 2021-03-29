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
        $this->AddFont('aristabold', '', 'aristabold.php');
        $this->AddPage();
        $this->SetFont('aristalight','',14);
        $this->Image(base_path('public/images/logo-mout-factures.png'), 0, 0, 21, 3.7);
        $this->SetY(4.3);
        $this->Cell(3.5,1, utf8_decode('Devis référence : '));
        $this->SetFont('aristabold', '', 14);
        $this->Cell(3,1, utf8_decode($estimation->reference));
        $this->SetFont('aristalight', '', 14);
        $this->SetX(12);
        $this->Cell(4, 1, utf8_decode('Fait à le Chesnay le ' . $estimation->created_at->format('d/m/Y')), 0, 2);
        $y = $this->GetY();
        $this->SetXY(1, $y);
        $this->SetDrawColor(255, 254,0);
        $this->SetLineWidth(.07);
        $this->Line(1.1, $y, 6.9, $y);
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
    }

    public function __invoke()
    {
        $this->entete();

        //Body
        $this->SetY(6.5);
        $this->SetFont('aristabold', '', 14);
        $this->Cell(17,10,'Description');
        $this->Cell(4,10,'PV HT');
        $this->SetFont('aristalight', '', 14);
        $this->SetY(12);
        $y = $this->GetY();
        $this->SetDrawColor(255, 254,0);
        $this->SetLineWidth(.07);
        $this->Line(1.1, $y, 19.3, $y);
        $this->SetDrawColor(0, 0, 0);
        $y = $this->getY();
        $this->SetY($y+.3);
        $this->SetFont('aristaregular', '', 14);
        $this->Cell(20, 1, 'Le titre de mon devis se trouve ici');
        $y = $this->GetY();
        $this->SetY($y+1);
        $this->Cell(20, 1, 'test');

        $response = response($this->Output('I'));
        $response->header('Content-Type', 'application/pdf');

        return $response;

    }
}
