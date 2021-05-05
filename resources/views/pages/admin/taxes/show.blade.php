@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Taxe de : {{ $tax->tax }}%
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Taxes
            </li>
        </ul>
    </div>
@endsection

@section('body')
    <div class="tax-container">
        <form action="{{ route('taxes.update', $tax->id) }}" method="post">
            @csrf
            @include('layouts.form_errors.errors')
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="tax" class="relative-label">Taxe</label>
                        <div class="input-group">
                            <input class="form-control" type="text" name="tax" id="tax" aria-label="Taxe" placeholder="Taxe" @isset($tax) value="{{ $tax->tax}}" @endisset>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="main-tax" class="relative-label">Définir comme taxe principale</label>
                        <div class="input-group">
                            <input type="checkbox" name="main-tax" id="main-tax" @if($tax->main > 0) checked @endif value="1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn add-btn">Modifier</button>
                </div>
            </div>
    </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('plugins/dropdown-mout/dropdown-mout.js') }}"></script>
@endsection
