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

                    <a href="#" class="mt-4 ml-4">
                        <button type="button" class="btn btn-circle btn-success text-white btn-lg" href="javascript:void(0)"
                            data-toggle="modal" data-target="#staticBackdrop">
                            <i class="fa fa-plus"></i>
                        </button>
                    </a>


                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="staticBackdropLabel">Subiendo Archivo</h2>
                                </div>
                                <div class="modal-body mt-4">
                                    {{-- Cuerpo del modal --}}


                                    {{-- <form action="{{route('expediente.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf --}}
                                      
                                        <form action="{{route('expediente.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group mb-4">
                                              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="archivos">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-lg">Subir</button>
                                        </form> 
                                
{{-- 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputtitle">Titulo del Archivo</label>
                                                <input type="text" class="form-control form-control-lg" id="inputtitle">
                                            </div>
                                        </div>
                                    

                                        <div class="form-group">
                                            <label for="inputdescripcion">Descripcion del Archivo</label>
                                            <textarea class="form-control" name="descripcion" id="inputdescripcion" cols="25" rows="5"></textarea>
                                        </div>

                                    
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Tipo</label>
                                                <select id="inputState" class="form-control form-control-lg">
                                                    @foreach($tipos as $tipo)
                                                        <option selected>{{$tipo->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-lg"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-lg">Subir</button>
                                        </div> --}}

                                        
                                    {{-- </form> --}}


                                </div>

                                
                            </div>
                        </div>
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
                                                    <th>Nro Expediente</th>
                                                    <th>Titulo</th>
                                                    <th>Estado Caso</th>
                                                    <th>Creacion</th>
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
