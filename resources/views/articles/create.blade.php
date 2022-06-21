{{-- here we create the tile of article, choose a category and get the cover image --}}
@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle"></span>
            <h3 class="page-title">Creation d'un article</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    <form class="add-new-post" method="POST" action="{{ route('article.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" hidden>
                        <div class="form-group col-md-12">
                            <label for="titre">Titre</label>
                            <input class="form-control form-control-lg mb-3" id="titre" name="titre" type="text"
                                placeholder="titre de votre article" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="category">Categorie</label>
                            <select id="category" name="category_id" class="form-control" required>
                                <option selected disabled>Choisir une categorie</option>
                                @foreach (App\Models\Categorie::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->titre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="cover">Image de couverture</label>
                            <input class="form-control form-control-lg mb-3" name="cover" id="cover" type="file"
                                required>
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn btn-primary">Valider et continuer</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- / Add New Post Form -->
        </div>
    </div>
@endsection
