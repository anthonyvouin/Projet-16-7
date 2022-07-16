@extends('backend.layouts.master')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="background-color: blue;color:#fff;">
                        <div class="card-body text-center">
                            <i class="mdi mdi-account-multiple-outline"></i>
                            <p class="lead">Utilisateurs </p>
                            <p class="lead">{{App\Models\User::count()}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: blue;color:#fff;">
                        <div class="card-body text-center">
                            <i class="mdi mdi-briefcase"></i>
                            <p class="lead">Annonces total</p>
                            <p class="lead">{{App\Models\Advertisement::count()}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: blue;color:#fff;">
                        <div class="card-body text-center">
                            <i class="mdi mdi-apps"></i>
                            <p class="lead">Catégories</p>
                            <p class="lead">{{App\Models\Category::count()}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: blue;color:#fff;">
                        <div class="card-body text-center">
                            <i class="mdi mdi-dns"></i>
                            <p class="lead">Sous-catégories</p>
                            <p class="lead">{{App\Models\SubCategory::count()}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: blue;color:#fff;">
                        <div class="card-body text-center">
                            <i class="mdi mdi-disqus-outline"></i>
                            <p class="lead">Catégories enfants</p>
                            <p class="lead">{{App\Models\ChildCategory::count()}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: blue;color:#fff;">
                        <div class="card-body text-center">
                            <i class="mdi mdi-disqus-outline"></i>
                            <p class="lead">Campagne</p>
                            <p class="lead">{{App\Models\Country::count()}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: blue;color:#fff;">
                        <div class="card-body text-center">
                            <i class="mdi mdi-disqus-outline"></i>
                            <p class="lead">Ville</p>
                            <p class="lead">{{App\Models\City::count()}}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="background-color: blue;color:#fff;">
                        <div class="card-body text-center">
                            <i class="mdi mdi-disqus-outline"></i>
                            <p class="lead">Etat</p>
                            <p class="lead">{{App\Models\State::count()}}</p>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection