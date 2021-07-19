@extends('reclamo.admin.layout_details')

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

    {{-- solo puede ingresar respuesta cuando el estado en sin respuesta --}}
    @if (in_array($reclamo->id_estado, [1], true))
        @includeIf('reclamo.shared.enter_answer', ['reclamo' => $reclamo])
    @endif
    
    
    {{-- @if(in_array($reclamo->id_estado,[2,3,4,5,6,7,9],true))

        @if ($reclamo->comentario_admin != null && $reclamo->comentario_admin)
            @includeIf('reclamo.shared.answer_admin', ['reclamo' => $reclamo])
        @endif

        @if ($reclamo->comentario_cliente != null && $reclamo->comentario_cliente)
            @includeIf('reclamo.shared.answer_client', ['reclamo' => $reclamo])
        @endif

    @endif --}}
@endsection
