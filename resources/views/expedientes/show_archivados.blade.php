@extends('layouts.navegacion')

@section('title', 'Vista Expedientes')

@section('Config_estilos')
@endsection

@section('extra')
    <style>
        .header-area {
            position: relative;
            height: 10vh;
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
    </header>
@endsection



@section('content')




    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body bg-primary text-white mailbox-widget pb-0">
                        <h2 class="text-white pb-3">Nro Expediente: {{ $expediente->id }}</h2>
                        <h2 class="text-white pb-3">Titulo Expediente: {{ $expediente->title }}</h2>
                    </div>

                                     

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                            <div>
                                <!-- Tabla aquì-->
                                <div class="table-responsive">

                                    <div class="container mt-5">
                                        <table id="expedientes" class="table table-striped table-bordered table-hover"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nro Documento</th>
                                                    <th>Titulo</th>
                                                    <th>Tipo</th>
                                                    <th>Subido</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($archivos as $archivo)
                                                    <tr>
                                                        <td>{{ $archivo->id }}</td>
                                                        <td>{{ $archivo->title }}</td>
                                                        <td>{{ $archivo->name }}</td>
                                                        <td>{{ $archivo->created_at->diffForHumans() }}</td>
                                                        <td>
                                                            <a href="{{ route('expediente.show', $expediente->id) }}"
                                                                class="btn btn-lg btn-success">Ver</a>
                                                            <a href="#" class="btn btn-lg btn-warning">descargar</a>
                                                            <a href="#" class="btn btn-lg btn-danger">Editar</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Nro Documento</th>
                                                    <th>Titulo</th>
                                                    <th>Tipo</th>
                                                    <th>Subido</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
@endsection
