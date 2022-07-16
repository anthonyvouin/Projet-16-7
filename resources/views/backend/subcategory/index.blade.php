@extends('backend.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        @include('backend.inc.message')
        <h3 class="text-center">Gérer les sous-catégories</h3>
        <div class="row justify-content-center">


            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Categorie</th>
                                        <th>Nom</th>
                                        <th>Editer</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($subcategories as $subcategory)
                                    <tr>
                                        <td class="categrory_{{ $subcategory->category_id }}">{{$subcategory->category->name}}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td>
                                            <a href="{{ route('subcategory.edit', [$subcategory->id]) }}"><button class="btn tn-sm btn-info">
                                                    <i class="mdi mdi-table-edit"></i>
                                                </button>
                                            </a>

                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $subcategory->id }}">
                                                <i class="mdi mdi-delete"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $subcategory->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="post">@csrf
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


                                        </td>
                                    </tr>
                                    @empty
                                    <td>aucune catégorie à afficher</td>>
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
<style>
    td.categrory_1 {
        background-color: aliceblue;
    }

    td.categrory_2 {
        background-color: bisque;
    }

    td.categrory_3 {
        background-color: thistle;
    }

    td.categrory_4 {
        background-color: tomato;
    }

    td.categrory_5 {
        background-color: gray;
    }

    td.categrory_6 {
        background-color: unset;
    }

    td.categrory_7 {
        background-color: springgreen;
    }

    td.categrory_8 {
        background-color: orchid;
    }

    td.categrory_9 {
        background-color: pink;
    }
</style>



@endsection