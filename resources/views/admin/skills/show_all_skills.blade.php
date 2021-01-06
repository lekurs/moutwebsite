@extends('layouts.admin-layout')

@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Compétences
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('homeAdmin') }}">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Compétences
            </li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_service">
            <i class="fal fa-plus"></i>
            Créer une compétence
        </a>
    </div>
@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped custom-table mb-0 datatable dataTable no-footer mb-4 mt-4" id="skills">
            <thead>
            <tr>
                <th>#</th>
                <th>Compétence</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('skillShowOne', $skill->id) }}" class="txt">{{ $skill->skill }}</a></td>
                    <td>
                        <div class="dropdown-mout dropdown-mout-table">
                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-dot-circle-o @if($skill->status > 0) text-success @else text-danger @endif"></i> @if($skill->status > 0)Actif @else Inactif @endif
                            </a>
                            <div class="dropdown-menu-mout dropdown-menu-mout-table dropdown-mout-status" x-placement="bottom-end" style="position: absolute; transform: translate3d(-17px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="{{ route('skillStatus', $skill->id) }}"><i class="fa fa-dot-circle-o text-success"></i> Activé</a>
                                <a class="dropdown-item" href="{{ route('skillStatus', $skill->id) }}"><i class="fa fa-dot-circle-o text-danger"></i> Désactivé</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="dropdown-mout dropdown-mout-table dropdown-mout-status">
                            <a href="#" class="dropdown-icon">
                                <i class="fal fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu-mout dropdown-menu-mout-table">
                                <a class="dropdown-item" href="{{ route('skillShowOne', $skill->id) }}" data-id="{{ $skill->id }}"><i class="fal fa-pen"></i> Modifier</a>
                                <a class="dropdown-item" href="{{ route('skillDelete', $skill->id) }}" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

    </div>

<!-- Modal -->
<div class="modal fade custom-modal" id="create_service" tabindex="-1" aria-labelledby="create_service" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mout--regular" id="exampleModalLabel">Création d'une nouvelle prestation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('skillAdd') }}" method="post">
                    @csrf
                    @include('layouts.form_errors.errors')
                    <div class="row add-skill-container new-skill-container">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="service-libelle" class="relative-label">Compétence</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="skill-libelle[]" id="skill-libelle" aria-label="Description de la compétence" placeholder="Description de la compétence">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center">
                            <button type="button" class="btn btn-success add-skill">Ajouter une compétence</button>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('vendor/colorpicker/color-picker.js') }}"></script>
    <script>
        $('#skills').dataTable({})

        $('body').on('click', '.btn-success.add-skill', function () {
            let cloning = $(this).closest('.modal-body').find('.add-skill-container').clone();
            cloning.removeClass('add-skill-container');
            let random = 'skill-libelle-' + Math.floor(Math.random()*1000);
            cloning.find('input[type="text"]').attr('id', random).val('');
            cloning.insertAfter('.new-skill-container:last');
        })
    </script>
@endsection
