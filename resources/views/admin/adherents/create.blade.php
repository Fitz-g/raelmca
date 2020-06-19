@extends('layouts.master')

@section('title')
    Adhérent créer
@endsection


@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">Page de création d'un nouvel adhérent</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('adherents.index') }}">Liste des adhérents</a></li>
            <li class="breadcrumb-item active">Création</li>
        </ol>
    </div>
@endsection

@section('css')
    <link href="{{ URL::asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4>Nouvel adhérent</h4>
                <p>Remplissez les champs puis cliquez sur "Enregistrer"</p>
                <form action="{{ route('adherents.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control" required placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénoms</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" required placeholder="Prénom">
                            </div>
                            <div class="form-group">
                                <label for="date_naissance">Date de naissance</label>
                                <input type="text" name="date_naissance" id="date_naissance" class="form-control" required placeholder="Date de naissance">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" required placeholder="Numéro de téléphone 2">
                            </div>
                            <div class="form-group">
                                <label for="fonction">Fonction</label>
                                <input type="text" name="fonction" id="fonction" class="form-control" required placeholder="Activité actuelle">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone1">Téléphone 1</label>
                                <input type="text" name="phone1" id="phone1" class="form-control" required placeholder="Numéro de téléphone 1">
                            </div>
                            <div class="form-group">
                                <label for="phone2">Téléphone 2</label>
                                <input type="text" name="phone2" id="phone2" class="form-control" required placeholder="Numéro de téléphone 2">
                            </div>
                            <div class="form-group">
                                <label for="cv">Curriculum Vitae</label>
                                <input type="file" name="cv" id="cv" class="form-control" required placeholder="Ajouter un CV">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" id="photo" class="form-control" required placeholder="Ajouter un CV">
                            </div>
                            <div class="form-group">
                                <div class="form-group mb-0">
                                    <label id="structure_id" class="control-label">Structure</label>
                                    <select class="select2 form-control select2-multiple" multiple="multiple" name="structure_id[]" multiple data-placeholder="Choisir ...">
                                        @foreach($structures as $structure)
                                            <option value="{{ $structure->id }}">{{ $structure->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
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

@section('script')
<!-- Plugins js -->
<script src="{{ URL::asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ URL::asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ URL::asset('plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ URL::asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<!-- Plugins Init js -->
<script src="{{ URL::asset('assets/pages/form-advanced.js') }}"></script>
@endsection