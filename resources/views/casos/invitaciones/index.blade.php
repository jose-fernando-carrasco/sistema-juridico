@extends('layouts.navegacion')

@section('title', 'Vistas de Invitaciones')

@section('Config_estilos')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection


@section('extra')
    <style>
        .header-area {
            position: relative;
            height: 30vh;
            background: #5bc0de;
            background-attachment: fixed;
            background-position: center center;
            background-repeat: no-repear;
            background-size: cover;
        }

        .form-control {
            font-size: 15px;
        }

        .btn {
            font-size: 15px;
        }

    </style>
@endsection


@section('cabezado')
    <header class="header-area overlay container">
        <div class="banner">
            <div class="container mt-5">
                <h1></h1>
                <h1>INVITACIONES</h1>
            </div>
        </div>
    </header>
@endsection


@section('content')

    <div class="container mt-5">
        <table id="expedientes" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Abogado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ( $invitaciones as $invitacion )
                    <tr>
                        <td>{{$invitacion->title}}</td>
                        <td>{{$invitacion->abogado}}</td>
                        <td>
                            <a href="{{route('caso.invitaciones.show', $invitacion->id)}}" class="btn btn-warning">ver</a>
                        </td>
                    </tr>
                 @endforeach 

            </tbody>
            <tfoot>
                <tr>
                    <th>Titulo</th>
                    <th>Abogado</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#expedientes').DataTable();
    </script>

@endsection
