@extends('layouts.app')
@section('content')

<div class="slider" style="margin-top: -25px;">
    <div id="carouselExampleSlidesOnly" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/slider/3.jpg" alt="First slide">
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <h1>Top catégories</h1>
    <div class="row text-center mt-5">
        @foreach ($categories as $category)
        <div class="col-lg-3 col-md-4 col-lg" id="card">
            <a href="{{route ('category.show', $category->slug)}}" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="{{Storage::url($category->image) }}" style="min-height: 250px"></img>
                <p class="">{{$category->name}}</p>
            </a>

        </div>

        @endforeach
    </div>
</div>

<div class=" container mt-5">
    <span>
        <h1>Les tournois du moment</h1>
        <a href="{{route('category.show', $categoryTournois->slug) }}" class="float-right" data-ride="carousel" data-interval="2500">Voir l'ensemble</a>
    </span>
    <br>
    <div id="carouselExampleFade" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    @forelse($firstAdsForTournois as $firstAdsForTournois)
                    <div class="col-3">
                        <a href="{{route('product.view',[$firstAdsForTournois->id, $firstAdsForTournois->slug ] ) }}">
                            <img src="{{Storage::url($firstAdsForTournois->feature_image) }}" class="img-thumbnail" style="min-height: 250px;">
                            <p class="text-center card-footer" style="color: #222;">{{$firstAdsForTournois->name}} / {{$firstAdsForTournois->price}} €
                            </p>
                        </a>


                    </div>
                    @empty

                    @endforelse

                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    @forelse($secondsAdsForTournois as $secondsAdsForTournois)
                    <div class="col-3">
                        <a href="{{route('product.view',[$secondsAdsForTournois->id, $secondsAdsForTournois->slug ] ) }}">

                            <img src="{{Storage::url($secondsAdsForTournois->feature_image) }}" class="img-thumbnail" style="min-height: 250px;">
                            <p class="text-center card-footer" style="color: #222;">
                                {{$secondsAdsForTournois->name}} / {{$secondsAdsForTournois->price}} €
                            </p>
                        </a>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>

        </div>

    </div>

</div>






<div class="container mt-5">
    <span>
        <h1>Les échanges du moment</h1>
        <a href="{{route('category.show', $categoryTournois->slug) }}" class="float-right" data-ride="carousel" data-interval="2500">Voir l'ensemble</a>

    </span>
    <br>
    <div id="carouselExampleFade" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row">
                    @forelse($firstAds as $firstad)
                    <div class="col-3">
                        <a href="{{route('product.view',[$firstad->id, $firstad->slug ] ) }}">
                            <img src="{{Storage::url($firstad->feature_image) }}" class="img-thumbnail" style="min-height: 250px;">
                            <p class="text-center card-footer" style="color: #222;">{{$firstad->name}} / {{$firstad->price}} €
                            </p>
                        </a>


                    </div>
                    @empty

                    @endforelse

                </div>
            </div>
            <div class="carousel-item">
                <div class="row">
                    @forelse($secondsAds as $secondsad)
                    <div class="col-3">
                        <a href="{{route('product.view',[$firstad->id, $firstad->slug ] ) }}">

                            <img src="{{Storage::url($secondsad->feature_image) }}" class="img-thumbnail" style="min-height: 250px;">
                            <p class="text-center card-footer" style="color: #222;">
                                {{$secondsad->name}} / {{$secondsad->price}} €
                            </p>
                        </a>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>

        </div>

    </div>

</div>



@endsection

<style>
    #card a:hover {
        background-color: red;
        color: #fff;
    }
</style>