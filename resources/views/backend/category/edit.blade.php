@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">



        <h3 class="text-center">Mettre à jour une catégorie</h3>
        <div class="row justify-content-center">
            <div class="col-md-10 mt-2">

                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" action="{{route('category.update',[$category->id] )}}" method="post" enctype="multipart/form-data">@csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nom de la catégorie">
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
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection