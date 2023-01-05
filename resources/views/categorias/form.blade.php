@extends('layouts.main')

@section('content')
<section class="admin-content">
    <div class="bg-dark m-b-30 bg-stars">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto text-white p-t-20 p-b-90">
                    <h1>Categorías</h1>
                </div>
                <div class="col-md-6 m-auto text-white p-t-20 p-b-90">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-b-0 bg-transparent ol-breadcrum float-right">
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{url('categorias')}}"></a>Formulario</li>
                        </ol>
                    </nav>
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
                        <h2 class="">Ingresa la descripción de la categoría</h2>
                    </div>
                    <div class="card-body">
                        <form id="form-data" action="{{url('categorias/'.($item ? 'update' : 'save'))}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="" data-redirect="1" data-table_id="example3" data-container_id="table-container">
                            <div class="text-center">
                                <label class="avatar-input">
                                    <span class="avatar avatar-xxl">
                                        <img src="{{asset($item ? $item->foto : 'img/no-image.png')}}" alt="..." class="avatar-img avatar-profile-img rounded-circle">
                                        <span class="avatar-input-icon rounded-circle"><i class="mdi mdi-upload mdi-24px"></i></span>
                                    </span>
                                    <input type="file" name="foto" class="avatar-file-picker file image" data-target="avatar-profile-img" data-msg="Foto de perfil">
                                </label>
                            </div>
                            <div class="form-group" style="display: none;">
                                <label>ID</label>
                                <input type="text" class="form-control" name="id" value="{{$item ? $item->id : ''}}">
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control not-empty" name="nombre" value="{{$item ? $item->nombre : ''}}" placeholder="Nombre de la categoría" data-msg="Nombre">
                            </div>
                            <div class="form-group">
                                <label>Color</label>
                                <input type="color" class="form-control not-empty" name="color" value="{{$item ? $item->color : ''}}" placeholder="Color" data-msg="Color">
                            </div>
                            <div class="form-group">
                                <label class="cstm-switch">
                                    <input type="checkbox" {{$item && $item->mostrar == 'S' ? 'checked' : ''}} name="mostrar" value="1" class="cstm-switch-input">
                                    <span class="cstm-switch-indicator bg-info "></span>
                                    <span class="cstm-switch-description">Mostrar en app</span>
                                </label>
                            </div>
                            <a href="{{url('categorias')}}"><button type="button" class="btn btn-primary">Regresar</button></a>
                            <button type="submit" class="btn btn-success save">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection