@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle"></span>
            <h3 class="page-title">Liste des articles</h3>
        </div>
    </div>
    <div class="row">
        @if ($articles->isNotEmpty())
            @foreach ($articles as $article)
                <div class="col-lg-4">
                    <div class="card card-small card-post mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->titre }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($article->contenu, 100) }}</p>
                        </div>
                        <div class="card-footer border-top d-flex">
                            <div class="card-post__author d-flex">
                                <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                                    style="background-image: url('images/avatars/0.jpg');"></a>
                                <div class="d-flex flex-column justify-content-center ml-3">
                                    <span class="card-post__author-name">{{ $article->name }}</span>
                                    <small class="text-muted">{{ $article->created_at }}</small>
                                </div>
                            </div>
                            <div class="my-auto ml-auto">
                                <a class="btn btn-sm btn-primary" href="#">
                                    Lire
                                </a>
                            </div>
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
