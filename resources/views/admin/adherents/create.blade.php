@extends('layouts.master')

@section('title')
    Adhérent créer
@endsection


@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">Page de création d'un nouvel adhérent</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Liste des adhérents</a></li>
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
                <p>
                    Remplissez les champs puis cliquez sur "Enregistrer"
                </p>
                <p>
                    <strong>Champs obligatoire</strong> <span class="text-danger">*</span>
                </p>
                <hr>
                <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nom">Nom <pre class="text-danger" style="display: inline">*</pre></label>
                                <input type="text" required name="nom" id="nom" class="form-control" placeholder="Nom" value="{{ old('nom') }}">
                                @error('nom')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="prenoms">Prénoms <pre class="text-danger" style="display: inline">*</pre></label>
                                <input type="text" required name="prenoms" id="prenoms" class="form-control" placeholder="Prénoms" value="{{ old('prenoms') }}">
                                @error('prenoms')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="date_naissance">Date de naissance <pre class="text-danger" style="display: inline">*</pre></label>
                                <input type="date" name="date_naissance" id="date_naissance" class="form-control" required placeholder="Date de naissance" value="{{ old('date_naissance') }}">
                                @error('date_naissance')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email <pre class="text-danger" style="display: inline">*</pre></label>
                                <input type="email" required name="email" id="email" class="form-control" required placeholder="Adresse email" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="fonction">Fonction <pre class="text-danger" style="display: inline">*</pre></label>
                                <input type="text" required name="fonction" id="fonction" class="form-control" required placeholder="Activité actuelle" value="{{ old('fonction') }}">
                                @error('fonction')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pays_id">Pays <pre class="text-danger" style="display: inline">*</pre></label>
                                <select name="pays_id" id="pays_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($countries as $countrie)
                                        <option value="{{ $countrie->id }}">{{ $countrie->name }}</option>
                                    @endforeach
                                </select>
                                @error('pays_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="phone1">Téléphone 1 <pre class="text-danger" style="display: inline">*</pre></label>
                                <input type="text" required name="phone1" id="phone1" class="form-control" required placeholder="Numéro de téléphone 1" value="{{ old('phone1') }}">
                                @error('phone1')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone2">Téléphone 2</label>
                                <input type="text" name="phone2" id="phone2" class="form-control" placeholder="Numéro de téléphone 2" value="{{ old('phone2') }}">
                                @error('phone2')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cv">Curriculum Vitae</label>
                                <input type="file" name="cv" id="cv" class="form-control" placeholder="Ajouter un CV">
                                @error('cv')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" id="photo" class="form-control" placeholder="Ajouter un CV">
                                @error('photo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-group mb-0">
                                    <label id="structure_id" class="control-label">Structure</label>
                                    <select class="select2 form-control select2-multiple" multiple="multiple" name="structure_id[]" multiple data-placeholder="Choisir ...">
                                        @foreach($structures as $structure)
                                            <option value="{{ $structure->id }}">{{ $structure->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('structure_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success waves-effect waves-light" type="submit"><i class="fas fa-save"></i> Enregister</button>
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