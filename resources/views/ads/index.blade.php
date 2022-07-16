@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('sidebar')
        </div>
        <div class="col-md-9">
            @include('backend.inc.message')

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editer</th>
                        <th scope="col">Voir</th>
                        <th scope="col">Supprimer</th>



                    </tr>
                </thead>
                <tbody>
                    @forelse($ads as $key =>$ad)
                    <tr>
                        <th scope="row">{{$key+1}}</th>

                        <td style="width: 200px;height:130px;">
                            <div id="carouselExampleControls{{$ad->id}}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ Storage::url($ad->feature_image) }}" width="150">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ Storage::url($ad->first_image) }}" width="150">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ Storage::url($ad->second_image) }}" width="150">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls{{$ad->id}}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Retour</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls{{$ad->id}}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Suivant</span>
                                </a>
                            </div>

                        </td>

                        <td>{{$ad->name}}</td>
                        <td>{{$ad->price}}€</td>
                        <td>
                            @if($ad->published ==1)
                            <span class="badge badge-success">Publier</span>
                            @else
                            <span class="badge badge-danger">En attente</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('ads.edit', [$ad->id]) }}"> <button class="btn btn-primary">Editer</button></a>
                        </td>
                        <td>
                            <a target="_blank" href="{{route('product.view', [$ad->id,$ad->slug] )}}">
                                <button class="btn btn-info">Voir</button>
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$ad->id}}">
                                Delete
                            </button>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$ad->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{route('ads.destroy',$ad->id )}}" method="post">@csrf
                                        @method('DELETE')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de bien vouloir supprimer cet élément?

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-danger">Oui,je supprime</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>





                        </td>


                    </tr>
                    @empty
                    <td>Vous n'avez aucune annonce</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>



</div>
</div>

@endsection