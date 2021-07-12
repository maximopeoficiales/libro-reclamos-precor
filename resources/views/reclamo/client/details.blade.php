@extends('reclamo.client.layout_details')

{{-- aqui va la parte que se repite en todos --}}
@section('content')
    @includeIf('reclamo.shared.reclamo_detail', ['reclamo' => $reclamo])
@endsection


{{-- fin de la parte que se repite --}}

@section('answers')

    @if ($reclamo->id_estado != 6 && $reclamo->id_estado != 7 &&  $reclamo->id_estado != 1)
        @includeIf('reclamo.shared.enter_answer_client', ['reclamo' => $reclamo])
        {{-- caso especificos --}}
    @elseif(in_array($reclamo->id_estado,[2,3,4,5,6,7,8,9],true))
        
        @if ($reclamo->comentario_admin != null && $reclamo->comentario_admin)
            @includeIf('reclamo.shared.answer_admin', ['reclamo' => $reclamo])
        @endif

        @if ($reclamo->comentario_cliente != null && $reclamo->comentario_cliente)
            @includeIf('reclamo.shared.answer_client', ['reclamo' => $reclamo])
        @endif

    @endif
@endsection
