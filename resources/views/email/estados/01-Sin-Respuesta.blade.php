<img src="{{ assetImgEmail('Recurso 1.jpg') }}" alt="" srcset="" width="100%" height="300px">


<h1>¡Hola {{ $reclamo->nombre }}!</h1>
<p>Tu reclamo realizado el <b>{{ $fecha->reclamo }}</b> generado bajo el codigo
    {{ $reclamo->codigo }}, ha sido recibido y sera atendido. Pronto te estaremos comunicando la respuesta através de
    tu correo y/o podras consultarla mediante nuestra web</p>

<a href="{{ get_reclamoDetalle($reclamo->id) }}">Puedes ver tu Reclamo aqui</a>

<p><b>Puedes descargar la copia de tu reclamo accediendo al documento adjuntado en este correo</b></p>
