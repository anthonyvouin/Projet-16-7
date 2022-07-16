@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row ">



        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color: red;">Filtrer </div>
                <div class="card-body">
                    @foreach($filterBySubcategory as $subcategory)
                    <p>

                        <a href="  {{url()->current()}}/{{($subcategory->slug)??''}}">
                            {{$subcategory->name??''}}
                        </a>

                    </p>
                    @endforeach
                </div>
            </div>
            <br>
            <form action="{{url()->current()}}" method="GET">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Minimum price</label>
                            <input type="text" name="minPrice" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Maximum price</label>
                            <input type="text" name="maxPrice" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Rechercher</button>

                        </div>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-md-9">

            @include('breadcrumb')


            <div class="row">
                @forelse($advertisements as $advertisement)
                <div class="col-3">
                    <a href="{{route('product.view',[$advertisement->id,$advertisement->slug])}}">
                        <img src="{{Storage::url($advertisement->feature_image)}}" class="img-thumbnail" width="300">
                        <p class="text-center  card-footer" style="color: #222;">
                            {{$advertisement->name}} / {{$advertisement->price}} €
                        </p>
                </div>
                </a>


                @empty

                Désolé, nous ne pouvons pas trouver de produit basé sur cette catégorie
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection




