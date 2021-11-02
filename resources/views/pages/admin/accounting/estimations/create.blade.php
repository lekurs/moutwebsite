@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Client
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('homeAdmin') }}">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                <a href="{{ route('clients.show', $client->slug) }}">{{ $client->name }}</a> / Devis / Créer
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <form action="{{ route('estimations.store', $client->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('layouts.form_errors.errors')
                <input type="hidden" value="{{ $client->slug }}" name="client-slug" id="client-slug">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="add-client-title"><i class="fal fa-building"></i> {{ $client->name }}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-client">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="client-estimation" class="relative-label">Client</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" disabled name="client-estimation" id="client-estimation" aria-label="Intitulé du devis" placeholder="Client" @isset($client) value="{{ $client->name }}" @endisset>
                                    </div>
                                    <span class="text-muted edit-client-estimation-link"><a href="{{ route('clients.edit', $client->slug) }}">Modifier le client</a></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="estimation-reference" class="relative-label">Numéro du devis</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="estimation-reference" id="estimation-reference" aria-label="Numéro du devis" placeholder="Numéro du devis" @isset($number) value="{{ $number }}" @endisset readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="validation-duration-estimation" class="relative-label">Validité du devis</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="estimation-validation-duration" id="validation-duration-estimation" aria-label="Validité du devis" placeholder="Validité du devis" maxlength="5" @if(isset($estimation)) value="{{ $estimation->validation_duration }}"  @else value="30" @endif>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                            <label class="relative-label mb-0">Contact</label>
                                    <div class="row">
                                        @forelse($client->users as $contact)
                                            <div class="col-3 contact-estimation-container">
                                                <input type="radio" value="{{ $contact->slug }}" name="estimation-contact" class="contact-radio-value">
                                                <div class="contact-check-container"></div>
                                                <div class="contact-details-container">
                                                    <p>{{ $contact->name }}  {{ $contact->lastname }}</p>
                                                    <p class="text-muted">{{ $contact->email }}</p>
                                                    <p class="text-muted">{{ $contact->contact_function }}</p>
                                                </div>
                                            </div>
                                            @empty
                                            <div class="col-12">
                                                <a href="{{ route('contacts.create', $client->slug) }}">Créer un contact</a>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    @foreach($skills as $skill)
                                        <input type="checkbox" value="{{ $skill->id }}" name="estimation-service[]" id="estimation-service-{{ $skill->libelle }}" class="service-checkbox">
                                        <label for="estimation-service[]"  class="mr-2">{{ $skill->libelle }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="estimation-title" class="relative-label">Intitulé du devis</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="estimation-title" id="estimation-title" aria-label="Intitulé du devis" placeholder="Intitulé du devis" @isset($estimation) value="{{ $estimation->title }}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="display: none" class="exemple" data-id="0" data-form='<div class="row product-line-container" data-id="__increment__"><div class="col-12"><div class="row product-line"><div class="col-4"><div class="form-group"> <label for="estimation-product" class="relative-label text-muted">Produit / Service</label> <input type="text" class="form-control" name="product-detail[__increment__][product]" id="estimation-product" placeholder="Produit"></div></div><div class="col-2"><div class="form-group"> <label for="estimation-quantity" class="relative-label text-muted">Quantité</label> <input type="number" class="form-control calculate-estimation estimation-quantity" name="product-detail[__increment__][quantity]" id="estimation-quantity" minlength="1"></div></div><div class="col-3"><div class="form-group"> <label for="estimation-price" class="relative-label text-muted">Prix unitaire</label> <input type="text" class="form-control calculate-estimation estimation-price" name="product-detail[__increment__][price]" id="estimation-price" minlength="1"></div></div><div class="col-1"><div class="form-group"> <label for="estimation-tax" class="relative-label text-muted">Taux de TVA</label> <select name="product-detail[__increment__][taxe]" id="estimation-tax" class="calculate-estimation calculate-estimation-select"> @foreach($taxes as $tax)<option value="{{ $tax->id }}">{{ $tax->tax }}</option> @endforeach </select></div></div><div class="col-1"><div class="form-group"> <input type="hidden" name="product-detail[__increment__][total-no-tax]" id="total-row-no-tax"> <input type="hidden" name="product-detail[__increment__][total-tax]" id="total-row-tax" class="total_row_tax"> <input type="hidden" name="product-detail[__increment__][total]" id="total-row"> <label for="estimation-total" class="relative-label text-muted">Total HT</label><p class="estimation-total-zone"></p></div></div><div class="col-1 d-flex align-items-center justify-content-center"><div class="input-group justify-content-center"> <i class="fal fa-trash fa-2x"></i></div></div></div><div class="form-group"> <label for="project-description-mission" class="relative-label">Description du produit</label><div class="input-group"><textarea name="product-detail[__increment__][description]" id="estimation-description" class="form-control estimation-description"></textarea></div></div></div></div>'></div>
                        <div class="container-form-widget"></div>

                        <div class="row">
                            <div class="col-12">
                                Total HT : <input type="hidden" name="estimation-total-input" id="grandtotal"> <span id="grandtotal-txt"></span>
                                TVA : <input type="hidden" name="estimation-total-tax" id="estimation-total-tax"><span id="total-tax"></span>
                                Total TTC : <input type="hidden" name="estimation-total-with-taxes" id="estimation-total-with-taxes"><span id="total-with-taxes"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn add-btn add-product-line">Ajouter un produit / service</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn.btn-primary.add-btn').prop('disabled', true);

            $('.service-checkbox').on('click', function () {
                $('.btn.btn-primary.add-btn').prop('disabled', false);
            })

            $('.contact-estimation-container').on('click', function () {
                let container = $(this);
                let checkbox = $(this).find('input[type="radio"]');

                $('.contact-estimation-container').removeClass('selected');

                if(checkbox.prop('checked') === true) {
                    container.find('input[type="radio"]').prop('checked', false);

                } else {
                    container.find('input[type="radio"]').prop('checked', true);
                    container.addClass('selected');
                }
            });

            $('body').on('change', '.calculate-estimation', function () {
                let row = $(this).closest('.product-line');
                let qty = row.find('.estimation-quantity');
                let price = row.find('.estimation-price');
                let total = qty.val() * price.val();
                let totalInput = $('.estimation-total-input');
                let ranktax = row.find('.calculate-estimation-select').children('option:selected').text();

                totalInput.val(qty.val() * price.val());

                if ( price.val().length !== 0) {
                    row.find('p.estimation-total-zone').html(parseFloat(total).toFixed(2));
                    row.find('input#total-row-no-tax').val(parseFloat(total).toFixed(2));
                    row.find('input#total-row-tax').val(parseFloat((total * (ranktax / 100))).toFixed(2));
                    row.find('input#total-row').val(parseFloat((total * (ranktax / 100)) + total).toFixed(2));
                }


                grandTotal = 0;
                totalTax = 0;

                $('p.estimation-total-zone').each(function () {
                    if(!isNaN(parseFloat($(this).html()))) {
                        grandTotal = grandTotal+parseFloat($(this).html());
                    }
                });

                $('input.total_row_tax').each(function () {
                    if(!isNaN(parseFloat($(this).val()))) {
                        totalTax = totalTax+parseFloat($(this).val());
                    }
                })

                $('#grandtotal').val(parseFloat(grandTotal).toFixed(2));
                $('#grandtotal-txt').html(parseFloat(grandTotal).toFixed(2));
                $('#estimation-total-tax').val(parseFloat(totalTax).toFixed(2));
                $('#total-tax').html(parseFloat(totalTax).toFixed(2));
                $('#estimation-total-with-taxes').val(parseFloat(grandTotal + totalTax).toFixed(2));
                $('#total-with-taxes').html(parseFloat((grandTotal + totalTax).toFixed(2)));
            });

            $('.add-product-line').on('click', function () {
                let productLine = $('.exemple');
                let productLineContent = productLine.attr('data-form');
                let productLineId = productLine.attr('data-id');
                newcontent = productLineContent.replace(/__increment__/gm, productLineId);
                productLine.attr('data-id', parseInt(productLineId)+1);

                $('.container-form-widget').append(newcontent);

            });
        });
    </script>
@endsection
