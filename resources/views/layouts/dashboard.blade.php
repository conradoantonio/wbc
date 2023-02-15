@extends('layouts.main')
@section('content')
<style type="text/css">
    .apexcharts-canvas .apexcharts-title-text,
    .apexcharts-canvas .apexcharts-legend-text,
    .apexcharts-canvas .apexcharts-legend-series,
    .apexcharts-canvas .apexcharts-xaxis-label,
    .apexcharts-canvas .apexcharts-yaxis-label,
    .apexcharts-canvas .apexcharts-yaxis-title,
    .apexcharts-canvas .apexcharts-xaxis-title,
    .apexcharts-canvas text
    {
        fill: #fff !important;
    }
</style>
<section class="admin-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-t-15">
                <div class="row">
                    <div class="col-md-12 text-left m-t-15">
                        <h4>Bienvenido {{auth()->user()->fullname}}.</h4>
                        {{-- <h4>Bienvenido {{auth()->user()->fullname}}.</h4> --}}
                    </div>
                    <div class="col-md-12 text-center m-t-15">
                        <h3>Últimos pagos registrados</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card m-b-30">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover data-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Cliente</th>
                                            <th scope="col">Monto</th>
                                            <th scope="col">Método</th>
                                            <th scope="col">Propiedad</th>
                                            <th scope="col">Fecha de pago</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            {{-- <tr>
                                                <td class="border-left border-strong border-success">Ángel Mercado Flores</td>
                                                <td>$5,000 MXN</td>
                                                <td>Departamento 5053, Proyecto Valladolid</td>
                                                <td>10 de Diciembre del 2022</td>
                                            </tr> --}}
                                            @if( count ( $proximos ) )
                                                @foreach($proximos as $prox)
                                                    <tr>
                                                        {{-- <td class="border-left border-strong border-success">{{$prox->owner ? $prox->owner->fullname : 'N/A'}}</td> --}}
                                                        <td class="border-left border-strong border-success">{!! $prox->owner ? '<span class="badge badge-success">'.$prox->owner->fullname.'</span>' : '<span class="badge badge-danger">Usuario eliminado</span>' !!}</td>
                                                        <td>${{number_format($prox->amount)}} MXN</td>
                                                        <td>
                                                            {!! $prox->type ? '<span class="badge badge-info">'.$prox->type->name.'</span>' : '<span class="badge badge-danger">Desconocido</span>' !!}
                                                        </td>
                                                        <td>{!! $prox->property ? '<span class="badge badge-info">'.$prox->property->name.'</span>' : '<span class="badge badge-danger">N/A</span>' !!}</td>
                                                        <td>
                                                            {{
                                                                ( 
                                                                    strftime('%d', strtotime($prox->payment_date)).' de '.
                                                                    strftime('%B', strtotime($prox->payment_date)). ' del '.
                                                                    strftime('%Y', strtotime($prox->payment_date))
                                                                )
                                                            }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="5">No hay pagos registrados</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row {{-- pull-up --}} d-lg-flex">
            <div class="col m-b-30">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="card-controls">
                            <a href="#" class="badge badge-soft-success"> <i class="mdi mdi-arrow-down"></i> 12 %</a>
                        </div> --}}
                        <div class="text-center p-t-30 p-b-20">
                            <div class="text-overline text-muted opacity-75">Usuarios registrados</div>
                            <h1 class="text-success">#{{number_format($data->totalUsuarios)}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m-b-30">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="card-controls">
                            <a href="#" class="badge badge-soft-success"> <i class="mdi mdi-arrow-down"></i> 12 %</a>
                        </div> --}}
                        <div class="text-center p-t-30 p-b-20">
                            <div class="text-overline text-muted opacity-75">Usuarios registrados este mes</div>
                            <h1 class="text-success">#{{number_format($data->totalUsuariosNuevos)}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m-b-30">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="card-controls">
                            <a href="#" class="badge badge-soft-success"> <i class="mdi mdi-arrow-down"></i> 12 %</a>
                        </div> --}}
                        <div class="text-center p-t-30 p-b-20">
                            <div class="text-overline text-muted opacity-75">Ingreso total</div>
                            <h1 class="text-success">${{number_format($data->totalIngresos)}} mxn</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col m-b-30">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="card-controls">
                            <a href="#" class="badge badge-soft-success"> <i class="mdi mdi-arrow-down"></i> 12 %</a>
                        </div> --}}
                        <div class="text-center p-t-30 p-b-20">
                            <div class="text-overline text-muted opacity-75">Total propiedades</div>
                            <h1 class="text-success">#{{number_format($data->totalPropiedades)}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset('vendor/apexchart/apexcharts.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
    });
</script>
@endsection