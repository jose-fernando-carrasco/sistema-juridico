@extends('layouts.navegacion')

@section('title', 'Editar Usuario')

@section('Config_estilos')
   {{--  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"> --}}
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
                <h1>EDITANDO USUARIO</h1>
            </div>
        </div>
    </header>
@endsection

@section('content')
<div class="container border rounded mb-4 mt-4">
      @if(session('info'))
          <div class="alert alert-success">
               <strong>{{session('info')}}</strong> 
          </div>
      @endif
</div>

<div class="container border rounded mb-4 mt-4">
    <div class="mt-5"><p class="h3">Nombre:</p></div>
    <div class="mt-3"><p class="form-control mb-3">{{$user->name}}</p></div> 
    <h2 class="h5 mb-2">Lista de Roles</h2>
    {!! Form::model($user, ['route'=>['admin.users.update',$user], 'method'=>'put']) !!}
         @foreach($roles as $role)
           <div>
               <label>
                 {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                 {{$role->name}}
               </label>
           </div>
         @endforeach
         {!! Form::submit('asignar rol', ['class'=>'btn btn-primary mt-3 mb-3']) !!}
    {!! Form::close() !!}
</div>


@endsection

@section('js')    
@endsection