<?php

namespace IZNOPS;

use IZNOP\Models\Reclamo;
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
                require path("resources/pdf/reclamo.php");
                $HTMLoutput = ob_get_contents();
                ob_end_clean();
                $mpdf->SetHTMLHeader('
<div style="text-align: right; font-weight: bold;">
    ' . $reclamo->tipo_reclamo . " $reclamo->codigo" . '
</div>');
                $mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td width="50%" align="center">{PAGENO}/{nbpg}</td>
    </tr>
</table>');
                $mpdf->WriteHTML($HTMLoutput);
                $mpdf->Output();
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
