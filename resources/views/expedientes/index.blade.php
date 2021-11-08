@extends('layouts.navegacion')

@section('title', 'Vista Expedientes')

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
                    <th>Estado Caso</th>
                    <th>Creacion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expedientes as $expediente)
                    <tr>
                        <td>{{ $expediente->id }}</td>
                        <td>{{ $expediente->title }}</td>
                        <td>{{ $expediente->name }}</td>
                        <td>{{ $expediente->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="row">
                                <div class="col-12 mb-2 col-md-4 col-lg-3">
                                    <a href="{{ route('expediente.show', $expediente->id) }}"
                                        class="btn btn-lg btn-success">Ver</a>
                                </div>
                                <div class="col-12 justify-content-start col-md-6 col-lg-1">
                                    <form action="{{ route('expediente.update', $expediente->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-lg btn-danger">Archivar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
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
