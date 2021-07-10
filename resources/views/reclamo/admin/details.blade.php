@extends('reclamo.admin.layout_details')

{{-- aqui va la parte que se repite en todos --}}
@section('content')
{{ lrp_show_message_custom('Se actualizo satisfactoriamente el Reclamo/Queja', '', 'Ocurrio un Error :(') }}
    <div class="row p-2 my-4">
        <div class="lrp-card col-12">
            <div class="lrp-card-header ">
                <div class="d-flex justify-content-between align-items-center font-weight-bold py-2">
                    <span class="text-white d-none d-md-block">{{ $reclamo->codigo }}</span>
                    <span class="text-white">{{ $reclamo->fecha_reclamo }}</span>
                    <span class="text-white d-flex justify-content center align-items-center">
                        <div class="lrp-circle mx-2 {{ lrp_get_color_by_status($reclamo->estado, true) }}"></div>
                        <span>{{ $reclamo->estado }}</span>
                    </span>
                </div>
            </div>
            <div class="lrp-card-body">
                <h3 class="py-2 font-weight-bold">Detalles de Reclamo</h3>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="lrp-text-gray-secondary font-weight-bold m-0">Datos Personales del Cliente</h5>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Codigo de Cliente</p>
                            <b class="font-weight-bold">{{ $reclamo->id_cli }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Nombre Completo</p>
                            <b class="font-weight-bold">{{ $reclamo->nombre }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">RUC</p>
                            <b class="font-weight-bold">{{ $reclamo->nrdoc }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Número de DNI/C.E/Pasaporte</p>
                            <b class="font-weight-bold">{{ $reclamo->documento }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Teléfono Celular</p>
                            <b class="font-weight-bold">{{ $reclamo->celular }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Correo</p>
                            <b class="font-weight-bold">{{ $reclamo->correo }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Domicilio</p>
                            <b class="font-weight-bold">{{ $reclamo->direccion }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Departamento/Provincia/Distrito</p>
                            <b class="font-weight-bold">{{ $reclamo->departamentoProvinciaDistrito }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Correo Electroníco para una copia
                                del reclamo</p>
                            <b class="font-weight-bold">{{ $reclamo->correo2 }}</b>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5 class="lrp-text-gray-secondary font-weight-bold m-0">Información</h5>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Producto o Servicio Relacionado</p>
                            <b class="font-weight-bold">{{ $reclamo->relacionado }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Tipo de Comprobante</p>
                            <b class="font-weight-bold">{{ $reclamo->tipo_comprobante }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Número de Comprobante</p>
                            <b class="font-weight-bold">{{ $reclamo->comprobante }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Fecha de Compra</p>
                            <b class="font-weight-bold">{{ $reclamo->fecha_compra }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Nombre de Ejecutivo</p>
                            <b class="font-weight-bold">{{ $reclamo->ejecutivo }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Descripcíon</p>
                            <b class="font-weight-bold">{{ $reclamo->descripcion }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Tipo de Reclamacíon</p>
                            <b class="font-weight-bold">{{ $reclamo->tipo_reclamo }}</b>
                        </div>
                        <div class="py-2">
                            <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Descripción</p>
                            <b class="font-weight-bold">{{ $reclamo->detalle }}</b>
                        </div>
                        <div class="py-2">
                            <button class="lrp-btn lrp-btn-secondary text-capitalize w-100"
                                style="border-radius: 20px;">Descargar Archivo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- fin de la parte que se repite --}}

@section('answers')
    
    @if ($reclamo->id_estado == 1 && $reclamo->id_estado != 8)
        @includeIf('reclamo.admin.shared.enter_answer', ['reclamo' => $reclamo])
    @else
        @includeIf('reclamo.admin.shared.answer', ['reclamo' => $reclamo])
    @endif

@endsection
