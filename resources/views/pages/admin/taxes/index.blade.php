@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Taxes
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('homeAdmin')}}">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Taxes
            </li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_service">
            <i class="fal fa-plus"></i>
            Créer une taxe
        </a>
    </div>
@endsection
@section('body')
    <div class="row">
        <div class="col-12">
            <table class="table table-striped custom-table mb-0 datatable dataTable no-footer mb-4 mt-4" id="taxes">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Taxe</th>
                    <th>Par défault</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($taxes as $taxe)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('taxes.show', $taxe->id) }}" class="txt">{{ $taxe->tax }}</a></td>
                        <td>{{ $taxe->main }}</td>
                        <td>
                            <div class="dropdown-mout dropdown-mout-table">
                                <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-dot-circle-o @if($taxe->status > 0) text-success @else text-danger @endif"></i> @if($taxe->status > 0)Actif @else Inactif @endif
                                </a>
                                <div class="dropdown-menu-mout dropdown-menu-mout-table dropdown-mout-status" x-placement="bottom-end" style="position: absolute; transform: translate3d(-17px, 31px, 0px); top: 0; left: 0; will-change: transform;">
                                    <a class="dropdown-item" href="{{ route('taxes.status', $taxe->id) }}"><i class="fa fa-dot-circle-o text-success"></i> Activé</a>
                                    <a class="dropdown-item" href="{{ route('taxes.status', $taxe->id) }}"><i class="fa fa-dot-circle-o text-danger"></i> Désactivé</a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="dropdown-mout dropdown-mout-table dropdown-mout-status">
                                <a href="#" class="dropdown-icon">
                                    <i class="fal fa-ellipsis-v" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu-mout dropdown-menu-mout-table">
                                    <a class="dropdown-item" href="{{ route('taxes.show', $taxe->id) }}" data-id=""><i class="fal fa-pen"></i> Modifier</a>
                                    <a class="dropdown-item" href="{{ route('taxes.delete', $taxe->id) }}" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
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
                    <h5 class="modal-title mout--regular" id="exampleModalLabel">Création d'une nouvelle taxe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('taxes.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('layouts.form_errors.errors')
                        <div class="row">
                            <div class="col-12 col-client">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="service-libelle" class="relative-label">Taux de la taxe</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="tax" id="tax" aria-label="Taux de la taxe" placeholder="Taux de la taxe">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="main-tax" class="relative-label">Définir comme taxe principale</label>
                                            <input type="checkbox" name="main-tax" id="main-tax" value="1">
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
    <script>
        $('#taxes').dataTable({})
    </script>
@endsection
