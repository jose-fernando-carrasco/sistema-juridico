@extends('layouts.navegacion')

@section('title', 'Buscando Caso')


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
                <h1>BUSCANDO CASO</h1>
            </div>
        </div>
    </header>
@endsection
@section('content')

    <div class="container">

        <div class="row mb-5 mt-5">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="{{route('caso.search1')}}">
                    @csrf
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <input name="search" placeholder="Buscando.." class="form-control" type="text" value="{{old('search')}}">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Titulo del caso</th>
                    <th scope="col">Demandante</th>
                    <th scope="col">Demandado</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @if($caso == null)
                    <tr>
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @else
                    <tr>
                        <th>{{$caso->code}}</th>
                        <td>{{$caso->title}}</td>
                        <td>{{$caso->nameA}}</td>
                        <td>{{$caso->nameB}}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{route('caso.solicitar',$caso->id)}}">Solicitar</a></td>
                    </tr>
                @endif
     
            </tbody>
        </table>
    </div>

@endsection
