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

            <form action="{{ route('ads.update',$ad->id) }}" method="post" enctype="multipart/form-data">@csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header text-white" style="background-color: red">
                        Mettre à jour l'annonce
                    </div>
                    <div class="card-body">
                        <label for="file" class="mt-2"><b>Ajouter 3 photos</b></label>
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
                        <label for="file" class="mt-2"><b>Choix catégorie</b></label>
                        <div class="form-inline form-group mt-1">

                            <category-dropdown />



                        </div>

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" value="{{$ad->name}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="mytextarea" class="form-control">{{$ad->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Prix</label>
                            <input type="text" name="price" class="form-control" value="{{$ad->price}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Statut du prix</label>
                            <select class="form-control" name="price_status">
                                <option value="negoitable" {{$ad->price_status=="negoitable"?'selected':''}}>Negociable</option>
                                <option value="fixed" {{$ad->price_status=="fixed"?'selected':''}}>Fixe</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Condition</label>
                            <select class="form-control" name="product_condition">
                                <option value="">Selectionner </option>
                                <option value="likenew" {{$ad->product_condition=="likenew"?'selected':''}}>Ressemble à nouveau</option>
                                <option value="heavilyused" {{$ad->product_condition=="heavilyused"?'selected':''}}>Très utilisé</option>
                                <option value="new" {{$ad->product_condition=="new"?'selected':''}}>Nouveau</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="listing_location" value="{{$ad->listing_location}}">
                        </div>
                        <label for="file" class="mt-2"><b>Adresse</b></label>
                        <div class="form-inline form-group mt-1">

                            <country-dropdown />
                        </div>
                        <div class="form-group">
                            <label for="location">Numero téléphone</label>
                            <input type="number" class="form-control" name="phone_number" value="{{$ad->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label for="location">Vidéo youtube</label>
                            <input type="text" class="form-control" name="link" value="{{$ad->link}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger float-right" type="submit">Mettre à jour</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection