<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estado de cuenta</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pdf.css')}}">
    <style>
        table {
            border-collapse: separate;
            border-spacing: 1mm;
        }
        .borderless {
        /* table, tr, td, th { */
            border-width: 0px!important;
            border-style: hidden; 
            border-color: transparent;
            /* border: none!important; */
        }
        th, td, tr {
            /* padding: 0!important;
            margin: 0!important; */
            vertical-align: middle!important;
        }

        .black-bg {
            /* margin: 20mm!important; */
            color: white!important;
            /* border-width: 3px!important;
            border-style: solid!important; 
            border-color: white!important; */
            background-color: black;
        }

        .gray-bg {
            /* margin: 20mm!important; */
            /* border-width: 3px!important;
            border-style: solid!important; 
            border-color: white!important; */
            background-color: #D8D8D8!important;
        }

        .white-bg {
            /* margin: 20mm!important; */
            border-width: 1px!important;
            border-style: solid!important; 
            border-color: black!important;
            background-color: white!important;
        }
        
        .danger-text {
            color: red!important;
        }
    </style>
	{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/atmos.css')}}"> --}}
</head>
<div class="fixed-top" style="text-align: left;">
	<img class="logo" src="{{asset('img/logo_completo.png')}}">
</div>
{{-- <div class="fixed-middle">
	<img class="water-mark" src="{{asset('img/fa_icon.png')}}">
</div> --}}
<div class="start-page av-font">
    <br>
    <table id="" class="borderless uppercase" style="width: 100%;">
        <thead>
            <tr class="">
                <th class="borderless" style="width:70%; text-align: left;">Recibo de pago</th>
                <th class="borderless" style="width:30%; text-align: right;">{{
                    strftime('%d', strtotime( $payment->created_at )).' de '.
                    strftime('%B', strtotime( $payment->created_at )). ' del '.
                    strftime('%Y', strtotime( $payment->created_at ))
                }}</th>
            </tr>
        </thead>
    </table>

    {{-- <br> --}}
    <table id="" class="" style="width: 100%;">
        <tbody class="">
            {{-- - Fecha de pago
            - Importe del pago
            - Cliente
            - Propietario  --}}
            <tr>
                <td scope="col" class="black-bg" style="width:40%; text-align: center;">IMPORTE PAGADO</td>
                <td scope="col" class="gray-bg uppercase" style="width:60%; text-align: center;">${{number_format($payment->amount, 2)}} MXN</td>
            </tr>
            <tr>
                <td scope="col" class="white-bg" style="width:40%; text-align: center;">MÉTODO DE PAGO</td>
                <td scope="col" class="white-bg uppercase" style="width:60%; text-align: center;">{{$payment->type->name}}</td>
            </tr>
            <tr>
                <td scope="col" class="black-bg" style="width:40%; text-align: center;">FECHA DE PAGO</td>
                <td scope="col" class="gray-bg uppercase" style="width:60%; text-align: center;">
                    {{
                        strftime('%d', strtotime( $payment->created_at )).' de '.
                        strftime('%B', strtotime( $payment->created_at )). ' del '.
                        strftime('%Y', strtotime( $payment->created_at ))
                    }}
                </td>
            </tr>
            <tr>
                <td scope="col" class="white-bg" style="width:40%; text-align: center;">CLIENTE</td>
                <td scope="col" class="white-bg uppercase" style="width:60%; text-align: center;">{{$payment->owner->fullname}}</td>
            </tr>
            @if( $payment->property )
            <tr>
                <td scope="col" class="black-bg" style="width:40%; text-align: center;">PROPIEDAD</td>
                <td scope="col" class="gray-bg uppercase" style="width:60%; text-align: center;">{{$payment->property->name}}</td>
            </tr>
            @endif
        </tbody>
    </table>

    <br>
</div>
</html>