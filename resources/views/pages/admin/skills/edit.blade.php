@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Compétence
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Compétence
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <form action="{{ route('serviceEditStore', $skill->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('layouts.form_errors.errors')
                <input type="hidden" value="{{ $skill->id }}" name="service-id" id="service-id">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="add-client-title"><span class="service-icon" style="color: {{ $skill->color_icon }}">{!! $skill->icon !!}</span> {{ $skill->libelle }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-client">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="service-libelle" class="relative-label">Prestation</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="service-libelle" id="service-libelle" aria-label="Prestation" placeholder="Prestation" @isset($skill) value="{{ $skill->libelle }}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="service-description" class="relative-label">Description</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="service-description" id="service-description" aria-label="Description" placeholder="Description">@isset($skill){{ $skill->description }}@endisset</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="service-expertise" class="relative-label">Expertise</label>
                                    <div class="input-group">
                                        <textarea class="form-control" name="service-expertise" id="service-expertise" aria-label="Description" placeholder="Description">@isset($skill){{ $skill->expertise }}@endisset</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="service-icon" class="relative-label">Icone</label>
                                    <div class="input-group">
                                        <span class="service-icon" style="color: {!! $skill->color_icon !!}; font-size: 1.5em; margin-right: 10px">{!! $skill->icon !!}</span>
                                        <input class="form-control" type="text" name="service-icon" id="service-icon" aria-label="Icone" placeholder="Icone" @isset($skill) value="{{ $skill->icon }}" @endisset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="color_icon" class="relative-label">Couleur de l'icône</label>
                                    <div class="input-group">
                                        <span class="color-icon-square" style="border: 10px solid {!! $skill->color_icon !!}; margin: 10px;"></span>
                                        <input class="form-control" type="text" name="color_icon" id="color_icon" aria-label="Couleur de l'icône" placeholder="Couleur de l'icône" @isset($skill) value="{{ $skill->color_icon }}" @endisset>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $('#service-description').summernote({
            placeholder: 'Descriptif de la prestation',
            height: 150,
            width: '100%'
        });

        $('#service-expertise').summernote({
            placeholder: 'Descriptif de la prestation',
            height: 150,
            width: '100%'
        });
    </script>
@endsection
