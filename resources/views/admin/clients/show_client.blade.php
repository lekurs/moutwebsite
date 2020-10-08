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
                <a class="dropdown-item" href="{{ route('clientEditForm', $client->slug) }}" data-id="{{ $client->id }}"><i class="fal fa-pen"></i> Modifier</a>
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
                <li class="nav-item col-sm-3"><a class="nav-link active" data-toggle="tab" role="tab" aria-controls="myprojects" aria-selected="true" href="#myprojects">Projets</a></li>
                <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="contacts" aria-selected="false" href="#contacts">Contacts</a></li>
                <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="estimations" aria-selected="false" href="#estimations">Devis</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="tab-content client-tab-content">
            <!-- PROJECTS -->
            <div class="tab-pane fade active show" id="myprojects" role="tabpanel" aria-labelledby="myprojects-tab">
                <div class="row">
                    @foreach($client->projects as $project)
                        @include('layouts.cards.project_card')
                    @endforeach
                </div>
            </div>
            <!-- CONTACTS -->
            <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="estimations-tab">
                <div class="row mb-3">
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_contact">
                            <i class="fal fa-plus"></i>
                            Créer un contact
                        </a>
                    </div>
                </div>
                <div class="row">
                    @forelse($client->contacts as $contact)
                        @include('layouts.cards.contact_card')
                    @empty
                        <p class="contact-empty mt-4">Aucun contact enregistré</p>
                    @endforelse
                </div>
            </div>
            <!-- ESTIMATIONS -->
            <div class="tab-pane fade" id="estimations" role="tabpanel" aria-labelledby="estimations-tab">
                3
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade custom-modal" id="create_contact" tabindex="-1" aria-labelledby="create_contact" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mout--regular" id="exampleModalLabel">Création d'un nouveau contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('contactAdd', $client->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('layouts.form_errors.errors')
                    <div class="row">
                        <div class="col-12 col-client">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contact-firstname" class="relative-label">Nom</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="contact-firstname" id="contact-firstname" aria-label="Nom" placeholder="Nom">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contact-lastname" class="relative-label">Prénom</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="contact-lastname" id="contact-lastname" aria-label="Prénom" placeholder="Prénom">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contact-email" class="relative-label">Email</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="contact-email" id="contact-email" aria-label="Email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contact-phone" class="relative-label">Téléphone</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="contact-phone" id="contact-phone" aria-label="Téléphone" placeholder="Téléphone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact-function" class="relative-label">Fonction</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="contact-function" id="contact-function">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact-picture" class="relative-label">Photo</label>
                                        <div class="input-group">
                                            <input class="form-control" type="file" name="contact-picture" id="contact-picture">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary add-btn">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('plugins/dropdown-mout/dropdown-mout.js') }}"></script>
@endsection
