<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $reclamo->tipo_reclamo . " $reclamo->codigo" ?> </title>
    <link rel="stylesheet" media="print" href="<?= asset("css/bootstrap-grid.min.css"); ?>">
    <style media="print">
        <?php require assetPath("css/bootstrap-pdf.css");  ?>
    </style>
</head>

<body>
    <h2>holaa brooo</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>lkajslk</th>
                <th>jlkasjd</th>
                <th>lkjasdlk</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">lkajsd</td>
                <td>lkasjdl</td>
                <td>lkasjd</td>
            </tr>
            <tr>
                <td scope="row">lkjasd</td>
                <td>lkjds</td>
                <td>kljads</td>
            </tr>
        </tbody>
    </table>
</body>

</html>