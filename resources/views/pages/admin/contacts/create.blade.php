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
                {{ $client->name }} / Créer projet
            </li>
        </ul>
    </div>
@endsection

@section('body')
    <div class="card">
        <div class="card-body">
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
                                        <h3 class="client-name mt-0">{{ $client->name }} </h3>
                                        <small class="text-muted">Total de projet(s) réalisé(s) : {{ count($client->projects) }}</small>
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
                                            <span class="text">{{ $client->address }} - {{ $client->zip }} {{ $client->city }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Siren :</span>
                                            <span class="text">@if(is_null($client->siren))NC @else{{ $client->siren }} @endif</span>
                                        </li>
                                        <li>
                                            <span class="title">CA sur l'année :</span>
                                            <span class="text">{{ $client->siren }}</span>
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

    <div class="row edit-client-form-container no-gutters mt-3">
        <div class="col-12">
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
