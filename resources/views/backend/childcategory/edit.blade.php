@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('backend.inc.message')
                <h3 class="text-center">Mettre à jour la catégorie enfant </h3>
                <div class="card">

                    <div class="card-body">

                        <form class="forms-sample" action="{{ route('childcategory.update',[$childcategory->id]) }}" method="post">@csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$childcategory->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>

                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Choisir une sous-catégorie</label>
                                <select class="form-control @error('subcategory_id') is-invalid @enderror" name="subcategory_id">
                                    <option value="">Sélectionner une sous-catégorie</option>
                                    @foreach (App\Models\Subcategory::all() as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{$childcategory->subcategory_id == $subcategory->id ? 'selected':''}}>{{ $subcategory->name }}</option>Í
                                    @endforeach
                                </select>
                                @error('subcategory_id')
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