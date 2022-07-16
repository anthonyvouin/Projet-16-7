@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @include('backend.inc.message')
        <h3 class="text-center">Gérer les annonces</h3>
        <div class="row justify-content-center">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Vendeur</th>
                                        <th>Image</th>
                                        <th>Nom</th>
                                        <th>Voir</th>
                                        <th>Supprimer</th>
                                        <th>Date de publication</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($ads as $ad)
                                    <tr>
                                        <td>
                                            @if($ad->user->avatar)
                                            <img src="{{Storage::url($ad->user->avatar)}}" width="120">
                                            @else
                                            <img src="/img/manjpg" width="120">
                                            @endif
                                            <a target=" _blank" href="{{route('show.user.ads', $ad->user->id )}}">{{$ad->user->name}}</a>
                                        </td>



                                        <td><img src="{{Storage::url($ad->feature_image)}}"></td>
                                        <td>{{ $ad->name }}</td>

                                        <td>
                                            <a href="{{route('product.view',[$ad->id,$ad->slug]) }}">
                                                <button class="btn btn-primary">Voir</button>
                                            </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $ad->id }}">
                                                <i class="mdi mdi-delete"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $ad->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('ads.destroy', $ad->id) }}" method="post">@csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer
                                                                    confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Êtes-vous sûr de bien vouloir supprimer cet élément ?</p>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                                <button type="submit" class="btn btn-danger">Oui je souhaite supprimer</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <td>
                                                {{$ad->created_at->format('Y-m-d')}}
                                            </td>


                                        </td>
                                    </tr>
                                    @empty
                                    <td>Aucune annonce à afficher</td>>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection