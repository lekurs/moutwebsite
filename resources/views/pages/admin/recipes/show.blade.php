@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Recettes
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('homeAdmin') }}">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                <a href="{{ route('clients.show', $recipe->client->slug) }}">Recette</a> / {{ $recipe->label }}
            </li>
        </ul>
    </div>
@endsection
@section('body')
    <div class="row edit-client-form-container">
        <div class="col-12">
            <H2>Retours de la recette client</H2>
        </div>
    </div>
    <div class="row edit-client-form-container">
        <div class="col-12 my-3">
            <div class="row">
                <div class="col-8">
                    <h3 class="recipe-label"><i class="fal fa-arrow-alt-right"></i> {{ $recipe->label }} <i class="fal fa-arrow-alt-left"></i></h3>
                </div>
                <div class="col-4 text-right">Créé par : <span class="recipe-author">{{ $recipe->user->name }}</span></div>
            </div>
            <div class="row">
                <div class="col-12">
                    {!! $recipe->description !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row edit-client-form-container">
        @forelse( $recipe->recipeDetails as $detail )
            <div class="my-2 recipe_container @if( $detail->user_id === auth()->user()->id) text-right my_recipe @else text-left other_recipe @endif ">
                <div class="recipe_content py-2">
                    <H6 class="recipe_author">De : {{ $detail->user->name }}</H6>
                    {!! $detail->description !!}
                    @if (!is_null($detail->picture_path))
                        <button type="button" class="recipe_show_img my-2 btn @if( $detail->user_id === auth()->user()->id)own @endif">Voir l'image</button>
                        <img src="{{ asset('storage/images/uploads/' . $recipe->client->slug . '/projets/' . $recipe->project->slug . '/recipe/' . $detail->picture_path) }}" alt="{{ $detail->slug }}" class="img-fluid recipe_img my-4">
                    @endif
                </div>
            </div>

        @empty
            <div class="col-12">Pas de commentaire</div>

        @endforelse
    </div>
    <div class="row edit-client-form-container">
        <div class="col-12 mb-4">
            <button type="button" class="btn add-btn recipe_response" @if($recipe->status == 0)disabled @endif>Répondre</button>
        </div>
        <div class="col-12 hide-response my-3">
            <form action="{{ route('recipedetails.store', $recipe->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('layouts.form_errors.errors')
                <input type="hidden" name="recipe_page_id" id="recipe_page_id" value="{{ $recipe->page_id }}">
                <input type="hidden" name="recipe_label" id="recipe_label" value="{{ $recipe->label }}">
                <div class="form-group">
                    <div class="input-group">
                        <textarea name="recipe_description" id="recipe_description" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <label for="recipe_answer_image" class="col-12">Envoyer votre image</label>
                        <input type="file" class="form-control" name="recipe_answer_image" id="recipe_answer_image">
                    </div>
                </div>
                <button type="submit" class="btn add-btn">Enregistrer</button>
            </form>
        </div>
    </div>

    <div class="row edit-client-form-container">
        <div class="col-12">
                <a href="{{ route('recipes.update.status', $recipe->slug) }}" class="btn w-100 add-btn @if($recipe->status > 0)close-btn @else in-progress-btn @endif">@if($recipe->status > 0)Déclarer la recette comme terminée @else Activer la recette clôturée ? @endif</a>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#recipe_description').summernote({
            placeholder: 'Enregistrez votre réponse',
            height: 150,
            width: '100%'
        });

        $('.recipe_show_img').click(function () {
            $('.recipe_img').toggle();
        })

        $('.recipe_response').click(function () {
           $('.hide-response').toggle();
        });
    </script>
@endsection
