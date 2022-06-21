@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-6 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Catégories</span>
            <h3 class="page-title">Liste des Catégories</h3>
        </div>
        <div class="col-12 col-sm-6 text-center text-sm-right mb-0">
            <a href="{{ route('categorie.create') }}" class="btn btn-accent">
                <i class="material-icons">tag</i>
                Ajouter une Catégorie
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Ajouter une catégorie</h6>
                </div>
                @if (session('success'))
                    <div class="alert alert-success text-center msg" id="error">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
                @if (session('alert'))
                    <div class="alert alert-success text-center msg" id="error">
                        <strong>{{ session('alert') }}</strong>
                    </div>
                @endif
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#</th>
                                <th scope="col" class="border-0">Titre</th>
                                <th scope="col" class="border-0">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->isNotEmpty())
                                @foreach ($categories as $categorie)
                                    <tr>
                                        <td>PD-{{ $categorie->id }}</td>
                                        <td>{{ $categorie->titre }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Action Frais">
                                                {{-- <a href='{{ url("categorie/$categorie->id/edit") }}'
                                                    class="btn btn-sm btn-primary">
                                                    Modifier
                                                </a> --}}
                                                <a href='{{ url("categorie/$categorie->id/delete") }}'
                                                    class="btn btn-sm btn-danger text-white">
                                                    Supprimer
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-info text-center" alt="alert">
                                    Aucune catéorie existante
                                </div>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
