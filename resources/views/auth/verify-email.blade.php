@extends('layouts.app')
@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="card">
        <div class="card-header">Vérifier votre compte</div>
        <div class="card-body">
            <form action="{{ route('verification.send') }}" method="post">@csrf
                <button type="submit" class="btn btn-danger">Vérifier</button>
            </form>
        </div>
    </div>
</div>

@endsection