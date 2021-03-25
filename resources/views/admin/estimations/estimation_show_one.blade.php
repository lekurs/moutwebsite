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
            <div class="dropdown-mout">
                <div class="dropdown-icon">
                    <i class="fal fa-ellipsis-v"></i>
                </div>
                <div class="dropdown-menu-mout">
                    <a class="dropdown-item" href="{{ route('clientEditForm', $estimation->client->slug) }}" data-id="{{ $estimation->client->id }}"><i class="fal fa-pen"></i> Modifier</a>
                    <a class="dropdown-item" href="#" data-id="{{ $estimation->client->id }}"><i class="fal fa-trash"></i> Supprimer</a>
                </div>
            </div>
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
                        <div class="col-2 font-weight-bold text-uppercase text-right">Quantité</div>
                        <div class="col-2 font-weight-bold text-uppercase text-right">PV HT</div>
                    </div>
                    <div class="row">
                        <div class="col-12 mout-accounting-body-details-container">
                            <H5 class="mout-accounting-title-description">{{ $estimation->title }}</H5>
                            @foreach($estimation->estimationDetails as $detail)
                                <div class="row">
                                    <div class="col-8 mout-accounting-detail-description">
                                        <p>{!! $detail->description !!}</p>
                                    </div>
                                    <div class="col-2 text-right mout-accounting-detail-quantity">{{ $detail->quantity }}</div>
                                    <div class="col-2 text-right mout-accounting-detail-total">{{ $detail->total_row_notax }} €</div>
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
        </div>
    </div>

@endsection
