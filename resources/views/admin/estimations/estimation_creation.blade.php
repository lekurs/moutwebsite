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
                <a href="{{ route('clientShowOne', $client->slug) }}">Client</a> / <a href="#">Devis</a> / Créer
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <form action="{{ route('estimationStore', $client->slug) }}" method="post" enctype="multipart/form-data">
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
                                    <span class="text-muted edit-client-estimation-link"><a href="{{ route('clientEditForm', $client->slug) }}">Modifier le client</a></span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="estimation-reference" class="relative-label">Numéro du devis</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="estimation-reference" id="estimation-reference" aria-label="Numéro du devis" placeholder="Numéro du devis" @isset($estimation) value="{{ $estimation->reference }}" @endisset>
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
                                    <div class="row">
                                    @foreach($client->contacts as $contact)
                                        <div class="col-3 contact-estimation-container">
                                            <input type="radio" value="{{ $contact->slug }}" name="estimation-contact" class="contact-radio-value">
                                            <div class="contact-check-container"></div>
                                            <div class="contact-details-container">
                                                <p>{{ $contact->name }}  {{ $contact->lastname }}</p>
                                                <p class="text-muted">{{ $contact->email }}</p>
                                                <p class="text-muted">{{ $contact->contact_function }}</p>

                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    @foreach($services as $service)
                                        <input type="checkbox" value="{{ $service->id }}" name="estimation-service[]" id="estimation-service-{{ $service->slug }}">
                                        <label for="estimation-service[]"  class="mr-2">{{ $service->libelle }}</label>
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
                        <div class="row product-line-container">
                            <div class="col-12">
                                <div class="row product-line">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="estimation-product" class="relative-label text-muted">Produit / Service</label>
                                            <input type="text" class="form-control" name="estimation-product[]" id="estimation-product" placeholder="Produit">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="estimation-quantity" class="relative-label text-muted">Quantité</label>
                                            <input type="number" class="form-control calculate-estimation estimation-quantity" name="estimation-quantity[]" id="estimation-quantity" minlength="1">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="estimation-price" class="relative-label text-muted">Prix unitaire</label>
                                            <input type="number" class="form-control calculate-estimation estimation-price" name="estimation-price[]" id="estimation-price" minlength="1">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <label for="estimation-total" class="relative-label text-muted">Total</label>
                                            <p class="estimation-total-zone"></p>
                                        </div>
                                    </div>
                                    <div class="col-1 d-flex align-items-center justify-content-center">
                                        <div class="input-group justify-content-center">
                                            <i class="fal fa-trash fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="project-description-mission" class="relative-label">Description du devis</label>
                                    <div class="input-group">
                                        <textarea name="estimation-description[]" id="estimation-description" class="form-control estimation-description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                Total : <input type="hidden" name="estimation-total-input" id="grandtotal"> <span id="grandtotal-txt"></span>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
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

                totalInput.val(qty.val() * price.val());

                if ( price.val().length !== 0) {
                    row.find('p.estimation-total-zone').html(total);
                }

                grandTotal = 0;

                $('p.estimation-total-zone').each(function () {
                    if(!isNaN(parseFloat($(this).html()))) {
                        grandTotal = grandTotal+parseFloat($(this).html());
                    }
                });
                $('#grandtotal').val(grandTotal);
                $('#grandtotal-txt').html(grandTotal);
            });

            $('.add-product-line').on('click', function () {
                let productLine = $('.product-line-container:first');

                let newLine = $(productLine).clone().insertAfter('.product-line-container:last');

                inputs = newLine.find('input');
                textarea = newLine.find('textarea');
                totalZone = newLine.find('p.estimation-total-zone');
                inputs.val('');
                textarea.val('');
                totalZone.html('');

            });
        });
    </script>
@endsection
