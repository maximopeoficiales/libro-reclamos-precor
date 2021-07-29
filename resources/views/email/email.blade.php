@extends('email.template')
@section('body')
    @switch($reclamo->id_estado)
        @case(1)
            {{-- Sin respuesta --}}
            <img src="{{ assetImgEmail('Recurso 1.jpg') }}" alt="" srcset="" width="100%" height="300px">
            @includeIf('email.estados.01-Sin-Respuesta', ['reclamo' => $reclamo])
        @break

        @case(2)
            {{-- Rechazado - Esperando confirmación --}}
            <img src="{{ assetImgEmail('Recurso 2.jpg') }}" alt="" srcset="" width="100%" height="300px">

            @includeIf('email.estados.02-Rechazado-Esperando-Confirmacion', ['reclamo' => $reclamo])

        @break
        @case(3)
            {{-- Rechazado - Confirmado por el cliente --}}
            <img src="{{ assetImgEmail('Recurso 3.jpg') }}" alt="" srcset="" width="100%" height="300px">
            @includeIf('email.estados.03-Rechazado-Confirmado-Cliente', ['reclamo' => $reclamo])

        @break
        @case(4)
            {{-- Rechazado - Rechazado por el cliente --}}
            <img src="{{ assetImgEmail('Recurso 4.jpg') }}" alt="" srcset="" width="100%" height="300px">
            @includeIf('email.estados.04-Rechazado-Rechazado-Cliente', ['reclamo' => $reclamo])
        @break


        @case(5)
            {{-- Aceptado - Esperando confirmación --}}
            <img src="{{ assetImgEmail('Recurso 5.jpg') }}" alt="" srcset="" width="100%" height="300px">
            @includeIf('email.estados.05-Aceptado-Esperando-Confirmacion', ['reclamo' => $reclamo])
        @break
        @case(6)
            {{-- Aceptado - Confirmado por el cliente --}}
            <img src="{{ assetImgEmail('Recurso 6.jpg') }}" alt="" srcset="" width="100%" height="300px">
            @includeIf('email.estados.06-Aceptado-Confirmado-Cliente', ['reclamo' => $reclamo])
        @break
        @case(7)
            {{-- Aceptado - Rechazado por el cliente --}}
            <img src="{{ assetImgEmail('Recurso 7.jpg') }}" alt="" srcset="" width="100%" height="300px">
            @includeIf('email.estados.07-Aceptado-Rechazado-Cliente', ['reclamo' => $reclamo])
        @break
        @case(8)
            {{-- Aplazado --}}
            <img src="{{ assetImgEmail('Recurso 8.jpg') }}" alt="" srcset="" width="100%" height="300px">
            @includeIf('email.estados.08-Aplazado', ['reclamo' => $reclamo])
        @break
        @case(9)
            {{-- Finalizado sin respuesta --}}
            <img src="{{ assetImgEmail('Recurso 9.jpg') }}" alt="" srcset="" width="100%" height="300px">
            @includeIf('email.estados.09-Finalizado-Sin-Respuesta', ['reclamo' => $reclamo])
        @break

        @default
            {{-- default --}}
            <img src="{{ assetImgEmail('Recurso 10.jpg') }}" alt="" srcset="" width="100%" height="300px">
            @includeIf('email.estados.Default', ['reclamo' => $reclamo])
    @endswitch

@endsection
