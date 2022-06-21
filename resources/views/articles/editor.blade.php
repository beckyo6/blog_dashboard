@extends('templates.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('styles/quill.snow.min.css') }}">
@endpush
@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h3 class="page-title">{{ $article->titre }}</h3>
            <span class="page-subtitle">
                Categorie: <span class="text-uppercase">{{ $article->categorie->titre }}</span>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-small mb-3">
                <div class="card-body">
                    <form class="add-new-post">
                        <div id="editor" class="add-new-post__editor mb-1"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class='card card-small mb-3'>
                <div class="card-header border-bottom">
                    <button class="btn btn-block btn-accent ml-auto" onclick="publish()">
                        <i class="material-icons">file_publish</i> Publier l'article
                    </button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('scripts/quill.min.js') }}"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            var toolbarOptions = [
                [{
                    'header': [1, 2, 3, 4, 5, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{
                    'header': 1
                }, {
                    'header': 2
                }],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
            ];
            var quill = new Quill('#editor', {
                modules: {
                    toolbar: toolbarOptions
                },
                placeholder: 'Commencer a ecire votre article ici...',
                theme: 'snow'
            });

            function publish() {
                var content = quill.root.innerHTML;
                if (content != '') {
                    axios.post("{{ route('article.update', $article->id) }}", {
                            contenu: content,
                        })
                        .then(function(response) {
                            console.log(response);
                            if (response.data == true) {
                                alert('Article publié avec succes');
                                window.location.href = '/articles';
                            } else {
                                alert('une Erreur s\'es produite, veuillez ressayer');
                            }
                        })
                        .catch(function(error) {
                            alert('une Erreur s\'es produite, veuillez contactez votre administrateur systeme');
                            console.log(error);
                        });
                } else {
                    alert('Veuillez ecrire un article consistant');
                }
            }
        </script>
    @endpush
@endsection
