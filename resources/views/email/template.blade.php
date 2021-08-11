@php
$color = lrp_getColorBase();
@endphp

@includeIf('email.header', ['reclamo' => $reclamo,"color"=>$color]);


@yield('body')


@includeIf('email.footer', ['reclamo' => $reclamo,"color"=>$color])


@php
/* require assetPath('css/bootstrap-pdf.css'); */
@endphp
