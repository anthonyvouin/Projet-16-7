@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">



        <h3 class="text-center">Ajouter une catégorie</h3>
        <div class="row justify-content-center">
            <div class="col-md-10 mt-2">

                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom de la catégorie">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection