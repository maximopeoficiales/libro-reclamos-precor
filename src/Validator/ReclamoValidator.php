<?php

namespace IZNOPS\Validator;

abstract class ReclamoValidator
{
    const validations = [
        'cod_cli'                  =>  'numeric',
        'nombre'                  => 'required|max:50',
        'documento'                  => 'required|digits_between:1,25',
        'nrdoc'                  => 'max:25',
        'celular'                  => 'required|max:9',
        'correo'                  => 'max:80',
        'direccion'                  => 'max:150',
        'id_ubigeo'                  => 'numeric',
        'correo2'                  => 'max:80',
        'relacionado'                  => 'required|max:50',
        'id_tipo_comprobante'                  => "numeric",
        'comprobante'                  => 'numeric|digits_between:1,25',
        'fecha'                  => 'required|date:Y-m-d',
        'monto_reclamado'                  => 'numeric',
        'ejecutivo'                  => 'max:50',
        'descripcion'                  => 'required|max:1000',
        'id_tipo_reclamacion'                  => 'required|numeric|max:2|min:1',
        'detalle'                  => 'required|max:1000',
        'ruta_archivo'                  => 'required|uploaded_file|max:3M|mimes:png,jpeg,pdf,docx,doc',
    ];


    const actualizarEstadoCaso1 = [
        'id_reclamo'                  => 'required|numeric',
        'id_estado'                  => 'required|numeric',
        'comentario_admin'                  => 'max:1000',
        'fecha_aplazado'                  => 'date:Y-m-d',
        'ruta_archivo2'                  => 'uploaded_file|max:3M|mimes:png,jpeg,pdf,docx,doc',
    ];
    const actualizarEstadoCasoCliente = [
        'id_reclamo'                  => 'required|numeric',
        'id_estado'                  => 'required|numeric',
        'comentario_cliente'                  => 'max:1000',
        'ruta_archivo3'                  => 'uploaded_file|max:3M|mimes:png,jpeg,pdf,docx,doc',
    ];
}
