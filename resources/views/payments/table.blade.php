<table class="table table-hover table-sm data-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pagado por</th>
            <th>Propiedad</th>
            <th>Tipo de pago</th>
            <th>Status</th>
            <th>Cantidad</th>
            <th>Fecha de creación</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td class="align-middle">{{$item->id}}</td>
                <td class="align-middle">
                    {!! $item->owner ? '<span class="badge badge-info">'.$item->owner->fullname.'</span>' : '<span class="badge badge-danger">Usuario eliminado</span>' !!}
                </td>
                <td class="align-middle">
                    {!! $item->property ? '<span class="badge badge-info">'.$item->property->name.'</span>' : '<span class="badge badge-danger">N/A</span>' !!}
                </td>
                <td class="align-middle">
                    {!! $item->type ? '<span class="badge badge-info">'.$item->type->name.'</span>' : '<span class="badge badge-danger">Desconocido</span>' !!}
                </td>
                <td class="align-middle">
                    {!! $item->status ? '<span class="badge badge-'.$item->status->class.'">'.$item->status->name.'</span>' : '<span class="badge badge-danger">Desconocido</span>' !!}
                </td>
                <td class="align-middle">${{number_format($item->amount, 2)}} MXN</td>
                <td class="align-middle">{{strftime('%d', strtotime($item->created_at)).' de '.strftime('%B', strtotime($item->created_at)). ' del '.strftime('%Y', strtotime($item->created_at))}}</td>
                <td class="text-center align-middle">
                    @if($item->payment_status_id == 1)
                        <button class="btn btn-primary btn-sm send-receipt-to-email" data-row-id="{{$item->id}}" data-toggle="tooltip" data-placement="top" title="Enviar recibo de pago"><i class="mdi mdi-email-check-outline"></i></button>
                    @endif
                    <button class="btn btn-secondary btn-sm view-details" data-row-id="{{$item->id}}" data-toggle="tooltip" data-placement="top" title="Ver detalles"><i class="mdi mdi-cash-multiple"></i></button>
                    {{-- <button class="btn btn-danger btn-sm delete-row" data-row-id="{{$item->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="mdi mdi-trash-can"></i></button> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>