@extends('layouts.navegacion')

@section('title', 'Crear Caso')


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

        .form-control {
            font-size: 15px;
        }

        .btn {
            font-size: 15px;
        }

    </style>
@endsection


@section('cabezado')
    <header class="header-area overlay">
    </header>
@endsection

@section('content')


    <div class="container mt-4">
        <strong>
            <h2>SOLICITANDO NUEVO CASO</h2>
        </strong>
    </div>

    {{-- Estados hay:
    -en espera a ser aprobado para iniciar
    -En proceso
    -Concluido --}}
    <div class="container border rounded mb-4 mt-4">
        <!--Me quedé aquí-->
        <form action="{{ route('caso.store') }}" method="Post">
            @csrf
            <div class="form-row mt-3">

                <div class="form-group col-md-2">
                    <label class="text-primary" for="inpucaso">Codigo Caso</label>
                    <input name="code" type="text" class="form-control" id="inpucaso" placeholder="Asigne un codigo" value="{{old('code')}}">
                </div>
                <div class="col-10"></div>
                @error('code')
                    <br>
                    <small class="text-danger">El campo codigo es obligatorio</small>
                    <br>
                @enderror


                <div class="form-group col-md-12">
                    <label class="text-primary" for="inputtitulo">Titulo del Caso</label>
                    <input name="title" type="text" class="form-control" id="inputtitulo"
                        placeholder="Ingrese un titulo al caso" value="{{old('title')}}">
                </div>
                @error('title')
                    <br>
                    <small class="text-danger">El campo titulo es obligatorio</small>
                    <br>
                @enderror


                <div class="col-10"></div>
                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandante">Datos del Demandante</label>
                    <input name="nameA" type="text" class="form-control mb-3" placeholder="Ingrese el nombre Completo"
                        id="inputnameA" value="{{old('nameA')}}">
                    @error('nameA')
                        {{-- <br> --}}
                        <small class="text-danger">El campo nombre es obligatorio</small>
                        <br>
                    @enderror

                    <input name="profesionA" type="text" class="form-control mb-3" placeholder="Ingrese su profesion"
                        id="inputprofesionA" value="{{old('profesionA')}}">
                    @error('profesionA')
                        {{-- <br> --}}
                        <small class="text-danger">El campo profesion es obligatorio</small>
                        <br>
                    @enderror

                    <input name="domicilioA" type="text" class="form-control mb-3" placeholder="Ingrese su domicilio"
                        id="inputdomicilioA" value="{{old('domicilioA')}}">
                    @error('domicilioA')
                        {{-- <br> --}}
                        <small class="text-danger">El campo domicilio es obligatorio</small>
                        <br>
                    @enderror

                    <input name="ciA" type="integer" class="form-control mb-3" placeholder="Ingrese su carnet"
                        id="inputcarnetA" value="{{old('ciA')}}">
                    @error('ciA')
                        {{-- <br> --}}
                        <small class="text-danger">El campo carnet es obligatorio</small>
                        <br>
                    @enderror

                </div>


                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandado">Datos del Demandado</label>
                    <input name="nameB" type="text" class="form-control mb-3" placeholder="Ingrese el nombre Completo"
                        id="inputnameB" value="{{old('nameB')}}">
                    @error('nameB')
                        {{-- <br> --}}
                        <small class="text-danger">El campo nombre es obligatorio</small>
                        <br>
                    @enderror

                    <input name="profesionB" type="text" class="form-control mb-3" placeholder="Ingrese su profesion"
                        id="inputprofesionB" value="{{old('profesionB')}}">
                    <input name="domicilioB" type="text" class="form-control mb-3" placeholder="Ingrese su domicilio"
                        id="inputdomicilioB" value="{{old('domicilioB')}}">
                    <input name="ciB" type="integer" class="form-control mb-3" placeholder="Ingrese su carnet"
                        id="inputcarnetB" value="{{old('ciB')}}">

                </div>


                <div class="form-group col-12">
                    <label class="text-primary" for="inputDescripcion">Descripcion del Caso</label>
                    <textarea class="form-control" placeholder="Ingrese una breve descripcion de como fueron los hechos"
                        name="Descripcion" id="inputDescripcion" cols="30" rows="6">{{old('Descripcion')}}</textarea>
                    @error('Descripcion')
                        {{-- <br> --}}
                        <small class="text-danger">El campo descripcion es obligatorio</small>
                        <br>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label class="text-primary" for="inputEstado">Estado del Caso</label>
                    <input name="tipo" type="text" class="form-control" id="inputEstado" readonly
                        value="{{ $estado->name }}">
                </div>
                <div class="col-9"></div>

            </div>


            <div class="row container">
                <div class="col-1"></div>
                <a href="/dashboard" class="btn btn-danger mb-4 col-3">Cancelar</a>
                <div class="col-4"></div>
                <button type="submit" class="btn btn-primary mb-4 col-3">Solicitar</button>
                <div class="col-1"></div>
            </div>

        </form>
    </div>

@endsection
