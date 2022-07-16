@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-3">
            @include('sidebar')
        </div>
        <div class="col-md-9">
            @include('backend.inc.message')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">Nom</th>
                        <th scope="col">Editer</th>





                    </tr>
                </thead>
                <tbody>
                    @forelse($ads as $key =>$ad)
                    <tr>

                        <th scope="row">{{ $key + 1 }}</th>
                        <td>
                            <a href="{{ route('product.view', [$ad->id, $ad->slug]) }}" target="_blank">{{ $ad->name }}</a>

                        </td>
                        <td>
                            <a href="{{route('ads.edit', $ad->id)}}">Editer</a>
                        </td>




                    </tr>
                    @empty
                    <td>Vous n'avez aucune annonce en attente</td>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection