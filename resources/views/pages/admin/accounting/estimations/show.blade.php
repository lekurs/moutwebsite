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
                Devis / {{ $estimation->reference }}
            </li>
        </ul>
    </div>
@endsection

@section('body')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <img src="http://moutwebagency.net/mout/logo-mout-factures.png" alt="Mout" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-10 ml-auto mr-auto mb-5">
                    <div class="row  my-5">
                        <div class="col-md-6 mout-accounting-header-container">
                            <p>Devis Réf: <span class="font-weight-bold">{{ $estimation->reference}}</span></p>
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
                    <div class="row mt-4 mout-accounting-thead-details-container">
                        <div class="col-8 font-weight-bold text-uppercase">Description</div>
                        <div class="col-1 font-weight-bold text-uppercase text-right">Taxe</div>
                        <div class="col-1 font-weight-bold text-uppercase text-right">Quantité</div>
                        <div class="col-1 font-weight-bold text-uppercase text-right">PV HT</div>
                        <div class="col-1 text-center"><i class="fal fa-pen"></i></div>
                    </div>
                    <div class="row edit-estimation estimation-title-container">
                        <div class="col-11 mout-accounting-body-details-container">
                            <H5 class="mout-accounting-title-description">{{ $estimation->title }}</H5>
                        </div>
                        <div class="col-1">
                            <div class="estimation-edit-pen" data-toggle="modal" data-target="#exampleModalCenter" data-estimation-id="{{ $estimation->id }}"><i class="fal fa-pen"></i></div>
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
                                    <p>{!! $detail->description !!}</p>
                                </div>
                                <div class="col-1 text-right mout-accounting-detail-tax" data-tax-id="{{ $detail->taxe->id }}">{{ $detail->taxe->tax }}%</div>
                                <div class="col-1 text-right mout-accounting-detail-quantity">{{ $detail->quantity }}</div>
                                <div class="col-1 text-right mout-accounting-detail-total">{{ $detail->total_row_notax }} €</div>
                                <div class="col-1">
                                    <div class="estimation-edit-pen" data-target="#editDetails" data-estimation-id="{{ $detail->id }}"><i class="fal fa-pen"></i></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <p class="font-weight-light">Conditions de paiement : 30% à la validation du devis, le solde à la réception de la facture.</p>
                </div>
                <div class="col-3 mout-accounting-total-container">
                    <div class="row">
                        <div class="col-6">
                            <p class="font-weight-bold text-right">Total HT :</p>
                            <p class="font-weight-bold text-right">TVA :</p>
                            <p class="font-weight-bold text-right">Total TTC :</p>
                        </div>
                        <div class="col-6">
                            <p class="font-weight-bold text-right">{{ $estimation->totalnotax }} €</p>
                            <p class="font-weight-bold text-right">{{ $estimation->totaltax }} €</p>
                            <p class="font-weight-bold text-right">{{ $estimation->total }} €</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        @csrf
                        <input type="hidden" name="estimation-id" id="estimation-id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="editDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('estimations.details.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="detail_id" id="detail_id">
                        <div class="form-group">
                            <label for="product" class="relative-label text-muted">Intitulé</label>
                            <input type="text" class="form-control" name="product" id="product">
                        </div>
                        <div class="form-group">
                            <textarea rows="30" cols="30" class="form-control" name="description" id="description" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="estimation-quantity" class="relative-label text-muted">Quantité</label>
                            <input type="number" class="form-control calculate-estimation estimation-quantity" name="quantity" id="quantity" minlength="1">
                        </div>
                        <div class="form-group">
                            <label for="tax" class="relative-label text-muted">Taxes</label>
                            <select name="tax" id="tax" class="form-control">
                                @foreach($taxes as $tax)
                                    <option value="{{ $tax->id }}">{{ $tax->tax }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estimation-price" class="relative-label text-muted">Prix unitaire</label>
                            <input type="text" class="form-control calculate-estimation estimation-price" name="price" id="price" minlength="1">
                        </div>
                        <button type="submit" class="btn btn-add">Modifier</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

                let penTitle = $('.estimation-edit-pen-title');
                let pen = $('.estimation-edit-pen');

                pen.on('click', function () {
                    let estimationId = $(this).attr('data-estimation-id');
                    // let modalEstimation = $('#exampleModalCenter');
                    // let modalEstimationDetail = $('#')
                    // modalEstimation.find('input#estimation-id').val(estimationId);

                    let parent = $(this).closest('.edit-estimation');
                    let product = parent.find('.mout-accounting-detail-product p').text();
                    let description = parent.find('.mout-accounting-detail-description p').text();
                    let quantity = parent.find('.mout-accounting-detail-quantity').text();
                    let total = parent.find('.mout-accounting-detail-total').text();
                    let taxId = parent.find('.mout-accounting-detail-tax').attr('data-tax-id');

                    console.log(taxId)

                    $('#editDetails').modal('show');
                    $('input#detail_id').val(estimationId);
                    $('input#product').val(product);
                    $('textarea#description').val(description);
                    $('input#quantity').val(parseInt(quantity));
                    $('input#price').val(parseFloat(total));
                    $('select#tax').val(parseInt(taxId));
                });
        });
    </script>
@endsection
