@extends('reclamo.layout')
@section('content')
<h1 class="font-weight-bold">Libro de Reclamaciones</h1>
<h6 class="lrp-color-primary">Registrar Reclamo</h6>


<div class="row">
    <form action="" method="post">
        <div class="col-md-6">


            <h5>Código Cliente (Opcional)</h5>
            <div class="lrp-group">
                <input type="text" name="cod_cli" id="cod_cli" aria-describedby="helpId" placeholder="Ingresa tu Código de Cliente">
                <!-- <label for="cod_cli">Ingresa tu Código de Cliente</label> -->
                <span class="lrp-highlight"></span>
                <span class="lrp-bar"></span>
                <small class="text-muted">Help text</small>
            </div>

            <h5>Información Personal</h5>
            <div class="lrp-group">
                <input type="text" name="nombre" id="nombre" required placeholder="Ingresa tu Nombre Completo*">
                <span class="lrp-highlight"></span>
                <span class="lrp-bar"></span>
                <!-- <label for="nombre">Ingresa tu Nombre Completo*</label> -->
            </div>
            <div class="lrp-group">
                <input type="text" name="documento" id="documento" required placeholder="DNI / C.E / Pasaporte*">
                <span class="lrp-highlight"></span>
                <span class="lrp-bar"></span>
                <!-- <label for="documento">DNI / C.E / Pasaporte*</label> -->
            </div>

            <div class="lrp-group">
                <input type="text" name="documento" id="documento" placeholder="RUC">
                <span class="lrp-highlight"></span>
                <span class="lrp-bar"></span>
                <!-- <label for="documento">RUC</label> -->
            </div>
            <div class="lrp-group">
                <input type="text" name="celular" id="celular" required placeholder="Telefono Celular*">
                <span class="lrp-highlight"></span>
                <span class="lrp-bar"></span>
                <!-- <label for="celular">Telefono Celular*</label> -->
            </div>
            <div class="lrp-group">
                <input type="email" name="correo" id="correo" required placeholder="Correo*">
                <span class="lrp-highlight"></span>
                <span class="lrp-bar"></span>
                <!-- <label for="correo">Correo*</label> -->
            </div>

            <div class="lrp-group">
                <input type="text" name="direccion" id="direccion" placeholder="Direccion">
                <span class="lrp-highlight"></span>
                <span class="lrp-bar"></span>
                <!-- <label for="direccion">Direccion</label> -->
            </div>

            <div class="form-group">
                <label for="id_ubigeo"></label>
                <select name="id_ubigeo" id="id_ubigeo">
                    <option>Departamento/Provincia/Distrito</option>
                </select>
            </div>

            <div class="lrp-group">
                <input type="email" name="correo2" id="correo2" placeholder="Correo Electronico para una copia del reclamo*">
                <span class="lrp-highlight"></span>
                <span class="lrp-bar"></span>
                <!-- <label for="correo2">Correo Electronico para una copia del reclamo*</label> -->
            </div>




        </div>
        <div class="col-md-6">
            <h5>Informacion General</h5>
            <div class="">
                <div class="lrp-group">
                    <input type="text" name="relacionado" id="relacionado" required placeholder="Ingresa el Producto o Servicio Relacionado*">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <!-- <label for="relacionado">Ingresa el Producto o Servicio Relacionado*</label> -->
                </div>

                <div class="form-group">
                    <select class="form-control" name="" id="">
                        <option>Seleccionar Tipo de Comprobante</option>
                        <option></option>
                        <option></option>
                    </select>
                </div>

                <div class="lrp-group">
                    <input type="text" name="comprobante" id="comprobante" placeholder="Ingresa el Número de Comprobante">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <!-- <label for="comprobante">Ingresa el Número de Comprobante</label> -->
                </div>

                <div class="form-group">
                    <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha de Compra*" required>
                </div>

                <div class="lrp-group">

                    <input type="text" name="monto_reclamado" id="monto_reclamado" placeholder="Monto Reclamado">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <!-- <label for="monto_reclamado">Monto Reclamado</label> -->
                </div>
                <div class="lrp-group">
                    <input type="text" name="ejecutivo" id="ejecutivo" aria-describedby="helpIdEjecutivo" placeholder="Nombre de Ejecutivo">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <!-- <label for="ejecutivo">Nombre de Ejecutivo</label> -->
                    <small id="helpIdEjecutivo" class="text-muted">Help text</small>
                </div>

                <div class="form-group">
                    <label for="descripcion">Ingrese una descripcion (1000 caracteres máximo)*</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" rows="2" maxlength="1000" required></textarea>
                </div>
            </div>

            <!-- detalle reclamos -->

            <h5>Detalle de Reclamo</h5>
            <label for="">Marcar Tipo de Reclamacion*</label>
            <div class="d-flex justify-content-between">
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="id_tipo_reclamo" id="id_tipo_reclamo" value="1">
                        Reclamo
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="id_tipo_reclamo" id="id_tipo_reclamo" value="2">
                        Queja
                    </label>
                </div>

            </div>
            <div class="form-group">
                <label for="descripcion">Ingrese un detalle de máximo 1000 caracteres*</label>
                <textarea class="form-control" name="detalle" id="detalle" rows="2" maxlength="1000" required aria-describedby="helpIdDetalle"></textarea>
                <small class="text-muted" id="helpIdDetalle">No olvide indicar el numero de su factura</small>
            </div>
            <div class="form-group my-2">
                <label class="custom-file">
                    <input type="file" name="ruta_archivo" id="ruta_archivo" placeholder="Seleccionar Archivo" class="custom-file-input" aria-describedby="fileHelpId">
                    <span class="custom-file-control"></span>
                </label>
                <small id="fileHelpId" class="form-text text-muted">jpg,jpeg y png de hasta 3MB</small>
            </div>
            @include('includes.extras.apoyo_queja')
        </div>
        @include('includes.extras.informacion_minima_requerida')

        <div class="row d-flex flex-column align-items-center my-4">
            <div class="form-check my-1">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="terminos_condiciones" value="checkedValue" checked required>
                    He leído y acepto la <a href=""><b class="lrp-color-primary">Politica de Tratamiento de Protección de Datos Personales</b></a>
                </label>
            </div>
            <div class="my-2">
                <button type="submit" class="lrp-btn lrp-btn-primary">Enviar</button>
            </div>
        </div>
    </form>

    <hr class="lrp-hr-bar">
</div>
@endsection