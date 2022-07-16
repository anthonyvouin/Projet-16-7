@extends('layouts.app')
@section('content')

<div class="container ">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ Storage::url($advertisement->feature_image) }}" class="d-block w-100" alt="..." width="320">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ Storage::url($advertisement->first_image) }}" class="d-block w-100" alt="..." width="320">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ Storage::url($advertisement->second_image) }}" class="d-block w-100" alt="..." width="320">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <p>{!! $advertisement->description !!}</p>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">Plus d'informations</div>
                <div class="card-body">
                    <p>Country: {{ $advertisement->country->name??''}}</p>
                    <p>State: {{ $advertisement->state->name??'' }}</p>
                    <p>City: {{ $advertisement->city->name??''}}</p>
                    <p>Condtion: {{ $advertisement->product_condition??''}}</p>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {!! $advertisement->displayVideoFromLink() !!}
                </div>

            </div>


        </div>
        <div class="col-md-6">
            <h1>{{ $advertisement->name }}</h1>

            <p>Prix: {{$advertisement->price}} €, {{$advertisement->price_status}}</p>
            <p>Poste: {{$advertisement->created_at->diffForHumans()}}</p>
            <p>Liste des lieux : {{$advertisement->listing_location}}</p>

            @if(Auth::check())
            @if(!$advertisement->didUserSavedAd() && auth()->user()->id!=$advertisement->user_id)

            <save-ad :ad-id="{{ $advertisement->id }}" :user-id="{{ auth()->user()->id }}">
            </save-ad>
            @endif

            @endif

            <hr>
            @if(!$advertisement->user->avatar)
            <img src="/img/man.jpg" width="120">
            @else
            <img src="{{Storage::url($advertisement->user->avatar)}}" width="120">
            @endif
            <p>
                <a href="{{ route('show.user.ads', [$advertisement->user_id]) }}"> {{$advertisement->user->name}}</a>
            </p>
            <p>
                @if($advertisement->phone_number)
                <show-phone-number :phone-number="{{$advertisement->phone_number}}"></show-phone-number>
                @endif
            </p>

            <div id="disqus_thread"></div>
            <script>
             
                (function() {
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://marketplacelaravel-5.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
                
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        </div>
    </div>
</div>
@endsection