@extends('layouts.main')

@section('content')
<section class="admin-content">
    <div class=" bg-dark m-b-30 bg-stars">
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto text-white p-t-40 p-b-90">
                    <h1>Soporte</h1>
                    <p class="opacity-75">
                        Aquí podrá visualizar y modificar las preguntas realizadas por los usuarios de la app WBC.
                    </p>
                </div>
                <div class="col-md-4 m-auto text-white p-t-40 p-b-90 general-info" data-url="{{url("configuracion/soporte")}}" data-refresh="table" data-el-loader="card">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container pull-up">
        <div class="row">
            {{-- Table --}}
            <div class="col-lg-12 m-b-30">
                <div class="card">
                    <div class="card-header">
                        <h2 class="">Lista de soporte</h2>
                        <div class="card-controls">
                            {{-- <a href="#" class="js-card-refresh icon"> </a> --}}
                            <a href="javascript:;" class="icon refresh-content"><i class="mdi mdi-refresh"></i> </a>
                            {{-- <a href="{{url('configuracion/soporte/form')}}"><button class="btn btn-dark" type="button">Nuevo registro</button></a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive rows-container">
                            @include('supports.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection