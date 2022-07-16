@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-2">
                @include('backend.inc.message')
                <h3 class="text-center">Mettre à jour une sous-catégorie</h3>
                <div class="card">
                    <div class="card-body">

                        <form class="forms-sample" action="{{route('subcategory.store')}}" method="post">@csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom de la sous-catégorie">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="name">Choix de la catégorie</label>
                                <select class="form-control  @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="">Choisi une catégorie</option>
                                    @foreach (App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}"> {{$category->name}}</option>

                                    @endforeach
                                </select>
                                @error('category_id')
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