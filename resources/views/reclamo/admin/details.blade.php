@extends('reclamo.admin.layout_details')

{{-- aqui va la parte que se repite en todos --}}
<div class="row p-2 my-4">
    <div class="lrp-card col-12">
        <div class="lrp-card-header ">
            <div class="d-flex justify-content-between align-items-center font-weight-bold py-2">
                <span class="text-white d-none d-md-block">{{ $reclamo->codigo }}</span>
                <span class="text-white">{{ $reclamo->fecha_reclamo }}</span>
                <span class="text-white d-flex justify-content center align-items-center">
                    <div class="lrp-circle mx-2 {{ lrp_get_color_by_status($reclamo->estado,true)}}"></div>
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

{{-- fin de la parte que se repite --}}
@section('answer')
    <div class="lrp-card my-4">
        <div class="lrp-card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold m-0">Respuesta</h3>
                <span class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Emitido el 02/03/2021</span>
            </div>
            <div class="py-2">
                <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Estado</p>
                <b class="font-weight-bold">Aceptado - Confirmado por el Cliente</b>
            </div>

            <div class="py-2">
                <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Dias Adicionales</p>
                <p class="font-weight-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam explicabo
                    tenetur reiciendis debitis consectetur cupiditate nesciunt expedita unde nobis, quis nostrum? Sapiente
                    non voluptatibus ad nisi aut aliquam ipsam facere?</p>
            </div>
            <div class="py-2">
                <p class="lrp-text-gray-secondary font-weight-bold m-0 py-1">Comprobante de Aceptacíon</p>
                <button class="lrp-btn lrp-btn-secondary text-capitalize w-100">Descargar Comprobante de Aceptacíon</button>
            </div>
        </div>
    </div>
@endsection

@section('enter_answer')
    <form action="" method="post">
        <div class="lrp-card my-4">
            <div class="lrp-card-body">
                <h3 class="font-weight-bold m-0">Ingresar Respuesta</h3>
                <div class="d-flex my-4">
                    <div class="form-check mx-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="id_estado" id="" value="checkedValue">
                            Aceptado
                        </label>
                    </div>
                    <div class="form-check mx-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="id_estado" id="" value="checkedValue">
                            Rechazado
                        </label>
                    </div>
                    <div class="form-check mx-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="id_estado" id="" value="checkedValue"
                                checked>
                            Aplazar
                        </label>
                    </div>
                </div>
                <div class="">
                    <div class="form-group my-2">
                        <label for="fecha_aplazo">Seleccionar Fecha:</label>
                        <input type="date" class="form-control" name="fecha_aplazo" id="fecha_aplazo">
                    </div>
                    <div class="form-group my-2">
                        <label for="respuesta">Ingrese una descripcion (1000 caracteres máximo)*</label>
                        <textarea class="form-control" name="respuesta" id="respuesta" rows="2" maxlength="1000"
                            required></textarea>
                    </div>
                    <div class="form-group my-2">
                        <label class="custom-file">
                            <input type="file" name="respuesta_archivo" id="respuesta_archivo"
                                placeholder="Seleccionar Archivo" class="custom-file-input" aria-describedby="fileHelpId"
                                accept="image/png,image/jpeg">
                            <span class="custom-file-control"></span>
                        </label>
                        <small id="fileHelpId" class="form-text text-muted">jpg,jpeg y png de hasta 3MB</small>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="lrp-btn lrp-btn-primary text-capitalize "
                    style="border-radius: 20px;">Enviar</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')

@endsection
