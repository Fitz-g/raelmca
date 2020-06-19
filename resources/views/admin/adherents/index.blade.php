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
                            <a href="{{ route('adherents.create') }}" class="btn btn-success waves-effect waves-light"><i class="fas fa-save"></i> Nouvel adhérent</a>
                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Non</th>
                                    <th>Prénoms</th>
                                    <th>date de naissance</th>
                                    <th>fonction</th>
                                    <th>phone1</th>
                                    <th>phone2</th>
                                    <th>email</th>
                                    <th>cv</th>
                                    <th>photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Non</td>
                                    <td>Prénoms</td>
                                    <td>date_naissance</td>
                                    <td>fonction</td>
                                    <td>phone1</td>
                                    <td>phone2</td>
                                    <td>email</td>
                                    <td>cv</td>
                                    <td>photo</td>
                                    <td style="width:200px;text-align: center">
                                        <a href="#" class="btn btn-info"><i class="fas fa-eye"></i> Voir</a>
                                        <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Modifier</a>
                                        <form action="#" method="post" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger waves-effect waves-light" onclick="return confirm('Action irréversible, ête vous sûr ?')"><i class="fas fa-trash-alt"></i> Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
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
