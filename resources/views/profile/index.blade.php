@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">

            @include('sidebar')


        </div>
        <div class="col-md-5">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('update.profile')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="card">
                    <div class="card-header text-white" style="background-color: red">Update profile</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nom complet</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Adresse</label>
                            <input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}">
                        </div>
                        <div class="form-group">
                            <label for="">Photo de profil</label>
                            <input type="file" name="image" class="form-control">

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Envoyer</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            @if (session('status') === 'password-updated')
            <div class="alert alert-success">
                Votre mot de passe a été mis à jour</div>
            @endif
            <form action="{{ route('user-password.update') }}" method="post">@csrf
                @method('PUT')

                <div class="card">
                    <div class="card-header text-white" style="background-color: red">Changer mot de passe</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mot de passe actuel</label>
                            <input type="text" name="current_password" class="form-control">
                            @error('current_password')
                            <div>{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>Nouveau mot de passe</label>
                            <input type="text" name="password" class="form-control">

                            @error('password')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirmer le nouveau mot de passe</label>
                            <input type="text" name="password_confirmation" class="form-control">
                            @error('password_confirmation')
                            <div>{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">Envoyer</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection