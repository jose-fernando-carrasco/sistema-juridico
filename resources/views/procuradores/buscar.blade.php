@extends('layouts.navegacion')

@section('title', 'Buscar Procurador')

{{-- @section('Config_estilos')
    <style>
        body {
            background-color: #f7f7ff;
            margin-top: 20px;
        }

        .btn-white {
            background-color: #fff;
            border-color: #e7eaf3;
        }

        .radius-15 {
            border-radius: 15px;
        }

        .contacts-social a {
            font-size: 16px;
            width: 36px;
            height: 36px;
            line-height: 36px;
            background: #ffffff;
            border: 1px solid #eeecec;
            text-align: center;
            border-radius: 50%;
            color: #2b2a2a;
        }

        .bg-info {
            background-color: #0dcaf0 !important;
        }

        .bg-primary {
            background-color: #008cff !important;
        }

        .bg-danger {
            background-color: #fd3550 !important;
        }

        .bg-warning {
            background-color: #ffc107 !important;
        }

    </style>
@endsection --}}

@section('Config_estilos')
<style>
    
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
    {{-- <h3>Buscar a Procurador</h3> --}}


 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css">

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">

            @foreach($attorneys as $attorney)
                
            
            <div class="col">
                <div class="card radius-15 bg-primary">
                    <div class="card-body text-center">
                        <div class="p-4 radius-15">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="110" height="110"
                                class="rounded-circle shadow p-1 bg-white" alt="">
                            <h5 class="mb-0 mt-5 text-white">Procurador</h5>
                            <p class="mb-3 text-white">{{$attorney->name}}</p>
                            <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                    class="list-inline-item border-0"><i class="bx bxl-facebook"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-twitter"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-linkedin"></i></a>
                            </div>
                            <div class="d-grid"> <a href="{{route('procuradores.invitar',$attorney->id)}}" class="btn btn-dark btn-lg radius-45">Invitar a un caso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            @endforeach

            {{-- <div class="col">
                <div class="card radius-15 bg-danger">
                    <div class="card-body text-center">
                        <div class="p-4 radius-15">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" width="110" height="110"
                                class="rounded-circle shadow p-1 bg-white" alt="">
                            <h5 class="mb-0 mt-5 text-white">Pauline I. Bird</h5>
                            <p class="mb-3 text-white">Webdeveloper</p>
                            <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                    class="list-inline-item border-0"><i class="bx bxl-facebook"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-twitter"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-linkedin"></i></a>
                            </div>
                            <div class="d-grid"> <a href="#" class="btn btn-dark btn-lg radius-45">Invitar a un caso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-15 bg-warning">
                    <div class="card-body text-center">
                        <div class="p-4 radius-15">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" width="110" height="110"
                                class="rounded-circle shadow p-1 bg-white" alt="">
                            <h5 class="mb-0 mt-5 text-dark">Pauline I. Bird</h5>
                            <p class="mb-3 text-dark">Webdeveloper</p>
                            <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                    class="list-inline-item border-0"><i class="bx bxl-facebook"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-twitter"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-linkedin"></i></a>
                            </div>
                            <div class="d-grid"> <a href="#" class="btn btn-dark btn-lg radius-45">Invitar a un caso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-15 bg-info">
                    <div class="card-body text-center">
                        <div class="p-4 radius-15">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="110" height="110"
                                class="rounded-circle shadow p-1 bg-white" alt="">
                            <h5 class="mb-0 mt-5 text-dark">Pauline I. Bird</h5>
                            <p class="mb-3 text-dark">Webdeveloper</p>
                            <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                    class="list-inline-item border-0"><i class="bx bxl-facebook"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-twitter"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-linkedin"></i></a>
                            </div>
                            <div class="d-grid"> <a href="#" class="btn btn-dark btn-lg radius-45">Invitar a un caso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card radius-15 bg-info">
                    <div class="card-body text-center">
                        <div class="p-4 radius-15">
                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" width="110" height="110"
                                class="rounded-circle shadow p-1 bg-white" alt="">
                            <h5 class="mb-0 mt-5 text-dark">Pauline I. Bird</h5>
                            <p class="mb-3 text-dark">Webdeveloper</p>
                            <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;"
                                    class="list-inline-item border-0"><i class="bx bxl-facebook"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-twitter"></i></a>
                                <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-linkedin"></i></a>
                            </div>
                            <div class="d-grid"> <a href="#" class="btn btn-dark btn-lg radius-45">Invitar a un caso</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  --}}

        </div>
    </div> 
    
@endsection
