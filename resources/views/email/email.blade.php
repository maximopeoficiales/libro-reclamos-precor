@extends('email.template')
@section('body')
    @switch($reclamo->id_estado)
        @case(1)
            {{-- Sin respuesta --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 1.jpg')])
            @includeIf('email.estados.01-Sin-Respuesta', ['reclamo' => $reclamo])
        @break

        @case(2)
            {{-- Rechazado - Esperando confirmación --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 2.jpg')])
            @includeIf('email.estados.02-Rechazado-Esperando-Confirmacion', ['reclamo' => $reclamo])

        @break
        @case(3)
            {{-- Rechazado - Confirmado por el cliente --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 3.jpg')])
            @includeIf('email.estados.03-Rechazado-Confirmado-Cliente', ['reclamo' => $reclamo])

        @break
        @case(4)
            {{-- Rechazado - Rechazado por el cliente --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 4.jpg')])
            @includeIf('email.estados.04-Rechazado-Rechazado-Cliente', ['reclamo' => $reclamo])
        @break


        @case(5)
            {{-- Aceptado - Esperando confirmación --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 5.jpg')])
            @includeIf('email.estados.05-Aceptado-Esperando-Confirmacion', ['reclamo' => $reclamo])
        @break
        @case(6)
            {{-- Aceptado - Confirmado por el cliente --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 6.jpg')])
            @includeIf('email.estados.06-Aceptado-Confirmado-Cliente', ['reclamo' => $reclamo])
        @break
        @case(7)
            {{-- Aceptado - Rechazado por el cliente --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 7.jpg')])
            @includeIf('email.estados.07-Aceptado-Rechazado-Cliente', ['reclamo' => $reclamo])
        @break
        @case(8)
            {{-- Aplazado --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 8.jpg')])
            @includeIf('email.estados.08-Aplazado', ['reclamo' => $reclamo])
        @break
        @case(9)
            {{-- Finalizado sin respuesta --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 9.jpg')])
            @includeIf('email.estados.09-Finalizado-Sin-Respuesta', ['reclamo' => $reclamo])
        @break

        @default
            {{-- default --}}
            @includeIf('email.shared.image', ['imgUrl' => assetImgEmail('Recurso 10.jpg')])
            @includeIf('email.estados.Default',
            ['reclamo' => $reclamo])
    @endswitch

@endsection
