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
                    <li class="nav-item col-sm-3"><a class="nav-link active" data-toggle="tab" role="tab" aria-controls="myprojects" aria-selected="true" href="#myprojects">Projets</a></li>
                    <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="contacts" aria-selected="false" href="#contacts">Contacts</a></li>
                    <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="estimations" aria-selected="false" href="#estimations">Devis</a></li>
                    <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="invoices" aria-selected="false" href="#invoices">Factures</a></li>
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
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_project">
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
                    <div class="row mb-3">
                        <div class="col-auto float-right ml-auto">
                            <a href="{{ route('estimations.create', $client->slug) }}" class="btn add-btn">
                                <i class="fal fa-plus"></i>
                                Créer un devis
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <h3 class="estimations-title-table">Devis en cours sur les 12 mois glissants</h3>
                        @include('layouts.cards.estimation_card')
                    </div>
                </div>
                <!-- INVOICES -->
                <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">
                    <div class="row mb-3">
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn">
                                <i class="fal fa-plus"></i>
                                Créer une facture
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Contact -->
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
                    <form action="{{ route('contacts.store', $client->slug) }}" method="post" enctype="multipart/form-data">
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

    <!-- Modal Project -->
    <div class="modal fade custom-modal" id="create_project" tabindex="-1" aria-labelledby="create_project" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mout--regular" id="exampleModalLabel">Création d'un nouveau projet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('layouts.form_errors.errors')
                        <input type="hidden" name="client-id" id=project-client-id" value="{{ $client->id }}">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="project-title" class="relative-label">Titre du projet</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="project-title" id="project-title" aria-label="Titre du projet" placeholder="Titre du projet">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="project-end" class="relative-label">Fin du projet</label>
                                    <div class="input-group">
                                        <input class="form-control datetimepicker" name="project-end" id="project-end" aria-label="Fin du projet" placeholder="Fin du projet" type="text" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" class="relative-label">Image de fond</label>
                                    <input type="file" class="form-control" name="project-background-img" id="project-background-img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="project-color" class="relative-label">Couleur du portfolio</label>
                                    <div class="input-group">
                                        <input class="color-picker" id="project_color" name="project_color">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="project-img-portfolio" class="relative-label">Image de présentation</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="project-img-portfolio" id="project-img-portfolio">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group form-focus select-focus focused">
                                    <select class="skills-selection sources" multiple="multiple" data-select2-id="1" tabindex="-1" name="skills[]" aria-hidden="true">
                                        @foreach($skills as $skill)
                                            <option data-select2-id="{{ $skill->id }}" value="{{ $skill->id }}">{{ $skill->skill }}</option>
                                        @endforeach
                                    </select>
                                    <label class="focus-label-select">Compétences</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="project-description-mission" class="relative-label">Description du projet</label>
                                    <div class="input-group">
                                        <textarea name="project-description-mission" id="project-description-mission" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="project-result-mission" class="relative-label">Description du résultat du projet</label>
                                    <div class="input-group">
                                        <textarea name="project-result-mission" id="project-result-mission" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="" class="relative-label">Images résultats</label>
                                    <div class="images"></div>
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
    <script src="{{ asset('plugins/addmedias/addmedias.js') }}"></script>
    <script src="{{asset('plugins/autocomplete/autocomplete.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="{{ asset('vendor/colorpicker/color-picker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-prestation').select2({
                width: '100%'
            });

            $('.skills-selection').select2({
                width: '100%'
            });

            var date_input=$('input[name="project-end"]');
            var options={
                format: 'mm/dd/yyyy',
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);

            $('#project-description-mission').summernote({
                placeholder: 'Descriptif du projet',
                height: 150,
                width: '100%'
            });

            $('#project-result-mission').summernote({
                placeholder: 'Descriptif du résultat du projet',
                height: 150,
                width: '100%'
            })

            $('.images').addMedia({
                width: '150px',
                height: '150px',
                onDelete: function (url) {
                    console.log(url);
                    //Ici on fait l'ajax pour supprimer
                }
            });

            $('#service-client').autocompletion({
                width: 300,
                placeholder:"recherchez vos clients",
                multiple:false,
                inputClass: 'floating-input',
                resultClass: ''
            });
        });
    </script>
@endsection
