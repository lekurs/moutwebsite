@extends('layouts.admin-layout')

@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            test
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
        <a href="#" class="btn add-btn">
            <i class="fal fa-plus"></i>
            Créer un projet
        </a>
    </div>
@endsection
@section('body')
    <form class="row filter-row" action="" method="post">
        <div class="col-sm-6 col-md-3">
            <div class="form-group form-focus">
                <input type="text" id="project-name" name="project-name" class="form-control floating-input" placeholder=" ">
                <label for="project-name" class="float">Nom du projet</label>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            2
        </div>
        <div class="col-sm-6 col-md-3">
            3
        </div>
        <div class="col-sm-6 col-md-3">
            4
        </div>
    </form>
@endsection
