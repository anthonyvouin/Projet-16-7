@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('backend.inc.message')
                <h3 class="text-center">Ajouter une catégorie enfant</h3>
                <div class="card">

                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('childcategory.store') }}" method="post">@csrf
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom de la catégorie enfant">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Choisir la sous-catégorie</label>
                                <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                                    <option value="">Selectionner la sous-catégorie</option>
                                    @foreach (App\Models\Subcategory::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>Í
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