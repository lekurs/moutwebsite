<?php


namespace App\Repository;


use App\Models\Client;
use App\Models\Estimation;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;

class InvoiceRepository
{

    public function getLatest(): ?Invoice
    {
        return Invoice::latest()->first();
    }

    public function getWithAdvances(Invoice $invoice, Client $client)
    {
        return Invoice::whereId($invoice->id)->with(['estimations.advances', 'estimations.client', 'estimations' => function($q) use ($client) {
            $q->whereClientId($client->id);
        }])->get();
    }

    public function getAdvances(Estimation $estimation)
    {
        if (!is_null(Invoice::whereEstimationId($estimation->id)->whereAdvance(true)->get())) {
            $advances = Invoice::whereEstimationId($estimation->id)->whereAdvance(true)->get();
            if (count($advances) > 0) {
                return [
                    'total_row' => Invoice::whereEstimationId($estimation->id)->whereAdvance(true)->sum('amount'),
                    'total_row_notax' => Invoice::whereEstimationId($estimation->id)->whereAdvance(true)->sum('amount_no_tax'),
                    'total_row_tax' => Invoice::whereEstimationId($estimation->id)->whereAdvance(true)->sum('amount_tax'),
                    'count' => count(Invoice::whereEstimationId($estimation->id)->whereAdvance(true)->get()),
                    'references' => Invoice::whereEstimationId($estimation->id)->whereAdvance(true)->get(),
                ];
            }
        }
    }

    public function store(array $data, Estimation $estimation)
    {
        $invoice = new Invoice();
        $invoice->reference = $data['invoice_reference'];
        $invoice->year = date('Y');
        $invoice->month = date('m');
        $invoice->observation = $data['invoice_observation'];
        $invoice->estimation_id = $estimation->id;

        if(isset($data['invoice_advance'])) {
            $invoice->advance = true;
            $invoice->amount_no_tax = $data['invoice_advance_amount_no_tax'];
            $invoice->amount_tax = $data['invoice_advance_amount_tax'];
            $invoice->amount = $data['invoice_advance_amount'];
        } else {
            $invoice->amount_no_tax = $data['invoice_amount_no_tax'];
            $invoice->amount_tax = $data['invoice_amount_tax'];
            $invoice->amount = $data['invoice_amount'];
        }

        $invoice->save();
    }
}
