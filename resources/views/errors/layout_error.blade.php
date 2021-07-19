@php
    wp_enqueue_style('lrp_boostrapGridMin', asset('css/bootstrap-grid.min.css'), '', '1.0.0');

    wp_enqueue_style('lrp_styles', asset('css/lrp_styles.css'), '', '1.0.0');
@endphp
@yield('content')