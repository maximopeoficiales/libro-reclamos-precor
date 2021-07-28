@extends('email.template')
@section('body')
    @switch($reclamo->id_estado)
        @case(1)
            {{-- Sin respuesta --}}
            @includeIf('email.estados.01-Sin-Respuesta', ['reclamo' => $reclamo])
        @break

        @case(2)
            {{-- Rechazado - Esperando confirmación --}}
            @includeIf('email.estados.02-Rechazado-Esperando-Confirmacion', ['reclamo' => $reclamo])

        @break
        @case(3)
            {{-- Rechazado - Confirmado por el cliente --}}
            @includeIf('email.estados.03-Rechazado-Confirmado-Cliente', ['reclamo' => $reclamo])

        @break
        @case(4)
            {{-- Rechazado - Rechazado por el cliente --}}
            @includeIf('email.estados.04-Rechazado-Rechazado-Cliente', ['reclamo' => $reclamo])
        @break


        @case(5)
            {{-- Aceptado - Esperando confirmación --}}
            @includeIf('email.estados.05-Aceptado-Esperando-Confirmacion', ['reclamo' => $reclamo])
        @break
        @case(6)
            {{-- Aceptado - Confirmado por el cliente --}}
            @includeIf('email.estados.06-Aceptado-Confirmado-Cliente', ['reclamo' => $reclamo])
        @break
        @case(7)
            {{-- Aceptado - Rechazado por el cliente --}}
            @includeIf('email.estados.07-Aceptado-Rechazado-Cliente', ['reclamo' => $reclamo])
        @break
        @case(8)
            {{-- Aplazado --}}
            @includeIf('email.estados.08-Aplazado', ['reclamo' => $reclamo])
        @break
        @case(9)
            {{-- Finalizado sin respuesta --}}
            @includeIf('email.estados.09-Finalizado-Sin-Respuesta', ['reclamo' => $reclamo])
        @break

        @default
            {{-- default --}}
            @includeIf('email.estados.Default', ['reclamo' => $reclamo])
    @endswitch

@endsection
