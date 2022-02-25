<h2>Configuracion de Precor</h2>
<form action="" method="post">
    <input type="hidden" name="updateOptionsConfigPrecor" value="1">
    <div class="form-group my-2">
        <label for="precor_validez_oferta">Texto de Validez de Oferta del PDF:</label>
        <input name="precor_validez_oferta" id="precor_validez_oferta" class="form-control" placeholder="Ejm: 08 DIAS" value="<?= get_option('precor_validez_oferta') ?>">
    </div>

    <div class="form-group my-2">
        <label for="precor_text_no_hay_stock">Texto de Mensaje No hay Stock:</label>
        <p><small>Use la palabra @nombre_producto para reemplazar con el producto que no tiene stock en la web</small></p>
        <input name="precor_text_no_hay_stock" id="precor_text_no_hay_stock" class="form-control" placeholder="No hay stock para @nombre_producto, por favor contacte con su ejecutivo de ventas." value="<?= get_option('precor_text_no_hay_stock') ?>">
    </div>
    <br>
    <div class="form-group my-2">
        <label for="precor_emails_reclamos">Emails de Reenvio de Correo de Nuevo Reclamo:</label>
        <p><small>Rellene este campo con los emails a los cuales quieres que les llegue un correo al momento de que un cliente genere un reclamo </small></p>
        <p><small><b>Nota:</b> Si quieres enviar a mas de uno separa los emails por ","</small></p>
        <input name="precor_emails_reclamos" id="precor_emails_reclamos" class="form-control" placeholder="pepito@gmail.com" value="<?= get_option('precor_emails_reclamos') ?>">
    </div>
    <br>
    <button type="submit" class="button blue">Guardar Cambios</button>
</form>

<h3>¿Como usarlo?</h3>
<div class="plugin-description">
    <p>En esta pagina usted podra cambiar ciertos parametros que modificaran el comportamiento de <b>PRECOR</b></p>
</div>