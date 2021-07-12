<div class="lrp-card my-4">
    <div class="lrp-card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="font-weight-bold m-0">Respuesta del Cliente</h3>
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

        @if ($reclamo->ruta_archivo2 != '' && $reclamo->ruta_archivo2 != null)
            <div class="py-2">
                <p class="my-4">
                    <a href="{{ getAssetUploadsReclamo() . $reclamo->ruta_archivo2 }}"
                        download="{{ $reclamo->ruta_archivo2 }}" target="_blank"
                        class="lrp-btn lrp-btn-secondary text-capitalize w-100 my-2" ">Descargar Comprobante de
                            Aceptacíon</a>
                    </p>
                </div>
                @endif
            </div>
    </div>
