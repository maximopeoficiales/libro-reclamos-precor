<?php

namespace IZNOPS\Validator;

use Rakit\Validation\Validator as Rakit;


class Validator
{
    public static function validate($data, $validations): array
    {
        $validator = new Rakit;

        $validator->setMessage('required', "El campo :attribute es requerido");
        $validator->setMessage('numeric', "El campo :attribute debe ser un numero");
        $validator->setMessage('mimes', "El archivo :attribute debe ser formato establecido");
        $validator->setMessage('uploaded_file', "El campo :attribute debe ser un archivo");

        $validation = $validator->make($data, $validations);
        $validation->validate();
        if ($validation->fails()) {
            $errors = $validation->errors();
            $text = "";
            foreach ($errors->firstOfAll() as $value) {
                $text .= strval($value) . ". -";
            }
            return ["validate" => false, "errors" => $text];
        } else {
            return ["validate" => true];
        }
    }

    public static function validatePost($validations)
    {
        return self::validate($_POST + $_FILES, $validations);
    }
}
