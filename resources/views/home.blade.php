@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle"></span>
            <h3 class="page-title">Dashboard du blog</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Articles</span>
                            <h6 class="stats-small__value count my-3">{{App\Models\Article::count()}}</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="text-center">total</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Catégories</span>
                            <h6 class="stats-small__value count my-3">{{App\Models\Categorie::count()}}</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="text-center">total</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                        <div class="stats-small__data text-center">
                            <span class="stats-small__label text-uppercase">Commmentaires</span>
                            <h6 class="stats-small__value count my-3">0</h6>
                        </div>
                        <div class="stats-small__data">
                            <span class="text-center">total</span>
                        </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
