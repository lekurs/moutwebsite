@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Projets
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Projets
            </li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_project">
            <i class="fal fa-plus"></i>
            Créer un projet
        </a>
    </div>
@endsection
@section('body')
    <form class="row filter-row" action="" method="post">
        <div class="col-sm-6 col-md-4">
            <div class="form-group form-focus">
                <input type="text" id="project-name" name="project-name" class="form-control floating-input" placeholder=" ">
                <label for="project-name" class="float">Nom du projet</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="form-group form-focus select-focus focused">
                <select class="select-prestation sources" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option data-select2-id="3">Select Roll</option>
                    <option data-select2-id="23">Web Developer</option>
                    <option data-select2-id="24">Web Designer</option>
                    <option data-select2-id="25">Android Developer</option>
                    <option data-select2-id="26">Ios Developer</option>
                </select>
                <label class="focus-label-select">Services</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <a href="#" class="btn btn-success btn-block text-uppercase mout--regular">Chercher</a>
        </div>
    </form>

    <div class="row">
        @foreach($projects as $project)
            @include('layouts.cards.project_card')
        @endforeach
    </div>

    <!-- Modal -->
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
                    <form action="{{ route('projectAdd') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('layouts.form_errors.errors')
                        <div class="row">
                            <div class="col-12">
                                <select name="client-id" class="" id="client-id">
                                    @foreach($clients as $client)
                                    <option name="client-slug" id="client-{{ $client->slug }}" value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
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
                                <div class="form-group test">
                                    <label for="project-title" class="relative-label">Fin du projet</label>
                                    <div class="input-group">
                                        <input class="form-control datetimepicker" name="project-end" id="datetimepicker" aria-label="Fin du projet" placeholder="Fin du projet" type="text" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2"><i class="fal fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                @foreach($services as $service)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="project-service[]" type="checkbox" id="label-{{ $service->id }}" value="{{ $service->id }}">
                                        <label class="form-check-label" for="label-{{ $service->id }}">{{ $service->libelle }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="project_color" class="relative-label">Couleur du portfolio</label>
                                    <div class="input-group">
                                        <input class="color-picker" id="project_color" name="project_color">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="project-img-portfolio" class="relative-label">Image du projet</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="project-img-portfolio" id="project-img-portfolio">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group form-focus select-focus focused">
                                    <select class="skills-selection sources" multiple="multiple" data-select2-id="1" tabindex="-1" aria-hidden="true" name="skills[]">
                                        @foreach($skills as $skill)
                                            <option data-select2-id="{{ $skill->id }}">{{ $skill->skill }}</option>
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
                                    <label for="" class="relative-label">Images du projet</label>
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
{{--    <script src="{{ asset('plugins/bootstrap-datetimepicker.min.js') }}"></script>--}}
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

            $('#datetimepicker').datepicker({
                highlight: 'today'
            });

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

            $('#client-id').autocompletion({
                width: 300,
                placeholder:"recherchez vos clients",
                multiple:false,
                inputClass: 'floating-input',
                resultClass: ''
            });
        });
    </script>
@endsection
