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
@endsection

@section('js')
    <script src="{{ asset('plugins/dropdown-mout/dropdown-mout.js') }}"></script>
    <script src="{{ asset('plugins/addmedias/addmedias.js') }}"></script>
    <script src="{{asset('plugins/autocomplete/autocomplete.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/colorpicker/color-picker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-prestation').select2({
                width: '100%'
            });

            $('#datetimepicker').datetimepicker();

            $('#project_description_mission').summernote({
                placeholder: 'Descriptif du projet',
                height: 150,
                width: '100%'
            });

            $('#project_result_mission').summernote({
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
