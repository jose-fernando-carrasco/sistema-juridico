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
                <h1>{{ $caso->title}}</h1>
            </div>
        </div>
    </header>
@endsection


@section('content')

    <div class="container border rounded mb-4 mt-4">
        <form action="#">
            
            <div class="form-row mt-3">

                <div class="form-group col-md-2">
                    <label class="text-primary" for="inpucaso">Codigo Caso</label>
                    <input name="code" type="text" class="form-control" id="inpucaso" placeholder="Asigne un codigo"
                        value="{{ $caso->code}}" readonly>
                </div>
                <div class="col-10"></div>


                <div class="col-10"></div>
                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandante">Datos del Demandante</label>
                    <input name="nameA" type="text" class="form-control mb-3" placeholder="Ingrese el nombre Completo"
                        id="inputnameA" value="{{ $caso->nameA}}" readonly>


                    <input name="profesionA" type="text" class="form-control mb-3" placeholder="Ingrese su profesion"
                        id="inputprofesionA" value="{{$caso->profesionA}}" readonly>


                    <input name="domicilioA" type="text" class="form-control mb-3" placeholder="Ingrese su domicilio"
                        id="inputdomicilioA" value="{{$caso->domicilioA}}" readonly>


                    <input name="ciA" type="integer" class="form-control mb-3" placeholder="Ingrese su carnet"
                        id="inputcarnetA" value="{{$caso->ciA}}" readonly>


                </div>


                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandado">Datos del Demandado</label>
                    <input name="nameB" type="text" class="form-control mb-3" placeholder="Ingrese el nombre Completo"
                        id="inputnameB" value="{{$caso->nameB}}" readonly>


                    <input name="profesionB" type="text" class="form-control mb-3" placeholder="Profesion no definida"
                        id="inputprofesionB" value="{{$caso->profesionB}}" readonly>
                    <input name="domicilioB" type="text" class="form-control mb-3" placeholder="Domicilio no definida"
                        id="inputdomicilioB" value="{{$caso->domicilioB}}" readonly>
                    <input name="ciB" type="integer" class="form-control mb-3" placeholder="Carnet no definida"
                        id="inputcarnetB" value="{{$caso->ciB}}" readonly>

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
                    @php
                       $juez1=null;
                       if($juez != null)
                          $juez1 = $juez->name;    
                    @endphp 
                    <input name="judge" type="text" class="form-control mb-3" placeholder="Sin juez por el momento"
                        id="inputjudge" value="{{$juez1}}" readonly>
                </div>
                <div class="col-10"></div>

                
                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandante">Abogado Demandante</label>
                    @php
                       $abogA=null;
                       if($abogadoA != null)
                          $abogA = $abogadoA->name;    
                    @endphp
                    <input name="lawyerA" type="text" class="form-control mb-3" placeholder="Ingrese el nombre Completo"
                        id="inputnameA" value="{{$abogA}}" readonly>
                </div>


                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandado">Abogado Demandado</label>
                    @php
                       $abogB=null;
                       if($abogadoB != null)
                          $abogB = $abogadoB->name;    
                    @endphp
                    <input name="lawyerB" type="text" class="form-control mb-3" placeholder="Sin Abogado por el momento"
                        id="inputnameB" value="{{$abogB}}" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandante">Procurador Demandante</label>
                    @php
                       $procA=null;
                       if($procuradorA != null)
                          $procA = $procuradorA->name;    
                    @endphp
                    <input name="attorneyA" type="text" class="form-control mb-3" placeholder="Sin Procurador por el momento"
                        id="inputnameA" value="{{$procA}}" readonly>
                </div>


                <div class="form-group col-md-6">
                    <label class="text-primary" for="inputDemandado">Procurador Demandado</label>
                    @php
                       $procB=null;
                       if($procuradorB != null)
                          $procB = $procuradorB->name;    
                    @endphp
                    <input name="attorneyB" type="text" class="form-control mb-3" placeholder="Sin Procurador por el momento"
                        id="inputnameB" value="{{$procB}}" readonly>
                </div>

            </div>

        </form>
        <div class="row container">
            <div class="col-5"></div>
            <div class="col-4">
                @php
                    //$ruta = 'caso.index';
                   // $ruta2 = 'procuradores.perfil'.',';
                @endphp
                <a href="{{route('dashboard')}}" class="btn btn-primary btn-lg mb-4 col-3">Salir</a>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

@endsection
