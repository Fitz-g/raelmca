@extends('layouts.master')

@section('title')
    Liste des adhérents
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">Adhérents</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Adhérents</li>
        </ol>
    </div>
@endsection


@section('content')
    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if(session('danger'))
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{ session('danger') }}
                            </div>
                        @endif
                        <h4 class="mt-0 header-title">Liste des adhérents</h4>
                        <p class="text-muted m-b-30">
                            Tableau contenant la liste de tous les adhérents du RAELMCA.
                        </p>

                        <p>
                            <a href="{{ route('members.create') }}" class="btn btn-success waves-effect waves-light"><i class="fas fa-save"></i> Nouvel adhérent</a>
                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
{{--                                    <th>photo</th>--}}
{{--                                    <th>cv</th>--}}
                                    <th>Non</th>
                                    <th>Prénoms</th>
                                    <th>email</th>
                                    <th>date de naissance</th>
                                    <th>fonction</th>
                                    <th>Pays</th>
                                    <th>phone1</th>
                                    <th>phone2</th>
{{--                                    <th>Structure</th>--}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $member)
                                    <tr>
{{--                                        <td>--}}
{{--                                            @if (isset($member->photo))--}}
{{--                                                <img--}}
{{--                                                    src="{{ asset('storage' . DIRECTORY_SEPARATOR . 'photos' . DIRECTORY_SEPARATOR . $member->photo) }}"--}}
{{--                                                    alt="Avatar member"--}}
{{--                                                    width="60px">--}}
{{--                                            @else--}}
{{--                                                Indisponible--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if (isset($member->cv))--}}
{{--                                                <a class="text-info" target="_blank" href="{{ asset('storage' . DIRECTORY_SEPARATOR . 'cv' . DIRECTORY_SEPARATOR . $member->cv) }}">--}}
{{--                                                    Télécharger--}}
{{--                                                </a>--}}
{{--                                            @else--}}
{{--                                                Indisponible--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
                                        <td>{{ $member->nom }}</td>
                                        <td>{{ $member->prenoms }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ date('d-m-Y', strtotime($member->date_naissance)) }}</td>
                                        <td>{{ $member->fonction }}</td>
                                        <td>{{ $member->pays->name }}</td>
                                        <td>{{ $member->phone1 }}</td>
                                        <td>{{ $member->phone2 ? $member->phone2 : 'Non renseigné' }}</td>
{{--                                        <td>--}}
{{--                                            @foreach($member->structures as $structure)--}}
{{--                                                <span class="badge badge-info">{{ $structure->name }}</span>--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}
                                        <td style="width:200px;text-align: center">
                                            <a href="#" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Voir</a>
                                            <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Modifier</a>
                                            <form action="#" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger waves-effect waves-light btn-sm" onclick="return confirm('Action irréversible, ête vous sûr ?')"><i class="fas fa-trash-alt"></i> Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
@endsection

@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ URL::asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('assets/pages/datatables.init.js') }}"></script>
@endsection
