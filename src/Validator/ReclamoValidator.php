<?php

namespace IZNOPS\Validator;

abstract class ReclamoValidator
{
    const validations = [
        'cod_cli'                  =>  'numeric',
        'nombre'                  => 'required|max:50',
        'documento'                  => 'required|digits_between:1,25',
        'nrdoc'                  => 'max:25',
        'celular'                  => 'required|max:15',
        'correo'                  => 'max:80',
        'direccion'                  => 'max:150',
        'id_ubigeo'                  => 'numeric',
        'correo2'                  => 'max:80',
        'relacionado'                  => 'required|max:50',
        'id_tipo_comprobante'                  => "numeric",
        'comprobante'                  => 'numeric|digits_between:1,25',
        'fecha'                  => 'required|date:Y-m-d',
        // 'ejecutivo'                  => 'max:50',
        'ejecutivo'                  => 'max:50',
        'descripcion'                  => 'required|max:1000',
        'id_tipo_reclamacion'                  => 'required|numeric|max:2|min:1',
        'detalle'                  => 'required|max:1000',
        'ruta_archivo'                  => 'required|uploaded_file|max:3M|mimes:png,jpeg',
    ];
}
