@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            {{ $client->name }}
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Client
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
                    <a class="dropdown-item" href="{{ route('clients.edit', $client->slug) }}" data-id="{{ $client->id }}"><i class="fal fa-pen"></i> Modifier</a>
                    <a class="dropdown-item" href="#" data-id="{{ $client->id }}"><i class="fal fa-trash"></i> Supprimer</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="client-view">
                        <div class="client-img-wrap">
                            <div class="client-logo">
                                <img src="{{ asset('storage/images/uploads/' . $client->slug . '/logo/' . $client->logo) }}" alt="{{ $client->name }}" class="img-fluid img-client-logo">
                            </div>
                        </div>
                        <div class="client-informations">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="client-informations-left">
                                        <h3 class="client-name mt-0">{{ $client->name }}</h3>
                                        <small class="text-muted">{{ count($client->projects) }} @if(count($client->projects)>1)projets réalisés @else projet réalisé @endif</small>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="client-details">
                                        <li>
                                            <span class="title">Téléphone :</span>
                                            <span class="text">{{ $client->phone }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Adresse :</span>
                                            <span class="text">{{ $client->address }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Code postal / ville : </span>
                                            <span class="text">{{ $client->zip }} {{ $client->city }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Siren :</span>
                                            <span class="text">@if(is_null($client->siren)) Non renseigné @else {{ $client->siren }} @endif</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card tab-box mb-4">
        <div class="row user-tabs">
            <div class="col-12 line-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item col-sm-2"><a class="nav-link active" data-toggle="tab" role="tab" aria-controls="myprojects" aria-selected="true" href="#myprojects">Projets</a></li>
                    <li class="nav-item col-sm-2"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="myrecipes" aria-selected="false" href="#myrecipes">Recettes</a></li>
                    <li class="nav-item col-sm-2"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="contacts" aria-selected="false" href="#contacts">Contacts</a></li>
                    <li class="nav-item col-sm-2"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="estimations" aria-selected="false" href="#estimations">Devis</a></li>
                    <li class="nav-item col-sm-2"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="invoices" aria-selected="false" href="#invoices">Factures</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tab-content client-tab-content">
                <!-- PROJECTS -->
                <div class="tab-pane fade active show" id="myprojects" role="tabpanel" aria-labelledby="myprojects-tab">
                    <div class="row mb-3">
                        <div class="col-auto float-right ml-auto">
                            <a href="{{ route('projects.create', [$client->slug]) }}" class="btn add-btn" data-toggle="" data-target="#create_project">
                                <i class="fal fa-plus"></i>
                                Créer un projet
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($client->projects as $project)
                            @include('layouts.cards.project_card')
                        @endforeach
                    </div>
                </div>
                <!-- RECETTES -->
                <div class="tab-pane fade" id="myrecipes" role="tabpanel" aria-labelledby="myrecipes-tab">
                    <div class="row">
                        @include('layouts.cards.recipe_card')
                    </div>
                </div>
                <!-- CONTACTS -->
                <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="estimations-tab">
                    <div class="row mb-3">
                        <div class="col-auto float-right ml-auto">
                            <a href="{{ route('contacts.create', $client->slug) }}" class="btn add-btn" data-toggle="" data-target="#create_contact">
                                <i class="fal fa-plus"></i>
                                Créer un contact
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        @forelse($client->users as $contact)
                            @include('layouts.cards.contact_card')
                        @empty
                            <p class="contact-empty mt-4">Aucun contact enregistré</p>
                        @endforelse
                    </div>
                </div>
                <!-- ESTIMATIONS -->
                <div class="tab-pane fade" id="estimations" role="tabpanel" aria-labelledby="estimations-tab">
                    <div class="row mb-3">
                        <div class="col-auto float-right ml-auto">
                            <a href="{{ route('estimations.create', $client->slug) }}" class="btn add-btn">
                                <i class="fal fa-plus"></i>
                                Créer un devis
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <h3 class="estimations-title-table">Devis en cours sur les 12 mois glissants ({{ $sumEstimations['total_row'] }}€ HT)</h3>
                        @include('layouts.cards.estimation_card')
                    </div>
                </div>
                <!-- INVOICES -->
                <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">
                    <div class="row mb-3">
                        <div class="col-auto float-right ml-auto">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('plugins/autocomplete/autocomplete.js')}}"></script>
@endsection
