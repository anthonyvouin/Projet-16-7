@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-3">
            @include('sidebar')
        </div>
        <div class="col-md-9">
            @if ($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>

                </button>
                @foreach ($errors->all() as $errorMessage)
                <li>{{ $errorMessage }}</li>
                @endforeach
            </div>
            @endif

            <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data">@csrf
                <div class="card">
                    <div class="card-header text-white" style="background-color: red">

                        Publiez votre annonce.
                    </div>
                    <div class="card-body">
                        <label for="file" class="mt-2"><b>Ajouter 3 images</b></label>
                        <div class="form-inline form-group mt-1">

                            <div class="col-md-4">
                

                                <image-preview />
                            </div>

                            <div class="col-md-4">
                                <first-image />
                            </div>

                            <div class="col-md-4">
                                <second-image />
                            </div>

                        </div>
                        <label for="file" class="mt-2"><b>Choix category</b></label>
                        <div class="form-inline form-group mt-1">

                            <category-dropdown />


                        </div>

                        <div class="form-group">
                            <label for="name">Nom</label>


                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">


                            <label for="description">Description</label>



                            <textarea name="description" id="mytextarea" class="form-control">

                                </textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Prix</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Prix statut</label>
                            <select class="form-control" name="price_status">
                                <option value="negoitable">Negociable</option>
                                <option value="fixed">Fixe</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Condition</label>
                            <select class="form-control" name="product_condition">
                                <option value="">Selectionner </option>
                                <option value="likenew">
                                    Ressemble à nouveau</option>
                                <option value="heavilyused">Très utilisé</option>
                                <option value="new">Nouveau</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="listing_location">
                        </div>
                        <label for="file" class="mt-2"><b>Adresse</b></label>
                        <div class="form-inline form-group mt-1">

                            <country-dropdown />
                        </div>
                        <div class="form-group">
                            <label for="location">Numéro téléphone</label>
                            <input type="number" class="form-control" name="phone_number">
                        </div>
                        <div class="form-group">
                            <label for="location">Video youtube</label>
                            <input type="text" class="form-control" name="link">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger float-right" type="submit">Créer</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection