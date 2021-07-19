@extends('reclamo.client.layout_details')

{{-- aqui va la parte que se repite en todos --}}
@section('content')
    @includeIf('reclamo.shared.reclamo_detail', ['reclamo' => $reclamo])
@endsection


{{-- fin de la parte que se repite --}}

@section('answers')
    
        @if (!empty($reclamo->comentario_admin))
            @includeIf('reclamo.shared.answer_admin', ['reclamo' => $reclamo])
        @endif
        @if (!empty($reclamo->comentario_cliente))
            @includeIf('reclamo.shared.answer_client', ['reclamo' => $reclamo])
        @endif
    
    {{-- si el cliente no ha respondido cuando el admin acepto el reclamo --}}
    @if (!in_array($reclamo->id_estado, [1, 6, 7], true) && in_array($reclamo->id_estado, [5], true))
        @includeIf('reclamo.shared.enter_answer_client', ['reclamo' => $reclamo,"aceptado"=> false])
        {{-- caso especificos --}}
    @endif

    {{-- si el cliente no ha respondido cuando el admin rechazado el reclamo --}}
    @if (!in_array($reclamo->id_estado, [1, 3, 4], true) && in_array($reclamo->id_estado, [2], true))
        @includeIf('reclamo.shared.enter_answer_client', ['reclamo' => $reclamo,"aceptado"=> false])
    @endif


@endsection
