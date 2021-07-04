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
            <form action="{{ route('advances.store', $estimation->id) }}" method="post">
                @csrf
                @include('layouts.form_errors.errors')
                <div class="row">
                    <div class="col-10 ml-auto mr-auto mb-3">
                        <div class="row  mt-5">
                            <div class="col-md-6 mout-accounting-header-container">
                                <p>Facture d'acompte Réf: <input class="form-control"  type="text" name="advance_reference" id="advance_reference" aria-label="Numéro de la facture" placeholder="Numéro de la facture d'acompte" @isset($number) value="acompte-{{ $number }}" @endisset readonly></p>
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
                            <div class="col-9 font-weight-bold text-uppercase ">Description</div>
                            <div class="col-1 font-weight-bold text-uppercase d-flex align-items-center justify-content-center">Taxe</div>
                            <div class="col-1 font-weight-bold text-uppercase d-flex align-items-center justify-content-center">Quantité</div>
                            <div class="col-1 font-weight-bold text-uppercase d-flex align-items-center justify-content-center">PV HT</div>
                        </div>
                        <div class="row edit-estimation estimation-title-container">
                            <div class="col-12 mout-accounting-body-details-container">
                                <H5 class="mout-accounting-title-description">{{ $estimation->title }}</H5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <p class="advance_detail">Informations sur votre facture d'acompte</p>
                                <textarea name="advance_detail" id="advance_detail" cols="30" rows="10" class="d-none"></textarea>
                            </div>
                            <div class="col-1">
                                <div class="estimation-edit-pen-title" data-toggle="modal" data-target="#advance_description_modal"><i class="fal fa-pen"></i></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-5">
                                <div class="row">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6 mout-accounting-total-container">
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="font-weight-bold text-right">Total HT :</p>
                                                <p class="font-weight-bold text-right">TVA :</p>
                                                <p class="font-weight-bold text-right">Total TTC :</p>
                                            </div>
                                            <div class="col-5 advance_total">
                                                <p class="font-weight-bold text-right"><span class="total_row_notax"></span> €
                                                    <input type="hidden" name="advance_total_row_notax" id="advance_total_row_notax"> </p>
                                                <p class="font-weight-bold text-right"><span class="total_tax"></span> €
                                                    <input type="hidden" name="advance_total_tax" id="advance_total_tax"> </p>
                                                <p class="font-weight-bold text-right"><span class="total_with_tax"></span> €
                                                    <input type="hidden" name="advance_total_with_tax" id="advance_total_with_tax"> </p>
                                            </div>
                                            <div class="col-1">
                                                <div class="advance-edit-total-pen" data-toggle="modal" data-target="#advance_total_modal"><i class="fal fa-pen"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <div class="modal" id="advance_description_modal" tabindex="-1" role="dialog" aria-labelledby="advance_description_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une observation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea name="invoice_observation_modal_text" id="invoice_observation_modal_text" cols="30" rows="10" placeholder="Ajouter une observation"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add-invoice-observation">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="advance_total_modal" tabindex="-1" role="dialog" aria-labelledby="advance_total_modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un montant en €HT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="" class="relative-label">Montant en € HT</label>
                    <input type="text" name="total_notax" id="total_notax">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add-total-observation">Save changes</button>
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
            let totalPen = $('.advance-edit-total-pen');
            let addTotalButton = $('.add-total-observation');

            addObservationButton.on('click', function () {
                let observation = $('textarea#invoice_observation_modal_text').val();

                $('textarea#advance_detail').val(observation);
                $('p.advance_detail').html(nl2br(observation));
                $('#advance_description_modal').modal('hide');
            });

            $(addTotalButton).on('click', function () {
               let totalInput = $('input#total_notax').val();

                $('span.total_row_notax').html(totalInput);
                $('span.total_row_notax').closest('.advance_total').find('input#advance_total_row_notax').val(parseInt(totalInput));
                $('span.total_tax').html(parseInt(totalInput*1.2) - parseInt(totalInput));
                $('span.total_tax').closest('.advance_total').find('input#advance_total_tax').val(parseInt(totalInput*1.2) - parseInt(totalInput));
                $('span.total_with_tax').html(parseInt(totalInput*1.2));
                $('span.total_with_tax').closest('.advance_total').find('input#advance_total_with_tax').val(parseInt(totalInput*1.2));
                $('#advance_total_modal').modal('hide');
            });

        });
    </script>
@endsection
