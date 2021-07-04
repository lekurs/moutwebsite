@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            {{ $estimation->client->name }}
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                <a href="{{ route('clients.show', $estimation->client->slug) }}">{{ $estimation->client->name }}</a> / Facture / {{ $estimation->reference }}
            </li>
        </ul>
    </div>
@endsection

@section('body')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10 offset-1 mt-3">
                    <img src="http://moutwebagency.net/mout/logo-mout-factures.png" alt="Mout" class="img-fluid">
                </div>
            </div>
            <form action="{{ route('invoices.store', $estimation->id) }}">
                @csrf
                @include('layouts.form_errors.errors')
            <div class="row">
                <div class="col-10 ml-auto mr-auto mb-3">
                    <div class="row  mt-5">
                        <div class="col-md-6 mout-accounting-header-container">
                            <p>Facture Réf: <input class="form-control" type="text" name="invoice_reference" id="invoice_reference" aria-label="Numéro de la facture" placeholder="Numéro de la facture" @isset($number) value="{{ $number }}" @endisset readonly></p>
                        </div>
                        <div class="col-md-6 text-right">
                            Fait à Le Chesnay le {{ $estimation->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mout-accounting-client-informations">
                            <p class="font-weight-bold">{{ $estimation->client->name }}</p>
                            <p class="font-weight-light">{{ $estimation->client->address }}</p>
                            <p class="font-weight-light">{{ $estimation->client->zip }} {{ $estimation->client->city }}</p>
                            <p class="font-weight-light">N° SIRET : {{ $estimation->client->siren}}</p>
                            <p class="font-weight-light">N° TVA Intracommunautaire : {{ $estimation->client->siren}}</p>
                            <p class="font-weight-light">{{ $estimation->contact->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-10 ml-auto mr-auto invoice-details-container">
                    <div class="row mt-4 mout-accounting-thead-details-container">
                        <div class="col-8 font-weight-bold text-uppercase ">Description</div>
                        <div class="col-1 font-weight-bold text-uppercase d-flex align-items-center justify-content-center">Taxe</div>
                        <div class="col-1 font-weight-bold text-uppercase d-flex align-items-center justify-content-center">Quantité</div>
                        <div class="col-2 font-weight-bold text-uppercase d-flex align-items-center justify-content-center">PV HT</div>
                    </div>
                    <div class="row edit-estimation estimation-title-container">
                        <div class="col-12 mout-accounting-body-details-container">
                            <H5 class="mout-accounting-title-description">{{ $estimation->title }}</H5>
                        </div>
                    </div>
                    @foreach($estimation->estimationDetails as $detail)
                        <div class="edit-estimation" id="{{ $detail->id }}" data-id="{{ $detail->id }}">
                            <div class="row">
                                <div class="col-12 mout-accounting-detail-product">
                                    <p class="font-weight-bold">{{ $detail->product }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 mout-accounting-detail-description">
                                    <p>{!! nl2br($detail->description) !!}</p>
                                </div>
                                @if ( is_null($advances) )
                                <div class="col-1 text-right mout-accounting-detail-tax d-flex align-items-center justify-content-center" data-tax-id="{{ $detail->taxe->id }}">{{ $detail->taxe->tax }}%</div>
                                <div class="col-1 text-right mout-accounting-detail-quantity d-flex align-items-center justify-content-center">{{ $detail->quantity }}</div>
                                <div class="col-2 text-right mout-accounting-detail-total d-flex align-items-center justify-content-center">{{ $detail->unit_price }} €</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="col-12 mt-5">
                            <div class="row">
                                <div class="col-6">
                                    <p class="invoice_observation">
                                        @if (!is_null($advances))
                                            Pour rappel,
                                            @if( count($advances['references']) > 1)
                                                les factures d'acomptes précédentes sont les suivantes :
                                                @foreach($advances['references'] as $invoicesReferences)
                                                    {{ $invoicesReferences->reference }} {{ !$loop->last ? '/' : '' }}
                                                @endforeach
                                            @elseif( count($advances['references']) <= 1)
                                                la facture d'acompte est la suivante : {{ $advances['references'][0]->reference }}
                                            @else Observations
                                            @endif
                                        @endif
                                    </p>
                                    <textarea name="invoice_observation" id="invoice_observation" cols="30" rows="10" class="d-none">@if (!is_null($advances))
                                            Pour rappel,
                                            @if( count($advances['references']) > 1)
                                                les factures d'acomptes précédentes sont les suivantes :
                                                @foreach($advances['references'] as $invoicesReferences)
                                                    {{ $invoicesReferences->reference }} {{ !$loop->last ? '/' : '' }}
                                                @endforeach
                                            @elseif( count($advances['references']) <= 1)
                                                la facture d'acompte est la suivante : {{ $advances['references'][0]->reference }}
                                            @else Observations
                                            @endif
                                        @endif</textarea>
                                </div>
                                <div class="col-1">
                                    <div class="estimation-edit-pen-title" data-toggle="modal" data-target="#invoice_observation_modal"><i class="fal fa-pen"></i></div>
                                </div>
                                <div class="col-5 mout-accounting-total-container">
                                    <div class="row">
                                    @if (!is_null($advances))
                                        <div class="col-12">
                                            <h6>Vous avez {{ $advances['count'] }} facture{{ $advances['count'] > 1 ? 's' : '' }} d'acompte N°
                                                @foreach($advances['references'] as $invoicesReferences)
                                                    {{ $invoicesReferences->reference }} {{ !$loop->last ? '/' : '' }}
                                                @endforeach
                                                , le solde est de {{ $total['total_row_notax'] - $advances['total_row_notax'] }} €</h6>
                                        </div>
                                        <div class="col-4">
                                            <p class="font-weight-bold text-right">Total HT :</p>
                                            <p class="font-weight-bold text-right">TVA :</p>
                                            <p class="font-weight-bold text-right">Total TTC :</p>
                                        </div>
                                        <div class="col-8">
                                            <p class="font-weight-bold text-right">{{ $total['total_row_notax'] - $advances['total_row_notax'] }} €</p>
                                            <input type="hidden" name="invoice_amount_no_tax" id="invoice_amount_no_tax" value="{{ $total['total_row_notax'] - $advances['total_row_notax'] }}">
                                            <p class="font-weight-bold text-right">{{ $total['total_row_tax'] - $advances['total_row_tax'] }} €</p>
                                            <input type="hidden" name="invoice_amount_tax" id="invoice_amount_tax" value="{{ $total['total_row_tax'] - $advances['total_row_tax'] }}">
                                            <p class="font-weight-bold text-right">{{ $total['total_row'] - $advances['total_row'] }} €</p>
                                            <input type="hidden" name="invoice_amount" id="invoice_amount" value="{{ $total['total_row'] - $advances['total_row'] }}">
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <p class="font-weight-bold">Facture soldée</p>
                                            <p><a href="{{ redirect()->back() }}" class="">revenir aux devis client</a></p>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-10 ml-auto mr-auto text-center">
                    <input type="checkbox" name="invoice_advance" id="invoice_advance">
                    <label for="invoice_advance" class="relative-label font-weight-bold">Facture d'acompte ?</label>
                </div>
                <div class="row advance-invoice-container">
                    <div class="col-12 form-group">
                        <label for="invoice_advance_amount_no_tax" class="relative-label">Montant en € HT</label>
                        <input type="number" name="invoice_advance_amount_no_tax" id="invoice_advance_amount_no_tax">
                    </div>
                    <div class="col-12 form-group">
                            <label for="invoice_advance_amount_tax" class="relative-label">TVA</label>
                            <input type="number" name="invoice_advance_amount_tax" id="invoice_advance_amount_tax">
                    </div>
                    <div class="col-12 form-group">
                        <label for="invoice_advance_amount" class="relative-label">Montant total en € TTC</label>
                        <input type="number" name="invoice_advance_amount" id="invoice_advance_amount">
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-10 ml-auto mr-auto d-flex justify-content-center">
                    <button type="submit" class="btn add-btn">Enregistrer</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="invoice_observation_modal" tabindex="-1" role="dialog" aria-labelledby="invoice_observation_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une observation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea name="invoice_observation_modal_text" id="invoice_observation_modal_text" cols="30" rows="10" placeholder="Ajouter une observation">@if (!is_null($advances))Pour rappel, @if( count($advances['references']) > 1)les factures d'acomptes précédentes sont les suivantes : @foreach($advances['references'] as $invoicesReferences){{ $invoicesReferences->reference }} {{ !$loop->last ? '/' : '' }} @endforeach @elseif( count($advances['references']) <= 1)la facture d'acompte est la suivante : {{ $advances['references'][0]->reference }}@else Observations @endif @endif</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add-invoice-observation">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            function nl2br (str, isXhtml) {
                // Some latest browsers when str is null return and unexpected null value
                if (typeof str === 'undefined' || str === null) {
                    return ''
                }
                // Adjust comment to avoid issue on locutus.io display
                var breakTag = (isXhtml || typeof isXhtml === 'undefined') ? '<br ' + '/>' : '<br>'

                return (str + '')
                    .replace(/(\r\n|\n\r|\r|\n)/g, breakTag + '$1')
            }

            let penTitle = $('.estimation-edit-pen-title');
            let addObservationButton = $('.add-invoice-observation');

                addObservationButton.on('click', function () {
                    let observation = $('textarea#invoice_observation_modal_text').val();

                    $('textarea#invoice_observation').val(observation);
                    $('p.invoice_observation').html(nl2br(observation));
                    $('#invoice_observation_modal').modal('hide');
                });

                let invoiceAdvance = $('input#invoice_advance');

                invoiceAdvance.on('click', function (e) {
                    if(invoiceAdvance.is(':checked')) {
                        let amount = $('#invoice_advance_amount_no_tax');
                        amount.on('blur', function () {
                        $('#invoice_advance_amount_tax').val(parseFloat((amount.val()) * 1.2)-amount.val());
                        $('#invoice_advance_amount').val(parseFloat(amount.val()*1.2));

                        })
                        $('.advance-invoice-container').show();
                    } else {
                        $('.advance-invoice-container').hide();
                    }
                })
        });
    </script>
@endsection
