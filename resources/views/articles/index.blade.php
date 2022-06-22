@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Articles</span>
            <h3 class="page-title">Liste des articles</h3>
        </div>
        <div class="col-12 col-sm-6 text-center text-sm-right mb-0">
            <a href="{{ route('article.create') }}" class="btn btn-accent">
                <i class="material-icons">note_add</i>
                Ajouter un article</a>
        </div>
    </div>
    <div class="row">
        @if ($articles->isNotEmpty())
            @foreach ($articles as $article)
                <div class="col-lg-6 col-sm-12 mb-4">
                    <div class="card card-small card-post card-post--aside card-post--1">
                        <div class="card-post__image" style="background-image: url('{{ asset($article->image) }}');">
                            <a href="#"
                                class="card-post__category badge badge-pill badge-primary">{{ $article->categorie->titre }}</a>
                            <div class="card-post__author d-flex">
                                <a href="#" class="card-post__author-avatar card-post__author-avatar--small mr-2"
                                    style="background-image: url('images/avatars/0.jpg');">
                                </a>
                                <span class="text-white text-uppercase">{{ $article->user->name }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="text-fiord-blue" href="#">{{ $article->titre }}</a>
                            </h5>
                            <p class="card-text d-inline-block mb-3">{!! Str::limit($article->contenu, 300) !!}</p>
                            <hr />
                            <span class="text-muted">{{ $article->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info text-center" alt="alert">
                Aucune article existante
            </div>
        @endif
    </div>
@endsection
