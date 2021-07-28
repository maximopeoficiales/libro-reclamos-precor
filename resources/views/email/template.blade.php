
@if (lrp_isMaxco())
    
@else
    
@endif
@includeIf('email.header', ['reclamo' => $reclamo])


@yield('body')


@includeIf('email.footer', ['reclamo' => $reclamo])


@php
     /* require assetPath('css/bootstrap-pdf.css'); */


    @endphp