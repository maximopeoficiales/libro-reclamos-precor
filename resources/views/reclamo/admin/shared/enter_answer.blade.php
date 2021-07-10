@php
// librerias datetime
wp_enqueue_script('lrp_flatPickrJS', 'https://cdn.jsdelivr.net/npm/flatpickr', '', '1.0.0');
wp_enqueue_script('lrp_flatPickrJSLocation', 'https://npmcdn.com/flatpickr/dist/l10n/es.js', '', '1.0.0');

// wp_enqueue_style('lrp_flatPickrCSS', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css', '', '1.0.0');
wp_enqueue_style('lrp_flatPickrDarkCSS', 'https://npmcdn.com/flatpickr/dist/themes/airbnb.css', '', '1.0.0');
@endphp
<form action="{{ lrp_get_url_admin_post() }}" method="post" enctype="multipart/form-data" class="row p-2 my-4">
    {{ lrp_set_proccess_form() }}
    {{ lrp_set_action_name('actualizarEstadoReclamoCaso1') }}
    <div class="lrp-card col-12">
        <div class="lrp-card-body">
            <h3 class="font-weight-bold m-0">Ingresar Respuesta</h3>
            <div class="d-flex my-4">
                <div class="form-check mx-4">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="id_estado" value="5" id="id_estado_aceptado" required
                            checked>
                        Aceptado
                    </label>
                </div>
                <div class="form-check mx-4">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="id_estado" value="2" required
                            id="id_estado_rechazado">
                        Rechazado
                    </label>
                </div>
                <div class="form-check mx-4">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="id_estado" id="id_estado_aplazar" value="8" required>
                        Aplazar
                    </label>
                </div>
            </div>
            <div class="">
                <div class="form-group my-2 d-none" id="divFechaAplazado">
                    <label for="fecha_aplazo">Seleccionar Fecha:</label>
                    <input type="text" class="form-control" name="fecha_aplazo" id="fecha_aplazo"
                        placeholder="Ingrese la Fecha Aplazado">
                </div>
                <div class="form-group my-2">
                    <label for="respuesta">Ingrese una descripcion (1000 caracteres máximo)*</label>
                    <textarea class="form-control" name="comentario_admin" id="comentario_admin" rows="2"
                        maxlength="1000" required></textarea>
                </div>
                <div class="form-group my-2">
                    <label class="custom-file">
                        <input type="file" name="ruta_archivo2" id="ruta_archivo2" placeholder="Seleccionar Archivo"
                            class="custom-file-input" aria-describedby="fileHelpId" accept="image/png,image/jpeg">
                        <span class="custom-file-control"></span>
                    </label>
                    <small id="fileHelpId" class="form-text text-muted">jpg,jpeg y png de hasta 3MB</small>
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
    document.addEventListener('DOMContentLoaded', () => {

        document.querySelector("#fecha_aplazo").flatpickr({
            "locale": "es"
        });

    });

    let radiosStatus = document.querySelectorAll('input[name="id_estado"]');
    let divFechaAplazado = document.querySelector('#divFechaAplazado');
    radiosStatus.forEach(e => {
        e.addEventListener("change", (e) => {
            // selecciono aplazado
            if (e.target.value == 8) {
                divFechaAplazado.classList.remove("d-none");

            } else {
                divFechaAplazado.classList.add("d-none");
                document.querySelector("#fecha_aplazo").value = ""
            }
        })
    })
</script>
