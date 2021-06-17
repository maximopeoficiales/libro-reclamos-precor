<?php

function lrp_transform_text_p(string $text): string
{
    $textTransform = "";
    $arrayText = explode("-", $text);
    foreach ($arrayText as $string) {
        $textTransform .= "<p>$string</p>";
    }
    return  str_replace("<p></p>", "", $textTransform);
}

function lrp_show_message_custom($msg_success, $msg_act, $msg_error): void
{

    if (isset($_GET['errors'])) {
?>
        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: '<?= lrp_transform_text_p($_GET['errors']) ?>'
                });
                Swal.fire({
                    icon: "success",
                    title: "Se Ha Actualizado Correctamente El " + tipo,
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
        <?php
    }
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == '1') {
        ?>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    Swal.fire({
                        icon: "success",
                        title: "<?= $msg_success ?>",
                        // showConfirmButton: false,
                        // timer: 1500
                    })
                });
            </script>
        <?php
        } else if ($_GET['msg'] == '2') {
        ?>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    Swal.fire({
                        icon: "success",
                        title: "<?= $msg_act ?>",
                        // showConfirmButton: false,
                        // timer: 1500
                    })
                });
            </script>
        <?php
        } else {
        ?>
            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    Swal.fire({
                        icon: 'error',
                        title: "<?= $msg_error ?>",
                        // showConfirmButton: false,
                        // timer: 1500
                    })
                });
            </script>
<?php
        }
    }
}

/**
 * Crear un input hidden con el action como parametro
 * @return void
 */
function lrp_set_action_name(string $nameAction): void
{
    echo '
    <input type="hidden" name="action_name" value="' . $nameAction . '">';
}


/**
 * Imprime la url el archivo admin-post.php
 * @return void
 */
function lrp_get_url_admin_post(): void
{
    echo admin_url('admin-post.php');
}
/**
 * Crea un input hidden procces_form para que sea procesado
 * @return void
 */
function lrp_set_proccess_form(): void
{
    echo '
    <input type="hidden" name="action" value="process_form">
    ';
}
/**
 * Crea un input hidden con un nombre y valor
 * @return void
 */
function lrp_set_input_hidden($name, $value, $required = true): void
{
    $required = $required ? "required" : "";
    echo "<input type='hidden' name='$name' value='$value' id='$name' $required>";
}

/**
 * Crear un script necesario para traducir los datatables
 * @return void
 */
function lrp_datatables_in_spanish(): void
{
    echo ('  $.extend(true, $.fn.dataTable.defaults, {
    "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoPostFix": "",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "Término de búsqueda",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "aria": {
            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        //only works for built-in buttons, not for custom buttons
        "buttons": {
            "create": "Nuevo",
            "edit": "Cambiar",
            "remove": "Borrar",
            "copy": "Copiar",
            "csv": "fichero CSV",
            "excel": "tabla Excel",
            "pdf": "documento PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Seleccione fichero...."
        },
        "select": {
            "rows": {
                _: "%d filas seleccionadas",
                0: "clic fila para seleccionar",
                1: "una fila seleccionada"
            }
        }
    }
});');
}


/**
 * Retorna todos los meses del año
 * @return void
 */
function lrp_getMonths(): array
{
    return array(
        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    );
}

function lrp_getYears(): array
{
    $arrayAno = [];
    $anoActual = intval(date("Y"));
    $anosAtras = 30;
    $anosAdelante = 30;

    for ($i = $anoActual - $anosAtras; $i < $anoActual + $anosAdelante; $i++) {
        array_push($arrayAno, $i);
    }
    return $arrayAno;
}

/**
 * Retorna True si el usuario logueado es el usuario creador
 * @return bool
 */
function lrp_isUserCreated($id_usuario_created): bool
{
    return (intval($id_usuario_created) === intval(get_current_user_id())) ? true : false;
}

/**
 * Escribe en la pantalla que no tiene acceso
 * @return void
 */
function lrp_noAccess(): void
{
    echo "
        <h1 class='text-center'>No tienes acceso a esta pagina</h1>
    ";
}


/**
 * Retorna la Fecha Actual Hora - Lima
 * @return string
 */
function lrp_getFechaActual($his = false): string
{
    return $his ? date("Y-m-d H:i:s") : date("Y-m-d");
}

/**
 * Retorna String desinfectado
 * @return string
 */
function lrp_sanitize($text): string
{
    return sanitize_text_field($text);
}

/**
 * Retorna un String formateado como slug  mas la fecha actual
 * @return string
 */
function lrp_hash_file($file)
{
    $name = explode(".", $file["name"])[0];
    $ext = pathinfo($file["name"], PATHINFO_EXTENSION);
    return sanitize_title($name . " " . lrp_getFechaActual(true)) . ".$ext";
}
