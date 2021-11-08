@extends('layouts.navegacion')

@section('title', 'Vistas de Casos')

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
                <h1>{{auth()->user()->name}}</h1>
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
                    <th>Estado</th>
                    <th>Creacion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($casos as $caso)
                    <tr>
                        <td>{{ $caso->code }}</td>
                        <td>{{ $caso->title }}</td>
                        <td>{{ $caso->name }}</td>
                        <td>{{ $caso->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="row">
                                <div class="col-12 mb-2 col-md-4 col-lg-3">
                                    <a href="{{ route('caso.show', $caso->id) }}" class="btn btn-lg btn-secondary">Ver</a>
                                </div>

                                @can('caso.update') {{-- solo juez --}}
                                   <div class="col-12 justify-content-start col-md-6 col-lg-1">
                                       <form action="{{ route('caso.update', $caso->id) }}" class="formulario-concluir"
                                           method="POST">
                                           @csrf
                                           @method('put')
                                           <button type="submit" class="btn btn-lg btn-dark">Terminar</button>
                                       </form>
                                   </div>
                                @endcan

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Codigo</th>
                    <th>Titulo</th>
                    <th>Estado</th>
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



    {{-- Alerta --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('concluir') == 'ok')
        <script>
            Swal.fire(
                    'Terminado',
                    'Se dio por terminado el caso.',
                    'success')
        </script>
    @endif

    <script>
        $('.formulario-concluir').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Seguro que desea terminar el Caso?',
                text: "¡No podras retroceder!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, terminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
            })
        });
    </script>
@endsection
