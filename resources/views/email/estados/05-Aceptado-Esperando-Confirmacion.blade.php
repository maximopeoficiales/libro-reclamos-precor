@extends('email.shared.template_body',["reclamo"=>$reclamo])

@section('greeting') ¡Hola {{ $reclamo->nombre }}! @endsection

@section('message')
Tu reclamo / queja realizado el <b>{{ $reclamo->fecha_reclamo }}</b> generado bajo el codigo
<b>{{ $reclamo->codigo }}</b>, ha sido aceptada. Puedes consultar la respuesta en el siguiente enlace
@endsection

@section('message_important')
    Puedes descargar la copia de tu reclamo accediendo al documento adjuntado en este correo
@endsection
