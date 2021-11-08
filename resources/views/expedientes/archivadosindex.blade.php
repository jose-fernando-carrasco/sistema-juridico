@extends('layouts.navegacion')

@section('title', 'Expedientes Archivados')

@section('Config_estilos')

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

    <style>
        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            height: 30px;
            font-size: 15px;
        }

    </style>
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

    <div class="container mt-5">
        <table id="expedientes" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Nro Expediente</th>
                    <th>Titulo</th>
                    <th>Estado</th>
                    <th>Creado</th>
                    <th>Terminado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archivados as $archivado)
                    <tr>
                        <td>{{ $archivado->id }}</td>
                        <td>{{ $archivado->title }}</td>
                        <td>{{ $archivado->name }}</td>
                        <td>{{ $archivado->created_at->diffForHumans() }}</td>
                        <td>{{ $archivado->updated_at->diffForHumans() }}</td>
                        <td><a href="{{route('expediente.show_archivados',$archivado->id)}}" class="btn btn-lg btn-success">Ver</a></td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Nro Expediente</th>
                    <th>Titulo</th>
                    <th>Estado Caso</th>
                    <th>Creacion</th>
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