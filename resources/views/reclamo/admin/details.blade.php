@extends('reclamo.admin.layout_details')

{{-- aqui va la parte que se repite en todos --}}
<div class="row p-2">
    <div class="lrp-card col-12">
        <div class="lrp-card-header ">
            <div class="d-flex justify-content-between align-items-center font-weight-bold py-2">
                <span class="text-white d-none d-md-block">#0123456</span>
                <span class="text-white">02/11/21 - 00:00 horas</span>
                <span class="text-white d-flex justify-content center align-items-center">
                    <div class="lrp-circle mx-2"></div>
                    <span>Aceptado - Rechazado por el Cliente</span>
                </span>
            </div>
        </div>
        <div class="lrp-card-body">
            <h4 class="py-2">Detalles de Reclamo</h4>
            <div class="row">
                <div class="col-md-6">
                    <h5 class="lrp-text-gray font-weight-bold">Datos Personales del Cliente</h5>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Codigo de Cliente</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Nombre Completo</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">RUC</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Número de DNI/C.E/Pasaporte</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Teléfono Celular</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Correo</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Domicilio</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Departamento/Provincia/Distrito</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Correo Electroníco para una copia del reclamo</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="lrp-text-gray font-weight-bold">Información</h5>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Producto o Servicio Relacionado</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Tipo de Comprobante</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Número de Comprobante</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Fecha de Compra</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Nombre de Ejecutivo</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Descripcíon</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Tipo de Reclamacíon</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <p class="lrp-text-gray font-weight-bold m-0 py-1">Descripción</p>
                        <b class="font-weight-bold">000000</b>
                    </div>
                    <div class="py-2">
                        <button class="lrp-btn lrp-btn-secondary text-capitalize">Descargar Archivo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- fin de la parte que se repite --}}
@section('answer')

@endsection

@section('scripts')

@endsection