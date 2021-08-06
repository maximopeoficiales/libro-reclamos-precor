<form action="{{ lrp_get_url_admin_post() }}" method="post" enctype="multipart/form-data" class="row p-2 my-4">
    {{ lrp_set_proccess_form() }}
    {{ lrp_set_action_name('enterAnswerClient') }}
    <input type="hidden" name="id_reclamo" value="{{ $reclamo->id_reclamo }}">
    <div class="lrp-card col-12">
        <div class="lrp-card-body">
            <h3 class="font-weight-bold m-0">Ingresar Respuesta</h3>
            <div class="d-flex my-4">
                @if ($aceptado)
                    <div class="form-check mx-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="id_estado" value="6"
                                id="id_estado_aceptado" required checked>
                            Respuesta Aceptada por el Cliente
                        </label>
                    </div>
                    <div class="form-check mx-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="id_estado" value="7" required
                                id="id_estado_rechazado">
                            Respuesta Rechazada por el Cliente
                        </label>
                    </div>
                @else

                    <div class="form-check mx-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="id_estado" value="3"
                                id="id_estado_aceptado" required checked>
                            Respuesta Aceptada por el Cliente
                        </label>
                    </div>
                    
                    <div class="form-check mx-4">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="id_estado" value="4" required
                                id="id_estado_rechazado">
                            Respuesta Rechazada por el Cliente
                        </label>
                    </div>
                @endif


            </div>
            <div class="">
                <div class="form-group my-2">
                    <label for="respuesta">Ingrese una descripcion (1000 caracteres máximo)*</label>
                    <textarea class="form-control" name="comentario_cliente" id="comentario_cliente" rows="2"
                        maxlength="1000" required></textarea>
                </div>
                <div class="form-group my-4">
                    <label class="custom-file">
                        <input type="file" name="ruta_archivo3" id="ruta_archivo3" placeholder="Seleccionar Archivo"
                            class="custom-file-input" aria-describedby="fileHelpId" accept="application/msword, application/pdf, image/*">
                        <span class="custom-file-control"></span>
                    </label>
                    <small id="fileHelpId" class="form-text text-muted">pdf,docx,jpg,jpeg y png de hasta 3MB</small>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="lrp-btn lrp-btn-primary text-capitalize " style="border-radius: 20px;"
                    type="submit">Enviar</button>
            </div>
        </div>
    </div>
</form>

<script>

</script>
