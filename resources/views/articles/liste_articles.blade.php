@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle"></span>
            <h3 class="page-title">Liste des articles</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            @if ($articles->isNotEmpty())
                @foreach ($articles as $article)
                    <div class="card card-small card-post card-post--1">
                        <div class="card-post__image" style="background-image: url('images/content-management/1.jpeg');">
                            <a href="#" class="card-post__category badge badge-pill badge-dark">{{$article->catégorie}}</a>
                            <div class="card-post__author d-flex">
                                <a href="#" class="card-post__author-avatar card-post__author-avatar--small"
                                    style="background-image: url('images/avatars/0.jpg');">Written by {{$article->name}}</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a class="text-fiord-blue" href="#">{{$article->titre}}</a>
                            </h5>
                            <p class="card-text d-inline-block mb-3">{{$article->contenu}}</p>
                            <span class="text-muted">{{$article->created_at}}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info text-center" alt="alert">
                     Aucune article existante
                </div>
            @endif
        </div>
    </div>
@endsection
