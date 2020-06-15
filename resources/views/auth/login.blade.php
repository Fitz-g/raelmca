<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>RAELMCA - ADMINISTRATION DE RAELMCA</title>
    <meta content="ADMINISTRATION RAELMCA" name="Application de gestion du Réseau des Anciens Etudiants du Lycée Moderne de Cocody Angre." />
    <meta content="Développeur d'applications Web" name="Wilfried KORANDJI" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

<div class="home-btn d-none d-sm-block">
    <a href="{{ url('/') }}" class="text-white"><i class="fas fa-home h2"></i></a>
</div>

<!-- Begin page -->
<div class="accountbg"></div>

<div class="wrapper-page account-page-full">
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
            <div class="text-center">
                <a href="{{ url('/') }}" class="logo"><img src="{{ asset('assets/images/logo.jpeg') }}" height="100" alt="logo RAELMCA"></a>
            </div>

            <div class="p-3">
                <h4 class="font-18 m-b-5 text-center">Bienvenue !</h4>
                <p class="text-muted text-center">Connexion à l'administration</p>

                <form class="form-horizontal m-t-30" action="{{ route('user-login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" required class="form-control" id="email" placeholder="Entrez votre email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" required class="form-control" id="password" placeholder="Entez votre mot de pass">
                    </div>

                    <div class="form-group row m-t-20">
                        {{--                        <div class="col-sm-6">--}}
                        {{--                            <div class="custom-control custom-checkbox">--}}
                        {{--                                <input type="checkbox" class="custom-control-input" id="customControlInline">--}}
                        {{--                                <label class="custom-control-label" for="customControlInline">Remember me</label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Connexion</button>
                        </div>
                    </div>

                    {{--                    <div class="form-group m-t-10 mb-0 row">--}}
                    {{--                        <div class="col-12 m-t-20">--}}
                    {{--                            <a href="pages-recoverpw-2.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </form>
            </div>

        </div>
    </div>

    <div class="m-t-40 text-center">
        <p>Vous n'avez pas de compte ? <br>Merci de contacter l'administrateur.</p>
        <p>© 2020 RAELMCA. Développé avec <i class="mdi mdi-heart text-danger"></i> par Wilfried KORANDJI</p>
    </div>

</div>
<!-- end wrapper-page -->

<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/js/waves.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
