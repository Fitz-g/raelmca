<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>RAELMCA - @yield('title')</title>
        <meta content="ADMINISTRATION RAELMCA" name="Application de gestion du Réseau des Anciens Etudiants du Lycée Moderne de Cocody Angre." />
        <meta content="Développeur d'applications Web" name="Wilfried KORANDJI" />
        @include('layouts.head')
    </head>
<body>
    <div id="wrapper">
         @include('layouts.header')
         @include('layouts.sidebar')
         <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                   @include('layouts.settings')
                   @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.footer')
        @include('layouts.footer-script')
    </div>
    </body>
</html>
