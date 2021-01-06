@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            {{ $skill->skill }}
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
<div class="card">
    <div class="card-body">
        <form action="{{ route('skillEditStore', $skill->id) }}" method="post">
            @csrf
            @include('layouts.form_errors.errors')
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="service-libelle" class="relative-label">Compétence</label>
                        <div class="input-group">
                            <input type="hidden" value="{{ $skill->id}}" name="skill_id" id="skill_id">
                            <input class="form-control" type="text" value="{{ $skill->skill}}" name="skill-libelle">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn add-btn">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
