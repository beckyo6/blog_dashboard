@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle"></span>
            <h3 class="page-title">ajout d'un article</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    <form class="add-new-post">
                        <input class="form-control form-control-lg mb-3" type="text" placeholder="Your Post Title">
                        <div id="editor-container" class="add-new-post__editor mb-1"></div>
                    </form>
                </div>
            </div>
            <!-- / Add New Post Form -->
        </div>
        <div class="col-lg-3 col-md-12">
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Actions</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">flag</i>
                                <strong class="mr-1">Status:</strong> Article
                                {{--<a class="ml-auto" href="#">Edit</a>--}}
                            </span>
                            {{--<span class="d-flex mb-2">
                                <i class="material-icons mr-1">visibility</i>
                                <strong class="mr-1">Visibility:</strong>
                                <strong class="text-success">Public</strong>
                                <a class="ml-auto" href="#">Edit</a>
                            </span>
                            <span class="d-flex mb-2">
                                <i class="material-icons mr-1">calendar_today</i>
                                <strong class="mr-1">Schedule:</strong> Now
                                <a class="ml-auto" href="#">Edit</a>
                            </span>
                            <span class="d-flex">
                                <i class="material-icons mr-1">score</i>
                                <strong class="mr-1">Readability:</strong>
                                <strong class="text-warning">Ok</strong>
                            </span>--}}
                        </li>
                        <li class="list-group-item d-flex px-3">
                            {{--<button class="btn btn-sm btn-outline-accent">
                                <i class="material-icons">save</i> Save Draft
                            </button>--}}
                            <button class="btn btn-sm btn-accent ml-auto">
                                <i class="material-icons">file_copy</i> Publier
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- / Post Overview -->
            <!-- Post Overview -->
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <h6 class="m-0">Categories</h6>
                </div>
                <div class='card-body p-0'>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-3 pb-2">
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $categorie)
                                    <div class="custom-control custom-checkbox mb-1">
                                        <input type="checkbox" class="custom-control-input" name="category_id" id="category1" checked>
                                        <label class="custom-control-label" for="category1">{{ $categorie->titre }}</label>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info text-center" alt="alert">
                                    Aucune catéorie existante
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <!-- / Post Overview -->
        </div>
    </div>
@endsection
