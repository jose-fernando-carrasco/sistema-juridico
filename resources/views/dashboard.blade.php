
@extends('layouts.navegacion')

@section('title', 'Home')

@section('content')

@section('extra')
    <style>
        .header-area {
            position: relative;
            height: 100vh;
            background: #5bc0de;
            background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repear;
            background-size: cover;
        }

    </style>
@endsection


@section('cabezado')
    <header class="header-area overlay">
        <div class="banner">
            <div class="container">
                <h1>Gestion Documental</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec elit ex. Etiam elementum lectus
                    et tempor molestie.</p>
                <a href="#content" class="button button-primary">Leer Más del Sistema</a>
            </div>
        </div>
    </header>

@endsection

<main>
    <section id="content" class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec elit ex. Etiam elementum
                        lectus et tempor molestie. Pellentesque vestibulum dui sit amet dui volutpat sollicitudin.
                        Etiam non erat finibus, iaculis nunc vel, convallis eros. Etiam efficitur tempor dui, vitae
                        fringilla ipsum tristique quis. Aliquam erat volutpat. Cras ullamcorper ex et viverra
                        vulputate. Nam lectus ligula, pretium nec risus nec, ultricies fringilla mauris. Proin quis
                        venenatis neque, iaculis porta nulla. </p>
                </div>
                <div class="col-md-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec elit ex. Etiam elementum
                        lectus et tempor molestie. Pellentesque vestibulum dui sit amet dui volutpat sollicitudin.
                        Etiam non erat finibus, iaculis nunc vel, convallis eros. Etiam efficitur tempor dui, vitae
                        fringilla ipsum tristique quis. Aliquam erat volutpat. Cras ullamcorper ex et viverra
                        vulputate. Nam lectus ligula, pretium nec risus nec, ultricies fringilla mauris. Proin quis
                        venenatis neque, iaculis porta nulla. </p>
                </div>
                <div class="col-md-4">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec elit ex. Etiam elementum
                        lectus et tempor molestie. Pellentesque vestibulum dui sit amet dui volutpat sollicitudin.
                        Etiam non erat finibus, iaculis nunc vel, convallis eros. Etiam efficitur tempor dui, vitae
                        fringilla ipsum tristique quis. Aliquam erat volutpat. Cras ullamcorper ex et viverra
                        vulputate. Nam lectus ligula, pretium nec risus nec, ultricies fringilla mauris. Proin quis
                        venenatis neque, iaculis porta nulla. </p>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
