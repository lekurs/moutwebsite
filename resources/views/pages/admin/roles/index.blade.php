@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Rôles
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('homeAdmin') }}">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Rôle / Voir
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            Les rôles
        </div>
    </div>

@endsection
