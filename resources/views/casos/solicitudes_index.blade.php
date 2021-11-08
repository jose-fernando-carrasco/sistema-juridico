@extends('layouts.navegacion')

@section('title', 'Solicitudes Caso')

@section('Config_estilos')

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

    <style>
        /* div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            height: 30px;
            font-size: 15px;
        } */

    </style>
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
                <h1>SOLICITUDES DE CASOS</h1>
            </div>
        </div>
    </header>
@endsection

@section('content')

    <div class="container mt-5">
        <table id="expedientes" class="table table-striped table-bordered table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Titulo</th>
                    <th>Demandante</th>
                    <th>Demandado</th>
                    <th>Estado</th> 
                    <th>Solicitado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($casos as $caso)
                    <tr>
                        <td>{{ $caso->code }}</td>
                        <td>{{ $caso->title }}</td>
                        <td>{{ $caso->nameA }}</td>
                        <td>{{ $caso->nameB }}</td>
                        <td>{{ $caso->name }}</td> 
                        <td>{{ $caso->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="row">
                                <div class="col-12 mb-2 col-md-4 col-lg-3">
                                    <a href="{{route('caso.analizar', $caso->id)}}"
                                        class="btn btn-lg btn-success">Analizar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Codigo</th>
                    <th>Titulo</th>
                    <th>Demandante</th>
                    <th>Demandado</th>
                    <th>Estado</th> 
                    <th>Solicitado</th>
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