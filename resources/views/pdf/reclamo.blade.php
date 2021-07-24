@extends('pdf.template',["reclamo"=>$reclamo])

@section('body')

    <style media="print">
        .p-4 {
            padding: 10px;
        }

    </style>
    <div class="">

        <table width="100%">
            <tr>
                <td width="50%" align="left">{{ $reclamo->estado }}</td>
                <td width="50%" align="right">{{ $reclamo->fecha_reclamo }}</td>
            </tr>
        </table>
        <h3 class=" font-weight-bold"><b>Detalles de Reclamo</b></h3>
        <table width="100%">
            <tr>
                <td width="50%" align="left">
                    <h4 class="">Datos Personales del Cliente</h4>
                </td>
                <td width="50%" align="left">
                    <h4 class="">Información</h4>
                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td width="50%" align="left">
                    <div class="col-md-6">
                        <div class="">
                            <b class="my-1">Codigo de Cliente</b>
                            <p class="">{{ $reclamo->id_cli }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Nombre Completo</b>
                            <p class="">{{ $reclamo->nombre }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">RUC</b>
                            <p class="">{{ $reclamo->nrdoc }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Número de DNI/C.E/Pasaporte</b>
                            <p class="">{{ $reclamo->documento }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Teléfono Celular</b>
                            <p class="">{{ $reclamo->celular }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Correo</b>
                            <p class="">{{ $reclamo->correo }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Domicilio</b>
                            <p class="">{{ $reclamo->direccion }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Departamento/Provincia/Distrito</b>
                            <p class="">{{ $reclamo->departamentoProvinciaDistrito }}</p>
                        </div>

                        <div class="">
                            <b class="my-1">Correo Electroníco para una copia
                                del reclamo</b>
                            <p class="">{{ $reclamo->correo2 }}</p>
                        </div>
                    </div>

                </td>
                <td width="50%" align="left">
                    <div class="col-md-6">
                        <div class="">
                            <b class="my-1">Producto o Servicio Relacionado</b>
                            <p class="">{{ $reclamo->relacionado }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Monto Reclamado</b>
                            <p class="">{{ number_format($reclamo->monto_reclamado, 2) }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Tipo de Comprobante</b>
                            <p class="">{{ $reclamo->tipo_comprobante }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Número de Comprobante</b>
                            <p class="">{{ $reclamo->comprobante }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Fecha de Compra</b>
                            <p class="">{{ $reclamo->fecha_compra }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Nombre de Ejecutivo</b>
                            <p class="">{{ $reclamo->ejecutivo }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Descripcíon</b>
                            <p class="">{{ $reclamo->descripcion }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Tipo de Reclamacíon</b>
                            <p class="">{{ $reclamo->tipo_reclamo }}</p>
                        </div>
                        <div class="">
                            <b class="my-1">Descripción</b>
                            <p class="">{{ $reclamo->detalle }}</p>
                        </div>


                    </div>
                </td>
            </tr>
        </table>




    </div>
    @if (!empty($reclamo->ruta_archivo))
        <table width="100%">
            <tr>
                <td width="50%" align="left">
                </td>
                <td width="50%" align="left">
                    @if ($reclamo->ruta_archivo != '' && $reclamo->ruta_archivo != null)
                        <br>
                        <table width="100%" border="1px">
                            <tr>
                                <td width="50%" align="center" bgcolor="black" class="p-4">
                                    <a href="{{ getAssetUploadsReclamo() . $reclamo->ruta_archivo }}" target="_blank2"
                                        style=" color: white">
                                        <b>Descargar Archivo</b>
                                    </a>
                                </td>
                            </tr>
                        </table>


                    @endif
                </td>
            </tr>
        </table>
    @endif

    @if (!empty($reclamo->comentario_admin))
        <div class="lrp-card my-4">
            <div class="lrp-card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="font-weight-bold m-0"><b>Respuesta</b></h3>
                    <span class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Emitido el
                        {{ $reclamo->fecha_reclamo }}</span>
                </div>
                <div class="py-2">
                    <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Estado</p>
                    <b class="font-weight-bold">{{ $reclamo->estado }}</b>
                </div>

                <div class="py-2">
                    <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Comentario</p>
                    <p class="font-weight-bold">{{ $reclamo->comentario_admin }}</p>
                </div>


            </div>
        </div>
        <table width="100%">
            <tr>
                <td width="50%" align="left">
                    @if ($reclamo->ruta_archivo2 != '' && $reclamo->ruta_archivo2 != null)
                        <br>
                        <table width="100%" border="1px">
                            <tr>
                                <td width="50%" align="center" bgcolor="black" class="p-4">
                                    <a href="{{ getAssetUploadsReclamo() . $reclamo->ruta_archivo2 }}" target="_blank2"
                                        style=" color: white">
                                        <b>Descargar Comprobante</b>
                                    </a>
                                </td>
                            </tr>
                        </table>


                    @endif
                </td>
                <td width="50%" align="left">
                </td>
            </tr>
        </table>
    @endif


    <br>
    @if (!empty($reclamo->comentario_cliente))
        <div class="lrp-card my-4">
            <div class="lrp-card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="font-weight-bold m-0"><b>Respuesta del Cliente</b></h3>
                    <span class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Emitido el
                        {{ $reclamo->fecha_reclamo }}</span>
                </div>
                <div class="py-2">
                    <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Estado</p>
                    <b class="font-weight-bold">{{ $reclamo->estado }}</b>
                </div>

                <div class="py-2">
                    <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Comentario</p>
                    <p class="font-weight-bold">{{ $reclamo->comentario_cliente }}</p>
                </div>


            </div>
        </div>
        @if ($reclamo->ruta_archivo3 != '' && $reclamo->ruta_archivo3 != null)
            <br>
            <table width="100%" border="1px">
                <tr>
                    <td width="50%" align="center" bgcolor="black" class="p-4">
                        <a href="{{ getAssetUploadsReclamo() . $reclamo->ruta_archivo3 }}" target="_blank2"
                            style=" color: white">
                            <b>Descargar Comprobante</b>
                        </a>
                    </td>
                </tr>
            </table>
        @endif
    @endif


@endsection
