@extends('layouts.navegacion')

@section('title', 'Vista de Una Invitacion')

@section('content')

@section('extra')
    <style>
        .header-area {
            position: relative;
            height: 20vh;
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
                <h1 class="mt-5">VISTA DE LA INVITACION</h1>
            </div>
        </div>
    </header>
@endsection


@section('content')

    <div class="container border rounded mb-4 mt-4">
        <form action="{{route('caso.invitaciones.update',$invitacion->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="form-row mt-3">

                <div class="form-group col-md-2">
                    <label class="text-primary" for="inpucaso">Totulo de la invitacion</label>
                    <input name="" type="text" class="form-control" id="inpucaso" placeholder="Asigne un codigo"
                        value="{{ $invitacion->title}}" readonly>
                </div>
                <div class="col-10"></div>


                <div class="col-10"></div>
                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandante">Enviado Por:</label>
                    <input name="nameA" type="text" class="form-control mb-3" placeholder="Ingrese el nombre Completo"
                        id="inputnameA" value="{{ $invitacion->abogado}}" readonly>
                </div>


                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandado">Recibido Por:</label>
                    <input name="nam" type="text" class="form-control mb-3" placeholder="Ingrese el nombre Completo"
                        id="inputnameB" value="{{$procurador->name}}" readonly>
                </div>


                <div class="form-group col-12">
                    <label class="text-primary" for="inputDescripcion">Descripcion de la Invitacion</label>
                    <textarea class="form-control" placeholder="Ingrese una breve descripcion de como fueron los hechos"
                        name="Descripcion" id="inputDescripcion" cols="30" rows="6" readonly>{{$invitacion->Descripcion}}</textarea>

                </div>

                <div class="form-group col-md-3">
                    <label class="text-primary" for="inputEstado">Estado de la invitacion</label>
                    @php
                        $estadito = "No aceptado";
                        if ($invitacion->status)
                            $estadito = "Aceptado";
                    @endphp
                    <input name="tipo" type="text" class="form-control" id="inputEstado" readonly
                        value="{{ $estadito }}">
                </div>
                <div class="col-9"></div>
            </div>
            <a href="{{route('caso.invitaciones.index')}}"class="btn btn-danger mr-5 mb-5">Volver</a>
             <button type="submit" class="btn btn-primary ml-5 mb-5" >Aceptar</button>
        </form>
    </div>

@endsection
