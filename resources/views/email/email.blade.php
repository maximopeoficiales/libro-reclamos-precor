@extends('email.template')












@section('body')

    @switch($reclamo->id_estado)
        @case(1)
            Sin respuesta
        @break

        @case(2)
            Rechazado - Esperando confirmación
        @break
        @case(3)
            Rechazado - Confirmado por el cliente

        @break
        @case(4)
            Rechazado - Rechazado por el cliente

        @break
        @case(5)
            Aceptado - Esperando confirmación

        @break
        @case(6)
            Aceptado - Confirmado por el cliente
        @break
        @case(7)
            Aceptado - Rechazado por el cliente

        @break
        @case(8)
            Aplazado

        @break
        @case(9)
            Finalizado sin respuesta
        @break

        @default
            default

    @endswitch

@endsection
