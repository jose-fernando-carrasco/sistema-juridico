@extends('layouts.navegacion')

@section('title', 'Vista caso')

@section('content')

@section('extra')
    <style>
        .header-area {
            position: relative;
            height: 40vh;
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
                <h1>VISUALIZANDO DEMANDA</h1>
            </div>
        </div>
    </header>
@endsection


@section('content')

    <div class="container border rounded mb-4 mt-4">
        <form action="{{route('caso.solicitar_caso')}}" method="POST">
            @csrf
            @method('put')

            <div class="form-row mt-3">

                <div class="form-group col-md-2">
                    <label class="text-primary" for="inpucaso">Codigo Caso</label>
                    <input name="code" type="text" class="form-control" id="inpucaso" placeholder="Asigne un codigo"
                        value="{{ $caso->code}}" readonly>
                </div>
                <div class="col-10"></div>

                <div class="form-group col-md-12">
                    <label class="text-primary" for="inputtitulo">Titulo del Caso</label>
                    <input name="title" type="text" class="form-control" id="inputtitulo"
                        placeholder="Ingrese un titulo al caso" value="{{ $caso->title }}" readonly>
                </div>

                <div class="col-10"></div>
                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandante">Datos del Demandante</label>
                    <br>
                    <label class="text-primary" for="">Nombre</label>
                    <input name="nameA" type="text" class="form-control mb-3" placeholder="Ingrese el nombre Completo"
                        id="inputnameA" value="{{ $caso->nameA}}" readonly>

                    <label class="text-primary" for="">Profesion</label>
                    <input name="profesionA" type="text" class="form-control mb-3" placeholder="Ingrese su profesion"
                        id="inputprofesionA" value="{{$caso->profesionA}}" readonly>

                    <label class="text-primary" for="">Domicilio</label>
                    <input name="domicilioA" type="text" class="form-control mb-3" placeholder="Ingrese su domicilio"
                        id="inputdomicilioA" value="{{$caso->domicilioA}}" readonly>

                    <label class="text-primary" for="">Nro de Cédula</label>
                    <input name="ciA" type="integer" class="form-control mb-3" placeholder="Ingrese su carnet"
                        id="inputcarnetA" value="{{$caso->ciA}}" readonly>


                </div>


                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandado">Datos del Demandado</label>
                    <br>
                    <label class="text-primary" for="">Nombre</label>
                    <input name="nameB" type="text" class="form-control mb-3" placeholder="Ingrese el nombre Completo"
                        id="inputnameB" value="{{old('nameB',$caso->nameB)}}" readonly>

                    <label class="text-primary" for="">Profesion</label>
                    <input name="profesionB" type="text" class="form-control mb-3" placeholder="Profesion no definida"
                        id="inputprofesionB" value="{{old('profesionB',$caso->profesionB)}}">
                    @error('profesionB')
                        <br>
                        <small class="text-danger">Debe insertar su profesion</small>
                        <br>
                    @enderror

                     
                    <label class="text-primary" for="">Domicilio</label>    
                    <input name="domicilioB" type="text" class="form-control mb-3" placeholder="Domicilio no definida"
                        id="inputdomicilioB" value="{{old('domicilioB',$caso->domicilioB)}}">
                    @error('domicilioB')
                        <br>
                        <small class="text-danger">Debe insertar su domicilio</small>
                        <br>
                    @enderror

                    <label class="text-primary" for="">Nro de Cédula</label>       
                    <input name="ciB" type="integer" class="form-control mb-3" placeholder="Carnet no definida"
                        id="inputcarnetB" value="{{old('ciB',$caso->ciB)}}">
                    @error('ciB')
                        <br>
                        <small class="text-danger">Debe insertar su número de cédula</small>
                        <br>
                    @enderror

                </div>


                <div class="form-group col-12">
                    <label class="text-primary" for="inputDescripcion">Descripcion del Caso</label>
                    <textarea class="form-control" placeholder="Ingrese una breve descripcion de como fueron los hechos"
                        name="Descripcion" id="inputDescripcion" cols="30" rows="6" readonly>{{$caso->Descripcion}}</textarea>

                </div>

                <div class="form-group col-md-3">
                    <label class="text-primary" for="inputEstado">Estado del Caso</label>
                    <input name="tipo" type="text" class="form-control" id="inputEstado" readonly
                        value="{{ $caso->name }}">
                </div>
                <div class="col-9"></div>


                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputjudge">Juez</label>
                    <input name="judge" type="text" class="form-control mb-3" placeholder="Sin juez por el momento"
                        id="inputjudge" value="" readonly>
                </div>

            </div>
            <div class="row container">
                <div class="col-3"><a href="{{route('caso.buscar')}}" class="btn btn-danger btn-lg mb-4 col-3">Volver</a></div>
                <div class="col-6"></div>
                <div class="col-3"><button type="submit" class="btn btn-primary btn-lg">Solicitar</button></div>
            </div>
        </form>
        
    </div>

@endsection