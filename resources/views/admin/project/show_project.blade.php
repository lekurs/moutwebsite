@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            {{ $project->name }}
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Projet {{ $project->id }}
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
{{--                <a class="dropdown-item" href="{{ route('clientEditForm', $client->slug) }}" data-id="{{ $client->id }}"><i class="fal fa-pen"></i> Modifier</a>--}}
{{--                <a class="dropdown-item" href="#" data-id="{{ $client->id }}"><i class="fal fa-trash"></i> Supprimer</a>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="client-view">
                    <div class="client-img-wrap">
                        <div class="client-logo">
                            <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/projects/portfolio/' . $project->mediaPortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-fluid img-client-logo">
                        </div>
                    </div>
                    <div class="client-informations">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="client-informations-left">
                                    <h3 class="client-name mt-0">{{ $project->title }}</h3>
                                    <small class="text-muted">
                                        @foreach($project->services as $service)
                                            {{ $service->libelle }}
                                        @endforeach
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="client-details">
                                    <li>
                                        <span class="title">Client :</span>
                                        <span class="text">{{ $project->client->name }}</span>
                                    </li>
                                    <li>
                                        <span class="title">Fin du projet :</span>
                                        <span class="text">{{ $project->endProject }}</span>
                                    </li>
                                    <li>
                                        <span class="title">Couleur selectionnée :</span>
                                        <span class="text"><span style="display: block; width: 20px; height: 20px; background-color: {{ $project->colorProject }};"></span></span>
                                    </li>
                                    <li>
                                        <span class="title">Compétences :</span>
                                        <span class="text">
                                            @foreach($project->skills as $skill)
                                                {{ $skill->skill }}
                                            @endforeach
                                        </span>
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

<section style="background: #fff; padding: 40px;">
    <div class="row">
        <div class="col-12">
            <h4>Mettre à jour le projet</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="project-title" class="relative-label">Titre du projet</label>
                            <div class="input-group">
                                <input class="form-control" type="text" name="project-title" id="project-title" aria-label="Titre du projet" placeholder="Titre du projet" @isset($project) value="{{ $project->title }}" @endisset>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group form-focus select-focus focused">
                            <select class="skills-selection sources" multiple="multiple" tabindex="-1" name="skills[]" aria-hidden="true" id="skills">
                                @foreach($skills as $skill)
                                    <option data-select2-id="{{ $skill->id }}" value="{{ $skill->id }}">{{ $skill->skill }}</option>
                                @endforeach
                            </select>
                            <label class="focus-label-select">Compétences</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/projects/portfolio/' . $project->mediaPortfolioProjectPath) }}" alt="{{ $project->title }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <label for="project_color" class="relative-label">Couleur du portfolio</label>
                                <span style="display: block; background-color: {{ $project->colorProject }}; width: 100%; height: 40px"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="color-picker" id="project_color" name="project_color">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="project-description-mission" class="relative-label">Description du projet</label>
                            <div class="input-group">
                                <textarea name="project-description-mission" id="project-description-mission" class="form-control">{{ $project->mission }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="project-result-mission" class="relative-label">Description du résultat du projet</label>
                            <div class="input-group">
                                <textarea name="project-result-mission" id="project-result-mission" class="form-control">{{ $project->result }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($project->mediaProjects as $media)
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('storage/images/uploads/' . $project->client->slug . '/projects/' . $project->slug . '/' . $media->mediaProjectPath) }}" alt="{{ $project->title . '-' . $loop->index }}" class="img-fluid">
                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</section>

{{--<div class="row">--}}
{{--    <div class="col-12">--}}
{{--        <div class="tab-content client-tab-content">--}}
{{--            <!-- PROJECTS -->--}}
{{--            <div class="tab-pane fade active show" id="myprojects" role="tabpanel" aria-labelledby="myprojects-tab">--}}
{{--                <div class="row mb-3">--}}
{{--                    <div class="col-auto float-right ml-auto">--}}
{{--                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_project">--}}
{{--                            <i class="fal fa-plus"></i>--}}
{{--                            Créer un projet--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    @foreach($client->projects as $project)--}}
{{--                        @include('layouts.cards.project_card')--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- CONTACTS -->--}}
{{--            <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="estimations-tab">--}}
{{--                <div class="row mb-3">--}}
{{--                    <div class="col-auto float-right ml-auto">--}}
{{--                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_contact">--}}
{{--                            <i class="fal fa-plus"></i>--}}
{{--                            Créer un contact--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    @forelse($client->contacts as $contact)--}}
{{--                        @include('layouts.cards.contact_card')--}}
{{--                    @empty--}}
{{--                        <p class="contact-empty mt-4">Aucun contact enregistré</p>--}}
{{--                    @endforelse--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ESTIMATIONS -->--}}
{{--            <div class="tab-pane fade" id="estimations" role="tabpanel" aria-labelledby="estimations-tab">--}}
{{--                3--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

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
