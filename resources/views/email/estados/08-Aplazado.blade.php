<h1>¡Hola {{ $reclamo->nombre }}!</h1>

<p>Tu reclamo / queja realizado el <b>{{ $reclamo->fecha_reclamo }}</b> generado bajo el codigo
<b>{{ $reclamo->codigo }}</b>, ha sido aplazado hasta <b>{{$reclamo->fecha_aplazado  }}</b>. Puedes consultar la respuesta en el siguiente enlace
</p>

<a href="{{ get_reclamoDetalle($reclamo->id) }}">Consultar Reclamo</a>

<p><b>Puedes descargar la copia de tu reclamo accediendo al documento adjuntado en este correo</b></p>