<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $reclamo->tipo_reclamo }}-{{ $reclamo->codigo }}</title>
    <style media="print">
        @php
            require assetPath('css/bootstrap-pdf.css');
        @endphp
    
    </style>
</head>
<body>
    @yield('body')
</body>

</html>
