<?php $__env->startSection('content'); ?>
    <h1 class="font-weight-bold">Libro de Reclamaciones</h1>
    <h6 class="lrp-color-primary">Registrar Reclamo</h6>


    <?php echo e(lrp_show_message_custom('Se creo satisfactoriamente el Reclamo/Queja', '', 'Ocurrio un Error :(')); ?>

    <form action="<?php echo e(lrp_get_url_admin_post()); ?>" method="post" enctype="multipart/form-data">
        <?php echo e(lrp_set_proccess_form()); ?>

        <?php echo e(lrp_set_action_name('registrarReclamo')); ?>

        <div class="row">

            <div class="col-md-6">

                <h5>Código Cliente (Opcional)</h5>
                <div class="lrp-group">
                    <input type="number" name="cod_cli" id="cod_cli" aria-describedby="helpId"
                        placeholder="Ingresa tu Código de Cliente">
                    <label for="cod_cli">Código de Cliente</label>
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <small class="text-muted">Help text</small>
                </div>

                <h5>Información Personal</h5>
                <div class="lrp-group">
                    <input type="text" name="nombre" id="nombre" required placeholder="Ingresa tu Nombre Completo*"
                        maxlength="50">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <label for="nombre">Nombre Completo*</label>
                </div>
                <div class="lrp-group">
                    <input type="text" name="documento" id="documento" required placeholder="DNI / C.E / Pasaporte*"
                        maxlength="25">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <label for="documento">DNI / C.E / Pasaporte*</label>
                </div>

                <div class="lrp-group">
                    <input type="number" name="nrdoc" id="nrdoc" placeholder="RUC">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <label for="documento">RUC</label>
                </div>
                <div class="form-group">
                    <label for="celular">Telefono Celular*</label>
                    <input type="text" name="celular" id="celular" required placeholder="Telefono Celular*"
                        class="form-control" style="width: 100%;">
                    
                    
                </div>
                <div class="lrp-group">
                    <input type="email" name="correo" id="correo" required placeholder="Correo*" maxlength="80">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <label for="correo">Correo*</label>
                </div>

                <div class="lrp-group">
                    <input type="text" name="direccion" id="direccion" placeholder="Direccion" maxlength="150">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <label for="direccion">Direccion</label>
                </div>

                <div class="form-group">
                    <label for="id_ubigeo" class="lrp-color-primary">Seleccione su Ubigeo</label>
                    <select name="id_ubigeo" id="id_ubigeo" class="w-100" style="width: 100% !important">
                        
                        <?php $__currentLoopData = $ubigeos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ubigeo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($ubigeo->id_ubigeo); ?>"><?php echo e($ubigeo->descripcion); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="lrp-group">
                    <input type="email" name="correo2" id="correo2"
                        placeholder="Correo Electronico para una copia del reclamo*" maxlength="80">
                    <span class="lrp-highlight"></span>
                    <span class="lrp-bar"></span>
                    <label for="correo2">Correo Electronico para una copia del reclamo*</label>
                </div>




            </div>
            <div class="col-md-6">
                <h5>Informacion General</h5>
                <div class="">
                    <div class="lrp-group">
                        <input type="text" name="relacionado" id="relacionado" required
                            placeholder="Ingresa el Producto o Servicio Relacionado*" maxlength="50">
                        <span class="lrp-highlight"></span>
                        <span class="lrp-bar"></span>
                        <label for="relacionado">Producto o Servicio Relacionado*</label>
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="id_tipo_comprobante" id="id_tipo_comprobante" class="w-100"
                            class="w-100" style="width: 100% !important>
                            
                             <?php $__currentLoopData = $comprobantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comprobante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($comprobante->id); ?>"><?php echo e($comprobante->descripcion); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="lrp-group">
                        <input type="tel" maxlength="25" name="comprobante" id="comprobante"
                            placeholder="Ingresa el Número de Comprobante">
                        <span class="lrp-highlight"></span>
                        <span class="lrp-bar"></span>
                        <label for="comprobante">Número de Comprobante</label>
                    </div>

                    <div class="form-group">
                        <label for="fecha" class="lrp-color-primary">Fecha Compra*</label>
                        <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha de Compra*"
                            required>
                    </div>

                    <div class="lrp-group">

                        <input type="number" name="monto_reclamado" id="monto_reclamado" placeholder="Monto Reclamado"
                            step="0.01" min="0.01">
                        <span class="lrp-highlight"></span>
                        <span class="lrp-bar"></span>
                        <label for="monto_reclamado">Monto Reclamado</label>
                    </div>
                    <div class="lrp-group">
                        <input type="text" name="ejecutivo" id="ejecutivo" aria-describedby="helpIdEjecutivo"
                            placeholder="Nombre de Ejecutivo" maxlength="50">
                        <span class="lrp-highlight"></span>
                        <span class="lrp-bar"></span>
                        <label for="ejecutivo">Nombre de Ejecutivo</label>
                        <small id="helpIdEjecutivo" class="text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Ingrese una descripcion (1000 caracteres máximo)*</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="2" maxlength="1000"
                            required></textarea>
                    </div>
                </div>


                <h5>Detalle de Reclamo</h5>
                <label for="">Marcar Tipo de Reclamacion*</label>
                <div class="d-flex justify-content-around">
                    <div class="form-check mx-2">
                        <label class="lrp-checkbox-container d-flex align-items-center" id="id_tipo_reclamo">
                            <input type="radio" class="form-check-input " name="id_tipo_reclamacion" value="1" required>
                            Reclamo
                        </label>
                    </div>
                    <div class="form-check mx-2">
                        <label class="lrp-checkbox-container d-flex align-items-center " id="id_tipo_queja">
                            <input type="radio" class="form-check-input " name="id_tipo_reclamacion" value="2" required>
                            Queja
                        </label>
                    </div>

                </div>
                <div class="form-group">
                    <label for="descripcion">Ingrese un detalle de máximo 1000 caracteres*</label>
                    <textarea class="form-control" name="detalle" id="detalle" rows="2" maxlength="1000" required
                        aria-describedby="helpIdDetalle"></textarea>
                    <small class="text-muted" id="helpIdDetalle">No olvide indicar el numero de su factura</small>
                </div>
                <div class="form-group my-2">
                    <label class="custom-file">
                        <input type="file" name="ruta_archivo" id="ruta_archivo" placeholder="Seleccionar Archivo"
                            class="custom-file-input" aria-describedby="fileHelpId" accept="image/png,image/jpeg">
                        <span class="custom-file-control"></span>
                    </label>
                    <small id="fileHelpId" class="form-text text-muted">jpg,jpeg y png de hasta 3MB</small>
                </div>
                <?php echo $__env->make('includes.extras.apoyo_queja', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <?php echo $__env->make('includes.extras.informacion_minima_requerida', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row d-flex flex-column align-items-center my-4">
            <div class="form-check my-1">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="terminos_condiciones" value="checkedValue" checked
                        required>
                    He leído y acepto la <a href=""><b class="lrp-color-primary">Politica de Tratamiento de Protección de
                            Datos Personales</b></a>
                </label>
            </div>
            <div class="my-4">
                <button type="submit" class="lrp-btn lrp-btn-primary">Enviar</button>
            </div>
        </div>
    </form>

    <hr class="lrp-hr-bar">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        (() => {

            const toggleSelectCheckBoxReclamoQueja = (e) => {
                if (e.target.id == "id_tipo_queja") {
                    e.target.classList.toggle("lrp-checkbox-container-hover");
                    document.querySelector("#id_tipo_reclamo").classList.remove("lrp-checkbox-container-hover");
                } else if (e.target.id == "id_tipo_reclamo") {
                    e.target.classList.toggle("lrp-checkbox-container-hover")
                    document.querySelector("#id_tipo_queja").classList.remove("lrp-checkbox-container-hover");
                }
            }
            document.addEventListener("click", toggleSelectCheckBoxReclamoQueja)

        })()
        window.onload = () => {
            $("#id_ubigeo").select2();
            $("#id_tipo_comprobante").select2();
            var phoneInputField = document.querySelector("#celular");
            var phoneInput = window.intlTelInput(phoneInputField, {
                preferredCountries: ["pe"],
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('reclamo.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/wp-content/plugins/libro-reclamos-precor/resources/views/reclamo/create.blade.php ENDPATH**/ ?>