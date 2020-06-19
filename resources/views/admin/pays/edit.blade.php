@extends('layouts.master')

@section('title')
    Modification
@endsection


@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">Page d'édition d'un pays</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pays.index') }}">Liste des pays</a></li>
            <li class="breadcrumb-item active">Modification</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-body">
                <h4>Modification de : {{ $pays->name }}</h4>
                <p>Modifiez les champs puis cliquez sur "Enregistrer"</p>
                <form action="{{ route('pays.update', ['pay' => $pays->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" required placeholder="Nom du pays" value="{{ $pays->name }}">
                    </div>
                    <div class="form-group">
                        <label for="alpha3">Code</label>
                        <input type="text" name="alpha3" id="alpha3" class="form-control" required placeholder="Ajoutez un code" value="{{ $pays->alpha3 }}">
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Enregister</button>
                        <button class="btn btn-secondary" type="reset">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
