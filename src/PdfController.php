<?php

namespace IZNOPS;

use IZNOPS\Models\Reclamo;
use IZNOPS\Utils\ReclamoMailer;
use Mpdf\Mpdf;

class PdfController
{
    // action: lrp_reclamo_pdf

    public function __construct()
    {
    }

    public function generate()
    {
        try {
            $id_reclamo = $_GET["id_reclamo"];
            if (!empty($id_reclamo)) {

                $mpdf = new Mpdf();
                ob_start();
                $reclamo = Reclamo::getReclamoAdminByID($id_reclamo)[0];
                // cargo el template
                echo view("pdf.reclamo", compact("reclamo"));
                $HTMLoutput = ob_get_contents();
                ob_end_clean();
                //         $mpdf->SetHTMLHeader('
                // <div style="text-align: right; font-weight: bold;">
                // ' . $reclamo->tipo_reclamo . " $reclamo->codigo" . '
                // </div>');
                $mpdf->SetHTMLFooter('
                <table width="100%">
                <tr>
                <td width="50%" align="center">{PAGENO}/{nbpg}</td>
                </tr>
                </table>');
                $mpdf->WriteHTML($HTMLoutput);
                // se guarda archivo temporal para enviar el archivo
                // $pathPdf = assetPath("pdf/$reclamo->tipo_reclamo-$reclamo->codigo.pdf");
                $mpdf->Output();
                // return $pathPdf;

            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    public function testEmail()
    {
        try {
            $id_reclamo = $_GET["id_reclamo"];
            $reclamo = Reclamo::getReclamoAdminByID($id_reclamo)[0];
            // dd($reclamo);
            // $reclamo->id_estado = 1;
            if (ReclamoMailer::sendEmailPDF($reclamo)) {
                echo "correo envio correctamente";
            } else {
                echo "Error en el envio de correo";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
