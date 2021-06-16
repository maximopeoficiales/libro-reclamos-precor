@php
    // necesario para los plugins de jquery
    wp_enqueue_script("lrp_jquery", "https://code.jquery.com/jquery-3.5.1.slim.min.js", '', '1.0.0');
    wp_enqueue_style("lrp_boostrapGridMin", asset("css/bootstrap-grid.min.css"), '', '1.0.0');

    wp_enqueue_style("lrp_Select2CSS", "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css", '', '1.0.0');

    wp_enqueue_script("lrp_Select2JS", "https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js", '', '1.0.0');
    // wp_enqueue_style("lrp_boostrapCustomMin", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css", '', '1.0.0');

    // wp_enqueue_script("lrp_boostrapMinJS", "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.js", '', '1.0.0', true);

    // sweet alert
    wp_enqueue_script("lrp_SweetAlertJS", "https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js", '', '1.0.0');

    wp_enqueue_style("lrp_styles", asset("css/lrp_styles.css"), '', '1.0.0');
@endphp
<div>
    @yield('content')
    
</div>

@yield('scripts')


