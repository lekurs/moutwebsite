@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Prestations
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Prestations
            </li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_service">
            <i class="fal fa-plus"></i>
            Créer une prestation
        </a>
    </div>
@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped custom-table mb-0 datatable dataTable no-footer mb-4 mt-4" id="services">
            <thead>
            <tr>
                <th>#</th>
                <th>Prestation</th>
                <th>Icône</th>
                <th>Couleur de l'icône</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('serviceShowOne', $service->id) }}">{{ $service->libelle }}</a></td>
                    <td>{!! $service->icon !!}</td>
                    <td>{!! $service->color_icon !!} <span class="color-icon-square" style="border: 10px solid {!! $service->color_icon !!}"></span></td>
                    <td>
                        <div class="dropdown-mout dropdown-mout-table">
                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-dot-circle-o @if($service->status > 0) text-success @else text-danger @endif"></i> @if($service->status > 0)Actif @else Inactif @endif
                            </a>
                            <div class="dropdown-menu-mout dropdown-menu-mout-table dropdown-mout-status" x-placement="bottom-end" style="position: absolute; transform: translate3d(-17px, 31px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Activé</a>
                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Désactivé</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div class="dropdown-mout dropdown-mout-table dropdown-mout-status">
                            <a href="#" class="dropdown-icon">
                                <i class="fal fa-ellipsis-v" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu-mout dropdown-menu-mout-table">
                                <a class="dropdown-item" href="{{ route('serviceEditForm', $service->id) }}" data-id=""><i class="fal fa-pen"></i> Modifier</a>
                                <a class="dropdown-item" href="#" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
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
                <form action="{{ route('serviceAdd') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('layouts.form_errors.errors')
                    <div class="row">
                        <div class="col-12 col-client">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="service-libelle" class="relative-label">Intitulé de la prestation</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="service-libelle" id="service-libelle" aria-label="Intitulé de la prestation" placeholder="Intitulé de la prestation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="service-description" class="relative-label">Descriptif de la prestation</label>
                                        <div class="input-group">
                                            <textarea class="form-control" type="text" name="service-description" id="service-description" aria-label="Descriptif de la prestation" placeholder="Descriptif de la prestation"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="service-expertise" class="relative-label">Expertise de la prestation</label>
                                        <div class="input-group">
                                            <textarea class="form-control" type="text" name="service-expertise" id="service-expertise" aria-label="Descriptif de la prestation" placeholder="Descriptif de la prestation"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="service-icon" class="relative-label">Icône representative</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="service-icon" id="service-icon" aria-label="Icône representative" placeholder="Icône representative">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="color_icon" class="relative-label">Couleur de l'icône</label>
                                        <div class="input-group">
                                            <input class="color-picker" id="color_icon" name="color_icon">
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('vendor/colorpicker/color-picker.js') }}"></script>
    <script>
        $('#services').dataTable({})

        $('#service-description').summernote({
            placeholder: 'Descriptif de la prestation',
            height: 150,
            width: '100%'
        });

        $('#service-expertise').summernote({
            placeholder: 'Expertise de la prestation',
            height: 150,
            width: '100%'
        });
    </script>
{{--    <script src="{{ asset('plugins/dropdown-mout/dropdown-mout.js') }}"></script>--}}
{{--    <script src="{{ asset('js/admin/addcontact/addcontact.js') }}"></script>--}}
@endsection
