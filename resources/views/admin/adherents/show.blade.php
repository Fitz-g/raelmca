@extends('layouts.master')

@section('title')
    Adhérent show
@endsection


@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">Informations adhérent</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('members.index') }}">Liste des adhérents</a></li>
            <li class="breadcrumb-item active">Informations adherent</li>
        </ol>
    </div>
@endsection

@section('css')
    <link href="{{ URL::asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="col-12">
        Hello
    </div>
@endsection
