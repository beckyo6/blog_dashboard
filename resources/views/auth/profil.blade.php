@extends('templates.app')
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title">Votre profile</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card  mb-4 ">
                <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                        <img class="rounded-circle" src="images/avatars/0.jpg" alt="User Avatar" width="110">
                    </div>
                    <h4 class="mb-0">{{ $user->name}}</h4>
                    <span class="text-muted d-block mb-2">{{ $user->access}}</span>
                </div>
                <ul class="list-group list-group-flush">
                    
                    <li class="list-group-item p-4">
                        <strong class="text-muted d-block mb-2">Description</strong>
                        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eaque, quidem, commodi soluta
                            qui quae minima obcaecati quod dolorum sint alias, possimus illum assumenda eligendi
                            cumque?</span>
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
@endsection
