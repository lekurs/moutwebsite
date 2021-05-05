@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            {{ $service->libelle }}
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Prestation
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
                    <a class="dropdown-item" href="{{ route('services.edit', $service->id) }}" data-id="{{ $service->id }}"><i class="fal fa-pen"></i> Modifier</a>
                    <a class="dropdown-item" href="#" data-id="{{ $service->id }}"><i class="fal fa-trash"></i> Supprimer</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="client-view">
                        <div class="client-img-wrap">
                            <div class="client-logo">
                                <span class="img-client-logo" style="color:{{ $service->color_icon }} ">{!! $service->icon !!}</span>
                            </div>
                        </div>
                        <div class="client-informations">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="client-informations-left">
                                        <h3 class="client-name mt-0">{{ $service->libelle }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="client-details">
                                        <li>
                                            <span class="title">Couleur :</span>
                                            <span class="text">{{ $service->color_icon }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Description :</span>
                                            <span class="text">{!! $service->description !!}</span>
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

@endsection

@section('js')
    <script src="{{ asset('plugins/dropdown-mout/dropdown-mout.js') }}"></script>
@endsection
