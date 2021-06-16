@php
    wp_enqueue_style("lrp_boostrapGridMin", asset("css/bootstrap-grid.min.css"), '', '1.0.0');
    // wp_enqueue_style("lrp_boostrapCustomMin", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css", '', '1.0.0');

    // wp_enqueue_script("lrp_boostrapMinJS", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.js", '', '1.0.0', true);

    wp_enqueue_style("lrp_styles", asset("css/lrp_styles.css"), '', '1.0.0');
@endphp
<div>
    @yield('content')

</div>

@yield('scripts')


