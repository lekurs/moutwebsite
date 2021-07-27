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
            <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('layouts.form_errors.errors')
                <input type="hidden" name="client-id" id=project-client-id" value="{{ $client->id }}">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="project-title" class="relative-label">Titre du projet</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="project-title" id="project-title" aria-label="Titre du projet" placeholder="Titre du projet">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
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
                                    <option data-select2-id="{{ $skill->id }}" value="{{ $skill->id }}">{{ $skill->libelle }}</option>
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
