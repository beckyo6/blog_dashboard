@push('styles')
    <link rel="stylesheet" href="{{ asset('styles/quill.snow.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
@endpush
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
                    <form method="post" action="{{ route('article.cover') }}" enctype="multipart/form-data"
                        class="dropzone" id="dropzone">
                        @csrf
                    </form>
                    <form class="add-new-post">
                        {{-- TODO: get image of article --}}
                        <input class="form-control form-control-lg mb-3" id="titre" name="titre" type="text"
                            placeholder="le titre de votre article">
                        <div id="editor" class="add-new-post__editor mb-1"></div>
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
                            </span>
                        </li>
                        <li class="list-group-item d-flex px-3">
                            <button class="btn btn-sm btn-accent ml-auto" onclick="publish()">
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
                                        <input type="checkbox" class="custom-control-input" name="category_id"
                                            id="category1" checked>
                                        <label class="custom-control-label"
                                            for="category1">{{ $categorie->titre }}</label>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info text-center" alt="alert">
                                    Aucune catéorie existante
                                </div>
                            @endif
                        </li>
                    </ul>

                    {{-- test results --}}
                    <div>
                        {!! '<p id="preview"></p>' !!}
                    </div>
                </div>
            </div>
            <!-- / Post Overview -->
        </div>
    </div>
    @push('scripts')
        <!-- Include the Quill library -->
        <script src="{{ asset('scripts/quill.min.js') }}"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <!-- Initialize Quill editor -->
        <script>
            var toolbarOptions = [
                [{
                    'header': [1, 2, 3, 4, 5, false]
                }],
                ['bold', 'italic', 'underline', 'strike'], // toggled buttons
                ['blockquote', 'code-block'],
                [{
                    'header': 1
                }, {
                    'header': 2
                }], // custom button values
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }], // superscript/subscript
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }], // outdent/indent        // remove formatting button
            ];
            var quill = new Quill('#editor', {
                modules: {
                    toolbar: toolbarOptions
                },
                placeholder: 'Les mots peuvent être comme des rayons X si vous les utilisez correctement...',
                theme: 'snow'
            });

            function publish() {
                // TODO: get image of article
                // TODO: optimise 
                var titre = document.getElementById('titre').value;
                var content = quill.root.innerHTML;

                var category_id = document.getElementsByName('category_id');
                var category_id_array = [];
                for (var i = 0; i < category_id.length; i++) {
                    if (category_id[i].checked) {
                        category_id_array.push(category_id[i].value);
                    }
                }

                var data = {
                    titre: titre,
                    contenu: content,
                    category_id: category_id_array,
                    user_id: {{ Auth::user()->id }}
                };

                // TODO: check if all fields are filled
                if (titre != '' && content != '' && category_id_array.length > 0) {
                    axios.post('/article', data)
                        .then(function(response) {
                            console.log(response);
                            if (response.data == true) {
                                alert('Article publié');
                                window.location.href = '/articles';
                            } else {
                                alert('Erreur');
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                } else {
                    alert('Veuillez remplir tous les champs');
                }
            }
        </script>
        <script type="text/javascript">
            Dropzone.options.dropzone = {
                maxFilesize: 10,
                resizeQuality: 1.0,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 60000,
                removedfile: function(file) {
                    var name = file.upload.filename;
                    $.ajax({
                        // headers: {
                        //     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        // },
                        type: 'POST',
                        url: '{{ url('cover/destroy') }}',
                        data: {
                            imageName: name,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                success: function(file, response) {
                    console.log(response);
                },
                error: function(file, response) {
                    return false;
                }
            };
        </script>
    @endpush
@endsection
