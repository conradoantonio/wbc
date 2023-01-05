@extends('layouts.main')

@section('content')
<section class="admin-content">
    <div class=" bg-dark m-b-30 bg-stars">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto text-white p-t-40 p-b-90">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-b-0 bg-transparent ol-breadcrum">
                            <li class="breadcrumb-item"><a href="javascript:;">Usuarios</a></li>
                            <li class="breadcrumb-item "><a href="{{url('usuarios/clientes')}}">Clientes </a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 m-auto text-white p-t-40 p-b-90">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-b-0 bg-transparent ol-breadcrum float-right">
                            <li class="breadcrumb-item active" aria-current="page">Formulario</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container pull-up">
        <div class="row">
            <div class="col-lg-12 m-b-30">
                <div class="card">
                    <div class="card-header">
                        <h2 class="">Ingresa los datos del usuario</h2>
                    </div>
                    <div class="card-body">
                        <form id="form-data" action="{{url('usuarios/clientes/'.($item ? 'update' : 'save'))}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="" data-redirect="1" data-table_id="example3" data-container_id="table-container">
                            <div class="text-center">
                                <label class="avatar-input">
                                    <span class="avatar avatar-xxl">
                                        <img src="{{asset($item ? $item->photo : 'img/users/default.jpg')}}" alt="..." class="avatar-img avatar-profile-img rounded-circle">
                                        <span class="avatar-input-icon rounded-circle"><i class="mdi mdi-upload mdi-24px"></i></span>
                                    </span>
                                    <input type="file" name="photo" class="avatar-file-picker file image" data-target="avatar-profile-img" data-msg="Foto de perfil">
                                </label>
                            </div>
                            <div class="form-row">
                                <div class="form-group d-none">
                                    <label>ID</label>
                                    <input type="text" class="form-control" name="id" value="{{$item ? $item->id : ''}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Nombre completo*</label>
                                    <input type="text" class="form-control not-empty" name="fullname" value="{{$item ? $item->fullname : ''}}" placeholder="Nombre completo" data-msg="Nombre completo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Correo*</label>
                                    <input type="email" class="form-control not-empty" {{$item ? 'disabled' : ''}} name="email" value="{{$item ? $item->email : ''}}" placeholder="Correo" data-msg="Correo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Contraseña{{$item ? '' : '*'}}</label>
                                    <input type="text" class="form-control pass-font {{$item ? '' : 'not-empty'}}" name="password" placeholder="Contraseña" data-msg="Contraseña">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="type">Sexo*</label>
                                    <select id="sexo" name="genre" class="form-control not-empty" data-msg="Sexo">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Mujer" {{$item && $item->genre == 'Mujer' ? 'selected' : ''}}>Mujer</option>
                                        <option value="Hombre" {{$item && $item->genre == 'Hombre' ? 'selected' : ''}}>Hombre</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Teléfono</label>
                                    <input type="text" class="form-control" name="phone" value="{{$item ? $item->phone : ''}}" placeholder="Teléfono" data-msg="Teléfono">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fecha de nacimiento</label>
                                    <input type="text" class="form-control date-picker" name="date_of_birth" value="{{$item ? $item->date_of_birth : ''}}" placeholder="Fecha de nacimiento" data-msg="Fecha de nacimiento">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" {{$item && $item->receive_emails == 1 ? 'checked' : ''}} name="receive_emails" id="receive-emails">
                                        <label class="custom-control-label" for="receive-emails">Recibir correos</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" {{$item && $item->receive_notifications == 1 ? 'checked' : ''}} name="receive_notifications" id="receive-notifications">
                                        <label class="custom-control-label" for="receive-notifications">Recibir notificaciones</label>
                                    </div>
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="receive-email">
                                        <label class="custom-control-label" for="receive-notifications">Cambio de contraseña</label>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-group m-t-15">
                                <a href="{{url('usuarios/clientes')}}"><button type="button" class="btn btn-primary">Regresar</button></a>
                                <button type="submit" class="btn btn-success save">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection