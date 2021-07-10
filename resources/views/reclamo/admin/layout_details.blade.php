@php

// necesario para los plugins de jquery
wp_enqueue_script('lrp_jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', '', '1.0.0');
// wp_enqueue_script('lrp_fontawesome', asset('js/font-awesome.js'), '', '1.0.0');
wp_enqueue_style('lrp_boostrapGridMin', asset('css/bootstrap-grid.min.css'), '', '1.0.0');

wp_enqueue_style('lrp_styles', asset('css/lrp_styles.css'), '', '1.0.0');

// sweet alert
    wp_enqueue_script("lrp_SweetAlertJS", "https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.all.min.js", '', '1.0.0');

@endphp
<div>

    @yield('content')
    @yield('answers')


</div>

@yield('scripts')