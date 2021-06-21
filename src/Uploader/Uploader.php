<?php

namespace IZNOPS\Uploader;

class Uploader
{



    public static function uploadFile($pathDir, $file)
    {
        $newNameFile = lrp_hash_file($file);
        $pathDir = $pathDir . $newNameFile;
        if (move_uploaded_file($file["file"]["tmp_name"], $pathDir)) {
            return $newNameFile;
        } else {
            return  null;
        }
    }
    public static function uploadFileInReclamo($file)
    {
        $newNameFile = lrp_hash_file($file);
        $pathDir = getPathUploadsReclamo() . $newNameFile;
        if (move_uploaded_file($file["tmp_name"], $pathDir)) {
            return $newNameFile;
        } else {
            return  null;
        }
    }
}
